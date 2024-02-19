<?php

namespace App\Listeners;

use App\Models\Registration;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;


class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $registrations = Registration::where('end_date','<',today())->where('status','paid')->update(['status'=> 'completed']);
   
        
    }
}
