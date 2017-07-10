<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    // send 
    public function send()
    {
    	// 发送邮件测试
    	// \Mail::raw('这是一封文本邮件',function($message){
    	// 	$message -> to('1003958251@qq.com');
    	// 	$message -> subject('这是邮件的标题');
    	// });

    	// 带有模板的邮件 
    }
}
