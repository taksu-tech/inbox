<?php

namespace Taksu\TaksuInbox\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Taksu\TaksuInbox\Models\Inbox;

class ResponseExpired
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Inbox $inbox,
    ) {
    }
}
