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

<<<<<<< HEAD

	// 即将上映电影
	Route::resource('/admin/coming','Admin\comingController');


	// 订单管理
	Route::get('/admin/order/index','Admin\OrderController@index');
=======

<<<<<<< HEAD
	// 订单管理
	Route::get('/admin/order/index','Admin\OrderController@index');

>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257

	// 展示日历路由
	// Route::get('/admin/calendar','Admin\CalendarController@calendar');

<<<<<<< HEAD
=======
=======
	// 即将上映电影
	Route::resource('/admin/coming','Admin\comingController');


	// 订单管理
	Route::get('/admin/order/index','Admin\OrderController@index');
>>>>>>> 477302149c57f5d47f6978cc7988e80ce50236cb
>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257

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


	//榜单添加
	Route::get('/admin/list/add','Admin\ListController@add');
	Route::post('/admin/list/insert','Admin\ListController@insert');

	// 榜单列表
	Route::get('/admin/list/index','Admin\ListController@index');

	// 执行榜单编辑
   	Route::post('/admin/list/update','Admin\ListController@update');

	// 榜单编辑操作
	Route::get('/admin/list/edit/{id}','Admin\ListController@edit');
	Route::get('/admin/list/delete/{id}','Admin\ListController@delete');



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
	// 前台登录
	Route::get('/home/login','Home\LoginController@login');
	Route::post('/home/dologin','Home\LoginController@doLogin');


	// 注册页面
	Route::get('/home/regist','Home\RegistController@regist');
	Route::post('/home/insert','Home\RegistController@insert');

    // 个人中心
	// 用户名修改
	Route::get('/home/center','Home\CenterController@center');
	Route::post('/home/dupdate','Home\CenterController@dupdate');

	// 密码修改
	Route::get('/home/mima','Home\CenterController@mima');
	Route::post('/home/postreset','Home\CenterController@postreset');

	// 头像修改
	Route::get('/home/touxiang','Home\CenterController@touxiang');
	Route::post('/home/update','Home\CenterController@update');

	// 前台
	Route::get('/home/index','Home\IndexController@index');

	//前台电影介绍
	Route::get('/home/movie/index','home\MovieController@index');

	//前台订单
	Route::get('/home/order/index','home\OrderController@index');

<<<<<<< HEAD

	// 列表页
	Route::get('/home/case/index/{tid}','Home\CaseController@index');

	//实现分类（ajax）
	Route::get('/home/case/ajax','Home\CaseController@ajax');

=======
	// 列表页
	Route::get('/home/case/index/{tid}','Home\CaseController@index');

	//实现分类（ajax）
	Route::get('/home/case/ajax','Home\CaseController@ajax');

<<<<<<< HEAD
	// 详情页
	Route::get('/home/ticket/index/{id}','Home\TicketController@index');

	// 购票页
	Route::get('/home/ticket/ticket/{id}','Home\TicketController@ticket');

=======
>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257
	//放映时刻表
	Route::get('/home/time/index','Home\TimeController@index');

	//榜单
	Route::get('/home/list/index','Home\ListController@index');

	//热点
	Route::get('/home/hot/index','Home\hotController@index');

	//ajax
	Route::get('/home/case/ajax','Home\CaseController@ajax');

<<<<<<< HEAD
// 详情页
Route::get('/home/ticket/index/{id}','Home\TicketController@index');

// 购票页
Route::get('/home/ticket/ticket/{id}','Home\TicketController@ticket');

// CinemaAjax
Route::get('/home/ticket/CinemaAjax','Home\TicketController@CinemaAjax');
=======
	// 详情页
	Route::get('/home/ticket/index/{id}','Home\TicketController@index');

	// 购票页
	Route::get('/home/ticket/ticket/{id}','Home\TicketController@ticket');

>>>>>>> 477302149c57f5d47f6978cc7988e80ce50236cb
	// CinemaAjax
	Route::get('/home/ticket/CinemaAjax','Home\TicketController@CinemaAjax');
>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257

	// DateAjax
	Route::get('/home/ticket/DateAjax','Home\TicketController@DateAjax');

	// 提交信息并选座
	Route::post('/home/ticket/seat/{id}','Home\TicketController@seat');

	// 现在预订
	Route::get('/home/ticket/ajax','Home\TicketController@ajax');

	// 订票后台服务async
	Route::get('/async','Home\AsyncController@async');

	// 缓存测试
	Route::get('/cache','Home\TicketController@cache');