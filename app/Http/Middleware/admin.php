<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class admin
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
        $requestedUserId = $request->route()->parameter('id');

        if(Auth::user()->role === 'admin' || Auth::user()->id== $requestedUserId){
            return $next($request);
        }
        else{
            return response()->json(['error'=>'U must be admin', 403]);
        }    }
    }

