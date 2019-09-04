<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    $api->post('captchas', 'CaptchasController@store')->name('api.captchas.store');//图形验证码
    $api->post('login', 'LoginController@login')->name('api.login');//登陆
    $api->get('admin/user', 'AdminUsersController@getUserInfo')->name('api.admin.user');//获取管理员信息
    $api->get('menus/enable', 'AdminMenusController@getEnableMenus')->name('api.menus.enable');//可用的菜单
    $api->get('menus', 'AdminMenusController@list')->name('api.menus.list');//菜单列表
    $api->post('menus', 'AdminMenusController@store')->name('api.menus.store');//保存菜单
    $api->put('menus', 'AdminMenusController@update')->name('api.menus.update');//更新菜单
    $api->delete('menus', 'AdminMenusController@destroy')->name('api.menus.destroy');//删除菜单
});
