<?php

namespace App\Contracts;

use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface Accessable
{
    /**
     * @param int $projectId
     * @param string $privilege
     * @return bool
     * @throws ModelNotFoundException
     */
    public function hasEnoughPrivileges(int $projectId, string $privilege): bool;
}
