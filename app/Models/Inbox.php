<?php

namespace Taksu\TaksuInbox\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Taksu\Restful\Traits\ModelCommonTrait;

class Inbox extends Model
{
    use HasFactory, HasUlids, ModelCommonTrait, SoftDeletes;

    public const OWNER_TYPE_STAFF = 'staff';

    public const OWNER_TYPE_CAREGIVER = 'caregiver';

    public const SOURCE_TYPE_ANNOUNCEMENT = 'announcement';

    public const SOURCE_TYPE_NEWSLETTER = 'newsletter';

    protected $table = 'inboxes';

    protected $fillable = [
        'id',
        'owner_type',
        'owner_id',
        'category',
        'title',
        'content',
        'source_type',
        'source_id',
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
        return 'inb-'.strtolower((string) Str::ulid());
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return \Taksu\TaksuInbox\Factories\InboxFactory::new();
    }
}
