<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    // 加载日历页面
    public function calendar(Request $request)
    {
	return view('admin.calendar.calendar',['title' => '日历']);
    }

}
