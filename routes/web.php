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

// Route::get('/', function () {
//     return view('welcome');
// });



// 跌幅群组
Route::group(['middleware' => 'adminlogin'],function()
{

	// 后台主页
	Route::get('/admin/index','Admin\IndexController@index');
	
	// 用户管理
	Route::get('/admin/user/add','Admin\UserController@add');
	Route::post('/admin/user/insert','Admin\UserController@insert');

	// 用户列表
	Route::get('/admin/user/index','Admin\UserController@index');

	// 编辑操作
	Route::get('/admin/user/edit/{id}','Admin\UserController@edit');
	Route::get('/admin/user/delete/{id}','Admin\UserController@delete');

	// 执行编辑
	Route::post('/admin/user/update','Admin\UserController@update');

	// ajax 操作
	Route::post('/admin/user/ajaxrename','Admin\UserController@ajaxRename');

	// 分类管理 资源路由
	Route::resource('/admin/category','Admin\CategoryController');

	// 递归查询所有子分类
	Route::get('/admin/getallcategory','Admin\CategoryController@get');

	// 电影管理
	Route::resource('/admin/movie','Admin\MovieController');

	// 日期管理-日期
	Route::get('/admin/date/add','Admin\DateController@add');
	Route::post('/admin/date/insert','Admin\DateController@insert');

	// 日期列表
	Route::get('/admin/date/index','Admin\DateController@index');

	// 操作编辑
	Route::get('/admin/date/edit/{id}','Admin\DateController@edit');

	// 执行编辑
	Route::post('/admin/date/update','Admin\DateController@update');

	// 删除
	Route::get('/admin/date/delete/{id}','Admin\DateController@delete');

	// 日期管理-放映时间
	Route::get('/admin/time/add','Admin\TimeController@add');

	// 添加
	Route::post('/admin/time/insert','Admin\TimeController@insert');

	// 列表
	Route::get('/admin/time/index','Admin\TimeController@index');

	// 删除
	Route::get('/admin/time/delete/{id}','Admin\TimeController@delete');

	// 操作编辑
	Route::get('/admin/time/edit/{id}','Admin\TimeController@edit');

	// 执行编辑
	Route::post('/admin/time/update','Admin\TimeController@update');

	// 展示日历路由
	// Route::get('/admin/calendar','Admin\CalendarController@calendar');

});


// 登录路由
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/dologin','Admin\LoginController@doLogin');

// 退出路由
Route::get('/admin/logout','Admin\LoginController@logout');

// 验证码路由
Route::get('kit/captcha/{tmp}', 'Admin\KitController@captcha');

// 发送邮件
Route::get('/send','Admin\MailController@send');