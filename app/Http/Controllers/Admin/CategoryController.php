<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//展示分类列表
		// 查询数据库 查询所有并拼接路径 
		$data = \DB::table('category') -> select("*",\DB::raw("concat(path,',',id) AS sort_path")) -> orderBy('sort_path')-> get();
		// dd($data);

		// 处理数据
		foreach($data as $key => $val)
		{
			// 函数substr_count用来查询某字符串里的某个字符的个数
			$num = substr_count($val -> path,','); 
			
			// 重复空格字符串 并追加到name 字段里
			$data[$key] -> name = str_repeat('|---', $num).$data[$key] -> name;
		}

		// 页面展示数据
		return view('admin.category.index',['title' => '分类列表','data' => $data]);
	}

	/**
	 * Show the form for creating a new resource.
	 *u7
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{     

		// 查询数据库 查询所有并拼接路径 
		$data = \DB::table('category') -> select("*",\DB::raw("concat(path,',',id) AS sort_path")) -> orderBy('sort_path')-> get();
		// dd($data);

		// 处理数据
		foreach($data as $key => $val)
		{
			// 函数substr_count用来查询某字符串里的某个字符的个数
			$num = substr_count($val -> path,','); 
			
			// 重复空格字符串 并追加到name 字段里
			$data[$key] -> name = str_repeat('|---', $num).$data[$key] -> name;
		}
		// dd($data);

		// 发送数据到前台遍历
		return view('admin.category.add',['title' => '分类添加', 'data' => $data]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// dd($request -> all());
		$data = $request -> except("_token");

		// 判断
		if($data['pid'] == 0)
		{
			$data['path'] = 0;
			$data['status'] = 1;
				   
		}else
		{
			 // 查询父 path
			$parent_path = \DB::table('category') -> where('id',$data['pid']) -> first() -> path;
			// dd($path);

			// 拼接需要添加的分类Id
			$data['path'] = $parent_path.','.$data['pid'];
			$data['status'] = 1;
		}
		// dd($data);

		// 执行插入操作
		$res = \DB::table('category') -> insert($data);

		// 判断
		if($res)
		{
			return redirect('/admin/category/create') -> with(['info' => '添加成功']);
		}else
		{
			return redirect('/admin/category/create') -> with(['info' => '添加失败']);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		// 所有分类
		// 查询数据库 查询所有并拼接路径 
		$allData = \DB::table('category') -> select("*",\DB::raw("concat(path,',',id) AS sort_path")) -> orderBy('sort_path')-> get();
		// dd($allData);

		// 处理数据
		foreach($allData as $key => $val)
		{
			// 函数substr_count用来查询某字符串里的某个字符的个数
			$num = substr_count($val -> path,','); 
			
			// 重复空格字符串 并追加到name 字段里
			$allData[$key] -> name = str_repeat('|---', $num).$allData[$key] -> name;
		}

		// echo $id;
		// 查询 当前分类
		$data = \DB::table('category') -> where('id',$id) -> first();

		return view('admin.category.edit',['title' => '分类编辑','data' => $data,'allData' => $allData]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// $id ,当前分类id
		$data = $request -> except('_token','_method');
		// dd($data);
		// 判断
		if($data['pid'] == 0)
		{
			$data['path'] = 0;
			$data['status'] = 1;
				   
		}else
		{
			 // 查询父 path
			$parent_path = \DB::table('category') -> where('id',$data['pid']) -> first() -> path;
			// dd($path);

			// 拼接需要添加的分类Id
			$data['path'] = $parent_path.','.$data['pid'];
			$data['status'] = 1;
		}

		// 执行修改
		$res = \DB::table('category') -> where('id',$id) -> update($data);

		 // 判断
		if($res)
		{
			return redirect('/admin/category') -> with(['info' => '修改成功']);
		}else
		{
			return back() -> with(['info' => '修改失败']);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		// dd($id);
		// 查询一条数据
		$res = \DB::table('category') -> where('pid', $id) -> first();

		// 判断
		if($res)
		{
			return back() -> with(['info' => '有子分类，不允许删除']);
		}

		// 执行删除
		$res = \DB::table('category') -> delete($id);

		// 判断       
		if($res)
		{
			return redirect('/admin/category') -> with(['info' => '删除成功']);
		}else
		{
			return back() -> with(['info' => '删除失败']);
		}
	}

	// 递归查询所有多级分类
	public function getCategoryByPid($pid)
	{
		// 根据pid 查询子分类
		$data = \DB::table('category') -> where('pid',$pid) -> get();
		// return $data;

		// 遍历
		$allData =[];
		foreach($data as $key => $val)
		{
			$val -> sub = $this -> getCategoryByPid($val -> id);
			$allData[] = $val;
		}

		return $data;
	}

	public function get()
	{
		$data = $this -> getCategoryByPid(0);
		dd($data);
	}
}

