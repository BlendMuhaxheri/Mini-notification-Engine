<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rule extends Model
{
    protected $fillable = [
        'type',
        'priority',
        'notification_text'
    ];

    public function conditions(): HasMany
    {
        return $this->hasMany(Condition::class);
    }

    public function notificationsSent(): HasMany
    {
        return $this->hasMany(NotificationSent::class);
    }
}
