<?php

namespace App\Listeners;

use App\Events\PrivateTravelFormSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PrivateTravelForm;

class SendPrivateTravelFormSubmittedEmail
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
     * @param  PrivateTravelFormSubmitted  $event
     * @return void
     */
    public function handle(PrivateTravelFormSubmitted $event)
    {
        Mail::to(env('MAIL_NOTIFICATIONS_TO'))
           ->send(new PrivateTravelForm($event->data));
    }
}
