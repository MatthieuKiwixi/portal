<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Spatie\BinaryUuid\HasBinaryUuid;
use Spatie\BinaryUuid\HasUuidPrimaryKey;

class Subscription extends Model
{
    use HasBinaryUuid, HasUuidPrimaryKey;

    /**
     * {@inheritdoc}
     */
    protected $table = 'subscriptions';

    public function uuid(): UuidInterface
    {
        return Uuid::fromString($this->uuid_text);
    }

    public function user(): User
    {
        return $this->userRelation;
    }

    public function userRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscriptionAble(): SubscriptionAble
    {
        return $this->subscriptionAbleRelation;
    }

    public function subscriptionAbleRelation(): MorphTo
    {
        return $this->morphTo('subscriptionable');
    }
}
