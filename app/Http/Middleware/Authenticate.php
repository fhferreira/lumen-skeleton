<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest())
        {
            if ($request->ajax())
            {
                $status = 401;

                return response(view("errors.{$status}"), $status);
            }

            return redirect()->route('login');
        }

        return $next($request);
    }

}
