<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // 订单
     public function index()
	{	
		$order = \DB::table('order') -> get();
		// dd($order);	
		return view('home.order.index',['title' => '电影订单','order'=>$order]);
	}
}
