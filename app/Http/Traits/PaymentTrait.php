<?php
namespace App\Http\Traits;

use App\Models\Payment;
use App\Http\Traits\StripeTrait;
use App\Http\Traits\PaystackTrait;
use App\Http\Traits\FlutterwaveTrait;


trait PaymentTrait
{
    use FlutterwaveTrait,StripeTrait,PaystackTrait;

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
        
        switch(session('currency')['code']){
            case 'NGN': 
                $link = $this->initiateFlutterWave($payment);
                return ['link'=> $link,'reference'=> $payment->reference];
            break;
            default: $link = $this->initiateStripe($payment);
                    return true;
        }
    }



    
    

}