<?php

namespace App\Listeners;

use App\Events\UserVerifiedEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\NewsletterConfirmation;
use Illuminate\Support\Facades\Mail;

class SendNewsletterConfirmation
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
     * @param  UserVerifiedEmail  $event
     * @return void
     */
    public function handle(UserVerifiedEmail $event)
    {
        Mail::to($event->data->subscriber_email)
            ->send(new NewsletterConfirmation($event->data));
    }
}
