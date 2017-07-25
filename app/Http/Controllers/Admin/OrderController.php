<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // add
	public function add()
	{
		//查询电影表
		$movie = \DB::table('movie') -> get();
		// dd($movie);
		$users = \DB::table('users') -> get();
		// dd($users);
		$project = \DB::table('project') -> get();
		// dd($project);
		$hall = \DB::table('hall') -> get();
		// dd($hall);
		$time = \DB::table('time') -> get();
		// dd($time);
		return view('admin.order.add',['title'=>'订单添加','movie'=>$movie,'users'=>$users,'time'=>$time,'hall'=>$hall]);
	}

	public function insert(Request $request)
	{
		// 获取表单所提交的数据
		$data = $request -> except('_token');
		// dd($data);

		// 执行添加
		$res = \DB::table('order') -> insert($data);

		// 判断
		if($res)
		{
			return redirect('/admin/order/index') -> with(['info' => '添加成功']);
		}else
		{
			return back() -> with(['info' =>'添加失败' ]);
		}
	}

	// index 用户的列表页
	public function index(Request $request)
	{	
		// 获取值
		$num = $request -> input('num', 10);
		$keywords = $request -> input('keywords', '');

		// return '用户列表';
		// 查询值数据库
		$data = \DB::table('order') ->where('movie_name','like','%'.$keywords.'%') -> paginate($num); 	// (like 代表模糊查询 $num 代表一页的条数)
		// dd($data);
		// 发送数据过去
		return view('admin.order.index',['request' => $request ->all(), 'title' => '订单列表','data' => $data]);
	}

    // 删除 
    public function delete(Request $request,$id)
    {
        if($id == $request->id)
        {
            //执行删除
            $res = \DB::table('order')->where('id',$id)->delete();
            if($res)
            {
                return redirect('/admin/order/index')->with('info','删除成功');
            }else{
                return back()->with('info','删除失败');
            }
        }else{
            return back()->with('info','删除失败');
        }
    }  

	

}
