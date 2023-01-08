<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Privilege extends Model
{
    protected $table = 'project_right_user';

    public function projectUser(): belongsTo
    {
        return $this->belongsTo(ProjectUser::class, 'project_user_id');
    }
}
