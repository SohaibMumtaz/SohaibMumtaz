<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class MustBeAdministrator
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
        if( auth()->guest()||auth()->user()->username!="sohaibnoyyan"){
            abort(403);
            abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
