<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AccessService
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function hasEnoughPrivileges()
    {
        //
    }

}
