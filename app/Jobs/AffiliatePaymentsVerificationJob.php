<?php

namespace App\Jobs;

use App\Http\Traits\PayoutTrait;
use App\Models\Settlement;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AffiliatePaymentsVerificationJob implements ShouldQueue
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
        $settlements = Settlement::where('status','processing')->get();
        foreach($settlements as $settlement){
            $this->verifySettlement($settlement);
        }
    }
}
