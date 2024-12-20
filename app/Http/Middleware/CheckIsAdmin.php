<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\CompanyAccess;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::Check()){
            if(Auth::user()->role === 'admin'){
                return $next($request);
            }
        }

        return redirect()->back();

    }
}
