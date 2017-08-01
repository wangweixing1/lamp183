<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>半边天售票系统-{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="/home/css/main3.css" rel="stylesheet" type="text/css">
<link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="/home/css/reset.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="css/jquery.js"></script>
<script language="javascript" type="text/javascript" src="css/yao.js"></script>

<!-- 滑动门 -->
<script  type="text/javascript">   

function scrollDoor(){
}
scrollDoor.prototype = {
  sd : function(menus,divs,openClass,closeClass){
    var _this = this;
    if(menus.length != divs.length)
    {
      alert("菜单层数量和内容层数量不一样!");
      return false;
    }       
    for(var i = 0 ; i < menus.length ; i++)
    { 
      _this.$(menus[i]).value = i;        
      _this.$(menus[i]).onmouseover = function(){
          
        for(var j = 0 ; j < menus.length ; j++)
        {           
          _this.$(menus[j]).className = closeClass;
          _this.$(divs[j]).style.display = "none";
        }
        _this.$(menus[this.value]).className = openClass; 
        _this.$(divs[this.value]).style.display = "block";        
      }
    }
    },
  $ : function(oid){
    if(typeof(oid) == "string")
    return document.getElementById(oid);
    return oid;
  }
}
window.onload = function(){
  var SDmodel = new scrollDoor();
  SDmodel.sd(["m01","m02","m03","m04"],["c01","c02","c03","c04"],"sd01","sd02");

}
</script>
</head>
<body>
<div class="header" >
  <div class="top_img">
  @foreach($config as $key => $val)
    <div class="logo"><a href="{{ url('/home/index') }}"><img src="/uploads/logo_img/{{ $val -> logo }}" width="200" height="80" /></a></div>
  @endforeach 
    <div class="rx"><img src="/home/images/000.jpg" width="500" height="100" /></div>
    <div class="top_nav">
      <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/login') }}"> 登录 </a>  
      <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/regist') }}"> 注册 </a>
      <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/logout') }}"> 退出 </a><br><br> 
      <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/center') }}">  个人中心  </a>
      

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
<div class="banner">
  <div id="YFocus">
    <div id="YImage">
    	<div class="xiongdilian">
			<br/>个人中心  
      <p>
        昵称：<button class="btn btn-danger" type="button">{{ $session -> name }}</button>
      </p>
			</div><br />
				<div class="zuobian">
					<div class="biankuangxian">
						<div class="xinxi"><a href="/home/center">修改信息</a></div>
						<div class="mima"><a href="/home/mima">修改密码</a></div>
						<div class="touxiang"><a href="#">修改头像</a></div>

            @if($res == $session -> id)
            <div class="touxiang"><a href="/home/xiangqing">订单详情</a></div>
            @else
            <div class="touxiang"><a href="">暂无无订单</a></div>
            @endif
					</div>
				</div>
				<form class="" role="form" enctype="multipart/form-data" method="post" action="{{ url('/home/dupdate')}}">
                {{ csrf_field() }}
                @if(session('info'))
                    <div class="form-group">
                        <p class="text-danger">{{session('info')}}</p>
                    </div>
                 @endif
				<div class="youbian">
				<div class="nicheng">电&nbsp;&nbsp;影&nbsp;&nbsp;名:<input type="text" name="name" value="{{ $data ->movie_name }}" size="20px"  readonly="readonly" /></div>
				<div class="youxiang">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格:<input type="text" name="price" value="{{ $data -> price}}" size="20px" readonly="readonly" /></div>
				<div class="youxiang">座&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位:<input name="set"  type="text"readonly="readonly"  value="{{ $data -> set }}"/></div>
        <div class="youxiang">影&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;院:<input name="yt"  type="text" readonly="readonly" value="{{ $data -> cinema_name }}"/></div>
        <div class="youxiang">影&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厅:<input name="yy"  type="text" readonly="readonly" value="{{ $data -> hall_name }}"/ ></div>
         <div class="youxiang">放映日期:<input name="date"  type="text" readonly="readonly"  value="{{ $data -> date }}" /></div>
         <div class="youxiang">放映时间:<input name="csm"  type="text" readonly="readonly"  value="{{ $data -> time }}" /></div>

         @if($data->status==1)
         <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/zhifu') }}"> 去支付 </a></div><br/>
         @else
         <a style="padding:2px 2px;color:red;" class="btn btn-info" href=""> 已支付 </a></div><br/>
         @endif

				</div>
				</form>
		    </div>
  		</div>
	</div>
	<div class="clear"></div>
	<div class="footer">  
  		<p>您是66666 位访客  欢迎您的光临！<br />
  		lamp183 版权所有 京ICP备0123456789号</p>
</div>
</body>
</html>