
<!DOCTYPE html>
<html>
<head>
<title>Movie Ticket Booking Widget Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Kotta+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="/home/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="/home/js/jquery-1.11.0.min.js"></script>
<script src="/home/js/jquery.seat-charts.js"></script>
</head>
<body>
<div class="content">
	<h1>半边天电影na yang chun jie de yu ji</h1>
	<div class="main">
		<h2>选座</h2>
		<div class="demo">
			<div id="seat-map">
				<div class="front">银幕</div>	
			</div>
			<div class="booking-details">
				<ul class="book-left">
					<li>电影 </li>
					<li>时间 </li>
					<li>单价</li>
					<li>已选</li>
					<li>总价</li>
					<li>座位 :</li>
				</ul>
				<ul class="book-right">
					<li>: {{ $data['movie_name'] }}</li>
					<li>: {{ $data['time_name'] }}</li>
					<li>: <b><i>$</i><span id="price">{{ $data['price'] }}</span></b></li>
					<li>: <span id="counter">0</span></li>
					<li>: <b><i>$</i><span id="total" aa="66"></span></b></li>
					<input id="mid" type="hidden" value="{{ $movie->id }}">
					<input id="movie_name" type="hidden" value="{{ $movie->movie_name }}">
					<input type="hidden" id="date" value="{{ $data['date_name'] }}">	
					<input type="hidden" id="time" value="{{ $data['time_name'] }}">	
					<input type="hidden" id="hall_name" value="{{ $data['hall_name'] }}">	
					<input type="hidden" id="price" value="{{ $data['price'] }}">	
					<input type="hidden" id="cinema_name" value="{{ $data['cinema_name'] }}">		 
				</ul>
				<div class="clear"></div>
				<ul id="selected-seats" class="scrollbar scrollbar1"></ul>	
				<button class="checkout-button">现在预订</button>	
				<div id="legend"></div>
			</div>
			<div style="clear:both"></div>
	   	</div>

		<script type="text/javascript">
						
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			// 获取文本框中的值
			var price = $('#price').html();
			var mid = $('#mid').val();
			var date = $('#date').val();
			var time = $('#time').val();
			var hall_name = $('#hall_name').val();
			var cinema_name = $('#cinema_name').val();
			var cinema_name = $('#cinema_name').val();
			var movie_name = $('#movie_name').val();

			// 将字符串转换成整数
			price = parseInt(price);// price
			$(document).ready(function() {
				var $cart = $('#selected-seats'), //Sitting Area
				$counter = $('#counter'), //Votes
				$total = $('#total'); //Total money
				
				var sc = $('#seat-map').seatCharts({
					map: [  //Seating chart
						'aaaaaaaa',
						'________',
						'aaaaaaaa',
						'aaaaaaaa',
						'aaaaaaaa',
						'aaaaaaaa',
					],

					naming : {
						top : false,
						getLabel : function (character, row, column) {
							return column;
						}
					},

					legend : { //Definition legend
						node : $('#legend'),
						items : [
							[ 'a', 'available',   '空闲' ],
							[ 'a', 'unavailable', '已销售'],
							[ 'a', 'selected', '已挑选']
						]					
					},
					click: function () { //Click event
						if (this.status() == 'available') { //optional seat
							$('<li>行'+(this.settings.row+1)+' 座位'+this.settings.label+'</li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);

							$counter.text(sc.find('selected').length+1);
							$total.text(recalculateTotal(sc)+price);
										
							return 'selected';
						} else if (this.status() == 'selected') { //Checked
								//Update Number
								$counter.text(sc.find('selected').length-1);
								//update totalnum
								$total.text(recalculateTotal(sc)-price);
									
								//Delete reservation
								$('#cart-item-'+this.settings.id).remove();
								//optional
								return 'available';
						} else if (this.status() == 'unavailable') { //sold
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});
				// sold seat
				
			// 数组
			var ids = [];
			var sets = "{{ $sets }}";

			//把字符串分割成字符串数组
			sets = sets.split(',')

			// 添加单机事件
			$('.checkout-button').on('click',function(){

				// 获取选中的座位
				var sel = $(".selected");

				// 获取id 
				$(sel).each(function(i){
					ids[i] = $(this).attr('id');
				});

				// 书写ajax
				$.ajax('/home/ticket/ajax',{
					'type':"get",
					'data':{'ids':ids,'mid':mid,'date':date,'time':time,'hall_name':hall_name,'price':price,'cinema_name':cinema_name,'movie_name':movie_name},
					'success':function(data){
						 if(data == 0){
						 	// location.href=
						 	alert('恭喜！订票成功！请前去订单中心完成支付。');
						 	sc.get(ids).status('unavailable');
						 }	
						 if(data == 1){
						 	alert('该座位已被订购');
						 }
						 if(data == 2){
						 	alert('您还未选定座位！');
						 }	
					},
					'error':function(){
						 alert('数据异常');
					},
					'dataType':'json'
				});
			});
				// 写入样式
				sc.get(sets).status('unavailable');
					
			});
			//sum total money
			function recalculateTotal(sc) {
				var total = 0;
				sc.find('selected').each(function () {
					total += price;
				});
						
				return total;
			}

			
		</script>
	</div>
	<!-- <p class="copy_rights">&copy; 2016 Movie Ticket Booking Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p> -->
<script src="/home/js/jquery.nicescroll.js"></script>
<script src="/home/js/scripts.js"></script>
</body>
</html>
