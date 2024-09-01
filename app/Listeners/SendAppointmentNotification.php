<?php

namespace App\Listeners;

use App\Events\AppointmentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAppointmentNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AppointmentNotification $event): void
    {
        broadcast(new \App\Events\AppointmentNotification($event->message))->toOthers();
    }
}
