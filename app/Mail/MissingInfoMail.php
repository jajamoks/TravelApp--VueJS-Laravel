<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reservation;

class MissingInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $reservation;
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
        $subject = 'Your Upcoming Escape to '.$this->reservation->escape->escape_type->location;
        $this->subject($subject);
        return $this->view('email.reminders.missing-trip-info')->with([
            'subject' => $subject,
            'reservation' => $this->reservation
        ]);
    }
}
