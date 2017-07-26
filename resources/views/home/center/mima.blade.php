<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>半边天售票系统-{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="/home/css/main3.css" rel="stylesheet" type="text/css">
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
    <div class="logo"><a href="#"><img src="/images/5.png" width="200" height="80" /></a></div>
    <div class="rx"><img src="images/topad.gif" width="500" height="100" /></div>
    <div class="top_nav">
      <p><a href="{{ url('/home/login') }}"> 登录 </a> </p>
      <p><a href="{{ url('/home/regist') }}"> 注册 </a></p>
    </div>
    <div class="clear"></div>
  </div>
  <div class="menu">
    <ul>
      <li id="a1"><a href="{{ url('/home/index') }}">首　页</a></li>
      <li id="a2"> <a href="{{ url('/home/case/index') }}">电影</a></li>
      <li id="a3"><a href="#">榜单</a></li>
      <li id="a4"><a href="#">热点</a></li>
      <li id="a8"><a href="#">优惠专区</a></li>
      <li id="a9"><a href="#">放映时刻表</a></li>
    </ul>
  </div>
</div>
<div class="banner">
  <div id="YFocus">
    <div id="YImage">
      <div class="xiongdilian">
          <br/>个人中心
        </div><br />
        
        <div class="zuobian">
          <div class="biankuangxian">
            <div class="xinxi"><a href="/home/center">修改信息</a></div>
            <div class="mima"><a href="/home/mima">修改密码</a></div>
            <div class="touxiang"><a href="/home/touxiang">修改头像</a></div>
          </div>
        </div>
        <form class="login-form" action="{{ url('/home/postreset')}}" method="post">
          @if($errors->first())
            <div class="alert alert-danger display-hide" style="display: block;">
              <button class="close" data-close="alert"></button>
              <span>  </span>
            </div>
          @endif
          {!! csrf_field() !!}
        <div class="youbian">
          <div class="nicheng">&nbsp;&nbsp;原密码&nbsp;:<input type="password" name="password" value="" size="20px" placeholder="请输入原密码" /></div><br/>
          <div class="youxiang">&nbsp;&nbsp;新密码&nbsp;:<input type="password" name="password" value="" size="20px" placeholder="请输入新密码" /></div><br/>
          <div class="qq">确认密码:<input type="password" name="password" value="" size="20px" placeholder="请输入确认密码" /></div><br/>
          <div class="querenxiugai"><input type="submit"/></div>
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