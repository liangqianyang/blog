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
Route::get('index.html', 'IndexController@root');
Route::get('info.html', 'IndexController@info')->name('info');
Route::get('list.html', 'IndexController@list')->name('list');
Route::get('list2.html', 'IndexController@list2')->name('list2');
Route::get('list3.html', 'IndexController@list3')->name('list3');
Route::get('time.html', 'IndexController@time')->name('time');
Route::get('about.html', 'IndexController@about')->name('about');
Route::get('daohang.html', 'IndexController@daohang')->name('daohang');
Route::get('message.html', 'IndexController@message')->name('message');
Route::get('notice/{notice}.html', 'NoticeController@show')->name('notice.show');//网站公告详情
Route::get('article/category_id.html', 'ArticleController@getArticleByCategory')->name('article.category');//根据分类获取文章
Route::get('article/{article}.html', 'ArticleController@show')->name('article.show');//文章详情

