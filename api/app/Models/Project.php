<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    public function author(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): hasMany
    {
        return $this
            ->hasMany(ProjectUser::class, 'project_id')
            ->with(['privileges', 'user'])
        ;
    }
}
