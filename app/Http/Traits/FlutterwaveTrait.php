<?php
namespace App\Http\Traits;
use App\Models\Payout;
use App\Models\Payment;
use App\Models\Settlement;
use Ixudra\Curl\Facades\Curl;


trait FlutterwaveTrait
{
    
    protected function initiateFlutterWave(Payment $payment){
        $response = Curl::to('https://api.flutterwave.com/v3/payments')
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        ->withData( array('customer' => ['email'=> $payment->email,'phonenumber'=> $payment->phone,'name'=> $payment->name],
                        'tx_ref'=> $payment->reference,"currency" => $payment->currency->code,"payment_options"=>"card,account,ussd",
                        "redirect_url"=> route('payment.callback'),'amount'=> $payment->amount,
                        "customizations"=> [
                            "title" => "Havron",
                            "description" => "Payment",
                            "logo" => asset('images/logo.png')
                        ]) )
        ->asJson()
        ->post();
        if($response && $response->status == 'success')
            return $response->data->link;
        else return false;
    }
    
    protected function verifyFlutterWavePayment($value){
        $paymentDetails = Curl::to('https://api.flutterwave.com/v3/transactions/verify_by_reference?tx_ref='.$value)
         ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
         ->asJson()
         ->get();
        return $paymentDetails;
    }

    

    protected function refundFlutterWave(Payment $payment){
        $payment = $payment->order->payment_item->payment;
        $id = $payment->request_id;
        $response = Curl::to("https://api.flutterwave.com/v3/transactions/$id/refund")
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        ->withData( array('amount'=> $payment->amount ) )
        ->asJson()
        ->post();
        if($response &&  isset($response->status) && $response->status == 'success')
        return true;
        else return false;
    }

    public function banks($value){
        $response = Curl::to('https://api.flutterwave.com/v3/banks/'.$value)
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
         ->asJson()
         ->get();
       return $response->data;
    }

    
    protected function resolveBankAccountByFlutter($bank_code,$account_number){
        $response = Curl::to('https://api.flutterwave.com/v3/accounts/resolve')
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->withData( json_encode(array("account_number" => $account_number,"account_bank" => $bank_code)) )
            ->asJson()
            ->post();
        dd($response);
        if(!$response ||  !isset($response->status) || $response->status == "error"){
            return false;
        }
        return $response->data->account_name;
        
    }

    protected function payoutFlutterWave(Payout $payout){
        
        $response = Curl::to('https://api.flutterwave.com/v3/transfers')
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        // ->withData( array('account_number'=> $payout->user->bankaccount->account_number,'account_bank'=> $payout->user->bankaccount->bank->code,'reference'=> $payout->reference
        ->withData( array('account_number'=> '0690000032','account_bank'=> '044','amount'=> $payout->amount,
                        'narration'=> "Vendor payout with reference $payout->reference",'reference'=> $payout->reference.'_PMCK',
                        "currency"=> $payout->currency->iso,'destination_branch_code'=> $payout->user->bankaccount->branch ? $payout->user->bankaccount->branch->code :0,
                        "customizations"=> [
                            "title"=>"Expiring Soon",
                            "description"=>"Payment",
                            "logo"=> asset('src/images/logo.png')
                        ]) )
        ->asJson()
        ->post();
        if(!$response || $response->status == 'error' || $response->data->status == 'FAILED'){
            $payout->transfer_id = $response->data->id ?? '';
            $payout->status = 'failed';
            $payout->save();
        }
        if($response && $response->status == 'success' && in_array($response->data->status,['PENDING','NEW'])){
            $payout->transfer_id = $response->data->id ?? '';
            $payout->status = 'processing';
            $payout->save();
        }
        
    }

    protected function verifyPayoutFlutterwave(Payout $payout){
        $response = Curl::to("https://api.flutterwave.com/v3/transfers/$payout->transfer_id")
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get(); 
            
            if(!$response || $response->status == 'error' || $response->data->status == 'FAILED'){
                $payout->status = 'failed';
                $payout->save();
            }
            if($response && isset($response->status) && $response->status == 'success' && $response->data->status == 'SUCCESSFUL'){
                $payout->status = 'paid'; 
                $payout->paid_at = now(); 
                $payout->save();
            }
    }
    

    protected function retryPayoutFlutterWave(Payout $payout){
        $response = Curl::to("https://api.flutterwave.com/v3/transfers/$payout->transfer_id/retries")
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get();
            if(!$response || $response->status == 'error' || !isset($response->data->status) || $response->data->status == 'FAILED'){
                $payout->status = 'failed';
                $payout->save();
            }
            if($response && isset($response->status) && $response->status == 'success' && $response->data->status == 'SUCCESSFUL'){
                $payout->status = 'paid'; 
                $payout->paid_at = now(); 
                $payout->save();
            }
    }


}