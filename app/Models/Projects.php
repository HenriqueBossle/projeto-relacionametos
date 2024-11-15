<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Projects extends Model
{
    protected $fillable = [
        "name",
        "value",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'foreign_key');
    }
}
