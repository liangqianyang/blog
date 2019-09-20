<?php

namespace App\Http\Middleware;

use App\Services\MenusService;
use Closure;
use Dingo\Api\Routing\Helpers;

class CheckAuth
{
    use Helpers;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('X-Token');//获取用户token
        $data = request()->route()->getAction();
        $route = $data['as'];
        $menusService = new MenusService();
        $flag = $menusService->checkAuth($token, $route);
        if (!$flag) {
            return $this->response->array(['code' => 2001, 'message' => '您暂无此权限!']);
        }
        return $next($request);
    }
}
