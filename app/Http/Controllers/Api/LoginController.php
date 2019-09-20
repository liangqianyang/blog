<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/2
 * Time: 9:50
 */

namespace App\Http\Controllers\Api;


use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /**
     * 登陆
     * @param LoginRequest $request
     * @param LoginService $loginService
     * @return mixed
     */
    public function login(LoginRequest $request, LoginService $loginService)
    {
        $name = $request->input('username');
        $password = $request->input('password');
        if ($token = $loginService->doLogin($name, $password)) {
            return $this->response->array(['code' => 0, 'data' => ['token' => $token], 'message' => '登陆成功']);
        } else {
            return $this->response->array(['code' => 1001, 'message' => '用户名或密码错误']);
        }

    }

    /**
     * 退出登录
     * @param Request $request
     * @param LoginService $loginService
     * @return mixed
     */
    public function logout(Request $request, LoginService $loginService)
    {
        $token = $request->header('X-Token');//获取用户token
        if ($loginService->logout($token)) {
            return $this->response->array(['code' => 0, 'message' => '退出登录']);
        } else {
            return $this->response->array(['code' => 1001, 'message' => '操作失败']);
        }
    }

}
