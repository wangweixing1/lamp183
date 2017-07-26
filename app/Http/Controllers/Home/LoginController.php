<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login');
<<<<<<< HEAD
    }  
    
=======
    }

>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257
    // 执行登录
	public function doLogin(Request $request)
	{
		// 获取数据 除了token字段
		$data = $request -> except("_token");
<<<<<<< HEAD
		// dd($data);

		// 验证是否记住我
		$remember_token = \Cookie::get('remember_token');
		// dd($remember_token);
=======

		// 验证是否记住我
		$remember_token = \Cookie::get('remember_token');

>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257
		if($remember_token)
		{
			// 查询数据
			$home = \DB::table('users') -> where('remember_token',$remember_token) -> first();
<<<<<<< HEAD
			// dd($home);
=======

>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257
			// 存入session
			session(['master' => $home]);

			return redirect('/home/index') -> with(['info' => '登录成功']);
		}

<<<<<<< HEAD

		// 查询用户
		$user = \DB::table('users') -> where('name', $data['name']) -> first();
		// dd($user);
		// 判断用户
		if(!$user)
		{
			return back() -> with(['info' => '该用户名不存在']);
=======
		// 获取session
		$code = session('code');
		
		// 验证码是否正确
		if($code != $data['code'])
		{
			return back() -> with(['info' => '验证码错误']);
		}
		// dd($data);

		// 查询用户
		$user = \DB::table('users') -> where('name', $data['name']) -> first();

		// 判断用户
		if(!$user)
		{
			return back() -> with(['info' => '该用户不存在']);
>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257
		}


		// 对密码进行解密
		$password = decrypt($user -> password);

		// 判断密码
		if($password != $data['password'])
		{
			return back() -> with(['info' => '密码错误']);
		}

		// 将用户数据存入session中
		session(['master' => $user]);

		// 写入cookie并判断（记住我）has是检测
		if($request -> has('remember_me'))
		{
			\Cookie::queue('remember_token',$user -> remember_token,10);
		}
		
<<<<<<< HEAD
		// 跳转到前台主页
=======
		// 跳转到后后台主页
>>>>>>> a2eb69db3ec4dd5fd48b4acfa98d66f9c1758257
		return redirect('/home/index') -> with(['info' => '登录成功']);
		// dd(11);
	}

	// logout (退出)
	public function logout(Request $request)
	{
		// 清除session(实现退出)
		$request->session()->forget('master');

		//　回到登录页面
		return redirect('/home/login') -> with(['info' => '退出成功！']);
	}
}
