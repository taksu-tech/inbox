<?php

namespace Taksu\TaksuInbox\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Broadcast extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    const STATUS_DRAFT = 'draft';

    const STATUS_PUBLISHED = 'published';

    const CATEGORY_ANNOUNCEMENT = 'announcement';

    const CATEGORY_NEWSLETTER = 'newsletter';

    const CATEGORY_CONSENT = 'consent';

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

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return \Taksu\TaksuInbox\Factories\BroadcastFactory::new();
    }
}
