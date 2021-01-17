<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Admin;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Admin::isAdmin()) {
            return $next($request);
        }

        return redirect(route("admin.log"));
    }
}
