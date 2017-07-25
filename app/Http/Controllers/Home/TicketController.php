<?php

namespace App\Http\Controllers\Home;

// use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    // 详情页
    public function index($id)
    {
    	// dd($id);
    	// 查询数据库
    	$showing = \DB::table('showing') -> get();

    	// 单表查
    	// $data = 'SELECT * FROM movie t1 , category t2 WHERE t1.tid= t2.id';
	
    	$movie = \DB::table('movie') -> where('id',$id) -> first();	
    	// dd($movie);

    	$tid = $movie -> tid;

    	$category = \DB::table('category') -> where('id',$tid) -> first();

    	// 多表查
    	// $movie = \DB::table('movie')
            // ->join('category', 'movie.tid', '=', 'category.id')
            // ->where('movie.id',$id)
            // ->select('movie.*', 'category.*')
            // ->first();
    	// dd($movie);
    	// 加载详情页
    	// return view('home.ticket.index',['title' => '电影简介','showing' => $showing,'movie' => $movie,'category' => $category]);
    	return view('home.ticket.index',['title' => '电影简介','showing' => $showing,'movie' => $movie,'category' => $category]);
    }

    // 加载购票页
    public function ticket($id)
    {   
    	// 查询电影表
    	$movie = \DB::table('movie') -> where('id',$id) -> first();

    	// 查询影厅表
    	$hall = \DB::table('hall')->get();
    	// dd($hall);
    	// foreach($hall as $key=>$val){
    	// 	$tid[$key]= $val->tid;
    	// }
    	// dd($tid);
    	// dd($hall[0]->tid);
    	// dd($hall);
    	// $tid = $hall[0]->'tid';
    	// dd($tid);

    	// 查询影院表
    	$cinema = \DB::table('cinema')-> get();

    	// 查询日期表
    	$date = \DB::table('date')-> get();

    	// 加载购票页
    	return view('home.ticket.add',['title' => '购票','movie' => $movie,'cinema' => $cinema,'hall' => $hall,'date' => $date]);
    }


    //CinemaAjax
    public function CinemaAjax(Request $request)
    {

    	//获取ajax传递过来的参数
    	$data = $request->res;
    	
    	//查询影厅表中的数据
    	$res = \DB::table('hall')->where('tid', $data)->get();
    	// dd($res);
    
    	// JSON响应
    	return response()->json($res);
    }

    //DateAjax
    public function DateAjax(Request $request)
    {

    	//获取ajax传递过来的参数
    	$data = $request->res;
    	
    	//查询数据库中的数据
    	$res = \DB::table('time')->where('tid', $data)->get();
    	// dd($res);
    
    	// JSON响应
    	return response()->json($res);
    }

    public function seat(Request $request,$id)
    {	
    	// $redis = new Redis();
    	// echo $redis -> ping();
    	// 获取表单提交信息
    	$data = $request -> except('_token');
            // dd($data);
    	$sets = [];
    	// 查询电影表
    	$movie = \DB::table('movie') -> where('id',$id) -> first();
            // dd($data['movie_name']);trim
    	$res = \DB::table('order') -> orwhere('mid',$id) -> where('price',$data['price']) -> where('date',$data['date_name']) -> where('time',$data['time_name']) -> where('hall_name',$data['hall_name']) ->where('cinema_name',$data['cinema_name']) -> where('movie_name',$data['movie_name'])-> get();
            // dd($res);

    	foreach($res as $k){
    		$sets[] = $k->set;
    	}
    	$sets = implode(',', $sets);
    	// 加载选座页
    	return view('home.ticket.seat',['title' => '选座','movie' => $movie,'data' => $data,'sets'=>$sets]);
    }

    // 选座-现在预订
    public function ajax(Request $request)
    {	
            // 获取选定的座位
	$set = $request->input('ids');

            // 判断是否为空
            if(empty($set))
            {
                return response()->json('2');
            }

            // 拼接
    	$data['set'] = implode(',',$set);

    	//获取电影id
            $data['mid'] = $request->input('mid');

            // 获取电影名
    	$data['movie_name'] = $request->input('movie_name');

            // 获取电影价格
            $data['price'] = $request->input('price');	

    	//生成订单
    	$data['num'] = time().mt_rand(10000,99999);

    	//修改订单状态
    	$data['status'] = 1;

            //设置日期
            $data['date'] = $request->input('date');

            //获取时间
            $data['time'] = $request->input('time');

            // 获取影城
             $data['cinema_name'] = $request->input('cinema_name');

            //获取影厅
            $data['hall_name'] = $request->input('hall_name');

    	//插入数据库
    	$res = \DB::table('order')->insert(
    		$data
    		);
    	
    	//判断
    	if($res){

    		//状态0 生成订单成功
    		return response() -> json('0');
    	}else{
    		//状态1 生成订单失败
    		return response() -> json('1');
    	}
    }

    // 测试
    public function cache()
    {
    	$minutes = 10;
    	\Cache::put('key','value',$minutes);

    	$value = \Cache::get('key');
    	// dd($value);

    	$value = \Cache::remember('users', $minutes, function () {
    		return \DB::table('users')->get();
	});
    	// dd($value);
    }
}
