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

    const TYPE_ANNOUNCEMENT = 'announcement';

    const TYPE_NEWSLETTER = 'newsletter';

    const TYPE_CONSENT = 'consent';

    protected $fillable = [
        'type',
        'title',
        'content',
        'status',
        'published_at',
        'can_respond_until',
        'is_respond_required',
        'is_signature_required',
        'respond_options',
        'metadata',
    ];

    protected $attributes = [
        'status' => self::STATUS_DRAFT,
    ];

    protected $casts = [
        'can_respond_until' => 'datetime',
        'published_at' => 'datetime',
        'respond_options' => 'array',
        'metadata' => 'array',
    ];

    public function newUniqueId()
    {
        return 'brc-'.strtolower((string) Str::ulid());
    }

    public function getMetaData(string $key): mixed
    {
        return $this->metadata[$key];
    }

    public function setMetaData(string $key, mixed $value): self
    {
        $moreInfo = collect($this->metadata);
        $moreInfo[$key] = $value;
        $this->metadata = $moreInfo->toArray();

        return $this;
    }
}
