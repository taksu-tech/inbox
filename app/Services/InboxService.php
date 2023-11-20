<?php

namespace Taksu\TaksuInbox\Services;

use Illuminate\Support\Facades\Validator;
use Taksu\TaksuInbox\Events\InboxRead;
use Taksu\TaksuInbox\Events\InboxSent;
use Taksu\TaksuInbox\Models\Inbox;

class InboxService
{
    public function findOne(string $id)
    {
        $found = Inbox::where('id', $id)->firstOrFail();

        return $found;
    }

    public function read(string $id)
    {
        $found = $this->findOne($id);
        $found->read_at = now();
        $found->save();

        InboxRead::dispatch($found);
        return $found;
    }

    /**
     * Create an inbox item, and send notification to the owner. 
     */
    public function send(array $data)
    {
        $validated = Validator::validate($data, [
            'owner_type' => 'required|string',
            'owner_id' => 'required|string',
            'source_type' => 'nullable|string',
            'source_id' => 'nullable|string',
            'category' => 'nullable|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $inbox = Inbox::create($validated);
        InboxSent::dispatch($inbox);
    }
}
