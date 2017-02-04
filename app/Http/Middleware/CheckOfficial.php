<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOfficial
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! Auth::user()->isOwner())
        {
            return response()->view('errors.404', [], 404);
        }
        if ( ! Auth::user()->isOfficial())
        {
            return redirect()->route('pages.firstLogin');
        }
        return $next($request);
    }
}
