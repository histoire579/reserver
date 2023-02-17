<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;

class SendOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $data = "";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recommandation)
    {
        $this->data=$recommandation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Auth::user()->email)
                    ->subject('Commande de:' . Auth::user()->name )
                    ->view('order');
    }
}
