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
        if ( ! Auth::user()->isActive())
        {
            Auth::logout();
            return redirect()->route('user.login')
                             ->withInput($request->only('email'))
                             ->withErrors([
                                'email' => 'Tài khoản này chưa kích hoạt !',
                             ]);
        }
        if ( ! Auth::user()->isOwner())
        {
            Auth::logout();
            return redirect()->route('user.login');
        }
        if ( ! Auth::user()->isOfficial())
        {
            return redirect()->route('pages.firstLogin');
        }
        return $next($request);
    }
}
