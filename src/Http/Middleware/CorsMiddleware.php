<?php namespace Defr\CrosswordsModule\Http\Middleware;

use Closure;

/**
 * Class CorsMiddleware
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
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
                'Origin,Content-Type,Accept,Accept-Language,Content-Language,Access-Control-Allow-Headers,Authorization,X-Requested-With,X-Auth-Token'
            )
            ->header(
                'Access-Control-Expose-Headers',
                'Authorization'
            )
            ->header(
                'Access-Control-Allow-Methods',
                'HEAD,GET,POST'
            );
    }

}
