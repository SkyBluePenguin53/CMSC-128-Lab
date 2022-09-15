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
        //
        if(Session::has('loginId'))
        {
            //If session time exceeds 5 minutes.
            if (now()->diffInMinutes(session('lastActivityTime'))>=(5)) // also you can this value in your config file and use here
            {  
                //Forget time data.
                session()->forget('lastActivityTime');

                //Pull ID and auth logout for optional.
                Session::pull('loginId');
                auth()->logout();
        
                //View logout page with status auto that stands for automatic logout.
                return redirect('/home/expiredsession');
            }
            //Tracks the time
            session(['lastActivityTime' => now()]);
        }

        //Passes request to next handler or proceeds user to certain urls mentioned above.
        return $next($request);
    }
}
