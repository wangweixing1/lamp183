<title>{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/style.css">
<script type="text/javascript" src="css/jquery.js"></script>
<link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/css/jquery.js"></script>
<script src="/home/css/jquery.min.js"></script>
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

</script>
</head>
<body>
<div class="header" >

  <div class="top_img">
    <div class="logo"><a href="#"><img src="/images/2.png" width="200" height="80" /></a></div>
    <div class="rx"><img src="images/topad.gif" width="500" height="100" /></div>
    <div class="top_nav">
      <a class="btn btn-info" href="/home/login"> 登录 </a>  <a class="btn btn-info" href="/home/regist"> 注册 </a>
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
  <div id="slider">
   
    <ul class="slides clearfix">
    @foreach($carousel as $key => $val)
        <li><img class="responsive" src="/uploads/carousel_img/{{ $val -> carousel_img }}"></li>
    @endforeach
    </ul>
    
    <ul class="controls">
        <li><img src="images/prev.png" alt="previous"></li>
        <li><img style="margin-right:30px;" src="images/next.png" alt="next"></li>
    </ul>
    <ul class="pagination">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src="/home/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="/home/dist/easySlider.js"></script>
<script type="text/javascript">
    $(function() {
        $("#slider").easySlider( {
            slideSpeed: 500,
            paginationSpacing: "15px",
            paginationDiameter: "12px",
            paginationPositionFromBottom: "20px",
            slidesClass: ".slides",
            controlsClass: ".controls",
            paginationClass: ".pagination"                  
        });
    });
</script>
  
   </div>
   
 </div>
 
 
 <div class="contenter">
   <div class="left">
     <div class="left_4 top10px" style="height:auto;">
       <h2><a href="#">即将上映电影</a></h2>
       <div class="inner">
         @foreach($coming as $key => $val)
         <dl class="anli_list">
         <dt><a href=""><img src="/uploads/coming_img/{{ $val -> coming_img }}" width="150" height="100" /></a></dt>
           <dd><a href="#">《{{ $val -> coming_name }}》</a>           
             <p>
               <input name="" type="button" class="dgbg02" value="马上购票" />
             </p>
           </dd>
         </dl>
        @endforeach
         <div class="clear"></div>
       </div>
     </div>
     <div class="left_4 top10px" style="height:auto;">
       <h2><a href="#">正在热播电影</a></h2>
       <div class="inner">
         @foreach($showing as $key => $val)
         <dl class="anli_list">

           <dt><a href="{{ url('/home/movie/index') }}"><img src="/uploads/showing_img/{{ $val -> showing_img }}" width="150" height="100" /></a></dt>
           <dd><a href="#">《{{ $val -> showing_name }}》</a>           
             <p>
               <input name="" type="button" class="dgbg02" value="马上购票" />
             </p>
           </dd>
         </dl>
        @endforeach
         <div class="clear"></div>
       </div>
     </div>
     <div class="left_5">
       <h2><a href="#">影片预览</a></h2>
       <div class="inner">
         <div id="demo" style="overflow:hidden; width:100%; margin:0 auto;">
           <table border="0" align="center" cellpadding="5" cellspacing="0" cellspace="0" >
             <tr>
               <td id="demo1" valign="top"><table border="0"  cellpadding="0">
                   <tr>
                   @foreach($movie as $key => $val)
                     <td align="center">
                        <dl class="anli_list">
                         <dt><a href="#"><img src="/uploads/movie_img/{{ $val -> movie_img }}" width="150" height="100" /></a></dt>
                         <dd><a href="#">{{ $val -> movie_name }}</a></dd>
                       </dl>
                     </td>
                    @endforeach
                   </tr>
                 </table></td>
               <td id="demo2" valign="top"></td>
             </tr>
           </table>
         </div>
         <script type="text/javascript">
             var speed=30;
             var demo = $("#demo");
             var demo1 = $("#demo1");
             var demo2 = $("#demo2");
             demo2.html(demo1.html());
             function Marquee(){ 
                 if(demo.scrollLeft()>=demo1.width())
                     demo.scrollLeft(0); 
                 else{
                     demo.scrollLeft(demo.scrollLeft()+1);
                 }
             } 
             var MyMar=setInterval(Marquee,speed) 
             demo.mouseover(function() {
                 clearInterval(MyMar);
             } )
             demo.mouseout(function() {
                 MyMar=setInterval(Marquee,speed);
             } )   
     </script> 
        
         <div class="clear"></div>
       </div>
     </div>
     
   </div>
   <div class="right">
     <div class="right_1">
       <h2><span style="color:#000; font-size:14px;">7月18日</span>今日快速订票 </h2>
       <div class="inner02">
         <dl style="border-bottom:0px #fff solid;">
           <dt><img src="images/fa1.gif" width="50" height="45" /></dt>
           <dd style=" padding-top:10px;">
             <select name="">             
               <option selected="selected">郑州电影院</option>
               <option>郑州电影院</option>
               <option>郑州电影院</option>
             </select>
           </dd>
           <div class="clear"></div>
         </dl>
         <dl style="border-bottom:0px #fff solid;">
           <dt><img src="images/fa2.gif" width="56" height="45" /></dt>
           <dd style=" padding-top:10px;">
             <select name="">
               <option selected="selected">影片搜索</option>
               <option>蝙蝠侠前传</option>
               <option>淘金连环计</option>
               <option>流离失所2</option>
             </select>
           </dd>
           <div class="clear"></div>
         </dl>
         <dl  style="border-bottom:0px #fff solid;">
           <dt><img src="images/fa3.gif" width="56" height="45" /></dt>
           <dd style=" padding-top:10px;">
             <select name="">
               <option selected="selected">请选择场次</option>
               
               <option>1</option>
             
             </select>
           </dd>
           <div class="clear"></div>
         </dl>
         <dl>
           <dt><img src="images/fa4.gif" width="56" height="45" /></dt>
           <dd style=" padding-top:10px;">
             <input name="" type="button" class="dgbg" value="立即订购" />
           </dd>
           <div class="clear"></div>
         </dl>
         <div class="wxpd"><img src="" /></div>
       </div>
     </div>
 
     <div class="right_5 top10px">
       <h2>热门影片榜 </h2>
       @foreach($showing as $key => $val)
       <div class="inner01">
         <ul class="server_list">
           <li><a href="{{ url('/home/movie/index') }}"><span>19888</span>{{ $val -> showing_name }}</a></li>
          
         </ul>
       </div>
       @endforeach
     </div>
         <div class="right_4 top10px">
       <h2><span><a href="#"> 更多影片 </a></span>今日上映推荐 </h2>
       <div class="inner022">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td height="135" align="center" width="140"><a href="#"><img src="images/index_r_03_seo.gif" width="120" height="100" /></a></td>
             <td><a href="#">超凡蜘蛛侠</a><p>主演:成龙、谢霆锋</p></td>
           </tr>
           <tr>
             <td height="135" align="center" width="140"><a href="#"><img src="images/index_r_03_seo2.gif" width="120" height="100" /></a></td>
             <td><a href="#">复仇者联盟</a><p>主演:周星驰、梁朝伟</p></td>
           </tr>
           <tr>
             <td height="135" align="center" width="140"><a href="#"><img src="images/index_r_03_seo3.gif" width="120" height="100" /></a></td>
             <td><a href="#">枕边凶灵</a><p>主演:安德鲁·加菲尔德</p></td>
           </tr>         
         </table>
       </div>
     </div>
   </div>
   <div class="clear"></div>
 
   <div class="bottom top10px">
     <h2>订票帮助中心 >></h2>
     <div class="bottom_con">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <th scope="col"><a href="#"><img src="images/20091130101638768.jpg" width="128" height="35" /></a></th>
           <th scope="col"><a href="#"><img src="images/20091130101739119.jpg" width="128" height="35" /></a></th>
           <th scope="col"><a href="#"><img src="images/20091130101911881.jpg" width="128" height="35" /></a></th>
           
         </tr>
         <tr>
           <td><a href="#">如何快速购票</a></td>
           <td><a href="#">购票说明介绍</a></td>
           <td><a href="#">影片信息查询</a></td>         
         </tr>
         <tr>
           <td><a href="#">找到欣赏影片</a></td>         
           <td><a href="#">联系我们</a></td>
           <td><a href="#">电影订票系统</a></td>         
         </tr>
         <tr>
           <td><a href="#">今日快速订票说明</a></td>
           <td><a href="#">优惠活动最新折扣</a></td>
           <td><a href="#">电影购票系统说明</a></td>          
         </tr>
       </table>
     </div>
   </div>
 
 
   <div class="clear"></div>
 
   <div class="bottom ">
     <h2>友情链接 >></h2>
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