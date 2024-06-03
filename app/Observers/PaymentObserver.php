<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Payment;
use App\Http\Traits\OrderTrait;
use App\Notifications\OrderStatusNotification;
use Illuminate\Support\Facades\Notification;

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
            
        }
        if($payment->isDirty('status') && $payment->status == 'failed'){

        }
        if($payment->isDirty('status') && $payment->status == 'success'){
           // $payment->user->notify(new OrderStatusNotification($payment->order,'customer'));
            $users = User::whereJsonContains('role','orders')->get();
            Notification::send($users, new OrderStatusNotification($payment->order,'admin'));
            if($payment->commission){
                $affiliate = $payment->affiliate ?? $payment->user->referrer;
                //$affiliate->notify(new OrderStatusNotification($payment->order,'affiliate'));
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
