<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        //admin==1 user ==0
        if(Auth::check()){


            //check if authnticated. if yes then check if he is an admin
            if(Auth::user()->role == '1'){
                return $next($request);
            }else{
                return redirect('/')->with('message', 'Access Denied. Only admins can access this page!');
            }
        }else{
            return redirect('/login')->with('message', 'login to access profile or admin');

        }
        return $next($request);
    }
}
