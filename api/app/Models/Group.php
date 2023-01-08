<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    public function author(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('accepted');
    }
}
