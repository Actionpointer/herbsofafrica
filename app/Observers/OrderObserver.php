<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Order;
use App\Models\Revenue;
use App\Models\Settlement;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderStatusNotification;

class OrderObserver
{
    
    public function created(Order $order): void
    {
        
    }

    
    public function updated(Order $order): void
    {
        $users = User::whereJsonContains('role','orders')->get();
        if($order->isDirty('cancelled_at')){
            if($order->payment->commission){
                $affiliate = $order->payment->affiliate ?? $order->payment->user->referrer;
                //$affiliate->notify(new OrderStatusNotification($order,'affiliate'));
            }
            Notification::send($users, new OrderStatusNotification($order,'admin'));
        }

        if($order->isDirty('delivered_at')){
            //$order->user->notify(new OrderStatusNotification($order,'customer'));
            if($order->payment->commission){
                $affiliate = $order->payment->affiliate ?? $order->payment->user->referrer;
                //$affiliate->notify(new OrderStatusNotification($order,'affiliate'));
                Settlement::create(['affiliate_id'=> $affiliate->id,'payment_id'=> $order->payment_id,
                'order_id'=> $order->id,'description'=> "$affiliate->percentage% Commission on order",
                'amount'=> $order->payment->commission,'currency'=> $order->payment->commission_currency,'reference'=> uniqid()]);
            }
            Revenue::create(['payment_id'=> $order->payment_id,'currency'=> $order->currency,
            'amount'=> $order->payment->revenue_amount]);
        }

        if($order->isDirty('disliked_at')){
            if($order->payment->commission){
                $affiliate = $order->payment->affiliate ?? $order->payment->user->referrer;
                //$affiliate->notify(new OrderStatusNotification($order,'affiliate'));
            }
            Notification::send($users, new OrderStatusNotification($order,'admin'));
            Settlement::where('order_id',$order->id)->update(['status'=> 'withheld']);
        }

        if($order->isDirty('refunded_at')){
            //$order->user->notify(new OrderStatusNotification($order,'customer'));
            if($order->payment->commission){
                $affiliate = $order->payment->affiliate ?? $order->payment->user->referrer;
                //$affiliate->notify(new OrderStatusNotification($order,'affiliate'));
            }
            Settlement::where('order_id',$order->id)->delete();
            Revenue::where('payment_id',$order->payment_id)->delete();
        }
    }
    
}
