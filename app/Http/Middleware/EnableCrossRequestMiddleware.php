<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 开启跨域
 * Class EnableCrossRequestMiddleware
 * @package App\Http\Middleware
 */
class EnableCrossRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', 'https://lqy-comic.com');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, x-token, Cookie, Accept, multipart/form-data, application/json');
//        $response->header('Access-Control-Allow-Headers', '*');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS, DELETE');
        $response->header('Access-Control-Allow-Credentials', 'false');
        return $response;
    }
}
