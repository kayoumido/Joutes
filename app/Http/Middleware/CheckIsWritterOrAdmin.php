<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckIsWritterOrAdmin
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
        $role = Auth::user()->role;

        if(!Auth::check()){
            return redirect(route('events.index'));
        }else if($role != 'writter'){
            return redirect(route('events.index'));
        }

        return $next($request);
    }
}
