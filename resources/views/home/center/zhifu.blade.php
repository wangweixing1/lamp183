<!DOCTYPE html>
<html>
<head>
<title>收银台</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="/static/image/favicon.ico" mce_href="/static/image/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/static/image/favicon.ico" mce_href="/static/image/favicon.ico" type="image/x-icon">


<link rel="stylesheet"  href="/zhifu/css/cashier_220211e.css"/>

</head>
<body>
<div class="header">
<div class="inner-header">
<div class="logo">
<h1><a href="https://www.baifubao.com/" target="_blank">支付钱包</a></h1>
</div>
</div>
</div>

<div class="pay_main">
<div class="w-order-nav">
<a class="logo" target="_blank" href="###"></a>
<div class="nav-wrap ">
<ul class="clearfix">
<li class="first">
<span class="no">1</span>
提交订单
<div class="arrow-top"></div>
<div class="arrow-bottom"></div>
</li>
<li class="second current">
<span class="no">2</span>
选择支付方式
<div class="arrow-top"></div>
<div class="arrow-bottom"></div>
</li>
<li>
<span class="no">3</span>
购买成功
</li>
</ul>
</div>
</div><div class="order_infor_module">
<div class="order_details">
<table width=100%>
<tr class="clearfix">
<td class="fl_left ">
<h2>{{ $data -> movie_name }}</h2>
<h1>订单编号:{{ $data -> num }}</h1>
</td>
<td class="fl_right" style="padding-left: 15px;border-left: 1px solid #e0e0e0;">
<dl class="clearfix">
</dl>
<dl class="clearfix">
<dt>支付金额</dt>
<dd class="money"><span>￥{{ $data -> price }}</span></dd>
</dl>
</td>
</tr>
</table>
</div></div></div>
<div class="pay_module">
<div id="fancybox-wrap">
<div class="fancybox-skin">

<input id="zhifu" type="hidden" value="{{ $data->id }}">

<div class="fancybox-inner" style="overflow: hidden;width:628px; height: 280px;">
<iframe src=""  frameborder="0" id="alipayQrIframe" style="width:628px;height:280px;overflow:hidden;display:none"></iframe>
</div>
<a title="Close" class="fancybox-close" id="fancybox-close" href="javascript:"></a>
</div>
</div>
<form action="/proxy/req/pay" method="post" target="_blank" id="detailForm">
</form>
<div class="payment_way" id="pay">

