<?php

namespace Taksu\TaksuInbox\Services;

use Taksu\TaksuInbox\Models\Inbox;

class InboxService
{
    public function findOne(string $id)
    {
        $found = Inbox::where('id', $id)->firstOrFail();

        $found->read_at = now();
        $found->save();

        return $found;
    }

    public function read(string $id)
    {
        return $this->findOne($id);
    }
}
