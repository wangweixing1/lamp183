<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login',['title' =>'主页']);
    }

    // 执行登录
	public function doLogin(Request $request)
	{
		// 获取数据 除了token字段
		$data = $request -> except("_token");

		if($remember_token)
		{
			// 查询数据
			$home = \DB::table('users') -> where('remember_token',$remember_token) -> first();

			// 存入session
			session(['master' => $home]);

			return redirect('/home/index') -> with(['info' => '登录成功']);
		}

		// 获取session
		$code = session('code');

		// 查询用户
		$user = \DB::table('users') -> where('name', $data['name']) -> first();

		// 判断用户
		if(!$user)
		{
			return back() -> with(['info' => '该用户不存在']);
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

		
		// 跳转到后后台主页
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

	public function web_login()
    {
        return view('home.login',['title' => '登录']);
    }

    // insert
    public function insert(Request $request)
    {
        // echo 111;
        $this->validate($request, [
            // 规则验证
            'name' => 'required|unique:user',  
            'url' => 'required'           
        ],[
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已经存在',
            'url.required' => '链接地址不能为空'            
        ]);

        $data=$request->except('_token');
         // dd($data);

        // 执行添加（数据库）
        $res = \DB::table('user')->insert(
            $data
        );     
        
        if($res)
        {
            return redirect('/home/login/login') -> with(['info' => '添加成功']);
        }else
        {
            return back() -> with(['info' => '添加失败']);
        }
    }  
}
