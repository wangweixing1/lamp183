<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title }}</title>
<link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<link href="/home/css/sub.css" rel="stylesheet" type="text/css" />
<!-- <link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->

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
  @foreach($config as $key => $val)
    <div class="logo"><a href="{{ url('/home/index') }}"><img src="/uploads/logo_img/{{ $val -> logo }}" width="200" height="80" /></a></div>
  @endforeach 
    <div class="rx"><img src="/home/images/000.jpg" width="500" height="100" /></div>
    <div class="top_nav">
      <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/login') }}"> 登录 </a>  <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/regist') }}"> 注册 </a> <a style="padding:2px 2px;" class="btn btn-info" href="{{ url('/home/center') }}">  个人中心  </a>
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
    <div class="right_4">
      <h2><span><a href="{{ url('/home/case/index/0') }}"> 更多影片 </a></span>正在热播影片</h2>
      <div class="inner022">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
         
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="/uploads/showing_img/{{ $showing -> showing_img }}"></a></td>
              <td><a href="#">《{{ $showing -> showing_name }}》</a>
                <p>{{ $showing -> showing_depict }}</p></td>
            </tr>
         
          </tbody>
        </table>
      </div>
    </div>
    <div class="ad01"></div>
    
  </div>
  <div class="right">
    <div class="right_con">
      <div class="curry">当前位置：<a href="#">电影</a>&nbsp;--&nbsp;<a href="#"> 蝙蝠侠前传3</a></div>
      <div class="right_content">
        <div class="product_info">
          <div class="product_info_xx">
      
            <div class="product_info_img" align="center">
                  <img src="/uploads/showing_img/{{ $showing -> showing_img }}"  /> 
                  <a href="{{ url('/home/ticket/ticket') }}/{{ $showing -> id }}"><input name="" type="button" class="dgbg02" value="马上购票" /></a>
            </div>
            <div class="lineh_255" style="padding-left:10px;">
            <div class="t_14">《{{ $showing -> showing_name }}》</div>
              <p><span>价格：￥</span><span style="color:red;">{{ $showing -> showing_price }}</span></p>
              <p><span>剧情简介：</span>{{ $showing -> showing_depict }}</p>
            </div>
           
          </div>

        <div class="taber">
        <div id="nav"> 
	<ul>
		<li>影片排期</li>
		<li>大幅剧照</li>
		<li>故事梗概</li>
		<li>部分影评</li>		
	</ul>
</div>
<div id="nav_content">
   	<div style="display:none"> <table style="width:100%;" >
        <tbody>
            <tr>
                <th width="15%">放映时间</th>
                <th width="15%">影厅空位</th>
                <th width="15%">语言</th>
                <th width="15%">版本</th>
                <th width="15%">票价</th>
                <th width="25%">购票</th>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
            <tr>
            	<td>11:20</td>
                <td>余98/128总</td>
                <td>国语</td>
                <td>3D</td>
                <td>50元</td>
                <td><input name="" type="button" class="dgbg02" value="马上购票" /></td>
            </tr>
        </tbody>
    </table></div>
	<div style="display:none"><img src="/home/images/bfx.jpg" width="650" height="436" /></div>
   	<div style="display:none">从他对第三部的定性中，我们也能感受到这种情绪："我们正在弄完整个故事，

这不是什么翻拍，也不是什么'重启'，我们是在收尾，要跟前面已经完成的保

持高度一致。"同时，我们也可以听出，至少诺兰名下的《蝙蝠侠》，只能是三

部曲了。
　　尽管本片的具体情节方面，片方及诺兰本人都一直守口如瓶，仅仅否认了几

个曾经被热议的反派角色。而据电影网站screenrant预测，《黑暗骑士崛起》从

片名到情节走向上看，都有可能借鉴了美国漫画大家弗兰克·米勒（对，那位《

罪恶城市》之父）于1986年创作的《蝙蝠侠：黑暗骑士归来》，该系列短篇连载

漫画一直被视为是80年代中，诞生于30年代的"蝙蝠侠"以成人口味和黑色风格

再度复兴的序曲。
　　根据计划，　《黑暗骑士崛起》（The Dark Knight Rises）将于2011年五月

开拍，2012年7月20日上映。拍摄地包括伦敦、洛杉矶，克里斯蒂安·贝尔

（Christian Bale）、迈克尔·凯恩（Michael Caine）、加里·奥德曼（Gary 

Oldman）都将回归。
</div>
	<div style="display:none">正所谓，没有最细心，只要肯较劲；没有做不到，只要够变态（虽然说得很不压韵，但恰好符合小丑的价值观）。
谁敢说他完全消化了《黑暗骑士》？反正我不敢。就算你认真看了七遍以上，也还是会有不了解甚至不知道的地方。随着你每一次观看所带来的新发现，会渐渐明白，原来这部电影中没有任何一句台词是废话。而且每一句台词都不是单独存在的，它们表达的也绝不只是字面上的意思。有些台词第一次出现的时候，你会觉得平淡无奇，普通得不能再普通了，可是它们一定会与电影中的其它部分产生某种关系的对应，或者起到配合剪辑的作用，更重要的是，那些台词是塑造角色和丰满情节所必不可少的。

那些觉得这部电影"不过如此"的人，你们多大程度上看懂了它？

想起戈达尔曾经为证明斯皮尔伯格是一个平庸的导演而愤怒地说过"如果你真想知道他为什么（平庸），我会在放映室里一个镜头一个镜头地讲给你听！"</div>
</div>
        <!--taber-->
        </div>
         
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
@foreach($config as $key => $val)
 <div class="footer">  
   <p>您是66666 位访客  欢迎您的光临！<br />
     {{$val -> copy}} 版权所有 京ICP备0123456789号</p>
 </div>
 @endforeach
</body>
</html>
