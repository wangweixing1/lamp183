<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>半边天售票系统-{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
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
      <p><a href="#"> 登录 </a> </p>
      <p><a href="#"> 注册 </a></p>
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
<div class="banner">
  <div id="YFocus">
    <div id="YImage">
      <p id="YPhotos"> <a href="#" title="11"><img src="/images/2_1.png" alt="11" /></a> <a href="#" title="11"><img src="/images/2_2.jpg" alt="111" /></a> <a href="#" title="11"><img src="/images/2_3.jpg" alt="22" /></a> <a href="#" title="1"><img src="/images/2_4.jpg" alt="22" /></a> </p>
    </div>
    <p id="YSamples"> <a href="#1" class="current" title="2"><img src="/images/2x_1.png" alt="22" /></a> <a href="#1" title="2"><img src="/images/2x_2.png" alt="2" /></a> <a href="#1" title="2"><img src="/images/2x_3.png" alt="2" /></a> <a href="#1" title="2"><img src="/images/2x_4.png" alt="2" /></a> </p>
  </div>
  <script language="javascript" type="text/javascript">
<!--
  YAO.YTabs({
    tabs: YAO.getEl('YSamples').getElementsByTagName('img'),
    contents: YAO.getEl('YPhotos').getElementsByTagName('img'),
    auto: true,
    scroll: true,
    scrollId: 'YPhotos'
  });
//-->
</script> 
</div>
<div class="contenter">
  <div class="left">
    <div class="left_1">
      <h2><span><a href="#">更多热映大片</a></span>全球抢先看 >></h2>
      <div class="left_1_con">
        <div class="left_1_l">
          <div class="scrolldoorFrame">
            <ul class="scrollUl">
             @foreach($carousel as $key => $val)
              <li class="sd01" id="m01">

              <a href="#">
              
                <dl class="hd_list">
                  <dt><img src="/uploads/movie_img/{{ $val -> movie_img }}" width="81" height="35" /></dt>
                  <dd>{{ $val ->movie_name }}</dd>
                  <dd>7月13日上映>></dd>
                </dl>
                </a></li>
                @endforeach
              
            </ul>
            @foreach($carousel as $key => $val)
            <div class="cont">
             
              <div id="c01"><img src="/uploads/movie_img/{{ $val -> movie_img }}" width="449" height="193" /></div>
 
            </div>
            @endforeach

          </div>
        </div>
        <div class="left_1_r">
          <h3>即将播出影片</h3>
          
          <dl>
            <dt><a href="#"><img src="images/newspic.jpg" width="80" height="65" /></a></dt>
            <dd><strong>杀人犯杀人游戏</strong> <br />
              <a href="#">《怒火攻心》不演斯巴达勇士，演绎真人模拟游戏，够血腥够刺激！…</a></dd>
          </dl>

          <div class="clear"></div>
          <ul>
            <li><a href="#"><span>7月13日首播</span>炫舞天鹅 </a></li>
            <li><a href="#"><span>8月30日首播</span>蝙蝠侠前传3:黑暗 </a></li>
            <li><a href="#"><span>7月3日首播</span>灵魂战车2 </a></li>
            <li><a href="#"><span>7月10日首播</span>非常小特工之时间大盗 </a></li>
            <li><a href="#"><span>7月13日首播</span>炫舞天鹅 </a></li>
            <li><a href="#"><span>8月30日首播</span>蝙蝠侠前传3:黑暗 </a></li>
            <li><a href="#"><span>7月3日首播</span>灵魂战车2 </a></li>
          </ul>
        </div>
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
        <!-- 
          
         
        -->
        <div class="clear"></div>
      </div>
    </div>
    <div class="left_6 top10px">
      <h2><span><a href="#">>>查看更多</a></span>热门活动优惠专区 </h2>
      <div class="left_6_con">
        <dl class="fx_list">
          <dt><img src="images/fx1.jpg" width="65" height="65" /></dt>
          <dd><strong>霸气抢票第e波 </strong><br />
            -<a href="#">--《四大名捕》火热抢票送不停 抢票时间：7月16日-7月22日 </a></dd>
        </dl>
        <dl class="fx_list">
          <dt><img src="images/fx12.jpg" width="65" height="65" /></dt>
          <dd><strong>给力活动第一期 </strong><br />
            <a href="#">---《给力火车》给力送票送不停 活动时间：7月19日-7月28日 </a></dd>
        </dl>
        <dl class="fx_list">
          <dt><img src="images/fx13.jpg" width="65" height="65" /></dt>
          <dd><strong>购票有礼大派送 </strong><br />
            <a href="#">---《购票有礼》优惠大派送送不停 送票时间：7月20日-7月29日</a></dd>
        </dl>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="right">
    <div class="right_1">
      <h2><span style="color:#000; font-size:14px;">7月18日</span>今日快速订票 </h2>
      <div class="inner02">
        <dl style="border-bottom:0px #fff solid;">
          <dt><img src="images/fa1.gif" width="56" height="45" /></dt>
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
              <option>166(2号厅)</option>
              <option>168(3号厅)</option>
              <option>188(4号厅)</option>
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
        <div class="wxpd"><a href="#"><img src="images/104.jpg" /></a></div>
      </div>
    </div>

    <div class="right_5 top10px">
      <h2>热门影片榜 </h2>
      <div class="inner02">
        <ul class="server_list">
          <li><a href="#"><span>19888</span>白雪公主与猎人</a></li>
          <li><a href="#"><span>18667</span>三个火枪手</a></li>
          <li><a href="#"><span>17558</span>王者之剑</a></li>
          <li><a href="#"><span>17452</span>南极大冒险</a></li>
          <li><a href="#"><span>9955</span>肖申克的救赎</a></li>
        </ul>
      </div>
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
