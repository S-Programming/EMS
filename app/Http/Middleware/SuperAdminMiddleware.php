<?php


namespace App\Http\Middleware;

use App\Http\Enums\RoleUser;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AuthUser;

class SuperAdminMiddleware
{
    use AuthUser;
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $role_id = Auth::guard($guard)->user()->roles->first()->id;
        if (!(isset($role_id) && intval($role_id) == RoleUser::SuperAdmin)) {
            return response()->json("You are not Super Admin");
        }
        if (!$this->isSuperAdminRole()) {
            return $request->wantsJson()
                ? response()->json("You are not Authorized to access, please contact support team, Thanks")
                : redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
