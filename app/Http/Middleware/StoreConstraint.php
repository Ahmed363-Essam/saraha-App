<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreConstraint
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

            $user = $request->user();
            $request_id = $request->route()->parameters()['id'];

            if ($user->id == $request_id) {
return back();
            }

        return $next($request);
    }
}
