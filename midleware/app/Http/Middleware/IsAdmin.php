<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // check role
        $user = Auth::user();

        if(!$user->isAdmin()) 
        {
            // return redirect('/');
            // echo "is admin valid";
            return redirect('/');
        }

        return $next($request);

    }
}