<div class="baidulbspay--box " id="baidulbspay_box" data-data="customerId=3&amp;deviceType=3&amp;orderCreateTime=1500348807&amp;orderId=91345262706491392&amp;service=cashier&amp;payAmount=9800&amp;originalAmount=9800&amp;notifyUrl=http%3A%2F%2Fpay.dianying.baidu.com%2Fapi%2FlbsCallback%2FpayCallback&amp;title=%E7%BB%A3%E6%98%A5%E5%88%80%C2%B7%E4%BF%AE%E7%BD%97%E6%88%98%E5%9C%BA&amp;mobile=&amp;itemInfo=%5B%7B%22id%22%3A10018%2C%22name%22%3A%22%E7%BB%A3%E6%98%A5%E5%88%80%C2%B7%E4%BF%AE%E7%BD%97%E6%88%98%E5%9C%BA%22%2C%22price%22%3A4900%2C%22number%22%3A2%2C%22cityId%22%3A%22131%22%2C%22cinemaId%22%3A%22148%22%2C%22paySource%22%3A%22ticket%22%7D%5D&amp;signType=1&amp;sign=122908c7d91e901805f602f344f60863&amp;passuid=1448330052&amp;sdk=0&amp;returnUrl=https%3A%2F%2Fdianying.nuomi.com%2Fuser%2Forderdetail%3FmOrderId%3D91345190019268608%26type%3D1&amp;failUrl=https%3A%2F%2Fdianying.nuomi.com%2Fuser%2Forderdetail%3FmOrderId%3D91345190019268608%26type%3D2&amp;defaultResPage=0&amp;tpl=2&amp;extData=%7B%22spData%22%3A%2284c7q5xK%2BhiDFDkLAQyBVIW2teW0deII6WoKtfILLSgkGc8xgGbCS2U9P39bz%2BVa8RBPm7Vza37jBvpOSq8jxwGdz%2FKCK2vHn83yC32VUQFfVH3JJslDXVn5l%2BG7W1%2FC35jfYbNBXXmNizGoF%2BIW26hE%22%2C%22uid%22%3A%221448330052%22%2C%22wallet%22%3A%22type%3A1%3Bdianying_new%7C20170719112000%7C%22%2C%22movie_order_id%22%3A91345190019268608%2C%22pass%22%3A%22%7B%5C%22cashback_tag%5C%22%3A%5C%22100201%5C%22%2C%5C%22offline_pay%5C%22%3A1%7D%22%2C%22dianying%22%3A1%7D" data-last-channel=""  data-token="0" data-orderamount="9800" data-totalamount="9800" style="zoom: 1;">
<div class="payschoice" style="zoom: 1;">
<h1 class="title">
选择支付方式</h1>
<ul class="pays-list">
<li>
<a id="baidulbspay_tab_pingtai" href="javascript: void(0);" class="view-switcher">
<h1 class="pays-name">第三方账户支付</h1>
<span class="tip tip-rec">以下支付使用百度钱包更安全</span>
</a>
<div id="baidulbspay_view_pingtai" style="display: none;" class="pay-view">
<div id="baidulbspay_form_pingtai"  class="form">
<div class="pays">
<div class="paylist">
<div class="line" id="baidulbspay_pingtai_recent">
<div class="pay " style="width:auto;margin-right:57px;position:relative">
<input type="radio" id="baidulbspay1" value="BAIDU-PLATFORM-BAIFUBAO" name="baidulbspay_pay_name" class="radio" checked="checked" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img selected" for="baidulbspay1" id="baidulbspay1_label" style="width:auto;">
<div class="logo" style="background-position: 0px -2025px;" ></div>
<div class="ca-activity-desc ca-activity-desc-red">
百度钱包支付更安全
</div>
<div class="kuaijie"></div>
</label>
</div>
<div class="pay " style="position:relative">
<input type="radio" id="baidulbspay2" value="BAIDU-PLATFORM-ALIPAY" name="baidulbspay_pay_name" class="radio"  onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img " for="baidulbspay2" id="baidulbspay2_label"><div class="logo" style="background-position: 0px -2079px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" id="baidulbspay3" value="BAIDU-PLATFORM-ALIPAY-QR" name="baidulbspay_pay_name" class="radio"  onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img " for="baidulbspay3" id="baidulbspay3_label"><div class="logo" style="background-position: 0px -2107px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="main nodis" id="baidulbspay_pays_other_pingtai">
<div class="line">
<div class="pay " style="width:auto;margin-right:57px;position:relative">
<input type="radio" value="BAIDU-PLATFORM-BAIFUBAO" id="baidulbspay4" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay4" id="baidulbspay4_label" style="width:auto;">
<div class="logo" style="background-position: 0px -2025px;" ></div>
<div class="ca-activity-desc ca-activity-desc-red">
百度钱包支付更安全
</div>
<div class="kuaijie"></div>
</label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-PLATFORM-ALIPAY" id="baidulbspay5" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay5" id="baidulbspay5_label"><div class="logo" style="background-position: 0px -2079px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-PLATFORM-ALIPAY-QR" id="baidulbspay6" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay6" id="baidulbspay6_label"><div class="logo" style="background-position: 0px -2107px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</li><li>
<a id="baidulbspay_tab_wangyin" href="javascript: void(0);" class="view-switcher">
<div class="state-arrow"></div>
<h1 class="pays-name">银行网银支付<span class="detail">(储蓄卡或者信用卡)</span></h1>
<span class="tip">推荐开通网上银行的用户使用</span>
</a>

