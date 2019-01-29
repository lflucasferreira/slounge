<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ClientCreated
{
    use Dispatchable, SerializesModels;

    public $client;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}
