<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\SuccessfulReservation;
use App\Mail\ReservationNotification;

class SendReservationNotificationEmail
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
     * @param  SuccessfulPayment $event
     * @return void
     */
    public function handle(SuccessfulReservation $event)
    {
         Mail::to(env('MAIL_NOTIFICATIONS_TO'))
            ->bcc('qwales1@gmail.com')
            ->send(new ReservationNotification($event->reservation));
    }
}
