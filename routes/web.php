<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'IndexController@root');
Route::get('index.html', 'IndexController@root');//首页
Route::get('search.html', 'IndexController@search')->name('search');//搜索列表页
Route::get('time.html', 'TimeController@index')->name('time');//时间轴
Route::get('daohang.html', 'IndexController@daohang')->name('daohang');//友情链接
Route::get('message.html', 'MessageController@index')->name('message');//留言
Route::get('message/captcha', 'MessageController@captcha')->name('message.captcha');//留言验证码
Route::post('message/leaving.html', 'MessageController@message')->name('message.leaving');//留言提交
Route::get('notice/{notice}.html', 'NoticeController@show')->name('notice.show');//网站公告详情
Route::get('blog/category/{category_id}.html', 'ArticleController@blog')->name('article.blog');//个人博客列表
Route::get('article/category.html', 'ArticleController@getArticleByCategory')->name('article.category');//根据分类获取文章
Route::get('article/category/{category_id}.html', 'ArticleController@list')->name('article.list');//文章列表(分页)
Route::get('article/label/{label_id}.html', 'ArticleController@labels')->name('article.labels');//根据标签获取文章列表(分页)
Route::get('article/{id}.html', 'ArticleController@show')->name('article.show');//文章详情
Route::post('article/likes.html', 'ArticleController@likes')->name('article.likes');//文章点赞
Route::get('article/captcha', 'ArticleController@captcha')->name('article.captcha');//文章评论验证码
Route::post('article/comment.html', 'ArticleController@comment')->name('article.comment');//文章评论
Route::get('about.html', 'AboutController@index')->name('about');//关于我

