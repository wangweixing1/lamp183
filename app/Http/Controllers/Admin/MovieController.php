<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 

        // 获取值
        $num = $request -> input('num', 10);
        $keywords = $request -> input('keywords', '');

        // return '用户列表';
        // 查询值数据库
        $data = \DB::table('movie') ->where('movie_name','like','%'.$keywords.'%') -> paginate($num);     // (like 代表模糊查询 $num 代表一页的条数)

        // 查询类别表
         $res = \DB::table('category') -> get();

        // dd($data);
        // 发送数据过去
        
        // 页面展示数据
        return view('admin.movie.index',['title' => '电影列表','data' => $data,'res' => $res,'request' => $request ->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 查询数据库获取分类表中的所有数据并发送到页面遍历
        $data = \DB::table('category') -> get();

        // 页面展示数据
        return view('admin.movie.add',['title' => '电影添加','data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request -> all());
        $this->validate($request, [
            // 规则验证
            'movie_name' => 'required|unique:movie',
            'price' => 'required',
            'movie_img' => 'required|image'
        ],[
            'movie_name.required' => '电影名不能为空',
            'movie_name.unique' => '该电影已经存在',
            'price.required' => '价格不能为空',
            'movie_img.required' => '电影图片不能为空',
            'movie_img.image' => '请上传图片'
        ]);

        // 获取数据
        $data = $request -> except('_token');
        // dd($data);

        // 判断
        if($data)
        {
            
            $data['status'] = 1;
            // $data['depict'] = '描述';
                   
        }

        // 处理图片 
        if($request -> hasFile('movie_img'))
        {
            if($request -> file('movie_img') -> isValid())
            {
                // 获取扩展名
                $ext = $request -> file('movie_img') -> extension();

                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;

                // 移动
                $request -> file('movie_img') -> move('./uploads/movie_img',$filename);

                // 添加 dada 数据
                $data['movie_img'] = $filename;
            }
        }

        // 执行添加
        $res = \DB::table('movie') -> insert($data);

        // 判断
        if($res)
        {
            // with是存入session需要显示要在对应的模块获取session
            return redirect('/admin/movie') -> with(['info' => '添加成功']);
        }else
        {
            return back() -> with(['info' => '添加失败']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 查询
        $data = \DB::table('movie') -> where('id',$id) -> first();
        $res = \DB::table('category') -> get();
        // dd($data);

        // 发送数据
        return view('admin.movie.edit',['title' => '电影编辑','data' => $data,'res' => $res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> except('_token','_method');
        // dd($data);

        // 查询旧图片
        $oldMovie_img = \DB::table('movie') -> where('id',$request -> id) -> first() -> movie_img;

        if($request -> hasFile('movie_img'))
        {
            if($request -> file('movie_img') -> isValid())
            {
                // 获取扩展名
                $ext = $request -> file('movie_img') -> extension();

                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;

                // 移动
                $request -> file('movie_img') -> move('./uploads/movie_img',$filename);

                // 删除旧图片
                // 首先判断在不在
                if(file_exists('./uploads/movie_img/'.$oldMovie_img) && $oldMovie_img != 'default.jpg')
                {
                    unlink('./uploads/movie_img/'.$oldMovie_img);
                }


                // 添加 dada 数据
                $data['movie_img'] = $filename;
            }
        }
        // 执行修改
        $res = \DB::table('movie') -> where('id',$id) -> update($data);

        // 判断
        if($res)
        {
            return redirect('/admin/movie') -> with(['info' => '修改成功']);
        }else
        {
            return back() -> with(['info' => '修改失败']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查询一条数据
        $res = \DB::table('movie') -> where('tid',$id) -> first();

        // 执行删除
        $res = \DB::table('movie') -> delete($id);
        // 判断
        if($res)
        {
            return redirect('/admin/movie') -> with(['info' => '删除成功']);
        }else
        {
            return back() -> with(['info' => '删除失败']);
        }
    }
}
