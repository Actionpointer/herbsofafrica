<?php
namespace App\Http\Traits;

use App\Models\Payout;
use App\Models\Payment;
use App\Models\Settlement;
use Ixudra\Curl\Facades\Curl;


trait PaystackTrait
{

    public function initiatePaystack(Payment $payment){
      $response = Curl::to('https://api.paystack.co/transaction/initialize')
        ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
        ->withData( array('email' => $payment->user->email,'currency'=> strtoupper($payment->currency),
        'amount'=> $payment->total * 100,'callback_url'=> route('payment.callback'),'reference'=> $payment->reference) )
        ->asJson()
        ->post();
        if($response && $response->status)
            return $response->data->authorization_url;
        else return false;
    }

    protected function verifyPaystackPayment($reference){
      $paymentDetails = Curl::to('https://api.paystack.co/transaction/verify/'.$reference)
          ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
          ->asJson()
          ->get();
      return $paymentDetails;
  }

    protected function refundPaystack(Payment $payment){
        $response = Curl::to('https://api.paystack.co/refund')
         ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
         ->withData( array('transaction'=> $payment->reference,'amount'=> $payment->amount*100 ) )
         ->asJson()
         ->post();
         if($response &&  isset($response->status) && $response->status)
         return true;
       else return false;
    }

    protected function createRecipient($bank_code,$account_number){
      $response = Curl::to('https://api.paystack.co/transferrecipient')
        ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
        ->withHeader('Content-Type: application/json')
        ->withData( array('type'=> "nuban",'account_number'=> $account_number,'currency'=> 'NGN',
                        'bank_code'=> $bank_code ) )
        
        ->asJson()                
        ->post();
      if($response && isset($response->status) && $response->status)
        return $response->data->recipient_code; 
      else return false;
    }


    public function payoutPaystack(Settlement $settlement){
        
        $response = Curl::to('https://api.paystack.co/transfer')
        ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
        ->withHeader('Content-Type: application/json')
        ->withData( array("source" => "balance", "reason"=> "Withdrawal Payout", "amount"=> $settlement->amount * 100, "recipient"=> $settlement->affiliate->account_number,
        "currency"=> $settlement->currency,"reference"=> $settlement->reference ) )
        ->asJson()                
        ->post();
        
        
      if(!$response || !$response->status || $response->data->status == 'failed'){
          $settlement->transfer_id = $response->data->transfer_code ?? '';
          $settlement->status = 'failed';
          $settlement->save();
      }
      if($response && $response->status && in_array($response->data->status,['success','pending'])){
          $settlement->transfer_id = $response->data->transfer_code ?? '';
          $settlement->status = 'processing';
          $settlement->save();
      }
    }

    protected function verifyPayoutPaystack(Settlement $settlement){
      $response = Curl::to("https://api.paystack.co/transfer/verify/$settlement->transfer_id")
          ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
          ->asJson()
          ->get();
          if(!$response || !$response->status || $response->data->status == 'failed'){
                $settlement->status = 'failed';
                $settlement->save();
          }
          if($response && $response->status && $response->data->status == 'success'){
                $settlement->status = 'paid'; 
                $settlement->paid_at = now(); 
                $settlement->save();
          }
    }
    
    

    protected function retryPayoutPaystack(Settlement $settlement){
        if($settlement->status == 'failed'){
          $settlement->reference = uniqid();
          $settlement->save();
        } 
        $response = Curl::to('https://api.paystack.co/transfer')
        ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
        ->withHeader('Content-Type: application/json')
        ->withData( array("source" => "balance", "reason"=> "Withdrawal Payout", "amount"=> $settlement->amount * 100, "recipient"=> $settlement->affiliate->account_number,
        "currency"=> $settlement->currency,"reference"=> $settlement->reference ) )
        ->asJson()                
        ->post();
        // dd($response);
        
        if(!$response || !$response->status || $response->data->status == 'failed'){
            $settlement->transfer_id = $response->data->transfer_code ?? '';
            $settlement->status = 'failed';
            $settlement->save();
        }
        if($response && $response->status && in_array($response->data->status,['success','pending'])){
            $settlement->transfer_id = $response->data->transfer_code ?? '';
            $settlement->status = 'processing';
            $settlement->save();
        }
    }

    
    
    protected function resolveBankAccountByPaystack($bank_code,$account_number){

        $response = Curl::to('https://api.paystack.co/bank/resolve')
              ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
              ->withHeader('Content-Type: application/json')
              ->withData( array('account_number'=> $account_number,"bank_code" => $bank_code) )
              ->asJsonResponse()
              ->get();
        if(!$response || !$response->status){
          return false;
        }
        return $response->data->account_name;
    }

    protected function getBanksByPaystack(){
      $response = Curl::to('https://api.paystack.co/bank/?country=nigeria')
        ->withHeader('Authorization: Bearer '.config('services.paystack.secret'))
         ->asJson()
         ->get();
       return $response->data;
        
    }

}