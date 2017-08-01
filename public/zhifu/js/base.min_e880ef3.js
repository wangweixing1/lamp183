!function(){function Message(e,t,n){this.src=e,this.text=t,this.data=n}function Dispatcher(){this.eventMap={}}function Confirm(e){function t(t){n.content.innerHTML=t,n.content.style.position="absolute",n.content.style.top="0px",n.content.style.left="0px",n.content.style.zIndex=1000001,n.content.style.display="none",util.addDOMEvent(n.content,"click",function(t){var i=t.srcElement||t.target;"a"===i.nodeName.toLowerCase()&&(util.hasClass(i,"op-hide")&&n.hide(),util.hasClass(i,"op-checkpay")&&e.pay.doCheckPay&&e.pay.doCheckPay(e.pay),util.hasClass(i,"op-faq")&&e.pay.doFAQ&&e.pay.doFAQ(e.pay))}),document.body.appendChild(n.content),util.addDOMEvent(window,"resize",n.adjust),util.addDOMEvent(window,"scroll",n.adjust),n.dispatcher.post("complete",new Message(n,"complete"))}var n=this;n.dispatcher=new Dispatcher;for(var i in e.listeners)n.dispatcher.listen(i,e.listeners[i]);n.content=document.createElement("div"),n._show=!1,n.adjust=function(){if(n._show){var e=util.getOuterSize(n.content),t=util.getScreenSize(),i=document.body.scrollTop||document.documentElement.scrollTop,a=document.body.scrollLeft||document.documentElement.scrollLeft;n.content.style.top=t.height/2-e.height/2+i+"px",n.content.style.left=t.width/2-e.width/2+a+"px"}},e.html?t(e.html):util.loadPage({url:"/pay/static/template?source=confirm",callback:t})}function Pay(e){var t=this;if(this.dispatcher=new Dispatcher,this.dispatcher.post("init",new Message(null,"init"))!==!1){for(var n in e.listeners)this.listen(n,e.listeners[n]);this.id="baidulbspay",this.Ajax=Ajax,this.parseJSON=parseJSON,this.overlay=fancyboxOVERLAY,this.viewOpenState={},this.subViewOpenState={},this.doSubmit=e.doSubmit,t.doCheckPay=e.doCheckPay,t.doFAQ=e.doFAQ,t.dom=document.getElementById(t.id+"_box"),t.viewOpenState.pingtai=!0,t.viewOpenState[e.view||BaiduLBSCashier.VIEW[VIEW_COOKIENAME[t.dom.getAttribute("data-last-channel")]||"支付平台"]]=!0,t.viewMap={},t.viewTabMap={};for(var n in BaiduLBSCashier.VIEW)t.viewMap[BaiduLBSCashier.VIEW[n]]=document.getElementById(t.id+"_view_"+BaiduLBSCashier.VIEW[n]),t.viewTabMap[BaiduLBSCashier.VIEW[n]]=document.getElementById(t.id+"_tab_"+BaiduLBSCashier.VIEW[n]);for(var i in t.viewTabMap)util.addDOMEvent(t.viewTabMap[i],"click",function(e,n){return function(){util.hasClass(n,"selected")===!1&&t.switchView(e)}}(i,t.viewTabMap[i]));util.hasClass(t.dom,"has-recent")===!1&&(t.viewOpenState[BaiduLBSCashier.VIEW["网银支付"]]=!0);for(var a in t.viewOpenState)t.openView(a);if(null===t.getPayChannel()){var o=util.querySelector("input",document.getElementById("baidulbspay_box"));o.setAttribute("checked","checked")}e.hasOwnProperty("submitElement")&&util.addDOMEvent(e.submitElement,"click",function(){t.submit()}),t.data=t.dom.getAttribute("data-data"),t.dispatcher.post("complete",new Message(t,"complete"))}}document.execCommand&&document.execCommand("BackgroundImageCache",!1,!0);var selectedRadioID=null,CONPUTE_STYLENAME={width:["width","marginLeft","marginRight"],height:["height","marginTop","marginBottom"]},util={REG_EXP:{FIND_ES:/[\\]/g,FIND_DQ:/[\"]/g},json:{toJSON:function(e){return util.json.cov(null,e)},cov:function(e,t){var e=null==e?"":'"'+e+'":';switch(Object.prototype.toString.apply(t).toLowerCase()){case"[object string]":return e+'"'+t.replace(util.REG_EXP.FIND_ES,"\\\\").replace(util.REG_EXP.FIND_DQ,'\\"')+'"';case"[object number]":return e+t;case"[object array]":for(var n=[],i=0,a=t.length;a>i;++i)n.push(util.json.cov(null,t[i]));return e+"["+n.join(",")+"]";case"[object object]":var n=[];for(var o in t)n.push(util.json.cov(o,t[o]));return e+"{"+n.join(",")+"}";default:return e+t}}},n:0,trim:function(e){return e.replace(/(^\s*)|(\s*$)/g,"")},querySelector:function(e,t){return util.querySelectorAll(e,t)[0]},querySelectorAll:function(e,t){var e=e.split("");e.push(" ");for(var n=[e[0]],i=[t||document],a="find",o=1,l=e.length;l>o;++o){var s=e[o];if("."==s||"#"==s||" "==s){var c=util.trim(n.join(""));if(c.length>0){switch(a){case"find":i=util.findDom(i,c),a="filter";break;case"filter":i=util.filterDom(i,c)}n=[]}" "==s&&(a="find")}n.push(s)}return i},filterDom:function(e,t){if(t.length<=0)return e;for(var n=t.charAt(0),i=t.substr(1),a=[],o=0,l=e.length;l>o;++o){var s=e[o];switch(n){case".":util.hasClass(s,i)&&a.push(s);break;case"#":s.getAttribute("id")==i&&a.push(s);break;default:(s.nodeName&&s.nodeName.toLowerCase?s.nodeName.toLowerCase()!=t:1)||a.push(s)}}return a},findDom:function(e,t){if(t.length<=0)return e;for(var n=[],i=0,a=e.length;a>i;++i)for(var o=e[i],l=o.childNodes,s=0,c=l.length;c>s;++s){var r=l[s];n=n.concat(util.filterDom([r],t)),r.childNodes&&r.childNodes.length>0&&(n=n.concat(util.findDom([r],t)))}return n},getScreenSize:function(){var e={doc:{width:Math.abs(document.documentElement.clientWidth-window.screen.availWidth),height:Math.abs(document.documentElement.clientHeight-window.screen.availHeight)},body:{width:Math.abs(document.body.clientWidth-window.screen.availWidth),height:Math.abs(document.body.clientHeight-window.screen.availHeight)}},t={width:e.doc.width>e.body.width?document.body.clientWidth:document.documentElement.clientWidth,height:e.doc.height>e.body.height?document.body.clientHeight:document.documentElement.clientHeight};return t},cache:{_map:{},save:function(e,t){util.cache._map[e]=t},fetch:function(e){return util.cache._map[e]},has:function(e){return util.cache._map.hasOwnProperty(e)},del:function(e){delete util.cache._map[e]}},getComputedStyle:function(e){return window.getComputedStyle?window.getComputedStyle(e):e.currentStyle},shown:function(e){for(var t=e;t;){var n=util.getComputedStyle(t);if("none"==n.display||"hidden"==n.visibility)return!1;if(util.hasClass(t,"pay-view"))return!0;t=t.parentNode}return!0},getOuterSize:function(e){var t=window.getComputedStyle?window.getComputedStyle(e):e.currentStyle,n={width:0,height:0};for(var i in CONPUTE_STYLENAME)for(var a=CONPUTE_STYLENAME[i],o=0,l=a.length;l>o;++o){var s=parseInt(t[a[o]]);if(isNaN(s))switch(a[o]){case"width":s=e.offsetWidth;break;case"height":s=e.offsetHeight;break;default:s=0}n[i]+=s}return n},jsonp_data:{save_all:function(e,t){for(var n in t)util.jsonp_data.save(e,n,t[n])},save:function(e,t,n){var i=util.cache.has(e)?util.cache.fetch(e):{};i[t]=n,util.cache.save(e,i)},fetch:function(e,t){return util.cache.has(e)?util.cache.fetch(e)[t]:void 0},del:function(e){util.cache.del(e)}},jsonp:function(e){var t=document.createElement("script");t.type="text/javascript",t.charset="utf-8";var n="_baidulbspayjsonpcb"+ ++util.n+"_"+(new Date).getTime(),i=document.head||document.getElementsByTagName("head")[0]||document.body||document.documentElement,a=e.complete||function(){};e.complete=function(){a(),window[n]=null,i.removeChild(t),util.jsonp_data.del(n)},window[n]=function(e){var t=util.jsonp_data.fetch(n,"callback");t&&t(e)},t.attachEvent?t.attachEvent("onreadystatechange",function(){window.event&&window.event.srcElement&&"loaded"==window.event.srcElement.readyState&&util.jsonp_data.fetch(n,"complete")()}):t.onload=function(){util.jsonp_data.fetch(n,"complete")()},e.error=e.error?e.error:function(){},t.onerror=function(){var e=util.jsonp_data.fetch(n,"error");e&&e();var t=util.jsonp_data.fetch(n,"complete");t&&t()},t.src=-1==e.url.indexOf("?")?e.url+"?cn="+n:e.url+"&cn="+n,util.jsonp_data.save_all(n,e),setTimeout(function(){if(i.appendChild(t),0==isNaN(util.jsonp_data.fetch(n,"timeout"))){var e=null,a=util.jsonp_data.fetch(n,"complete");util.jsonp_data.save(n,"complete",function(){clearTimeout(e),e=null,a()}),e=setTimeout(function(){e=null,util.jsonp_data.save(n,"callback",function(){}),util.jsonp_data.save(n,"error",function(){}),util.jsonp_data.save(n,"complete",function(){});var t=util.jsonp_data.fetch(n,"timeoutCallback");t&&t()},util.jsonp_data.fetch(n,"timeout"))}},0)},loadPage:function(e){return util.cache.has(e.url)?void(callback&&callback(util.cache.fetch(e.url))):void util.jsonp(e)},addClass:function(e,t){if(e){for(var n=e.className.split(" "),i=0,a=n.length;a>i;++i)if(n[i]===t)return;e.className+=" "+t,"nodis"==t&&(e.style.display="none")}},hasClass:function(e,t){if(e){if(e.className)for(var n=e.className.split(" "),i=0,a=n.length;a>i;++i)if(n[i]===t)return!0;return!1}},removeClass:function(e,t){if(e){for(var n=e.className.split(" "),i=n.length-1;i>=0;--i)n[i]===t&&n.splice(i,1);e.className=n.join(" "),"nodis"==t&&(e.style.display="")}},addDOMEvent:function(e,t,n){e&&(e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent("on"+t,function(){n.call(this,window.event)}))}},Ajax={request:function(e,t){function n(){}var i=t.async!==!1,a=t.method||"GET",o=t.data||null,l=t.success||n,s=t.failure||n;a=a.toUpperCase(),"GET"==a&&o&&(e+=(-1==e.indexOf("?")?"?":"&")+o,o=null);var c=window.XMLHttpRequest?new XMLHttpRequest:new ActiveXObject("Microsoft.XMLHTTP");return i&&(c.onreadystatechange=function(){Ajax._onStateChange(c,l,s)}),c.open(a,e,i),"POST"==a&&c.setRequestHeader("Content-type","application/x-www-form-urlencoded;"),c.send(o),i||l(c),c},_onStateChange:function(e,t,n){if(4==e.readyState){var i=e.status;i>=200&&300>i?t(e):n(e)}}},parseJSON=function(e){try{if(!e)return null;var t=new Function("","return "+e)();return t&&"[object Object]"==t.toString()?t:null}catch(n){}return null};Dispatcher.prototype.listen=function(e,t){var n=this.eventMap[e]||[];n.push(t),this.eventMap[e]=n},Dispatcher.prototype.post=function(e,t){var n=this.eventMap[e],i=!0;if(n)for(var a=0,o=n.length;o>a;++a)if(n[a](t)===!1){i=!1;break}return i};var ConfirmDialog={_cache:null,getDialog:function(e,t){if(ConfirmDialog._cache)return void(t&&t(ConfirmDialog._cache));new Confirm({pay:e,listeners:{complete:function(e){ConfirmDialog._cache=e.src,t&&t(ConfirmDialog._cache)}}})}};fancyboxOVERLAY=Confirm.OVERLAY={_dom:null,_show:!1,_resize:function(){if(Confirm.OVERLAY._show){var e=document.body.scrollHeight,t=document.body.scrollWidth,n=document.documentElement.clientWidth,i=document.documentElement.clientHeight;Confirm.OVERLAY._dom.style.width=(t>n?t:n)+"px",Confirm.OVERLAY._dom.style.height=(e>i?e:i)+"px"}},show:function(){if(null==Confirm.OVERLAY._dom){var e=document.body.scrollHeight,t=document.body.scrollWidth,n=document.documentElement.clientWidth,i=document.documentElement.clientHeight,a=document.createElement("div"),o=document.getElementById("fancybox-close"),l=document.getElementById("fancybox-wrap");a.className+=" baidulbspay--modal-overlay",a.style.width=(t>n?t:n)+"px",a.style.height=(e>i?e:i)+"px",a.style.overflow="hidden",a.style.position="absolute",a.style.top="0px",a.style.left="0px",a.style.display="none",a.style.zIndex=1e6;var s=document.createElement("iframe");s.frameborder=0,s.src="about:blank",s.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity:0)",s.style.opacity="0",s.style.width="100%",s.style.height="100%",s.style.position="absolute",s.style.top="0px",s.style.left="0px",s.style.zIndex=1e6,a.appendChild(s),util.addDOMEvent(window,"resize",Confirm.OVERLAY._resize),document.body.appendChild(a),Confirm.OVERLAY._dom=a,util.addDOMEvent(o,"click",function(){a.style.display="none",l.style.display="none",document.getElementById("alipayQrIframe").style.display="none"})}Confirm.OVERLAY._show=!0,Confirm.OVERLAY._resize(),Confirm.OVERLAY._dom.style.display="block"},hide:function(){Confirm.OVERLAY._dom&&(Confirm.OVERLAY._dom.style.display="none",Confirm.OVERLAY._show=!1)}},Confirm.prototype.show=function(){Confirm.OVERLAY.show(),this.content.style.visibility="hidden",this.content.style.display="block",this._show=!0,this.adjust(),this.content.style.visibility="visible"},Confirm.prototype.hide=function(){this.content.style.display="none",Confirm.OVERLAY.hide(),this._show=!1},Confirm.prototype.destroy=function(){this.hide(),this.content.parentNode.removeChild(this.content)};var VIEW_COOKIENAME={ep_debit:"快捷支付",bank_pay:"网银支付",platform:"支付平台",ep_credit:"快捷支付"};Pay.prototype.submit=function(){if(this.dispatcher.post("beforeSubmit",new Message(this,"beforeSubmit"))!==!1){if(this.hasOwnProperty("doSubmit")===!1)throw new Error("pay.doSubmit未定义");0!=this.doSubmit(this)&&0!=this.dispatcher.post("afterSubmit")&&"BAIDU-PLATFORM-ALIPAY-QR"!=this.getPayChannel()&&ConfirmDialog.getDialog(this,function(e){e.show()})}},Pay.prototype.getPayData=function(){var e=this,t={token:e.dom.getAttribute("data-token"),payChannel:e.getPayChannel()};return{data:e.data+"&reqData="+util.json.toJSON(t)}},Pay.prototype.getPayChannel=function(){for(var e in this.viewOpenState){var t=null;if(this.viewOpenState[e]===!0){var n=document.getElementById(this.id+"_form_"+e);if(n)for(var i=n.getElementsByTagName("input"),a=0,o=i.length;o>a;++a){var l=i[a];if(l.name&&"radio"==l.type&&l.checked&&util.shown(l))return t=l.value}}}return t},Pay.prototype.listen=function(e,t){this.dispatcher.listen(e,t)},Pay.prototype.openView=function(e){var t=this.viewMap[e],n=this.viewTabMap[e];t&&(util.hasClass(n,"selected")===!1&&util.addClass(n,"selected"),t.style.display="",this.viewOpenState[e]=!0)},Pay.prototype.closeView=function(e){var t=this.viewMap[e],n=this.viewTabMap[e];n&&"baidulbspay_tab_pingtai"!==n.id&&(util.removeClass(n,"selected"),t.style.display="none",this.viewOpenState[e]=!1)},Pay.prototype.switchView=function(e){for(var t in this.viewMap){{this.viewMap[t],this.viewTabMap[t]}t===e?this.openView(t):this.closeView(t)}},window._baidulbspay_jsonp_exception=function(data){data=eval("("+data+")"),GlobalDispatcher.post("exception",new Message(null,data.text,data))};var GlobalDispatcher=new Dispatcher;window.BaiduLBSCashier={getInstance:function(e){e.listeners=e.listeners||{};var t=e.listeners.complete;e.listeners.complete=function(e){util.cache.save(e.src.id,e.src),t&&t.apply(this,arguments)},new Pay(e)},VIEW:{"快捷支付":"kuaijie","网银支付":"wangyin","支付平台":"pingtai"},_$:{more:function(e){var t=e.id,n=t.split("_")[0];if(util.hasClass(e,"open"))util.removeClass(e,"open"),util.addClass(e,"close"),util.addClass(document.getElementById(n+"_content"),"nodis");else{util.removeClass(e,"close"),util.addClass(e,"open"),util.removeClass(document.getElementById(n+"_content"),"nodis");var i=document.getElementById(t+"_placeholder_line");i.parentNode.removeChild(i)}},otherPays:function(e){var t=e.id;t=t.split("_");var n=t[0],i=t[t.length-1],a=util.querySelector("input",document.getElementById(n+"_"+i+"_recent")).checked;if(util.hasClass(e,"open"))util.removeClass(e,"open"),util.addClass(e,"close"),util.addClass(document.getElementById(n+"_pays_other_"+i),"nodis"),util.addClass(document.getElementById(n+"_otherpays_"+i),"nodis");else{util.removeClass(e,"close"),util.addClass(e,"open"),util.removeClass(document.getElementById(n+"_pays_other_"+i),"nodis"),util.removeClass(document.getElementById(n+"_otherpays_"+i),"nodis");var o=document.getElementById(n+"_"+i+"_recent");if(o.parentNode.removeChild(o),a){var l=util.querySelector("input",document.getElementById(n+"_pays_other_"+i));l.setAttribute("checked","checked"),util.addClass(document.getElementById(l.id+"_label"),"selected")}}},switchSubView:function(e){var t=e.id.split("_"),n=t[t.length-1],i=t[0],a={kuaijiexinyongka:{li:document.getElementById(i+"_subview_tab_kuaijiexinyongka_li"),content:document.getElementById(i+"_subview_kuaijiexinyongka")},kuaijiechuxuka:{li:document.getElementById(i+"_subview_tab_kuaijiechuxuka_li"),content:document.getElementById(i+"_subview_kuaijiechuxuka")}};for(var o in a){var l=a[o];o===n?(util.addClass(l.li,"selected"),util.removeClass(l.content,"close"),util.addClass(l.content,"open")):(util.removeClass(l.li,"selected"),util.removeClass(l.content,"open"),util.addClass(l.content,"close"))}},selectPay:function(e){if(selectedRadioID!=e.id)for(var t=document.getElementsByName(e.name),n=0,i=t.length;i>n;++n){var a=t[n],o=document.getElementById(a.id+"_label");a.id!=e.id?util.removeClass(o,"selected"):(util.addClass(o,"selected"),selectedRadioID=a.id)}}}},window.Confirm=Confirm}();