<?php

namespace App\Observers;

use App\Http\Traits\OrderTrait;
use App\Models\Payment;
use App\Models\Settlement;

class PaymentObserver
{
    use OrderTrait;
    /**
     * Handle the Payment "created" event.
     */
    public function created(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "updated" event.
     */
    public function updated(Payment $payment): void
    {
        if($payment->isDirty('status') && $payment->status == 'cancelled'){
            //refund payments
        }
        if($payment->isDirty('status') && $payment->status == 'failed'){

        }
        if($payment->isDirty('status') && $payment->status == 'success'){
            if($payment->commission){
                $affiliate = $payment->affiliate ?? $payment->user->referrer;
                Settlement::create(['affiliate_id'=> $affiliate->id,'payment_id'=> $payment->id,
                'order_id'=> $payment->order->id,'description'=> "$affiliate->percentage% Commission on order",
                'amount'=> $payment->commission,'currency'=> $payment->commission_currency,'reference'=> uniqid()]);
            }
            

        }
    }

    /**
     * Handle the Payment "deleted" event.
     */
    public function deleted(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     */
    public function restored(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     */
    public function forceDeleted(Payment $payment): void
    {
        //
    }
}
