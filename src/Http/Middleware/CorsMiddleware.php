<?php namespace Defr\CrosswordsModule\Http\Middleware;

use Closure;

class CorsMiddleware
{

    /**
     * Handle the request
     *
     * @param                     $request  The request
     * @param   Closure|Function  $next     The next
     * @return  Function
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header(
                'Access-Control-Allow-Origin',
                '*'
            )
            ->header(
                'Access-Control-Allow-Headers',
                'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'
            )
            ->header(
                'Access-Control-Expose-Headers',
                'Authorization'
            )
            ->header(
                'Access-Control-Allow-Methods',
                'GET, POST, PUT, DELETE, OPTIONS'
            );
    }

}
