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

<<<<<<< HEAD
// Route::get('/', function () {
//     return view('welcome');
// });
=======
>>>>>>> b9f1c2f1beb338599a37b4f9eb293ab08885f997



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
<<<<<<< HEAD

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




=======
});


>>>>>>> b9f1c2f1beb338599a37b4f9eb293ab08885f997
// 登录路由
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/dologin','Admin\LoginController@doLogin');

// 退出路由
Route::get('/admin/logout','Admin\LoginController@logout');

// 验证码路由
<<<<<<< HEAD
Route::get('kit/captcha/{tmp}', 'Admin\KitController@captcha');
=======
Route::get('kit/captcha/{tmp}', 'Admin\KitController@captcha');
>>>>>>> b9f1c2f1beb338599a37b4f9eb293ab08885f997
