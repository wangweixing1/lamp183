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
	
	// 用户管理---start
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
	// 用户管理---over

	// 分类管理 资源路由
	Route::resource('/admin/category','Admin\CategoryController');

	// 递归查询所有子分类
	Route::get('/admin/getallcategory','Admin\CategoryController@get');

	// 电影管理
	Route::resource('/admin/movie','Admin\MovieController');

	// 日期管理-日期--------start
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
	// 日期管理---over

	// 影院管理--影院----start
	// 加载添加页面
	Route::get('/admin/cinema/add','Admin\CinemaController@add');

	// 添加
	Route::post('/admin/cinema/insert','Admin\CinemaController@insert');

	// 加载影院列表
	Route::get('/admin/cinema/index','Admin\CinemaController@index');

	// 删除
	Route::get('/admin/cinema/delete/{id}','Admin\CinemaController@delete');

	// 操作编辑
	Route::get('/admin/cinema/edit/{id}','Admin\CinemaController@edit');

	// 执行编辑
	Route::post('/admin/cinema/update','Admin\CinemaController@update');
	// 影院---over

	// 影厅---start
	Route::get('/admin/hall/add','Admin\HallController@add');

	// 添加
	Route::post('/admin/hall/insert','Admin\HallController@insert');

	// 加载影厅列表
	Route::get('/admin/hall/index','Admin\HallController@index');

	// 删除
	Route::get('/admin/hall/delete/{id}','Admin\HallController@delete');

	// 操作编辑
	Route::get('/admin/hall/edit/{id}','Admin\HallController@edit');

	// 执行编辑
	Route::post('/admin/hall/update','Admin\HallController@update');
	// 影厅---over
	// 影院管理----over

	// 放映管理--start
	Route::get('/admin/project/add','Admin\ProjectController@add');

	// 添加
	Route::post('/admin/project/insert','Admin\ProjectController@insert');

	// 加载影厅列表
	Route::get('/admin/project/index','Admin\ProjectController@index');

	// 删除
	Route::get('/admin/project/delete/{id}','Admin\ProjectController@delete');

	// 操作编辑
	Route::get('/admin/project/edit/{id}','Admin\ProjectController@edit');

	// 执行编辑
	Route::post('/admin/project/update','Admin\ProjectController@update');

	// 热映电影
	Route::resource('/admin/showing','Admin\showingController');


	// 展示日历路由
	// Route::get('/admin/calendar','Admin\CalendarController@calendar');

	// 网站配置
	Route::get('/admin/config/config','Admin\ConfigController@config');
    Route::post('/admin/config/insert','Admin\ConfigController@insert');

//友情链接模块开始-------------------------------------------------------

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

//订单模块开始-------------------------------------------------------

	// 订单路由
	Route::get('/admin/order/add','Admin\OrderController@add');
	Route::post('/admin/order/insert','Admin\OrderController@insert');

	// 加载订单路由
	Route::get('/admin/order/index','Admin\OrderController@index');

	// 执行订单删除
	Route::get('/admin/order/delete/{id}','Admin\OrderController@delete');


//轮播模块开始-------------------------------------------------------

	// 轮播添加
	Route::get('/admin/carousel/add','Admin\CarouselController@add');
	Route::post('/admin/carousel/insert','Admin\CarouselController@insert');

	 //轮播列表
	Route::get('/admin/carousel/index','Admin\CarouselController@index');

	// 执行轮播编辑
   	Route::post('/admin/carousel/update','Admin\CarouselController@update');

	// 轮播编辑操作
	Route::get('/admin/carousel/edit/{id}','Admin\CarouselController@edit');
	Route::get('/admin/carousel/delete/{id}','Admin\CarouselController@delete');

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


//前台模块路由开始

	// 前台
	Route::get('/home/index','Home\IndexController@index');

	//前台电影介绍
	Route::get('/home/movie/index','home\MovieController@index');

	//前台订单
	Route::get('/home/order/index','home\OrderController@index');

	// 列表页
	Route::get('/home/case/index','Home\CaseController@index');

	//ajax
	Route::get('/home/case/ajax','Home\CaseController@ajax');




