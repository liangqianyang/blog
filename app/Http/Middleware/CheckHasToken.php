<?php

namespace App\Http\Middleware;

use Closure;
use Dingo\Api\Routing\Helpers;
use App\Models\AdminUserToken;

/**
 * 判断是否传入token
 * Class CheckHasToken
 * @package App\Http\Middleware
 */
class CheckHasToken
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
        if (!$token) {
            return $this->response->array(['code' => 50009, 'message' => '非法操作']);
        }

        $admin_token = AdminUserToken::query()
            ->where('token', $token)
            ->first();

        if ($admin_token) {
            $expire = $admin_token->expire_time;//token的过期时间
            if ($expire < time()) {
                return $this->response->array(['code' => 50014, 'message' => 'token已过期请重新登陆']);
            }
        } else {
            return $this->response->array(['code' => 50008, 'message' => '无效的token']);
        }
        return $next($request);
    }
}
