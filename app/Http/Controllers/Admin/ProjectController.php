<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
	// 加载放映添加页面
	public function add()
	{
		// 查询所有表数据
		$cinema = \DB::table('cinema') -> get();
		// dd($cinema);
		$hall = \DB::table('hall') -> get();
		// dd($hall);
		$movie = \DB::table('movie') -> get();
		$date = \DB::table('date') -> get();
		$time = \DB::table('time') -> get();
		return view('admin.project.add',['title' => '放映添加','cinema' => $cinema,'hall' => $hall,'movie' => $movie,'date' => $date,'time' => $time]);
	}

	//
	public function insert(Request $request)
	{
		// 获取表单所提交的数据
		$data = $request -> except('_token');
		// dd($data);

		// 判断
		if($data)
		{
				
			 $data['status'] = 1;
			 $data['path'] = 0;
					   
		}

		// 执行添加
		$res = \DB::table('project') -> insert($data);

		// 判断
		if($res)
		{
			return redirect('/admin/project/index') -> with(['info' => '添加成功']);
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
		$data = \DB::table('project') ->where('cinema_id','like','%'.$keywords.'%') -> paginate($num); 

		return view('admin.project.index',['request' => $request ->all(),'title' => '放映列表','data' => $data]);
	}




	// 电影放映编辑页面
	public function edit($id)
	{
		// 查询
		$data = \DB::table('project') -> where('id', $id) -> first();
		// dd($data);
		$cinema = \DB::table('cinema') -> get();
		$hall = \DB::table('hall') -> get();
		$movie = \DB::table('movie') -> get();
		$date = \DB::table('date') -> get();
		$time = \DB::table('time') -> get();


		// $res = \DB::table('date') -> get();

		// 发送数据
		return view('admin.project.edit',['title' => '放映编辑','cinema' => $cinema,'hall' => $hall,'movie' => $movie,'date' => $date,'time' => $time,'data' =>$data]);
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
		$res = \DB::table('project') -> where('id',$id) -> update($data);
		// dd($res);

		// 判断
		if($res)
		{
			return redirect('/admin/project/index') -> with(['info' => '修改成功']);
		}else
		{
			return back() -> with(['info' => '修改失败']);
		}

	}

	public function delete($id)
	{
		$res = \DB::table('project') -> delete($id);

		// 判断
		if($res)
		{
			return redirect('/admin/project/index') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}
}
