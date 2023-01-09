<?php

namespace app\Services\Access;

use App\Contracts\Accessable;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccessProjectService implements Accessable
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param int $projectId
     * @param string $privilege
     * @return bool
     * @throws ModelNotFoundException
     */
    public function hasEnoughPrivileges(int $projectId, string $privilege): bool
    {
        $userId = $this->user->id;

        return Project::query()
            ->whereHas('projectUsers', static fn ($query) => $query
                ->whereHas('user', static fn ($query) => $query->where('id', $userId))
                ->whereHas('privileges', static fn ($query) => $query->where('privilege', $privilege))
            )
            ->exists()
        ;
    }
}
