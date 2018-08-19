<?php

namespace App\Listeners;

use App\Events\UserSubscribedToNewsletter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UserSubscribedToNewsletter  $event
     * @return void
     */
    public function handle(UserSubscribedToNewsletter $event)
    {
        Mail::to($event->data->subscriber_email)
           ->send(new VerifyEmail($event->data));
    }
}
