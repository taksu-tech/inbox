<?php

namespace Taksu\TaksuInbox\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Inbox extends Model
{
    use SoftDeletes, HasUlids;

    protected $fillable = [
        'owner_type',
        'owner_id',
        'source_type',
        'source_id',
        'category',
        'title',
        'content',
        'read_at',
        'response',
        'response_url',
        'responded_at',
        'can_respond_until',
    ];

    protected $casts = [
        'read_at' => 'datetime',
        'responded_at' => 'datetime',
        'can_respond_until' => 'datetime',
    ];

    public function newUniqueId()
    {
        return "inb-" . strtolower((string) Str::ulid());
    }
}
