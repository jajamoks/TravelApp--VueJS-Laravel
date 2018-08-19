<?php

namespace App\Listeners;

use App\Events\UserVerifiedEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Ymlp;

class AddSubscriberToYmlp
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
     * @param  UserSubscribedToNewsletter  $event
     * @return void
     */
    public function handle(UserVerifiedEmail $event)
    {
        $config = config('ymlp');
        $ymlp = new Ymlp($config['api_key'], $config['username']);
        $add = $ymlp->ContactsAdd($event->data['subscriber_email'], null, 390);
    }
}
