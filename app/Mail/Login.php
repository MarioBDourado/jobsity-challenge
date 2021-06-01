<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class Login extends Mailable
{
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Login url')
            ->withUrl($this->url)
            ->view('emails.login');
    }
}