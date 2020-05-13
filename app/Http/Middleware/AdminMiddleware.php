<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //if the authenticate user is admin then let it access to admin dashboard & if he is a normal user then redirect him to home page

        if (Auth::user()->user_type == 'admin')
            return $next($request);
        else
            redirect('/');
    }
}
