<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CinemaController extends Controller
{
	// 加载添加页面
	public function add()
	{
		return view('admin.cinema.add',['title' => '影院添加']);
	}

	public function insert(Request $request)
	{	
		// 获取表单提交的数据
		$data = $request -> except('_token');
		// dd($data);

		// 判断
		if($data)
		{
				
			 $data['status'] = 1;
			 $data['path'] = 0; 
			 $data['pid'] = 0;
					   
		}

		// 执行添加
		$res = \DB::table('cinema') -> insert($data);

		// 判断
		if($res)
		{
			return redirect('/admin/cinema/index') -> with(['info' => '添加成功']);
		}else
		{
			return back() -> with(['info' =>'添加失败' ]);
		}

		
	}

	// 加载影院列表
	public function index(Request $request)
	{
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		// return '用户列表';
		// 查询值数据库
		$data = \DB::table('cinema') ->where('cinema_name','like','%'.$keywords.'%') -> paginate($num); 

		// 加载页面并发送数据
		return view('admin.cinema.index',['request' => $request ->all(),'title' => '影院列表','data' => $data]);
	}


	// 影院编辑页面
	public function edit($id)
	{
		// 查询
		$data = \DB::table('cinema') -> where('id', $id) -> first();
		// dd($data);

		// 发送数据
		return view('admin.cinema.edit',['title' => '放映时间编辑','data' => $data]);
	}

	// 修改数据
	public function update(Request $request)
	{
		$data = $request -> except('_token');
		// dd($data);

		// 获取id
		$id = $request->input('id');

		// 判断
		if($data)
		{
				
			$data['status'] = 1;
			$data['path'] = 0;
			$data['pid'] = 0;
					   
		}

		// 执行修改
		$res = \DB::table('cinema') -> where('id',$id) -> update($data);
		// dd($res);

		// 判断
		if($res)
		{
			return redirect('/admin/cinema/index') -> with(['info' => '修改成功']);
		}else
		{
			return back() -> with(['info' => '修改失败']);
		}

	}

	// 执行删除
	public function delete($id)
	{
		$res = \DB::table('cinema') -> delete($id);

		// 判断
		if($res)
		{
			return redirect('/admin/cinema/index') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}

}
