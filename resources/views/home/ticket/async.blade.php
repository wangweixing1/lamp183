<?php

// 死循环

while (1)
{
	// 获取队列中定单数量
	$len = \Redis::lsize('list-seats');

	// 判断
	if($len > 0)
	{
		// 弹出一个订单
		$res = $redis -> rpop('list-seats');

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