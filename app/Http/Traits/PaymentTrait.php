<?php
namespace App\Http\Traits;

use App\Models\Payment;
use App\Http\Traits\StripeTrait;
use App\Http\Traits\PaystackTrait;


trait PaymentTrait
{
    use StripeTrait,PaystackTrait;

    protected function initializePayment($payment){
        $user = auth()->user();
        switch(session('currency')['code']){
            case 'NGN': 
                return $this->initiatePaystack($payment);
            break;
            default: return $this->initiateStripe($payment);
        }
        
    }

    protected function initializeRefund(Payment $payment){
        
        switch($payment->currency){
            case 'NGN': 
                return $this->refundPaystack($payment);
            break;
            default: return $this->refundStripe($payment);
        }
    }



    
    

}