<?php
namespace App\Http\Traits;
use App\Models\Settlement;
use App\Models\Payment;
use App\Models\Settlement;
use Ixudra\Curl\Facades\Curl;


trait FlutterwaveTrait
{
    
    protected function initiateFlutterWave(Payment $payment){
        $response = Curl::to('https://api.flutterwave.com/v3/payments')
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        ->withData( array('customer' => ['email'=> $payment->user->email,'name'=> $payment->user->name],
                        'tx_ref'=> $payment->reference,"currency" => $payment->currency,"payment_options"=>"card,account,ussd",
                        "redirect_url"=> route('payment.callback'),'amount'=> $payment->total,
                        "customizations"=> [
                            "title" => "Herbs of Africa",
                            "description" => "Payment",
                            "logo" => asset('wp-content/uploads/2023/08/new-logo.png')
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

    protected function payoutFlutterWave(Settlement $settlement){
        
        $response = Curl::to('https://api.flutterwave.com/v3/transfers')
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        // ->withData( array('account_number'=> $settlement->affiliate->account_number,'account_bank'=> $settlement->affiliate->bank_code,'reference'=> $settlement->reference
        ->withData( array('account_number'=> '0690000032','account_bank'=> '044','amount'=> $settlement->amount,
                        'narration'=> "Vendor payout with reference $settlement->reference",'reference'=> $settlement->reference.'_PMCK',
                        "currency"=> $settlement->currency,'destination_branch_code'=> 0,
                        "customizations"=> [
                            "title" => "Herbs of Africa",
                            "description" => "Payment",
                            "logo" => asset('wp-content/uploads/2023/08/new-logo.png')
                        ]) )
        ->asJson()
        ->post();
        if(!$response || $response->status == 'error' || $response->data->status == 'FAILED'){
            $settlement->transfer_id = $response->data->id ?? '';
            $settlement->status = 'failed';
            $settlement->save();
        }
        if($response && $response->status == 'success' && in_array($response->data->status,['PENDING','NEW'])){
            $settlement->transfer_id = $response->data->id ?? '';
            $settlement->status = 'processing';
            $settlement->save();
        }
        
    }

    protected function verifyPayoutFlutterwave(Settlement $settlement){
        $response = Curl::to("https://api.flutterwave.com/v3/transfers/$settlement->transfer_id")
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get(); 
            
            if(!$response || $response->status == 'error' || $response->data->status == 'FAILED'){
                $settlement->status = 'failed';
                $settlement->save();
            }
            if($response && isset($response->status) && $response->status == 'success' && $response->data->status == 'SUCCESSFUL'){
                $settlement->status = 'paid'; 
                $settlement->paid_at = now(); 
                $settlement->save();
            }
    }
    

    protected function retryPayoutFlutterWave(Settlement $settlement){
        $response = Curl::to("https://api.flutterwave.com/v3/transfers/$settlement->transfer_id/retries")
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get();
            if(!$response || $response->status == 'error' || !isset($response->data->status) || $response->data->status == 'FAILED'){
                $settlement->status = 'failed';
                $settlement->save();
            }
            if($response && isset($response->status) && $response->status == 'success' && $response->data->status == 'SUCCESSFUL'){
                $settlement->status = 'paid'; 
                $settlement->paid_at = now(); 
                $settlement->save();
            }
    }


}