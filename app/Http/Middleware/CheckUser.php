<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckUser
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
        $user = Auth::user()->role;

        if ($user == 'admin') {

            return redirect('/admin');
         
        }   

        elseif($user == 'kpo'){

              return redirect('/grn');

        }

        elseif($user == 'accountant'){
            // echo "This is account Middleware";
              return redirect('/accountant');

        }

           return $next($request);   
    }
       
}
