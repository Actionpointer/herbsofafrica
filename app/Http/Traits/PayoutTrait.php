<?php
namespace App\Http\Traits;

use App\Models\Settlement;
use App\Http\Traits\PaypalTrait;
use App\Http\Traits\PaystackTrait;
use Illuminate\Support\Facades\Auth;

trait PayoutTrait
{
    use PaystackTrait,StripeTrait;

    protected function initializeSettlement(Settlement $settlement){
        switch($settlement->currency){
            case 'NGN': 
                return $this->payoutPaystack($settlement);
            break;
            default: return $this->payoutStripe($settlement);
        }
    }

    protected function verifySettlement(Settlement $settlement){
        
        switch($settlement->currency){
            case 'NGN': $this->verifyPayoutPaystack($settlement);
            break;
            default: $this->verifyPayoutStripe($settlement);
            break;
        }
        //save to paid/failed
        
    }

    protected function retrySettlement(Settlement $settlement){
        switch($settlement->currency){
            case 'flutterwave': $this->retryPayoutPaystack($settlement);
            break;
            default : $this->payoutStripe($settlement);
            break;
        }
        //save to paid/failed
    }

    
    

    
    

    

}