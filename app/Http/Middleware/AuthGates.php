<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use App\Models\ManagementAccess\Role;
use Auth;
class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Auth::user();
        if (!app()->runningInConsole&& $user) {
            $roles = Role::with('permission')->get();
            $permissionArray=[];
            foreach ($roles as $role) {
                foreach ($role->permission as $permission) {
                    # code...
                    $permissionArray[$permission->title][] = $role->id;
                }
            }
            
        }
                    // check user role
                    foreach ($permissionsArray as $title => $roles) {
                        Gate::define($title, function(\App\Models\User $user)
                        use ($roles) {
                            return count(array_intersect($user->role->pluck('id')
                            ->toArray(), $roles)) > 0;
                        });
                    }

        return $next($request);
    }
}
