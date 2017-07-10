<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	// add
	public function add()
	{
		return view('admin.user.add',['title' => '用户添加']);
	}

	// insert
	public function insert(Request $request)
	{
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
			'avatar.required' => '头像不能为空',
			'avatar.image' => '请上传图片'
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

		// 处理图片 
		if($request -> hasFile('avatar'))
		{
			if($request -> file('avatar') -> isValid())
			{
				// 获取扩展名
				$ext = $request -> file('avatar') -> extension();

				// 随机文件名
				$filename = time().mt_rand(1000000,9999999).'.'.$ext;

				// 移动
				$request -> file('avatar') -> move('./uploads/avatar',$filename);

				// 添加 dada 数据
				$data['avatar'] = $filename;
 			}
		}

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
			return redirect('/admin/user/index') -> with(['info' => '添加成功']);
		}else
		{
			return back() -> with(['info' => '添加失败']);
		}
		// dd(111);
	}

	// index 用户的列表页
	public function index(Request $request)
	{	
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		// return '用户列表';
		// 查询值数据库
		$data = \DB::table('users') ->where('name','like','%'.$keywords.'%') -> paginate($num); 	// (like 代表模糊查询 $num 代表一页的条数)
		// dd($data);
		// 发送数据过去
		return view('admin.user.index',['request' => $request ->all(), 'title' => '用户列表','data' => $data]);
	}

	// edit 用户编辑
	public function edit($id)
	{
		// 查询
		$data = \DB::table('users') -> where('id', $id) -> first();

		// 发送数据
		return view('admin.user.edit', ['title' => '用户编辑','data' => $data]);
	}

	// 处理数据
	public function update(Request $request)
	{
		$data = $request -> except('_token','id');
		// dd($data);

		// 查询旧图片
		$oldAvatar = \DB::table('users') -> where('id' ,$request -> id) -> first() -> avatar;
		// dd($oldAvatar);

		if($request -> hasFile('avatar'))
		{
			if($request -> file('avatar') -> isValid())
			{
				// 获取扩展名
				$ext = $request -> file('avatar') -> extension();

				// 随机文件名
				$filename = time().mt_rand(1000000,9999999).'.'.$ext;

				// 移动
				$request -> file('avatar') -> move('./uploads/avatar',$filename);

				// 删除旧图片
				// 首先判断在不在
				if(file_exists('./uploads/avatar/'.$oldAvatar) && $oldAvatar != 'default.jpg')
				{
					unlink('./uploads/avatar/'.$oldAvatar);
				}


				// 添加 dada 数据
				$data['avatar'] = $filename;
			}
		}

		// 处理更新时间字段
		$data['updated_at'] = date('Y-m-d H:i:s');

		// 添加
		$res = \DB::table('users') -> where('id',$request -> id) -> update($data);

		// 判断
		if($res)
		{
			return redirect('/admin/user/index') -> with(['info' => '更新成功']);
		}else
		{
			return back() -> with(['info' => '更新失败']);
		}
	}

	// 删除 （模态框）
	public function delete($id)
	{
		// $res = \DB::table('users') -> where('id',$id) -> delete();
		$res = \DB::table('users') -> delete($id);

		// 判断
		if($res)
		{
			return redirect('/admin/user/index') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}	

	// ajax 修改用户名
	public function ajaxRename(Request $request)
	{
		// dd($request -> all());

		// 修改之前的查询
		$res = \DB::table('users') -> where('name',$request ->input('name'))-> first();
		// dd($res);

		// 判断
		if($res)
		{	
			// 判断用户名是否存在存在则json
			return response() -> json('0');
		}else
		{	
			// 执行修改
			$res = \DB::table('users') -> where('id',$request -> input('id')) -> update(['name' => $request -> input('name')]);

			// 判断是否修改成功
			if ($res)
			{
				return response() -> json('1');
			}else
			{
				return response() ->json('2');
			}
		}
	}

}
