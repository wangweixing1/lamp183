<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndentController extends Controller
{
    //订单
    public function indent()
	{
		return view('home.indent.indent',['title' => '订单',]);
	}
}
