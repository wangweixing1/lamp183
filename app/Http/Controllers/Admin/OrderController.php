<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //加载订单列表
    public function index()
    {
    	return view('admin.order.index',['title' => '订单列表']);
    }
}
