<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/css/jquery.js"></script>
<link href="/home/css/sub.css" rel="stylesheet" type="text/css" />
<link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
  
</style>
</head>
<body>
<div class="header">
  <div class="top_img">
    <div class="logo"><a href="#"><img src="/images/3.png" width="200" height="80" /></a></div>
    <div class="rx"><img src="/home/images/topad.gif" width="500" height="100" /></div>
    <div class="top_nav">
      <p><a href="#"> 登录</a> </p>
      <p><a href="#"> 注册</a></p>
    </div>
    <div class="clear"></div>
  </div>
  <div class="menu">
    <ul>
      <li id="a1"><a href="{{ url('/home/index') }}">首　页</a></li>
      <li id="a2"> <a href="{{ url('/home/case/index/0') }}">电影</a></li>
      <li id="a3"><a href="{{ url('/home/list/index') }}">榜单</a></li>
      <li id="a4"><a href="{{ url('/home/hot/index') }}">热点</a></li>
      <li id="a8"><a href="#">优惠专区</a></li>
      <li id="a9"><a href="{{ url('/home/time/index') }}">放映时刻表</a></li>
    </ul>
  </div>
</div>
<div class="contenter">
    <div class="left">
        <div class="left_1">
            <h2>类型</h2>
            <div class="left_1_con">
            <ul class="left_nav">
                    <li><a  id="ddd"style="display: block;" href="{{ url('/home/case/index/0') }}"  value="" >全部</a></li>
                </ul>
            @foreach($category as $key => $val)
                <ul class="left_nav">
                    <li><a class="two" href="#"  value="{{ $val->id }}" >{{ $val -> name }}</a></li>
                </ul>
            @endforeach
            </div>
        </div>
        <div class="ad01"></div>
        
    </div>
    <div class="right">
 <div class="pbanner">
              <script language='javascript'>
        linkarr = new Array();
        picarr = new Array();
        textarr = new Array();
        var swf_width=728;
        var swf_height=190;
        var files = "";
        var links = "";
        var texts = "";
        
        //这里设置调用标记
        linkarr[1] = "http://www.baidu.com";
        picarr[1]  = "images/b02.jpg";
        textarr[1] = "";
        linkarr[2] = "http://www.baidu.com";
        picarr[2]  = "images/b01.jpg";
        textarr[2] = "";
            linkarr[3] = "http://www.baidu.com";
        picarr[3]  = "images/b03.jpg";
        textarr[3] = "";
    
        
        for(i=1;i<picarr.length;i++){
          if(files=="") files = picarr[i];
          else files += "|"+picarr[i];
        }
        for(i=1;i<linkarr.length;i++){
          if(links=="") links = linkarr[i];
          else links += "|"+linkarr[i];
        }
        for(i=1;i<textarr.length;i++){
          if(texts=="") texts = textarr[i];
          else texts += "|"+textarr[i];
        }
        document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
        document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
        document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
    </script></div>
     <div class="right_con">
     <div class="curry">当前位置：<a href="#">首页</a>&nbsp;&nbsp;--&nbsp;&nbsp;<a href="#">电影</a></div>
     <div class="product_search" style="padding-top:15px;">
        <form id="form" action="{{ url('/home/case/index') }}" method="get">
            <input id="tid" type="hidden" name="tid" value="" />
            <div class="row">
                <div class="col-md-2">
                    <!-- select --> 
                    <div class="form-group">
                        <select name="num" class="form-control">
                            <option value="5"
                                @if(!empty($request['num']) && $request['num'] == '5')
                                    selected="selected" 
                                @endif
                                >5
                            </option> {{-- <!-- @if($request['num'] == '10')   selected="selected"    @endif    判断保持状态--> --}}
                            <option value="10"
                                @if(!empty($request['num']) && $request['num'] == '10')
                                    selected="selected" 
                                @endif
                                >10
                            </option>
                            <option value="15"
                                @if(!empty($request['num']) && $request['num'] == '15')
                                    selected="selected" 
                                @endif
                                >15
                            </option>
                            <option value="20"
                                @if(!empty($request['num']) && $request['num'] == '20')
                                    selected="selected" 
                                @endif
                                >20
                            </option>
                            <option value="25"
                                @if(!empty($request['num']) && $request['num'] == '25')
                                    selected="selected" 
                                @endif
                                >25
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-6 ">
                    <div class="input-group input-group">

                        {{-- <!--  value="{{ $request['keywords'] }}"  保持状态--> --}}
                        <input value="{{ $request['keywords'] or ' ' }}" name="keywords" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info btn-flat">搜索</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
     <div class="right_content">
   <div id ="ccc"> 
