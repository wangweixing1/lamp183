<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认订单 - {{ $title }}</title>
<link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset ('/home/css/default.css') }}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ asset ('/home/css/jquery.js') }}"></script>
<link href="{{ asset ('/home/css/sub.css') }}" rel="stylesheet" type="text/css" />
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
      <h2><span><a href="#"> 更多影片 </a></span>正在上映推荐 </h2>
      <div class="inner022">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/homelte/images/index_r_03_seo.gif') }}"></a></td>
              <td><a href="#">超凡蜘蛛侠</a>
                <p>主演:成龙、谢霆锋</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/homelte/images/index_r_03_seo2.gif') }}"></a></td>
              <td><a href="#">复仇者联盟</a>
                <p>主演:周星驰、梁朝伟</p></td>
            </tr>
            <tr>
              <td width="140" height="135" align="center"><a href="#"><img width="120" height="100" src="{{ asset ('/home/homelte/images/index_r_03_seo3.gif') }}"></a></td>
              <td><a href="#">枕边凶灵</a>
                <p>主演:安德鲁·加菲尔德</p></td>
            </tr>            
          </tbody>
        </table>
      </div>
    </div>
    <div class="ad01"></div>
    
  </div>
  <div class="right">
    <div class="pbanner"><script language='javascript'>
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
				picarr[1]  = "{{ asset ('/home/homelte/images/b02.jpg') }}";
				textarr[1] = "";
				linkarr[2] = "http://www.baidu.com";
				picarr[2]  = "{{ asset ('/home/homelte/images/b01.jpg') }}";
				textarr[2] = "";
					linkarr[3] = "http://www.baidu.com";
				picarr[3]  = "{{ asset ('/home/homelte/images/b03.jpg') }}";
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
				document.write('<param name="movie" value="{{ asset ('/home/homelte/images/bcastr3.swf') }}"><param name="quality" value="high">');
				document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
				document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');				
				</script></div>
    <div class="right_con">
      <div class="curry">当前位置：<a href="#">电影</a>&nbsp;&nbsp;--&nbsp;&nbsp;<a href="#">蝙蝠侠前传3</a> &nbsp;&nbsp;--&nbsp;&nbsp;确认订购</div>
      <div class="right_content">
        <dl class="contact_list">
          <dt><img src="{{ asset ('/home/homelte/images/contact_l.jpg') }}" width="201" height="219" /></dt>
          <dd><img src="{{ asset ('/home/homelte/images/order.jpg') }}" width="400" height="80" />
            <p><span>选择影片：</span>蝙蝠侠前传3</p>
            <p><span>放映时间：</span>12:20</p>
            <p><span>选择影厅：</span>1号厅</p>           
            <p><span>单张票价：</span>30元</p>
            <p><span>订购张数：</span><select name="" class="xz">
              <option selected="selected">订购1张</option>
              <option>订购2张</option>
              <option>订购3张</option>
              <option>订购4张</option>
            </select></p>
            <p><span>选择座位：</span> <select name="" class="xz">
              <option selected="selected">第一排</option>
              <option>第二排</option>
              <option>第三排</option>
              <option>第四排</option>
            </select>
            <select name="" class="xz">
              <option selected="selected">01座</option>
              <option>02座</option>
              <option>03座</option>
              <option>04座</option>
            </select></p>
            <p><span>手机号码：</span><input name="" type="text" / style="_margin-top:15px;">&nbsp;&nbsp;(获取券码使用)</p>
            <p><input name="" type="button" class="dgbg022" value="确认支付" /></p>
          </dd>
        </dl>
      </div>
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
@foreach($config as $key => $val)
 <div class="footer">  
   <p>您是66666 位访客  欢迎您的光临！<br />
     {{$val -> copy}} 版权所有 京ICP备0123456789号</p>
 </div>
 @endforeach
</body>
</html>
