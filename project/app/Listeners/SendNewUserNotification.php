<?php

namespace App\Listeners;

use App\Models\Notification;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewUserNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = auth()->guard('admin')->user()->id->get();

        Notification::send($admin, new NewUserNotification($event->user));
    }
}
