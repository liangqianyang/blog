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
            return $this->response->array(['code' => 200, 'token' => $token, 'message' => '登陆成功']);
        } else {
            return $this->response->array(['code' => 201, 'message' => '用户名或密码错误']);
        }

    }

}
