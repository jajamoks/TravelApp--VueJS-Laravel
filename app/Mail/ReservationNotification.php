<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reservation;

class ReservationNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "New Reservation";
        $this->subject($subject);
        return $this->view('email.notifications.reservation')
            ->from('no-reply@escapetoshape.com')
            ->with([
                'reservation' => $this->reservation,
                'subject' => $subject,
                'is_notification' => 1
            ]);
    }
}
