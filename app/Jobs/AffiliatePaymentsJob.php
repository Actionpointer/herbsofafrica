<?php

namespace App\Jobs;

use App\Models\Settlement;
use Illuminate\Bus\Queueable;
use App\Http\Traits\PayoutTrait;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AffiliatePaymentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,PayoutTrait;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $settlements = Settlement::where('status','pending')->whereHas('order',function($query){
            $query->whereNull('disliked_at')->where('created_at','>',now()->subDays(14));
        })->get();
        foreach($settlements as $settlement){
            $this->initializeSettlement($settlement);
        }
    }
}
