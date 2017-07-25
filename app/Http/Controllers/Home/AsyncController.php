<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsyncController extends Controller
{
    //订票后台服务器
    public function async()
    {
    	while (1)
	{
		// 获取值
		$len = \Cache::get('list-seats');

		// 获取对列中的数量
		$len = count($len);
		// dd($len);
		// 判断
		if($len)
		{
			// 获取订单
			$res =  \Cache::get('list-seats');

			
			// 反序列化
			$data = unserialize($res);

			// 标识
			$continue = true;

			// 遍历
			foreach ($data['tickets'] as $key => $value) {

				// 检测当前座位在集合中是否存在
				$res = \Redis::sismembers('set-seats',$value);

				// 判断
				if($res)
				{
					$continue = false;

					// 标识订单无效
					\Redis::set('res_'.$data['num'],0);

					// 跳出当前循环
					break;
				} 
			}
			// 放入集合
			if($continue)
			{
				foreach ($data['tickets'] as $key => $value) {
					\Redis::sadd('set-seats',$value);
				}

				// 标识订单有效
				\Redis::set('res_'.$data['num'],1);
			}
			}else
			{
				sleep(10 );
			}
		}
    	}
}
