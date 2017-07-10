<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
	//
	public function add()
	{
		// 查询所属日期
		$data = \DB::table('date') -> get();

		// 加载添加页面并发送数据
		return view('admin.time.add',['title' => '时间添加','data' => $data]);
	}

	public function insert(Request $request)
	{
		// 获取表单所提交的数据
		$data = $request -> except('_token');
		
		// 判断
		if($data)
	{
				
				 $data['status'] = 1;
				 $data['path'] = 0;
					   
	}

		// 执行添加
		$res = \DB::table('time') -> insert($data);

		// 判断
		if($res)
		{
			return redirect('/admin/time/index') -> with(['info' => '添加成功']);
		}else
		{
			return back() -> with(['info' =>'添加失败' ]);
		}


	}

	public function index(Request $request)
	{
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		// return '用户列表';
		// 查询值数据库
		$data = \DB::table('time') ->where('time_name','like','%'.$keywords.'%') -> paginate($num); 

		// 查询日期表数据
		$res = \DB::table('date') -> get();
		// dd($res);

		// 加载页面并发送数据
		return view('admin.time.index',['request' => $request ->all(),'title' => '时间列表','data' => $data,'res' => $res]);
	}

	// 放映时间编辑页面
	public function edit($id)
	{
		// 查询
		$data = \DB::table('time') -> where('id', $id) -> first();
		// dd($data);

		$res = \DB::table('date') -> get();

		// 发送数据
		return view('admin.time.edit',['title' => '放映时间编辑','data' => $data,'res' => $res]);
	}

	// 修改数据
	public function update(Request $request)
	{
		$data = $request -> except('_token');
		// dd($data);

		// 获取id
		$id = $request->input('id');

		// // // 判断
		// if($data)
		// {
		            
		//              $data['status'] = 1;
		//              $data['pid'] = 0;
		//              $data['path'] = 0;
		                   
		// }

		// // 执行修改
		// $res = \DB::table('date') -> where('id',$id) -> update($data);
		// // dd($res);

		// // 判断
		// if($res)
		// {
		// 	return redirect('/admin/date/index') -> with(['info' => '修改成功']);
		// }else
		// {
		// 	return back() -> with(['info' => '修改失败']);
		// }

	}

	public function delete($id)
	{
		$res = \DB::table('time') -> delete($id);

		// 判断
		if($res)
		{
			return redirect('/admin/time/index') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}


}
