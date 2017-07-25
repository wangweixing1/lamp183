<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title }}</title>
<link href="{{ asset ('/home/css/default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset ('/home/css/sub.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
#nav_content table{ margin:0 auto;  border: 1px solid #ccc; border-collapse: collapse;}
#nav_content th,#nav_content td {border: 1px solid #ccc; height: 42px; line-height: 42px; text-align:center;}
#nav_content tbody th {
    background: none repeat scroll 0 0 #F7F7F7;
    color: #000;
  height:30px;
  line-height:30px;
  font-weight:bold;
    text-align: center;
}
</style>
<script>
var net={};
net.tab={};
if (typeof($) == 'undefined') {
  $ = function(elem) {
    if (arguments.length > 1) {
      for (var i = 0, elems = [], length = arguments.length; i < length; i++)
        elems.push($(arguments[i]));
      return elems;
    }
    if (typeof elem == 'string') {
      return document.getElementById(elem);
    } else {
      return elem;
    }
  };
}
//按钮点击时事件
net.tab.objSelect=function(clickobj,obj,elems){
  for(var i=0;i<obj.length;i++)
  {
    obj[i].className="";
    elems[i].style.display="none";
  }
  clickobj.className="selected";
  elems[clickobj.getAttribute("name")].style.display="";
}
//初始话按钮状态
//参数elem:按钮标签id
//参数num:初始时选中标签
net.tab.menuEvent=function(elem,num){
  var objs=$(elem).getElementsByTagName("li");
  var conobjs=$(elem+"_content").getElementsByTagName("div");
  objs[num].className="selected";
  conobjs[num].style.display="";
  net.tab.addEvent(objs,function (){
    net.tab.objSelect(this,objs,conobjs);
  });
}
//添加按钮事件
net.tab.addEvent=function(elems,fun){
  for (var i=0;i<elems.length;i++)
  {
    elems[i].setAttribute("name",i);
    elems[i].onclick=fun;
  }
}
window.onload=function(){
  net.tab.menuEvent("nav",0)
}
</script>
</head>
<body>
<div class="header">
  <div class="top_img">
 <div class="logo"><a href="#"><img src="/images/5.png" width="200" height="80" /></a></div>
 <div class="rx"><img src="{{ asset ('/home/images/topad.gif') }}" width="500" height="100" /></div>
    <div class="top_nav">
      <p><a href="#"> 登录 </a> </p>
      <p><a href="#"> 注册 </a></p>
    </div>
    <div class="clear"></div>
  </div>
  <div class="menu">
    <ul>
      <li id="a1"><a href="{{ url('/home/index') }}">首　页</a></li>
      <li id="a2"> <a href="{{ url('/home/case/index') }}">电影</a></li>
      <li id="a3"><a href="{{ url('/home/list/index') }}">榜单</a></li>
      <li id="a4"><a href="{{ url('/home/hot/index') }}">热点</a></li>
      <li id="a8"><a href="#">优惠专区</a></li>
      <li id="a9"><a href="">放映时刻表</a></li>
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
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/images/index_r_03_seo.gif') }}"></a></td>
              <td><a href="#">超凡蜘蛛侠</a>
                <p>主演:成龙、谢霆锋</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/images/index_r_03_seo2.gif') }}"></a></td>
              <td><a href="#">复仇者联盟</a>
                <p>主演:周星驰、梁朝伟</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/images/index_r_03_seo3.gif') }}"></a></td>
              <td><a href="#">枕边凶灵</a>
                <p>主演:安德鲁·加菲尔德</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/images/index_r_03_seo4.gif') }}"></a></td>
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
      <div class="curry">当前位置：<a href="#">影院</a>&nbsp;--&nbsp;<a href="#"> 放映时刻表</a></div>
      <div class="right_content">
        <div class="product_info">          
        <div class="taber">
        <div id="nav"> 
  <ul>
    <li>放映列表</li>
  </ul>
</div>
<div id="nav_content">
    <div style="display:none">
        <table style="width:100%;" >
            <tbody>
                <tr>
                    <th width="15%">影院</th>
                    <th width="15%">影厅</th>
                    <th width="15%">电影名</th>                    
                    <th width="15%">日期</th>
                    <th width="15%">时间</th>
                    <th width="25%">购票</th>
                </tr>
                @foreach($project as $key => $val)
                <tr>                   
                    <td>{{ $val -> cinema_id }}</td>                   
                    <td>{{ $val -> hall_id }}</td>
                    <td>{{ $val -> movie_id }}</td>                   
                    <td>{{ $val -> date_id }}</td>
                    <td>{{ $val -> time_id }}</td>
                    <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
        <!--taber-->
        </div>
         
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
<div class="bottom ">
    <h2>友情链接 >></h2><br />
    <div class="bottom_con">
        @foreach($frinedship as $key => $val)
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://{{ $val -> url }}">{{ $val -> name }}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| 
        @endforeach
    </div>
  </div>

  <div class="clear"></div>
</div>
<div class="footer">  
  <p>您是66666 位访客  欢迎您的光临！<br />
    lamp183 版权所有 京ICP备0123456789号</p>
</div>
</body>
</html>