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
    $api->post('captcha', 'CaptchasController@store')->name('api.captcha.store');//图形验证码
    $api->post('login', 'LoginController@login')->name('api.login');//登陆
    $api->get('logout', 'LoginController@logout')->name('api.logout');//退出登陆
    $api->post('user/avatar', 'AdminUsersController@uploadAvatar')->name('api.user.avatar');//上传用户头像
    $api->post('article/upload', 'ArticleController@upload')->name('api.article.upload');//上传文章图片(上传到本地)
    $api->post('banner/upload', 'BannerController@upload')->name('api.banner.upload');//上传Banner图片
    $api->post('material/upload', 'MaterialController@upload')->name('api.material.upload');//上传素材图片(上传到ali oss)
    $api->group(['middleware' => 'hasToken'], function ($api) {
        $api->get('nav', 'AdminMenusController@getNav')->name('api.nav');//导航菜单
        $api->get('admin/user', 'AdminUsersController@getUserInfo')->name('api.admin.user');//获取管理员信息
        $api->get('menu/enable', 'AdminMenusController@getEnableMenus')->name('api.menu.enable');//可用的菜单
        $api->get('menu/authMenus', 'AdminMenusController@getAuthMenus')->name('api.menu.authMenus');//添加菜单时选取的菜单列表
        $api->get('role/enable', 'AdminRolesController@getEnableRoles')->name('api.role.enable');//可用的角色
        $api->get('category/enable', 'CategoryController@getEnableCategory')->name('api.category.enable');//可用的文章分类
        $api->get('label/enable', 'LabelController@getEnableLabel')->name('api.label.enable');//可用的文章分类
        $api->get('role/info', 'AdminRolesController@getRoleInfo')->name('api.role.info');//角色详情
        $api->get('log', 'SysLogController@list')->name('api.log.list');//系统日志列表
        $api->group(['middleware' => 'checkAuth'], function ($api) {
            $api->get('menu', 'AdminMenusController@list')->name('api.menu.list');//菜单列表
            $api->post('menu', 'AdminMenusController@store')->name('api.menu.store');//保存菜单
            $api->put('menu', 'AdminMenusController@update')->name('api.menu.update');//更新菜单
            $api->delete('menu', 'AdminMenusController@destroy')->name('api.menu.destroy');//删除菜单
            $api->get('role', 'AdminRolesController@list')->name('api.role.list');//角色列表
            $api->post('role', 'AdminRolesController@store')->name('api.role.store');//保存角色
            $api->put('role', 'AdminRolesController@update')->name('api.role.update');//更新角色
            $api->delete('role', 'AdminRolesController@destroy')->name('api.role.destroy');//删除角色
            $api->get('user', 'AdminUsersController@list')->name('api.user.list');//管理员列表
            $api->post('user', 'AdminUsersController@store')->name('api.user.store');//保存管理员信息
            $api->put('user', 'AdminUsersController@update')->name('api.user.update');//更新管理员信息
            $api->put('user/center', 'AdminUsersController@updateCenter')->name('api.user.center');//更新管理员个人中心的信息
            $api->delete('user', 'AdminUsersController@destroy')->name('api.user.destroy');//删除管理员信息
            $api->get('category', 'CategoryController@list')->name('api.category.list');//分类列表
            $api->post('category', 'CategoryController@store')->name('api.category.store');//保存分类信息
            $api->put('category', 'CategoryController@update')->name('api.category.update');//更新分类信息
            $api->delete('category', 'CategoryController@destroy')->name('api.category.destroy');//删除分类
            $api->get('label', 'LabelController@list')->name('api.label.list');//标签列表
            $api->post('label', 'LabelController@store')->name('api.label.store');//保存标签信息
            $api->put('label', 'LabelController@update')->name('api.label.update');//更新标签信息
            $api->delete('label', 'LabelController@destroy')->name('api.label.destroy');//删除标签
            $api->get('article', 'ArticleController@list')->name('api.article.list');//文章列表
            $api->post('article', 'ArticleController@store')->name('api.article.store');//保存文章信息
            $api->put('article', 'ArticleController@update')->name('api.article.update');//更新文章信息
            $api->delete('article', 'ArticleController@destroy')->name('api.article.destroy');//删除文章
            $api->put('article/top', 'ArticleController@top')->name('api.article.top');//置顶文章
            $api->put('article/up', 'ArticleController@up')->name('api.article.up');//上架文章
            $api->put('article/down', 'ArticleController@down')->name('api.article.down');//下架文章
            $api->get('banner', 'BannerController@list')->name('api.banner.list');//轮播列表
            $api->post('banner', 'BannerController@store')->name('api.banner.store');//保存轮播信息
            $api->put('banner', 'BannerController@update')->name('api.banner.update');//更新轮播信息
            $api->delete('banner', 'BannerController@destroy')->name('api.banner.destroy');//删除轮播
            $api->get('material', 'MaterialController@list')->name('api.material.list');//素材列表
            $api->get('material/enable', 'MaterialController@list')->name('api.material.enable');//可用的素材列表
            $api->post('material', 'MaterialController@store')->name('api.material.store');//保存素材信息
            $api->put('material', 'MaterialController@update')->name('api.material.update');//更新素材信息
            $api->delete('material', 'MaterialController@destroy')->name('api.material.destroy');//删除素材
            $api->get('notice', 'NoticeController@list')->name('api.notice.list');//公告列表
            $api->post('notice', 'NoticeController@store')->name('api.notice.store');//保存公告信息
            $api->put('notice', 'NoticeController@update')->name('api.notice.update');//更新公告信息
            $api->delete('notice', 'NoticeController@destroy')->name('api.notice.destroy');//删除公告
            $api->put('notice/top', 'NoticeController@top')->name('api.notice.top');//置顶公告
            $api->get('page', 'PageController@list')->name('api.page.list');//单页列表
            $api->post('page', 'PageController@store')->name('api.page.store');//保存单页信息
            $api->put('page', 'PageController@update')->name('api.page.update');//更新单页信息
            $api->delete('page', 'PageController@destroy')->name('api.page.destroy');//删除单页
            $api->get('message', 'MessageController@list')->name('api.message.list');//留言列表
            $api->delete('message', 'MessageController@destroy')->name('api.message.destroy');//删除留言
            $api->post('message/reply', 'MessageController@reply')->name('api.message.reply');//回复留言
        });
    });

});
