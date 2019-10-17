<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/2
 * Time: 9:50
 */

namespace App\Http\Controllers\Api;


use App\Services\LoginService;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{

    /**
     * 登陆
     * @param \Illuminate\Http\Request $request
     * @param LoginService $loginService
     * @return mixed
     */
    public function login(Request $request, LoginService $loginService)
    {
        $messages = [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $name = $request->input('username');
        $password = $request->input('password');
        if ($token = $loginService->doLogin($name, $password)) {
            writeLog($request, $name . '登陆', [], '0', $token);
            return $this->response->array(['code' => 0, 'data' => ['token' => $token], 'message' => '登陆成功']);
        } else {
            return $this->response->array(['code' => 1002, 'message' => '用户名或密码错误']);
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
