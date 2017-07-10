<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DateController extends Controller
{
    	//add 日期添加
    	public function add()
   	{
    		return view('admin.date.add',['title' => '日期添加']);
    	}

    	// insert
	public function insert(Request $request)
	{
		$this->validate($request, [
			// 规则验证
			'date_name' => 'required|unique:date|date:2017-07-09',
			
		],[
			'date_name.required' =>'日期不能为空',
			'date_name.unique' => '该日期已经存在',
			'date_name.date' => '请输入正确的日期格式,例:2017-07-09'
			
		]);

		$data = $request->except('_token');
		// dd($data);

		// // 判断
		if($data)
		{
		            
		             $data['status'] = 1;
		             $data['pid'] = 0;
		             $data['path'] = 0;
		                   
		}

		// 执行添加（数据库）
		$res = \DB::table('date')->insert(
			$data
		);

		if($res)
		{
			return redirect('/admin/date/index') -> with(['info' => '添加成功']);
		}else
		{
			return back() -> with(['info' => '添加失败']);
		}
		// dd(111);

	}

	// index 日期的列表
	public function index(Request $request)
	{	
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		// return '用户列表';
		// 查询值数据库
		$data = \DB::table('date') ->where('date_name','like','%'.$keywords.'%') -> paginate($num); 	// (like 代表模糊查询 $num 代表一页的条数)
		// dd($data);

		// 发送数据过去
		return view('admin.date.index',['request' => $request ->all(), 'title' => '日期列表','data' => $data]);
	}

	// 日期编辑
	public function edit($id)
	{
		// 查询
		$data = \DB::table('date') -> where('id', $id) -> first();
		// dd($data);

		// 发送数据
		return view('admin.date.edit',['title' => '日期编辑','data' => $data]);
	}

	// 修改数据
	public function update(Request $request)
	{
		$data = $request -> except('_token');
		// dd($data);

		// 获取id
		$id = $request->input('id');

		// // 判断
		if($data)
		{
		            
		             $data['status'] = 1;
		             $data['pid'] = 0;
		             $data['path'] = 0;
		                   
		}

		// 执行修改
		$res = \DB::table('date') -> where('id',$id) -> update($data);
		// dd($res);

		// 判断
		if($res)
		{
			return redirect('/admin/date/index') -> with(['info' => '修改成功']);
		}else
		{
			return back() -> with(['info' => '修改失败']);
		}
	}

	// 删除数据
	public function delete($id)
	{

		$res = \DB::table('date') -> delete($id);

		// 判断
		if($res)
		{
			return redirect('/admin/date/index') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}
}
