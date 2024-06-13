<?php

namespace App\Observers;

use App\Models\Revenue;
use App\Models\Settlement;
use App\Notifications\SettlementNotification;

class SettlementObserver
{

    /**
     * Handle the Settlement "created" event.
     */
    public function created(Settlement $settlement): void
    {
        
    }

    /**
     * Handle the Settlement "updated" event.  /pending, pending+delivered, pending+delivered+14days, paid, withheld,
     */
    public function updated(Settlement $settlement): void
    {
        if($settlement->isDirty('status') && $settlement->status == 'paid'){
            $settlement->affiliate->notify(new SettlementNotification($settlement));
        }
    }

}
