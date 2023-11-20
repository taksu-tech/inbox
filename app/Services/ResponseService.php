<?php

namespace Taksu\TaksuInbox\Services;

use Taksu\TaksuInbox\Events\ResponseSubmitted;
use Taksu\TaksuInbox\Models\Inbox;

class ResponseService
{
    public function __construct()
    {
    }

    /**
     * Submitting a response to an inbox.
     *
     * @param Inbox $inbox
     * @param string $response
     * @param string|null $url
     * @return void
     */
    public function respond(Inbox &$inbox, string $response, ?string $url = null): void
    {
        $inbox->response = $response;
        if ($url) {
            $inbox->response_url = $url;
        }
        $inbox->responded_at = now();
        $inbox->save();

        ResponseSubmitted::dispatch($inbox);
    }
}
