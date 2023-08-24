<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Auth\Middleware\Authenticate;

class CheckRole
{
    // use Authenticate;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next,...$role )
    {
    
        if($request->user()->role===$role){
            return $next($request);

        }
           
    
                abort(403, 'Unauthorized');


                
        // }
        // if (!$request->user() || !$request->user()->hasRole($roles)) {
        //     abort(403, 'Unauthorized');
        // }

        // if (! $this->authenticate($request, ['web'])) {
        //     return redirect()->guest(route('login'));
        // }

        // if (! $request->user()->hasRole($role)) {
        //     abort(403, 'Unauthorized action.');
        // }
   
    }
}
