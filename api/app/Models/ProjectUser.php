<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectUser extends Model
{
    protected $table = 'project_user';

    public function project(): belongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function privileges(): hasMany
    {
        return $this->hasMany(Privilege::class, 'project_user_id');
    }
}
