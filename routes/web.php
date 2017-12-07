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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kun', function () {
    return "sleep";
});
//页面路由控制
//get

Route::get('blog/index','Forward\IndexController@index');

Route::get('article/index','Forward\ArticleController@index');

Route::get('imgwall/index','Forward\ImgWallController@index');

Route::get('timeline/index','Forward\TimelineController@index');



Route::get('login/log','Forward\LoginController@login')->name('f_login');

Route::get('login/reg','Forward\LoginController@reg')->name('f_reg');

Route::post('log/regUser','Forward\LoginController@do_reg')->name('do_reg');
Route::post('log/userlogin','Forward\LoginController@loginPc')->name('do_log');


//post
//Route::post('login/regs','Forward\LoginController@do_reg')->name('f_regs');
