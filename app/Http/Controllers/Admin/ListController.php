<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
   //add
    public function add()
    {
        return view('admin.list.add',['title' => '榜单']);
    }

    // insert
	public function insert(Request $request)
	{
		$this->validate($request, [
			// 规则验证
			'list_name' => 'required|unique:list',
            'list_img' => 'required|image'
        ],[
            'list_name.required' => '电影名不能为空',
            'list_name.unique' => '该电影已经存在',            
            'list_img.required' => '电影图片不能为空',
            'list_img.image' => '请上传图片'
        ]);

        // 获取数据
        $data = $request -> except('_token');
        // dd($data);

        // 处理图片 
        if($request -> hasFile('list_img'))
        {
            if($request -> file('list_img') -> isValid())
            {
                // 获取扩展名
                $ext = $request -> file('list_img') -> extension();

                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;

                // 移动
                $request -> file('list_img') -> move('./uploads/list_img',$filename);

                // 添加 dada 数据
                $data['list_img'] = $filename;
            }
        }

        // 执行添加
        $res = \DB::table('list') -> insert($data);

        // 判断
        if($res)
        {
            // with是存入session需要显示要在对应的模块获取session
            return redirect('/admin/list/index') -> with(['info' => '添加成功']);
        }else
        {
            return back() -> with(['info' => '添加失败']);
        }
    }

    // index 榜单列表页
	public function index(Request $request)
	{	
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		
		// 查询值数据库
		$data = \DB::table('list') ->where('list_name','like','%'.$keywords.'%') -> paginate($num); 	// (like 代表模糊查询 $num 代表一页的条数)
		// dd($data);
		// 发送数据过去
		return view('admin.list.index',['request' => $request ->all(), 'title' => '榜单','data' => $data]);
	}

	// edit 编辑榜单
    public function edit($id)
    {
        // 查询
        $res = \DB::table('list') -> where('id', $id) -> first();

        // 发送数据
        return view('admin/list/edit',['title'=>'修改轮播','data'=>$res]);
    }

     public function update(Request $request)
    {   
       $this->validate($request, [
			// 规则验证
			'list_name' => 'required|unique:list',
            'list_img' => 'required|image'
        ],[
            'list_name.required' => '电影名不能为空',
            'list_name.unique' => '该电影已经存在',            
            'list_img.required' => '电影图片不能为空',
            'list_img.image' => '请上传图片'
        ]);

        $data=$request->except('_token');

   
	
		// 查询旧图片
		$oldAvatar = \DB::table('list') -> where('id' ,$request -> id) -> first() -> list_img;
		// dd($oldAvatar);

		if($request -> hasFile('list_img'))
		{
			if($request -> file('list_img') -> isValid())
			{
				// 获取扩展名
				$ext = $request -> file('list_img') -> extension();

				// 随机文件名
				$filename = time().mt_rand(1000000,9999999).'.'.$ext;

				// 移动
				$request -> file('list_img') -> move('./uploads/list_img',$filename);

				// 删除旧图片
				// 首先判断在不在
				if(file_exists('./uploads/list_img/'.$oldAvatar) && $oldAvatar != 'default.jpg')
				{
					unlink('./uploads/list_img/'.$oldAvatar);
				}


				// 添加 dada 数据
				$data['list_img'] = $filename;
			}
		}
		// 添加
		$res = \DB::table('list') -> where('id',$request -> id) -> update($data);

		// 判断
		if($res)
		{
			return redirect('/admin/list/index') -> with(['info' => '更新成功']);
		}else
		{
			return back() -> with(['info' => '更新失败']);
		}
	}


    // 删除 
    public function delete(Request $request,$id)
    {
        if($id == $request->id)
        {
            //执行删除
            $res = \DB::table('list')->where('id',$id)->delete();
            if($res)
            {
                return redirect('/admin/list/index')->with('info','删除成功');
            }else{
                return back()->with('info','删除失败');
            }
        }else{
            return back()->with('info','删除失败');
        }
    }  
}
