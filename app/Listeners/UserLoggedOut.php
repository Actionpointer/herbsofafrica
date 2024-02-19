<?php

namespace App\Listeners;

use App\Models\Registration;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedOut
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $registrations = Registration::where('end_date','<',today())->where('status','paid')->update(['status'=> 'completed']);
    }
}
