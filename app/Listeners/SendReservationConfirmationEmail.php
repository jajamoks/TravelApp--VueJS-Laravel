<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\SuccessfulReservation;
use App\Mail\ReservationConfirmation;

class SendReservationConfirmationEmail
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
     * @param  ContactFormSubmitted  $event
     * @return void
     */
    public function handle(SuccessfulReservation $event)
    {
         Mail::to($event->reservation->user->email)
            ->send(new ReservationConfirmation($event->reservation));
    }
}
