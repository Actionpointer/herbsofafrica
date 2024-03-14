<?php

namespace App\Observers;

use App\Models\Revenue;
use App\Models\Settlement;

class SettlementObserver
{

    /**
     * Handle the Settlement "created" event.
     */
    public function created(Settlement $settlement): void
    {
        
    }

    /**
     * Handle the Settlement "updated" event.
     */
    public function updated(Settlement $settlement): void
    {
        if($settlement->isDirty('status') && $settlement->status == 'paid'){
            Revenue::create(['payment_id'=> $settlement->payment_id,'currency_id'=> $settlement->currency,
            'amount'=> $settlement->charges]);
        }

        if($settlement->isDirty('status') && $settlement->status == 'withheld'){
               
        }
    }

}
