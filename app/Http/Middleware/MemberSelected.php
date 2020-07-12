<?php

namespace App\Http\Middleware;

use Closure;

class MemberSelected
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
        if(auth()->check())
        {
            if(auth()->user()->members()->count() == 1)
                session(['patient' => auth()->user()->members()->first()]);

            if(auth()->user()->members()->count() == 0)
                return redirect('/members/add');

            if(patient() == null)
                return redirect('/members');
        }
        
            
        return $next($request);
      
    }
}
