<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    //加载列表页
    public function index()
    {
    	// 查询数据库
    	$movie = \DB::table('movie') -> get();
    	$category = \DB::table('category') -> get();

    	// 加载页面并发送数据
    	return view('home.case.index',['title' => '电影列表页','movie' => $movie,'category' => $category]) ->with(['info' => '更新成功']);
    }

    //ajax
    public function ajax(Request $request){

    	//获取ajax传递过来的参数
    	$data = $request->res;
    	
    	//查询数据库中的数据
    	$res = \DB::table('movie')->where('tid', $data)->get();
    	// dd($res);
    
    	return response()->json($res);
    }
}
