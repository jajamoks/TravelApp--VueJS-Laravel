<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterSignUp extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Newsletter Sign Up");
        return $this->view('email.notifications.newsletter')
            ->from('no-reply@escapetoshape.com')
            ->with([
                'email' => $this->data['subscriber_email'],
                'subject' => 'Newsletter Sign Up'
            ]);
    }
}
