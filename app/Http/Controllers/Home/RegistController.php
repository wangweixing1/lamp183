<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistController extends Controller
{
    //
    public function regist()
    {
    	return view('home.regist.regist',['title' => '登录页面']);
    	// echo 111;
    }

    // insert
    public function insert(Request $request)
    {
        // echo 111;
        $this->validate($request, [
            // 规则验证
            'name' => 'required|unique:users|min:6|max:18',
            'email' => 'email|unique:users',
            'password' => 'required',
            're_password' => 'required|same:password',
            'avatar' => 'required|image'
            ],[
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已经存在',
            'name.min' => '用户名最小6个字符',
            'name.max' => '用户名不能超过18个字符',
            'email.email' => '请输入正确的邮箱（推荐使用QQ邮箱）',
            'email.unique' => '邮箱已经存在',
            'password.required' => '密码不能为空',
            're_password.required' => '确认密码不能为空',
            're_password.same' => '两次密码不一致',
            ]);

        $data = $request->except('_token','re_password');
		// dd($data);

		// 处理密码加密
		$data['password'] = encrypt($data['password']);

		// 哈希方法加密
		// $data['password'] = \Hash::make($data['password']);
		// if(\Hash::check('15052001290',$data['password']))
		// {
		// 	echo '密码正确';
		// }else
		// {
		// 	echo '密码错误';
		// }

		// 密码解密
		// $password = decrypt($data['password']);
		// echo $password;
		// dd($data);

		// 处理token
		$data['remember_token'] = str_random(50);

		// 处理时间
		$time = date('Y-m-d H:i:s');
		$data['created_at'] = $time;
		$data['updated_at'] = $time;
		// dd($data);

		// 执行添加（数据库）
        $res = \DB::table('users')->insert(
            $data
        );     
        
        if($res)
        {
            return redirect('/home/regist/regist') -> with(['info' => '添加成功']);
        }else
        {
            return back() -> with(['info' => '添加失败']);
        }
        // dd(111);
    }
}
