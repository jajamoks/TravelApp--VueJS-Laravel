<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Payment;

class PaymentNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Payment Received";
        $this->subject($subject);
        return $this->view('email.notifications.reservation')
            ->with([
                'reservation' => $this->payment->reservation,
                'subject' => $subject,
                'is_notification' => 1
            ]);
    }
}
