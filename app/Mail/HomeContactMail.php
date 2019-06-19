<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HomeContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $messageLines;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validatedData)
    {
        $this->name = array_key_exists('name', $validatedData) ? $validatedData['name'] : null;
        $this->email = array_key_exists('email', $validatedData) ? $validatedData['email'] : null;
        $this->subject = array_key_exists('subject', $validatedData) ? $validatedData['subject'] : null;
        $this->messageLines = array_key_exists('message', $validatedData) ? explode("\n", $validatedData['message']) : null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.homeContact');
    }
}