<div id="baidulbspay_view_wangyin" style="display: none;" class="pay-view">
<div id="baidulbspay_form_wangyin" class="form">
<div class="pays">
<div class="paylist">
<div class="main " id="baidulbspay_pays_other_wangyin">
<div class="line">
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-ICBC" id="baidulbspay8" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay8" id="baidulbspay8_label"><div class="logo" style="background-position: 0px -999px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-CCB" id="baidulbspay9" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay9" id="baidulbspay9_label"><div class="logo" style="background-position: 0px -1755px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-ABC" id="baidulbspay10" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay10" id="baidulbspay10_label"><div class="logo" style="background-position: 0px 0px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-PSBC" id="baidulbspay11" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay11" id="baidulbspay11_label"><div class="logo" style="background-position: 0px -621px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-BOCM" id="baidulbspay12" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay12" id="baidulbspay12_label"><div class="logo" style="background-position: 0px -54px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-CMB" id="baidulbspay13" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay13" id="baidulbspay13_label"><div class="logo" style="background-position: 0px -1593px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-CEB" id="baidulbspay14" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay14" id="baidulbspay14_label"><div class="logo" style="background-position: 0px -1674px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-ECITIC" id="baidulbspay15" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay15" id="baidulbspay15_label"><div class="logo" style="background-position: 0px -1620px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-SPDB" id="baidulbspay16" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay16" id="baidulbspay16_label"><div class="logo" style="background-position: 0px -675px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-CMBC" id="baidulbspay17" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay17" id="baidulbspay17_label"><div class="logo" style="background-position: 0px -1566px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-CIB" id="baidulbspay18" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay18" id="baidulbspay18_label"><div class="logo" style="background-position: 0px -1647px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-GDB" id="baidulbspay19" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay19" id="baidulbspay19_label"><div class="logo" style="background-position: 0px -1296px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay " style="position:relative">
<input type="radio" value="BAIDU-BOSH" id="baidulbspay20" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay20" id="baidulbspay20_label"><div class="logo" style="background-position: 0px -486px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</li>
<li>
<a id="baidulbspay_tab_kuaijie" href="javascript: void(0);" class="view-switcher">
<div class="state-arrow"></div>
<h1 class="pays-name">银行卡直接支付</h1>
<span class="tip">无需开通网上银行，支持快捷付款</span>
</a>
<div id="baidulbspay_view_kuaijie" style="display: none;" class="pay-view">
<div id="baidulbspay_form_kuaijie" class="form">
<div class="pays">
<div class="tab-box">
<ul class="tab-list">
<li class="tab selected" id="baidulbspay_subview_tab_kuaijiexinyongka_li">
<a href="javascript: void(0);" id="baidulbspay_subview_tab_kuaijiexinyongka" onclick="window.BaiduLBSCashier._$.switchSubView(this);">信用卡</a>
</li>
<li class="tab " id="baidulbspay_subview_tab_kuaijiechuxuka_li">
<a href="javascript: void(0);" id="baidulbspay_subview_tab_kuaijiechuxuka" onclick="window.BaiduLBSCashier._$.switchSubView(this);">储蓄卡</a>
</li>
</ul>
</div>
<div class="all-pays">
<div class="sub-pays open" id="baidulbspay_subview_kuaijiexinyongka">
<div class="paylist">
<div class="main " id="baidulbspay_pays_other_kuaijiexinyongka">
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-ICBC" id="baidulbspay21" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay21" id="baidulbspay21_label"><div class="logo" style="background-position: 0px -999px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-CCB" id="baidulbspay22" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay22" id="baidulbspay22_label"><div class="logo" style="background-position: 0px -1755px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-ABC" id="baidulbspay23" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay23" id="baidulbspay23_label"><div class="logo" style="background-position: 0px 0px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-PSBC" id="baidulbspay24" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay24" id="baidulbspay24_label"><div class="logo" style="background-position: 0px -621px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-BOCM" id="baidulbspay25" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay25" id="baidulbspay25_label"><div class="logo" style="background-position: 0px -54px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-CMB" id="baidulbspay26" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay26" id="baidulbspay26_label"><div class="logo" style="background-position: 0px -1593px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-BOC" id="baidulbspay27" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay27" id="baidulbspay27_label"><div class="logo" style="background-position: 0px -1863px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-CEB" id="baidulbspay28" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay28" id="baidulbspay28_label"><div class="logo" style="background-position: 0px -1674px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-ECITIC" id="baidulbspay29" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay29" id="baidulbspay29_label"><div class="logo" style="background-position: 0px -1620px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-SPDB" id="baidulbspay30" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay30" id="baidulbspay30_label"><div class="logo" style="background-position: 0px -675px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-CMBC" id="baidulbspay31" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay31" id="baidulbspay31_label"><div class="logo" style="background-position: 0px -1566px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-CIB" id="baidulbspay32" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay32" id="baidulbspay32_label"><div class="logo" style="background-position: 0px -1647px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-PAB" id="baidulbspay33" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay33" id="baidulbspay33_label"><div class="logo" style="background-position: 0px -702px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-GDB" id="baidulbspay34" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay34" id="baidulbspay34_label"><div class="logo" style="background-position: 0px -1296px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-BCCB" id="baidulbspay35" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay35" id="baidulbspay35_label"><div class="logo" style="background-position: 0px -1890px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPC-BOSH" id="baidulbspay36" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay36" id="baidulbspay36_label"><div class="logo" style="background-position: 0px -486px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
</div>
</div>
</div>
<div class="sub-pays close" id="baidulbspay_subview_kuaijiechuxuka">
<div class="paylist">
<div class="main " id="baidulbspay_pays_other_kuaijiechuxuka">
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-ICBC" id="baidulbspay37" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay37" id="baidulbspay37_label"><div class="logo" style="background-position: 0px -999px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-CCB" id="baidulbspay38" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay38" id="baidulbspay38_label"><div class="logo" style="background-position: 0px -1755px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-ABC" id="baidulbspay39" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay39" id="baidulbspay39_label"><div class="logo" style="background-position: 0px 0px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-CMB" id="baidulbspay40" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay40" id="baidulbspay40_label"><div class="logo" style="background-position: 0px -1593px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-BOC" id="baidulbspay41" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay41" id="baidulbspay41_label"><div class="logo" style="background-position: 0px -1863px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-CEB" id="baidulbspay42" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay42" id="baidulbspay42_label"><div class="logo" style="background-position: 0px -1674px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-CMBC" id="baidulbspay43" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay43" id="baidulbspay43_label"><div class="logo" style="background-position: 0px -1566px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-CIB" id="baidulbspay44" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay44" id="baidulbspay44_label"><div class="logo" style="background-position: 0px -1647px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
<div class="line">
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-GDB" id="baidulbspay45" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay45" id="baidulbspay45_label"><div class="logo" style="background-position: 0px -1296px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-BCCB" id="baidulbspay46" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay46" id="baidulbspay46_label"><div class="logo" style="background-position: 0px -1890px;" ></div><div class="kuaijie"></div></label>
</div>
<div class="pay kuaijie" style="position:relative">
<input type="radio" value="BAIDU-EPD-BOSH" id="baidulbspay47" name="baidulbspay_pay_name" class="radio" onfocus="window.BaiduLBSCashier._$.selectPay(this);" onclick="window.BaiduLBSCashier._$.selectPay(this);"/>
<label class="img" for="baidulbspay47" id="baidulbspay47_label"><div class="logo" style="background-position: 0px -486px;" ></div><div class="kuaijie"></div></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</li>
</ul>
</div>
</div></div>
<div class="payment_btn clearfix">
<input class="bg_btn " id="submitPay"  type="text" value="立即支付" >
</div>
</div>

