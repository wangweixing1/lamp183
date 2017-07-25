<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    //加载列表页,
    public function index(Request $request,$tid)
    {
    	// 获取值
    	// if($request->has('tid'))
    	// {
    	// 	$tid = $request->input('tid');
    	// }else{
    	// 	$tid = 0;
    	// }

    	$num = $request -> input('num', 12);
	$keywords = $request -> input('keywords', '');
    	// if($tid==0 )
    	// {
    		// $movie = \DB::table('movie') ->where('movie_name','like','%'.$keywords.'%')-> paginate($num); 	
    	// }else
    	// {
    	// 	$movie = \DB::table('movie') ->where('movie_name','like','%'.$keywords.'%') ->where('tid',$tid)-> paginate($num); 
    	// }
    	
	
	if($tid==0)
	{
		$movie = \DB::table('movie') ->where('movie_name','like','%'.$keywords.'%')-> paginate($num); 	
	}else
	{
		$movie = \DB::table('movie') ->where('movie_name','like','%'.$keywords.'%') ->where('tid',$tid)-> paginate($num); 	
	}
    	// 查询数据库

    	$movie = \DB::table('movie') -> get();
        $frinedship = \DB::table('frinedship') -> get();
    	$category = \DB::table('category') -> get();

    	// 加载页面并发送数据
    	return view('home.case.index',['title' => '电影列表页','frinedship' => $frinedship,'movie' => $movie,'category' => $category]) ->with(['info' => '更新成功']);
    }

    //ajax
    public function ajax(Request $request){

    	//获取ajax传递过来的参数
    	$data = $request->res;
    	
    	//查询数据库中的数据
    	$res = \DB::table('movie')->where('tid', $data)->get();
    	// dd($res);
    
    	// JSON响应
    	return response()->json($res);
    }
}
