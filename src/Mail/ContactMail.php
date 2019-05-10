<?php

namespace Axilweb\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $fromMail, $message, $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $message, $name)
    {
        $this->fromMail = $email;
        $this->message = $message;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromMail)
            ->markdown('contact::contact.mail')->with(["message" => $this->message, 'name' => $this->name]);
    }
}
