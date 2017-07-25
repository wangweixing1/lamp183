<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/css/jquery.js"></script>
<link href="/home/css/sub.css" rel="stylesheet" type="text/css" />
<link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<!-- <body style="background:url('/home/images/90.jpg');background-repeat: no-repeat;background-size:80% 70%;"> -->
<body>
<div class="header">
  <div class="top_img">
    <div class="logo"><a href="#"><img src="/images/3.png" width="200" height="80" /></a></div>
    <div class="rx"><img src="/home/images/43.jpg" width="300" height="100" /></div>
    <div class="top_nav">
      <p><a href="#"> 快速订票系统入口</a> </p>
      <p><a href="#"> 最新优惠活动中心</a></p>
    </div>
    <div class="clear"></div>
  </div>
  <div class="menu">
    <ul>
     <li id="a1"><a href="{{ url('/home/index') }}">首　页</a></li>
      <li id="a2"> <a href="{{ url('/home/case/index/0') }}">电影</a></li>
      <li id="a3"><a href="#">榜单</a></li>
      <li id="a4"><a href="#">热点</a></li>
      <li id="a8"><a href="#">优惠专区</a></li>
      <li id="a9"><a href="#">放映时刻表</a></li>
    </ul>
  </div>
</div>
<div class="contenter">
  <div class="left">
    <div class="right_4">
      <h2><span><a href="#"> 更多影片 </a></span>正在上映推荐 </h2>
      <div class="inner022">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="/home/images/index_r_03_seo.gif"></a></td>
              <td><a href="#">超凡蜘蛛侠</a>
                <p>主演:成龙、谢霆锋</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="/home/images/index_r_03_seo2.gif"></a></td>
              <td><a href="#">复仇者联盟</a>
                <p>主演:周星驰、梁朝伟</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="/home/images/index_r_03_seo3.gif"></a></td>
              <td><a href="#">枕边凶灵</a>
                <p>主演:安德鲁·加菲尔德</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="/home/images/index_r_03_seo4.gif"></a></td>
              <td><a href="#">疯魔美女2</a>
                <p>主演:张静初·李冰冰</p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="ad01"></div>
    
  </div>
  <div class="right">
    
    <div class="right_con">
      <div class="curry">当前位置：<a href="#">电影</a>&nbsp;&nbsp;--&nbsp;&nbsp;<a href="#">蝙蝠侠前传3</a> &nbsp;&nbsp;--&nbsp;&nbsp;确认订购</div>
      <div class="right_content">
        <dl class="contact_list">
          
          <dd><img src="/home/images/order.jpg" width="400" height="80" />



          <form role="form" method="post" action="{{ url('/home/ticket/seat') }}/{{ $movie -> id }}" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="box-body">

            <!--     @if(session('info'))
                <div class="alert alert-danger">
                  {{ session('info') }}
                </div>
                @endif -->
                <!-- 显示验证错误 配合验证规则使用--> 
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <hr>
                <div class="form-group">
                  <li > <label for="exampleInputName">电影</label>: <input type="text" name="movie_name" value="{{ $movie -> movie_name }}" /></li>
                </div>
                <hr>

                <div class="form-group">
                  <li > <label for="exampleInputName">票价</label>: ￥<input  style="color:red;" type="text" name="price" value="{{ $movie -> price }}" /></li>
                </div>
                <hr>

                <label for="exampleInputName">附近影院</label>
                <div class="form-group">
                      @foreach($cinema as $key => $val)
                       
                        <div class="anli_list">
                        <ul>
                            <a class="cinema" value="{{ $val->id }}" href="#">  {{ $val -> cinema_name }}<input type="radio" name="cinema_name" value="{{ $val -> cinema_name }}"></a>
                      </ul>
                      </div>
                    @endforeach    
                </div>
                <hr>

                 <div id="clo" style="display:none;">     
                        <div class="anli_list">
                            <ul>
                                <label for="exampleInputName">
                                
                                      <a class="bbb" href="#"> 22</a><input type="radio" name="hall_name" value="1">
                        
                                </label>
                           </ul>
                      </div>
                </div>


                <label for="exampleInputName">影厅</label>
               <div class="aaa"></div>
               <div class="aaa"></div>
               <div class="aaa"></div>
               <div class="aaa"></div>

                <hr>

                <label for="exampleInputName">日期</label>
                <div class="form-group">
                      @foreach($date as $key => $val)
                      
                        <div class="anli_list">
                        <ul>
                            <a class="date" value="{{ $val->id }}" href="#">  {{ $val -> date_name }}<input type="radio" name="date_name" value="{{ $val -> date_name }}"></a>
                      </ul>
                      </div>
                    @endforeach    
                </div>
                <hr>

                <div id="clo1" style="display:none;">     
                        <div class="anli_list">
                            <ul>
                                <label for="exampleInputName">
                                      <a class="ddd" href="#"> 22</a><input type="radio" name="time_name" value="3">
                                </label>
                           </ul>
                      </div>
                </div>
                <label for="exampleInputName">放映时间</label>
               <div class="ccc"></div>
               <div class="ccc"></div>
               <div class="ccc"></div>
               <div class="ccc"></div>
                          
              </div>
              <!-- /.box-body -->
                <hr>
              <div class="box-footer">
              
                  <button type="submit" class="btn btn-warning">选座</button>
                <!-- <a href="{{ url('/home/ticket/seat') }}"><input class="btn btn-warning" type="button" value="选座"></a> -->
                <!-- <button type="submit" class="btn btn-primary">确认提交</button> -->
              </div>
            </form>

          </dd>
        </dl>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div class="footer">
  <div class="footer_nav">领悟科技旗下：电影售票系统&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">热门影片</a> | <a href="#">正在热映</a> | <a href="#">即将上映</a> | <a href="#">经典回味</a> | <a href="#">全球首映</a> | <a href="#">热门活动</a> | <a href="#">优惠专区</a> | <a href="#">放映时刻表</a> | <a href="#">公司新闻</a> | <a href="#">领悟科技</a> </div>
  <p>您是305818 位访客  欢迎您的光临！<br />
    海南领悟科技 版权所有 豫ICP备01025000148号 <br />
    广告部：0371-6699999 / 668888 业务部：0371-6677777 / 66555577 / 66665555 / 155998899 </p>


    <script src="/home/css/jquery.min.js"></script>

    <script type="text/javascript">

        // 添加单机事件
        $('.cinema').on('click',function()
        {
            // 清空数据
            $(".aaa").empty();

            // 获取当前id
            var res = $(this).attr('value');
        
            // 书写ajax
            $.ajax('/home/ticket/CinemaAjax', {
                type: 'get',
                data: {res:res},
                success: function(data){
                 

              // 遍历
                    $.each(data,function(i, n)
                    {   

                           // console.log(n);
                        // 克隆
                        var newDl = $('#clo').clone();

                        newDl.find('.bbb').html(n['hall_name']);
                        newDl.find('.bbb').next("input").val(n['hall_name']);

                        // 显/示
                        newDl.css('display','block');
      
                        // 取模
                        var index = i%4;

                        // 追加   
                        $('.aaa').eq(index).append(newDl); 

                    });
                },
                error: function(){
                    alert('数据异常');
                },
                dataType: 'json'
            });
        });


           // 添加单机事件
        $('.date').on('click',function()
        {
            // 清空数据
            $(".ccc").empty();

            // 获取当前id
            var res = $(this).attr('value');
        
            // 书写ajax
            $.ajax('/home/ticket/DateAjax', {
                type: 'get',
                data: {res:res},
                success: function(data){

              // 遍历
                    $.each(data,function(i, n)
                    {   
                        // 克隆
                        var newDl = $('#clo1').clone();

                        newDl.find('.ddd').html(n['time_name']);
                        newDl.find('.ddd').next("input").val(n['time_name']);

                        // 显/示
                        newDl.css('display','block');
        
                        // 取模
                        var index = i%4;

                        // 追加
                        $('.ccc').eq(index).append(newDl);
                    });
                },
                error: function(){
                    alert('数据异常');
                },
                dataType: 'json'
            });
        });

    </script>
</div>
</body>
</html>
