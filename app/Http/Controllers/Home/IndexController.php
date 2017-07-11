<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
	{
		$data = \DB::table('movie') -> get();
		// dd($data);
		$res = \DB::table('date') ->get();
		// dd($res);

		return view('home.index.index',['title' => '前台首页','data'=> $data,'res'=>$res]);
	}



}
