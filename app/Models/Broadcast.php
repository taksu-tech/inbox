<?php

namespace Taksu\TaksuInbox\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Broadcast extends Model
{
    use HasUlids, SoftDeletes;

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
        return 'brc-'.strtolower((string) Str::ulid());
    }
}
