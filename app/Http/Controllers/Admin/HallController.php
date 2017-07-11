<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HallController extends Controller
{
	// 加载添加影厅的页面
	public function add()
	{
		// 获取影院
		$data = \DB::table('cinema') ->get();

		// 加载页面并发送数据
		return view('admin.hall.add',['title' => '影厅添加','data' => $data]);
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
		}

		// 执行添加
		$res = \DB::table('hall') -> insert($data);

		// 判断
		if($res)
		{
			return redirect('/admin/hall/index') -> with(['info' => '添加成功']);
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
		$data = \DB::table('hall') ->where('hall_name','like','%'.$keywords.'%') -> paginate($num); 

		// 查询日期表数据
		$res = \DB::table('cinema') -> get();

		// 加载页面并发送数据
		return view('admin.hall.index',['request' => $request ->all(),'title' => '影院列表','data' => $data,'res' => $res]);
	}


	// 影院编辑页面
	public function edit($id)
	{
		// 查询
		$data = \DB::table('hall') -> where('id', $id) -> first();
		// dd($data);

		// 查询所属影院
		$res = \DB::table('cinema') -> get();

		// 发送数据
		return view('admin.hall.edit',['title' => '放映时间编辑','data' => $data,'res' => $res]);
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
					   
		}

		// 执行修改
		$res = \DB::table('hall') -> where('id',$id) -> update($data);
		// dd($res);

		// 判断
		if($res)
		{
			return redirect('/admin/hall/index') -> with(['info' => '修改成功']);
		}else
		{
			return back() -> with(['info' => '修改失败']);
		}

	}

	// 执行删除
	public function delete($id)
	{
		$res = \DB::table('hall') -> delete($id);

		// 判断
		if($res)
		{
			return redirect('/admin/hall/index') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}
}
