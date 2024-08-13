<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AutoLogoutAfter6Hours
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $lastActivity = $user->last_activity;

            if ($lastActivity && $lastActivity->addMinutes(360)->isPast()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('autoLogout', 'Anda telah logout otomatis setelah 6 jam tidak aktif.');
            }
        }

        return $next($request);
    }
}