<div class="footer">
<p>使用百度钱包前必读&nbsp;<a target="_blank" href="https://co.baifubao.com/content/payhelp/introduction/serviceagreement/2013-10-17/1385373751.html">百度钱包用户协议</a></p>
<p>客服邮箱：wallet-cs@baidu.com &nbsp;官方贴吧：<a target="_blank" href="http://tieba.baidu.com/f?kw=%B0%D9%B6%C8%C7%AE%B0%FC">百度钱包吧</a></p>
</div>
<script type="text/javascript">window.qianbao=window.qianbao||{},function(n){n.templist=[],n.pin=function(i,t){var o=window.Image?new Image:document.craeteElement("img"),a=function(n){a=function(){},t&&t(n)};o.onload=function(){a()},o.onerror=function(){a("failed")},n.templist.push(o),o.src=i},n.checkAuthorication=function(i){n.pin("https://passport.baidu.com/v3/login/api/auth/?return_type=3&tpl=bp&u=https://www.baifubao.com/api/0/sync_login/0",i),n.pin("https://passport.baidu.com/v3/login/api/auth/?return_type=3&tpl=bp&u=https://wallet.baidu.com/api/0/sync_login/0",i)}}(window.qianbao),window.qianbao.checkAuthorication();</script>
<script type="text/javascript">
            window.qianbao.checkAuthorication();
        </script>

