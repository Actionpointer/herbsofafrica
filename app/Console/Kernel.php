<?php

namespace App\Console;

use App\Jobs\AffiliatePaymentsJob;
use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\AffiliatePaymentsVerificationJob;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new AffiliatePaymentsJob)->weeklyOn(1, '8:00');
        $schedule->job(new AffiliatePaymentsVerificationJob)->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
