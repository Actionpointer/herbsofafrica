<?php

namespace App\Jobs;

use App\Models\Settlement;
use Illuminate\Bus\Queueable;
use App\Http\Traits\StripeTrait;
use App\Http\Traits\FlutterwaveTrait;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AffiliatePaymentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,FlutterwaveTrait,StripeTrait;

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
        $settlements = Settlement::where('status','pending')->get();
        foreach($settlements as $settlement){
            if($settlement->currency == 'NGN'){
                $this->payoutFlutterWave($settlement);
            }else{
                $this->payoutStripe($settlement);
            }
        }
    }
}
