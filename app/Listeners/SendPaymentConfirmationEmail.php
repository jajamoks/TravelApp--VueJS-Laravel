<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\SuccessfulPayment;
use App\Mail\PaymentConfirmation;

class SendPaymentConfirmationEmail
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
    public function handle(SuccessfulPayment $event)
    {
         Mail::to($event->payment->reservation->user->email)
            ->send(new PaymentConfirmation($event->payment));
    }
}
