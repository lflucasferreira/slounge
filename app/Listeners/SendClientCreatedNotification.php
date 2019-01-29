<?php

namespace App\Listeners;

use App\Events\ClientCreated;
use App\Mail\ClientCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendClientCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClientCreated  $event
     * @return void
     */
    public function handle(ClientCreated $event)
    {
        Mail::to('lucasferreiras@live.com')->send(
            new ClientCreatedMail($event->client)
        );
    }
}
