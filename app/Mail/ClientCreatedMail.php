<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.client-created');
    }
}
