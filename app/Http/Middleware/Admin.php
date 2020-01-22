<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Admin
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


        if (Auth::check()){
            if($request->user()->role_id == 1 && $request->user()->isActive == 1){
                return $next($request);
            }else{
                return abort(404); //redirect the user to not found page.

            }
        }else{
            return redirect('/'); //redirect the user to not found page.

        }




    }
}
