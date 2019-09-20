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
    $api->get('logout', 'LoginController@logout')->name('api.logout');//退出登陆
    $api->group(['middleware' => 'hasToken'], function ($api) {
        $api->get('nav', 'AdminMenusController@getNav')->name('api.nav');//导航菜单
        $api->get('admin/user', 'AdminUsersController@getUserInfo')->name('api.admin.user');//获取管理员信息
        $api->get('menus/enable', 'AdminMenusController@getEnableMenus')->name('api.menus.enable');//可用的菜单
        $api->get('roles/enable', 'AdminRolesController@getEnableRoles')->name('api.roles.enable');//可用的角色
        $api->get('role/info', 'AdminRolesController@getRoleInfo')->name('api.roles.info');//角色详情
        $api->group(['middleware' => 'checkAuth'], function ($api) {
            $api->get('menus', 'AdminMenusController@list')->name('api.menus.list');//菜单列表
            $api->post('menus', 'AdminMenusController@store')->name('api.menus.store');//保存菜单
            $api->put('menus', 'AdminMenusController@update')->name('api.menus.update');//更新菜单
            $api->delete('menus', 'AdminMenusController@destroy')->name('api.menus.destroy');//删除菜单
            $api->get('roles', 'AdminRolesController@list')->name('api.roles.list');//角色列表
            $api->post('roles', 'AdminRolesController@store')->name('api.roles.store');//保存角色
            $api->put('roles', 'AdminRolesController@update')->name('api.roles.update');//更新角色
            $api->delete('roles', 'AdminRolesController@destroy')->name('api.roles.destroy');//删除角色
            $api->get('user', 'AdminUsersController@list')->name('api.user.list');//管理员列表
            $api->post('user', 'AdminUsersController@store')->name('api.user.store');//保存管理员信息
            $api->put('user', 'AdminUsersController@update')->name('api.user.update');//更新管理员信息
            $api->delete('user', 'AdminUsersController@destroy')->name('api.user.destroy');//删除管理员信息
        });
    });

});