<script type="text/javascript" src="/zhifu/js/jquery-1.7.1.min_229476e.js"></script>
<script type="text/javascript" src="/zhifu/js/base.min_e880ef3.js"></script><script type="text/javascript">
        BaiduLBSCashier.getInstance({
            doFAQ: function () {
                window.open("/proxy/return/faq");
            },
            doSubmit: function (pay) {
                var channel = pay.getPayChannel(),
                    payData = pay.getPayData(),
                    overlay = pay.overlay,
                    Ajax = pay.Ajax,
                    parseJSON = pay.parseJSON,
                    paySubmit = function(){
                        if(channel=="BAIDU-PLATFORM-ALIPAY-QR"){
                            Ajax.request("/proxy/req/getpay",{
                                data : payData.data,
                                success: function (xhr) {
                                    var res = parseJSON(xhr.responseText);
                                    if(res&&res.err_no==0&&res.data&&res.data.payurl){
                                         document.getElementById("alipayQrIframe").style.display = "block";
                                         document.getElementById("alipayQrIframe").src = res.data.payurl;
                                         setTimeout(function () {
                                             overlay.show();
                                             document.getElementById("fancybox-wrap").style.display="block";
                                         },500);
                                    }else{
                                       location.href="/pay/static/error";
                                    }
                                },
                                failure:function(){
                                    location.href = "/pay/static/error";
                                }
                            });
                        }else{
                            document.getElementById("detailForm").action = "/proxy/req/pay?"+payData.data;
                            document.getElementById("detailForm").submit();
                        }
                    };
                    Ajax.request("/proxy/query/return",{
                        data : "customerId=3&orderId=91345262706491392&service=querypay&version=1.0&signType=1&sign=9907f3b945f9df3bf8303bce7a79767f",
                        async: false,
                        success: function (xhr) {
                            var res = parseJSON(xhr.responseText);
                            if(res&&res.err_no==0&&res.data&&res.data.status=="PAY_SUCCESS"&&res.data.returnUrl){
                                window.location.replace(res.data.returnUrl);
                            } else {
                                paySubmit();
                            }
                        },
                        failure: function() {
                            paySubmit();
                        }
                    });
            },
            listeners: {
                beforeSubmit: function (message) {
                    var payobj = message.src;
                    var paychannel = payobj.getPayChannel();
                    if(paychannel==null){
                        alert("请选择支付渠道");
                        return false;
                    }
                    return true;
                },
                complete: function (message){
                    $('.order-list-morebtn').click(function(){
                        if ($('.order-list-more').hasClass('order-hide')) {
                            $('.order-morebtn-des').html('收起部分订单');
                            $('.order-list-more').removeClass('order-hide');
                        }
                        else {
                            $('.order-morebtn-des').html('显示全部订单');
                            $('.order-list-more').addClass('order-hide');
                        }
                    });
                    //window.pay = message.src;
                }
            }
        });
		
		var zhifu = $('#zhifu').val();

		$('#submitPay').on('click',function(){

			// 书写ajax
			$.ajax('/home/ticket/zhifuajax',{
				'type':"get",
				'data':{'zhifu':zhifu},
				'success':function(data){
					 alert('恭喜！支付成功。');
					 location.href="{{ url('/home/center') }}";
				},
				'error':function(){
					 alert('数据异常');
				},
				'dataType':'json'
			});
	});
    </script>

</body>
</html>
<!--32329198140667236618071811-->
<script> var _trace_page_logid = 3232919814; </script>