<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>商品分类</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<script src="/query/Public/js/jquery-2.1.4.min.js"></script>
		<style type="text/css">
			html body {
				height: 100%;
				max-width: 680px;
				margin: 0 auto;
				position: relative;
				overflow: hidden;
			}
			
			html {
				height: 100%;
			}
			
			input:focus,
			textarea:focus,
			button:focus,
			select:focus {
				outline: none;
			}
			
			* {
				margin: 0;
				padding: 0
			}
			
			* {
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			
			.top-fixed {
				background-color: #ffffff;
				color: #666;
				left: 0;
				right: 0;
				max-width: 680px;
				margin: 0 auto;
				z-index: 9;
				padding: 8px 30px;
				border-bottom: 1px solid #efefef;
				position: fixed;
				top: 0
			}
			
			.top-fixed .top-search {
				position: relative;
				width: 54%;
				margin: 0px auto;
				padding: 0;
			}
			
			.top-fixed .top-search button {
				margin-right: 10px;
				position: absolute;
				top: 0;
				right: 0;
				color: #999;
				display: block;
				width: 40px;
				height: 30px;
				border-radius: 20px;
				text-align: center;
				font-size: 16px;
				background: none;
				border: none;
				padding: 0;
				margin: 0;
			}
			
			.top-fixed .top-title {
				padding: 0;
				position: relative;
				margin: 0px auto;
				text-align: center;
				font-size: 16px;
				width: 100%
			}
			
			.top-fixed .top-search input {
				border-radius: 10px;
				background-color: #5B9BFE;
				width: 100%;
				height: 37px;
				padding: 0 15px;
				width: 100%;
				border: none;
				height: 20px;
				line-height: 35px;
				font-size: 13px;
				color: #FFFFFF;
			}
			
			.top-fixed .top-search button {
				width: 50px;
				height: 37px;
				position: absolute;
				top: -2px;
				right: 0;
			}
			
			.iscroll {
				position: relative;
				background-color: #fff;
				overflow: auto;
				height: 100%;
				width: 100%;
				margin-top: 50px
			}
			
			.iscroll .l_left {
				position: absolute;
				background-color: #F0F0F5;
				height: 100%;
				width: 80px;
				bottom: 0;
				overflow: auto;
			}
			
			.iscroll .l_left ul.job_sub li {
				line-height: 45px;
				color: #e4e4e4;
				text-align: center;
			}
			
			.iscroll .l_left ul.job_sub li a {
				color: #252525;
				display: block;
				font-size: 14px;
				padding: 0 4px 0 4px;
				text-align: center;
				border: 1px solid #E5E5E5;
				border-top: none;
				background: #F0F0F5;
			}
			
			.iscroll .l_left ul.job_sub li.off a {
				color: #e93b3d;
				display: block;
				text-align: center;
				background: #fff;
				border: 1px solid #fff;
				border-top: none;
				border-bottom: 1px solid #e5e5e5;
			}
			
			.iscroll .l_left ul.job_sub li.off:first-child a {
				border-top: none;
			}
			
			.iscroll .l_left ul.job_sub li:last-child a {
				border-bottom: 1px solid #e5e5e5;
			}
			
			.iscroll .l_right {
				position: absolute;
				top: 0;
				right: 0;
				background: #fff;
				width: calc(100% - 80px);
				bottom: 0;
				overflow: hidden;
			}
			
			.iscroll .l_right ul li {
				position: relative;
				overflow: auto
			}
			
			.iscroll .l_right ul li a {
				display: block;
				width: 33.3333%;
				float: left;
				bottom: 0;
				margin: 0;
				text-align: center;
				padding: 10px 0;
			}
			
			.iscroll .l_right img {
				width: 70%;
				height: 140px;
				background-color: #FAFAFA;
			}
			
			.iscroll .l_right dt {
				height: 35px;
				line-height: 35px;
				padding-right: 15px;
				text-align: right;
				color: #bbb;
				font-size: 14px;
			}
			
			.iscroll .l_right p {
				color: #888;
				font-size: 14px;
			}
			
			ul {
				padding: 0
			}
			
			a {
				text-decoration: none
			}
			
			@media (min-width: 300px) {
				.iscroll .l_right img {
					width: 70%;
					height: 80px;
					background-color: #FAFAFA;
				}
			}
			
			@media (min-width: 600px) {
				.iscroll .l_right img {
					width: 70%;
					height: 140px;
					background-color: #FAFAFA;
				}
			}
			
			.back-span{
				background-color: #2B74C3
			}
		</style>
	</head>

	<body onload="loaded()">
		<header class="top-fixed bg-yellow bg-inverse">
			<div class="top-title top-search">
				<input type="button" class="back-span" value="返回" />
			</div>

		</header>
		<div class="iscroll">

			<div class="l_left" id="con_left">
				<ul class="job_sub" id="scroller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
					<?php if(is_array($qr)): foreach($qr as $k=>$qu): ?><li <?php if(($k == 0)): ?>class="off"<?php endif; ?> data-cataid="<?php echo ($qu["type_id"]); ?>">
							<a href="javascript:"><?php echo ($qu["type_name"]); ?></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>

			<div class="l_right" id="con_right">
				<ul style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
					<?php if(is_array($shop)): foreach($shop as $key=>$sp): ?><li>
							<dt>查看全部<?php echo ($sp[0]["shop_typeid"]); ?></dt>
							<?php if(is_array($sp)): foreach($sp as $key=>$sp1): ?><a href='<?php echo U('Index/searchById');?>?shop_id=<?php echo ($sp1["shop_id"]); ?>'>
											<div class="" style="">
												<img src="/query/Uploads/<?php echo ($sp1["shop_img"]); ?>" />
											</div>
											<p style="font-size:12px;white-space: nowrap;overflow: hidden;"><?php echo ($sp1["shop_name"]); ?></p>
										</a><?php endforeach; endif; ?>
						</li><?php endforeach; endif; ?>

				</ul>
			</div>

		</div>
		<script type="text/javascript">
			$(".back-span").click(function() {
				history.go(-1);
			})
		</script>
		<script src="/query/Public/js/iscroll-probe.js"></script>
		<script>
			function updatePosition() {
				//position.innerHTML = this.y;
				var tz = this.currentPage.pageY + 1;
				var str = "#con_left li:nth-child(" + tz + ")";
				myScroll.scrollToElement(document.querySelector(str), 350);
				$("#scroller >li[data-cataid=" + tz + "]").addClass('off').siblings().removeClass('off');
			}

			function loaded() {
				// var position = document.getElementById('position');
				myScroll = new IScroll("#con_left", {
					mouseWheel: true,
					click: true,
					fadeScrollbars: false,
					momentum: false,
				})

				myScrollr = new IScroll("#con_right", {
					//scrollbars: true,
					mouseWheel: true,
					interactiveScrollbars: true,
					shrinkScrollbars: 'scale',
					fadeScrollbars: true,
					click: true,
					momentum: false,
					snap: 'li'
				})

				myScrollr.on('scroll', updatePosition);
				myScrollr.on('scrollEnd', updatePosition);

			}
			$(function() {
				$('.job_sub li').click(function() {
					$(this).addClass('off').siblings().removeClass('off');
					var str = ($(this).index() + 1);
					//myScrollr.scrollTo(0, -400*str);
					myScroll.scrollToElement(document.querySelector("#con_left li:nth-child(" + str + ")"), 350);
					myScrollr.scrollToElement(document.querySelector("#con_right li:nth-child(" + str + ")"), 0);

				});

			});
		</script>
	</body>

</html>