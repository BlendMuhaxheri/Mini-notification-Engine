<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Condition extends Model
{
    protected $fillable = [
        'rule_id',
        'field',
        'operator',
        'value'
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class);
    }
}
