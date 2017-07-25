<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class comingController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		// return '用户列表';
		// 查询值数据库
		$data = \DB::table('coming') ->where('coming_name','like','%'.$keywords.'%') -> paginate($num);     // (like 代表模糊查询 $num 代表一页的条数)

		// dd($data);
		// 发送数据过去
		
		// 页面展示数据
		return view('admin.coming.index',['title' => '即将上映列表','data' => $data,'request' => $request ->all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// 页面展示数据
		return view('admin.coming.add',['title' => '热映添加']);
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
		$this->validate($request, [
			// 规则验证
			'coming_name' => 'required|unique:coming',
			'coming_price' => 'required',
			'coming_img' => 'required|image'
		],[
			'coming_name.required' => '电影名不能为空',
			'coming_name.unique' => '该电影已经存在',
			'coming_price.required' => '价格不能为空',
			'coming_img.required' => '电影图片不能为空',
			'coming_img.image' => '请上传图片'
		]);

		// 获取数据
		$data = $request -> except('_token');
		// dd($data);

		// // 判断
		if($data)
		{
			
			$data['status'] = 1;
			$data['pid'] = 0;
			// $data['coming_depict'] = '描述';
				   
		}

		// 处理图片 
		if($request -> hasFile('coming_img'))
		{
			if($request -> file('coming_img') -> isValid())
			{
				// 获取扩展名
				$ext = $request -> file('coming_img') -> extension();

				// 随机文件名
				$filename = time().mt_rand(1000000,9999999).'.'.$ext;

				// 移动
				$request -> file('coming_img') -> move('./uploads/coming_img',$filename);

				// 添加 dada 数据
				$data['coming_img'] = $filename;
			}
		}

		// 执行添加
		$res = \DB::table('coming') -> insert($data);
		// dd($res);

		// 判断
		if($res)
		{
			// with是存入session需要显示要在对应的模块获取session
			return redirect('/admin/coming') -> with(['info' => '添加成功']);
		}else
		{
			return back() -> with(['info' => '添加失败']);
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
		// 查询
        		$data = \DB::table('coming') -> where('id',$id) -> first();
        		// dd($data);

        		// 发送数据
        		return view('admin.coming.edit',['title' => '热映编辑','data' => $data]);
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
		$data = $request -> except('_token','_method');
        		// dd($data);

        		// 查询旧图片
        		$oldMovie_img = \DB::table('coming') -> where('id',$request -> id) -> first() -> coming_img;

        		if($request -> hasFile('coming_img'))
        		{
            			if($request -> file('coming_img') -> isValid())
            			{
                			// 获取扩展名
                			$ext = $request -> file('coming_img') -> extension();

                			// 随机文件名
                			$filename = time().mt_rand(1000000,9999999).'.'.$ext;

                			// 移动
                			$request -> file('coming_img') -> move('./uploads/coming_img',$filename);

                			// 删除旧图片
                			// 首先判断在不在
                			if(file_exists('./uploads/coming_img/'.$oldMovie_img) && $oldMovie_img != 'default.jpg')
                			{
                    				unlink('./uploads/coming_img/'.$oldMovie_img);
                			}


                			// 添加 dada 数据
                			$data['coming_img'] = $filename;
            			}
        		}
        		// 执行修改
        		$res = \DB::table('coming') -> where('id',$id) -> update($data);

        		// 判断
        		if($res)
        		{
            			return redirect('/admin/coming') -> with(['info' => '修改成功']);
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
		//查询一条数据
        		$res = \DB::table('coming') -> where('id',$id) -> first();

       		// 执行删除
        		$res = \DB::table('coming') -> delete($id);
        		// 判断
        		if($res)
        		{
            			return redirect('/admin/coming') -> with(['info' => '删除成功']);
        		}else
        		{
            			return back() -> with(['info' => '删除失败']);
        		}
	}
}
