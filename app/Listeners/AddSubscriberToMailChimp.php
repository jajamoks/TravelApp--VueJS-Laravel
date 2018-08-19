<?php

namespace App\Listeners;

use App\Events\UserVerifiedEmail;
use Newsletter;

class AddSubscriberToMailChimp
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
        // subscribe to mailchimp using Newsletter facade
        // subscribe to the interest group "New Website Contacts - Opted In" using id below
        Newsletter::subscribe($event->data['subscriber_email'], null, null, ['interests' => ['be07bd78b8' => true]]);
    }
}
