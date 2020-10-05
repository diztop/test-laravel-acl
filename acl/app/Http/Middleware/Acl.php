<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Acl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        $permission_config = Config::get('acl.permission_config');

        if (in_array(Auth::user()->user_type, $permission_config[$role])) {
            return $next($request);
        }


        Session::put('error_message', 'Access denied');
        return redirect()->route('home');
    }
}
