<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Session;

class SessionExpired 
{
    public function handle($request, Closure $next)
    {

        //If session does not exist
        if (! session()->has('lastActivityTime')) 
        {
            session(['lastActivityTime' => now()]);
        }

        //If session time exceeds 1 minute.
        elseif (now()->diffInMinutes(session('lastActivityTime')) >= (5) ) // also you can this value in your config file and use here
        {  
            //Forget time data.
            session()->forget('lastActivityTime');

            //Pull ID and auth logout for optional.
            Session::pull('loginId');
            auth()->logout();
     
            //View logout page with status auto that stands for automatic logout.
            return redirect('/home/expiredsession');
        }
        session(['lastActivityTime' => now()]);

        return $next($request);
    }
}