@foreach($movie as $key => $val)
   <dl class="anli_list">
          <dt><a href="{{ url('/home/ticket/index') }}/{{ $val -> id }}"><img src="/uploads/movie_img/{{ $val -> movie_img }}" width="150" height="100" /></a></dt>
          <dd><a href="{{ url('/home/ticket/index') }}/{{ $val -> id }}">《{{ $val -> movie_name }}》 </a>
            <p>
              <a href="{{ url('/home/ticket/ticket') }}/{{ $val -> id }}"><input name="" type="button" class="dgbg012" value="马上购票" /></a>
            </p>
          </dd>
    </dl>
    @endforeach 
  
    </div>
        <dl id="clo" style="display:none;" >
          <dt><a href="#"><img src="/uploads/movie_img/14993998767042612.jpeg" width="150" height="100" /></a></dt>
            <dd><a class="bbb" href="#">name </a>
              <p>
                <input name="" type="button" class="dgbg012" value="马上购票" />
              </p>
          </dd>
        </dl>
            <div class ="aaa"> 
               
            </div>
            <div class ="aaa"> 
               
            </div>              
            <div class ="aaa"> 
               
            </div> 
            <div class ="aaa"> 
           
        </div> 


<div class="clear"></div>


              <!-- {{ $movie  -> appends($request) -> links() }} -->
              {{ $movie->links() }}

        </div>
</div>
     </div>
    </div>
   
<script src="/home/css/jquery.min.js"></script>

    <script type="text/javascript">

        // 添加单机事件
        $('.two').on('click',function()
        {
            // 清空数据
            // $("#ccc").empty();
            // $(".aaa").empty();

            // 获取当前id
            var res = $(this).attr('value');
            location.href="/home/case/index/"+res;
            // console.log(res);
            // $("#tid").attr('value',res);
            // // 书写ajax
            // $.ajax('/home/case/ajax', {
            //     type: 'get',
            //     data: {res:res},
            //     success: function(data){
            //     // console.log(data);

            //         // 遍历
            //         $.each(data,function(i, n)
            //         {   

            //             // 克隆
            //             var newDl = $('#clo').clone();

            //             // 拼装路径
            //             newDl.find('img').attr('src','/uploads/movie_img/'+n['movie_img']);
            //             // console.log(n['movie_name']);
            //             newDl.find('.bbb').html('《'+n['movie_name']+'》');

            //             // 删除原来属性
            //             newDl.removeAttr('id');

            //             // 添加新的属性
            //             newDl.attr('class','anli_list');

            //             // 显示
            //             newDl.css('display','block');
            //             // console.log(newDl);

            //             // 取模
            //             var index = i%4;

            //             // 追加
            //             $('.aaa').eq(index).append(newDl);
            //         });
            //     },
            //     error: function(){
            //         alert('数据异常');
            //     },
            //     dataType: 'json'
            // });
        });


    // alert($);


    </script>
</div>
 <div class="clear"></div>
</div>
<div class="footer">
  <div class="footer_nav">     领悟科技旗下：电影售票系统&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">热门影片</a> | <a href="#">正在热映</a> | <a href="#">即将上映</a> | <a href="#">经典回味</a> | <a href="#">全球首映</a> | <a href="#">热门活动</a> | <a href="#">优惠专区</a> | <a href="#">放映时刻表</a> | <a href="#">公司新闻</a> | <a href="#">领悟科技</a> </div>
  <p>您是305818 位访客  欢迎您的光临！<br />
    海南领悟科技 版权所有 豫ICP备01025000148号 <br />
    广告部：0371-6699999 / 668888 业务部：0371-6677777 / 66555577 / 66665555 / 155998899  </p>
</div>
</body>
</html>