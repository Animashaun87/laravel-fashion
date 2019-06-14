<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (!$request->user()->isAdmin()) {
            if ($request->ajax()) {
                return response('Access forbidden', 401);
            } else {
                flash('Access forbidden', 'danger');
                return redirect('/');
            }
        }
        return $next($request);
    }
}
