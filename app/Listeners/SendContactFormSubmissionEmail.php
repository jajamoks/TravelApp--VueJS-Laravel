<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class SendContactFormSubmissionEmail
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
    public function handle(ContactFormSubmitted $event)
    {

         Mail::to(env('MAIL_NOTIFICATIONS_TO'))
            ->send(new ContactForm($event->data));
    }
}
