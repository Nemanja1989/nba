<?php

namespace App\Http\Middleware;

use Closure;

class ForbiddenCommentWords
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
        if(preg_match('(hate|idiot|stupid|Hate|Idiot|Stupid)', $request->input('content')) === 1) {
            return redirect(route('forbiddenCommentWords'));
        }

        return $next($request);
    }
}
