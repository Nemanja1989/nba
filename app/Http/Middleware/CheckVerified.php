<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckVerified
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
        $user = User::where('email', '=', $request->email)->first();

        if(!$user->is_verified){
            session()->flash('messageError', 'Please verify your account!');
            return redirect(route('login'));
        }

        return $next($request);
    }


}
