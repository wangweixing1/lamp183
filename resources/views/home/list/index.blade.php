<!DOCTYPE html PUBLIC >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title }}</title>
<link href="/home/css/default.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/home/css/board-index.92a06072.css"/>
</head>
<body>
<div class="header" >
  <div class="top_img">
    <div class="logo"><a href="#"><img src="/images/2.png" width="200" height="80" /></a></div>
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
      <li id="a2"> <a href="{{ url('/home/case/index') }}">电影</a></li>
      <li id="a3"><a href="{{ url('/home/list/index') }}">榜单</a></li>
      <li id="a4"><a href="{{ url('/home/hot/index') }}">热点</a></li>
      <li id="a8"><a href="#">优惠专区</a></li>
      <li id="a9"><a href="{{ url('/home/time/index') }}">放映时刻表</a></li>
    </ul>
  </div>
</div>
<div class="header-placeholder"></div>

<div class="container" id="app" class="page-board/index" >

    <div class="content">
        <div class="wrapper">
            <div class="main">            
                <dl class="board-wrapper">   
                    @foreach($list as $key => $val)            
                    <dd>
                            <a href="{{ url('/home/movie/index') }}" title="{{ $val -> list_name }}" class="image-link" data-act="boarditem-click"}">
                                <img src="/uploads/list_img/{{ $val -> list_img }}" width="160" alt="" class="poster-default" />   
                            </a>
                            <div class="board-item-main">
                            <div class="board-item-content">
                            <div class="movie-item-info">
                                <p class="name"><a href="{{ url('/home/movie/index') }}" title="{{ $val -> list_name }} " data-act="boarditem-click">{{ $val -> list_name }}</a></p><br />
                                <p class="releasetime"><b>电影描述：</b><br /><br />{{ $val -> list_depict }}</p><br /><br />    
                            </div>
                           
                        </div>
                        </div>
                    </dd>
                    @endforeach
      
                </dl>
            </div>
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
<div class="footer">  
  <p>您是66666 位访客  欢迎您的光临！<br />
    lamp183 版权所有 京ICP备0123456789号</p>
</div>
</body>
</html>
