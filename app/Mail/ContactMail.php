<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $noms = "";
    public $emails = "";
    public $messages = "";
    public $phones = "";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$email,$phone,$message)
    {
        $this->noms=$nom;
        $this->emails=$email;
        $this->messages=$message;
        $this->phones=$phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emails)
                    ->subject('Contact')
                    ->view('sendContact');
    }
}
