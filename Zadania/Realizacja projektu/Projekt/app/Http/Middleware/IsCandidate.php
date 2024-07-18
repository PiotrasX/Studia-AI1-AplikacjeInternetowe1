<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCandidate
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
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Musisz być zalogowany, aby uzyskać dostęp do tej strony.');
        }

        if (Auth::user()->role_id == 3) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Nie masz dostępu do tej strony.');
    }
}
