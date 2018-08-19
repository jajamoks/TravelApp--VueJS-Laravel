<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
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
        $this->subject("Contact Form Submitted");
        return $this->view('email.notifications.contact_submission')
            ->from('no-reply@escapetoshape.com')
            ->with([
                'name' => $this->data->name,
                'email' => $this->data->email,
                'content' => $this->data->message,
                'phone' => $this->data->phone,
                'interest' => $this->data->interest,
                'zip' => $this->data->zip,
                'source' => $this->data->source,
                'subject' => 'Contact Form Submitted',
            ]);
    }
}
