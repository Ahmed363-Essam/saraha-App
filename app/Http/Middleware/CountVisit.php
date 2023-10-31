<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class CountVisit
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
        if ($request->is('send/*')) {
            $user = $request->user();
            $request_id = $request->route()->parameters()['id'];

            if ($user->id != $request_id) {
                Visit::create([
                    'user_id' => 1
                ]);
            }
        }
        return $next($request);
    }
}
