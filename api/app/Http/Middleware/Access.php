<?php

namespace App\Http\Middleware;

use App\Contracts\Accessable;
use App\Exceptions\EmptyProjectIdException;
use App\Exceptions\NotImplementAccessableInterfaceException;
use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $accessable
     * @param string $paramName
     * @param string $privilege
     * @return Response|RedirectResponse
     * @throws EmptyProjectIdException
     * @throws NotImplementAccessableInterfaceException
     */
    public function handle(
        Request $request,
        Closure $next,
        string $accessable,
        string $paramName,
        string $privilege
    ) {
        $user = $request->user();
        if (!in_array(Accessable::class, class_implements($accessable), true)) {
            throw new NotImplementAccessableInterfaceException;
        }

        $projectId = (int) $request->$paramName;
        if (empty($projectId)) {
            throw new EmptyProjectIdException;
        }

        /** @var Accessable $class */
        $class = new $accessable($user);
        if (!$class->hasEnoughPrivileges($projectId, $privilege)) {
            abort(403);
        }

        return $next($request);
    }
}
