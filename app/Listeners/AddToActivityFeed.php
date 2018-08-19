<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use App\Activity;

class AddToActivityFeed
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
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        $activity = $this->makeActivity($event);
        Activity::create($activity);

    }

    private function makeActivity($event)
    {
        $type = get_class($event);
        switch ($type) {
            case 'App\Events\ContactFormSubmitted':
                return [
                    'event' => 'Contact Form Submitted',
                    'link' => '/e2s-admin#/leads',
                    'description' => "{$event->data->email} submitted a contact form"
                ];
                break;
            case 'Illuminate\Auth\Events\Login':
                return [
                    'event' => 'User Logged In',
                    'description' => "{$event->user->name} logged in."
                ];
                break;
            case 'App\Events\UserVerifiedEmail':
                return [
                    'event' => 'Newsletter Signup',
                    'description' => "{$event->data['subscriber_email']} signed up for the newsletter"
                ];
                break;
            case 'App\Events\SuccessfulReservation':
                return [
                    'event' => 'Reservation Created',
                    'description' => "{$event->reservation->user->email} reserved a spot for {$event->reservation->escape->escape_type->name}!",
                    'link' => '/e2s-admin#/escapes/'.$event->reservation->escape->id,
                ];
                break;
            case 'App\Events\SuccessfulPayment':
                return [
                    'event' => 'Payment Made',
                    'description' => "{$event->payment->reservation->user->email} made a payment towards {$event->payment->reservation->escape->escape_type->name}!",
                    'link' => '/e2s-admin#/escapes/'.$event->payment->reservation->escape->id,
                ];
                break;
                case 'App\Events\PrivateTravelFormSubmitted':
                    return [
                        'event' => 'Private Travel Inquiry',
                        'description' => "{$event->data->email} submitted an inquiry",
                        'link' => '/e2s-admin#/leads',
                    ];
                    break;
            default:
                return [
                    'event' => 'Unknown Event',
                    'link' => '/e2s-admin',
                    'description' => "An unknown event was captured."
                ];
                break;
        }
    }
}
