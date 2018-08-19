<?php

namespace App\Listeners;

use App\Events\UserSubscribedToNewsletter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSignUp;

class SendNewsletterSignUpEmail
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
    public function handle(UserSubscribedToNewsletter $event)
    {

         Mail::to(env('MAIL_NOTIFICATIONS_TO'))
            ->send(new NewsletterSignUp($event->data));
    }
}
