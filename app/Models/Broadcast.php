<?php

namespace Taksu\TaksuInbox\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Broadcast extends Model
{
    use SoftDeletes, HasUlids;

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';

    protected $fillable = [
        'category',
        'title',
        'content',
        'status',
        'can_respond_until',
    ];

    protected $attributes = [
        'status' => self::STATUS_DRAFT,
    ];

    protected $casts = [
        'can_respond_until' => 'datetime',
        'published_at' => 'datetime',
    ];

    public function newUniqueId()
    {
        return "brc-" . strtolower((string) Str::ulid());
    }
}
