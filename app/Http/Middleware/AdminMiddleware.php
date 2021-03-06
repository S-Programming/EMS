<?php


namespace App\Http\Middleware;

use App\Http\Enums\RoleUser;
use App\Http\Traits\AuthUser;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (!$this->isAdminRole()) {
            return $request->wantsJson()
                ? response()->json("You are not Authorized to access, please contact support team, Thanks")
                : redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
