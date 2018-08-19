<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserSubscribedToNewsletter' => [
            'App\Listeners\SendEmailVerificationEmail',
        ],
        'App\Events\ContactFormSubmitted' => [
            'App\Listeners\SendContactFormSubmissionEmail',
            'App\Listeners\AddToActivityFeed',
            'App\Listeners\SendAwayMessage',
        ],
        'App\Events\SuccessfulReservation' => [
            'App\Listeners\AddToActivityFeed',
            'App\Listeners\SendReservationConfirmationEmail',
            'App\Listeners\SendReservationNotificationEmail',
        ],
        'App\Events\SuccessfulPayment' => [
            'App\Listeners\AddToActivityFeed',
            'App\Listeners\SendPaymentConfirmationEmail',
            'App\Listeners\SendPaymentNotification',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\AddToActivityFeed',
        ],
        'App\Events\PrivateTravelFormSubmitted' => [
            'App\Listeners\AddToActivityFeed',
            'App\Listeners\SendPrivateTravelFormSubmittedEmail',
            'App\Listeners\SendAwayMessage',
        ],
        'App\Events\UserVerifiedEmail' => [
            // remove old Ymlp listener
            // 'App\Listeners\AddSubscriberToYmlp',
            // add new mailchimp listener
            'App\Listeners\AddSubscriberToMailChimp',
            'App\Listeners\AddToActivityFeed',
            'App\Listeners\SendNewsletterConfirmation',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
