<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrivateTravelForm extends Mailable
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
        $this->subject("Private Travel Inquiry");
        return $this->view('email.notifications.private_travel')
            ->from('no-reply@escapetoshape.com')
            ->with([
                'name' => $this->data->name,
                'email' => $this->data->email,
                'content' => $this->data->message,
                'interest' => $this->data->interest,
                'subject' => 'Private Travel Inquiry'
            ]);
    }
}
