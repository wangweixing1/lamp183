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

	// ajax 操作修改用户名
	Route::post('/admin/user/ajaxrename','Admin\UserController@ajaxRename');

	// 分类管理 资源路由
	Route::resource('/admin/category','Admin\CategoryController');

	// 递归查询所有子分类
	Route::get('/admin/getallcategory','Admin\CategoryController@get');

	// 网站配置
	Route::get('/admin/config/config','Admin\ConfigController@config');
    Route::post('/admin/config/insert','Admin\ConfigController@insert');

	// 添加友情链接
	Route::get('/admin/frinedship/add','Admin\FrinedshipController@add');
	Route::post('/admin/frinedship/insert','Admin\FrinedshipController@insert');

	// 友情链接列表
	Route::get('/admin/frinedship/index','Admin\FrinedshipController@index');

     // 执行友情链接编辑
    Route::post('/admin/frinedship/update','Admin\FrinedshipController@update');

	// 编辑操作
	Route::get('/admin/frinedship/edit/{id}','Admin\FrinedshipController@edit');
	Route::get('/admin/frinedship/delete/{id}','Admin\FrinedshipController@delete');

	

});

	//前台主页
	Route::get('/home/index','home\IndexController@index');

	// 登录路由
	Route::get('/admin/login','Admin\LoginController@login');
	Route::post('/admin/dologin','Admin\LoginController@doLogin');

	// 退出路由
	Route::get('/admin/logout','Admin\LoginController@logout');

	// 验证码路由
	Route::get('kit/captcha/{tmp}', 'Admin\KitController@captcha');

