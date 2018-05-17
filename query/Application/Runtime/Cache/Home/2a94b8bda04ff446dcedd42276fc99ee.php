<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<script type="text/javascript" src="/query/Public/js/jquery-2.1.4.js"></script>
		<title>搜索框</title>
		<style type="text/css" media="screen">
			body {
				background-color: #ffffff;
				margin: 0;
			}
			
			* {
				padding: 0;
				margin: 0
			}
			
			body,
			input,
			button {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			
			.container {
				margin: 0 auto;
				max-width: 700px;
				text-align: center;
			}
			
			.mt {
				margin-top: 100px
			}
			
			a {
				color: #166ef3;
				text-decoration: none;
				font-size: 16px;
				font-weight: bold;
			}
			
			a:hover {
				text-decoration: underline;
			}
			
			h3 {
				color: #666;
			}
			
			ul {
				list-style: none;
				padding: 25px 0;
			}
			
			li {
				display: inline;
				margin: 10px 50px 10px 0px;
			}
			
			input[type=text],
			input[type=password] {
				font-size: 13px;
				min-height: 32px;
				margin: 0;
				padding: 7px 8px;
				outline: none;
				color: #333;
				background-color: #fff;
				background-repeat: no-repeat;
				background-position: right center;
				border: 1px solid #ccc;
				border-radius: 3px;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				transition: all 0.15s ease-in;
				-webkit-transition: all 0.15s ease-in 0;
				vertical-align: middle;
			}
			
			.button,
			.add {
				position: relative;
				display: inline-block;
				margin: 0;
				padding: 6px 15px;
				font-size: 13px;
				font-weight: bold;
				color: #333;
				white-space: nowrap;
				background-color: #317EF3;
				color: #ffffff;
				border: 0;
				border-radius: 3px;
				cursor: pointer;
				box-sizing: border-box;
			}
			
			.fixed {
				width: 65px;
				margin: 0 auto;
				height: 320px;
				position: fixed;
				right: 20px;
				bottom: 27%;
				text-align: center;
				font-size: 14px
			}
			
			.fixed img {
				width: 32px;
				height: 32px;
				margin-top: 15px
			}
			
			.fixed p {
				margin-top: 8px;
				font-size: 12px
			}
			
			.add {
				background: red
			}
			
			.add:hover,
			.add:active {
				background-position: 0 -15px;
			}
			
			.add:active {
				background-color: red;
			}
			
			.add:focus,
			input[type=text]:focus,
			input[type=password]:focus {
				outline: none;
			}
			
			label[for=search] {
				display: block;
				text-align: left;
			}
			
			#search label {
				font-weight: 200;
				padding: 5px 0;
			}
			
			#tab {
				border: 1px;
				width: 100%
			}
			
			table {
				border-collapse: separate;
				border-spacing: 10px;
			}
			
			table tr {
				height: 100px;
				cursor: pointer;
			}
			
			@media (min-width: 300px) {
				.mod_aside_v2 {
					display: block;
				}
				.fixed {
					display: none
				}
				.mt {
					margin-top: 50px
				}
				#search input[type=text] {
					font-size: 18px;
					width: 94%;
					height: 37px;
					float: left;
					margin-top: 5px;
					margin-left: 3%
				}
				#search .button {
					position: relative;
					left: 3%;
					padding: 15px;
					width: 94%;
					float: left;
					border-radius: 3px;
					margin-top: 20px
				}
				.select {
					position: relative;
					width: 35%;
					height: 37px;
					float: left;
					margin-left: 2px;
					z-index: 554;
					border: 1px solid #ccc;
					z-index: 9;
					margin-top: 5px
				}
			}
			
			@media (min-width: 500px) {
				.mod_aside_v2 {
					display: block;
				}
				#search input[type=text] {
					font-size: 18px;
					height: 37px;
					width: 94%;
					float: left;margin-left: 3%;
				}
				.mt {
					margin-top: 30px
				}
				#search .button {
					position: static;
					padding: 10px;
					width: 94%;
					font-size: 16px !important;
					float: left;margin-left: 3%;
				}
				.select {
					width: 30%;
					height: 37px;
					float: left;
					z-index: 9
				}
			}
			
			@media (min-width: 900px) {
				.mod_aside_v2 {
					display: none;
				}
				.fixed {
					display: block;
				}
				#search input[type=text] {
					font-size: 18px;
					width: 80%;
					float: left;
					margin-top: 5px;margin-left: 1px;
				}
				.mt {
					margin-top: 200px
				}
				#search .button {
					position: static;
					padding: 8.5px 10px;
					width: 19%;
					float: left;
					border-radius: 5px ;margin-left: -3%;					
					margin-top: 5px
				}
				.select {
					width: 20%;
					height: 37px;
					float: left;
					margin-right: -1px;
					margin-top: 5px
				}
				
			}
			.div-p1{
					float: left;
				}
				.p1{
					float: left;
				}
				.p2{
					float: left;
				}
				.p3{
					float: left;
				}
				.p4{
					float: left;
				}
				.p5-span{
					color: red;
				}
				.div-p2{
					margin-top: 30px;
				}
		</style>

	</head>

	<body>
		<div class="container mt">
			<!-- <img src="/query/Public/img/jushi.png" alt=""> -->
			<img src="/query/Public/img/yuxing3.0.png" alt="">
			<div id="search" style="margin-top:35px">
				<form action="<?php echo U('Index/search');?>" method="post">
					<!-- <label for="search"></label> -->
					<div style="overflow:hidden">
						<input type="text" name="q" id="txt" class="txt" placeholder="请输入" autocomplete="off" value="<?php echo $_POST[q];?>">
						<input class="button" type="submit" value="搜索">
						<!-- <input class="add" type="button" value="添加"> -->
					</div>
					<table class="tb" id='tab' align="center">
						<?php if(is_array($sp)): foreach($sp as $key=>$sp): ?><tr style="margin-top:5px;">
								<td style="text-align:left;position:relative;width:100%" onclick="location.href='<?php echo U('Index/searchById');?>?shop_id=<?php echo ($sp["shop_id"]); ?>'">
									<a href="<?php echo U('Index/searchById');?>?shop_id=<?php echo ($sp["shop_id"]); ?>" style="display:block;padding:5px 0">
										 <?php echo ($sp["shop_name"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( 商品编号： <?php echo ($sp["shop_bianhao"]); ?> )
									</a>
									<span style="display:inline-block;height:70px;width:70px"><img src="/query/Uploads/<?php echo ($sp["shop_img"]); ?>" alt="" width="70" height="70" /></span>
									<div style="position:absolute;bottom:7px;left:85px;color:#333">
										<div class="div-p1">
											<p class="p1">供货商：<?php echo ($sp["name"]); ?></p>
											<p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;供货商编号：<?php echo ($sp["shop_kehao"]); ?></p>
										</div>
										<div class="div-p2">
											<p class="p4">单价：<?php echo ($sp["shop_price"]); ?></p>
										<p class="p5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;新价格：<span class="p5-span"><?php echo ($sp["shop_newprice"]); ?></span></p>
										</div>
									</div>
								</td>
								<!-- <td width="10%"><img src="/query/Uploads/<?php echo ($sp["shop_img"]); ?>" alt="" width="70" height="50" /></td> -->
							</tr><?php endforeach; endif; ?>
					</table>
				</form>
			</div>
		</div>
		<div class="fixed">
			<div class="">
				<a href='<?php echo U('Index/car');?>'>
					<img src="/query/Public/img/shop.png" alt="">
					<p>订单管理</p>
				</a>
			</div>
			<div class="">
				<a href='<?php echo U('Index/addgonghuoshang');?>'>
					<img src="/query/Public/img/shop1.png" alt="">
					<p>新增供应商</p>
				</a>
			</div>
			<div class="img">
				<a href='<?php echo U('Index/add');?>'>
					<img src="/query/Public/img/pic.png" alt="">
					<p>新增商品</p>
				</a>
			</div>
			<div class="img">
				<a href='<?php echo U('Index/fenlei');?>'>
					<img src="/query/Public/img/fl.png" alt="">
					<p>商品分类</p>
				</a>
			</div>
			<div class="img">
				<a href="<?php echo U('Login/updpwd');?>">
					<img src="/query/Public/img/pwd.png" alt="">
					<p>修改密码</p>
				</a>
			</div>
		</div>

		<style type="text/css">
			.mod_aside_v2 {
				position: fixed;
				z-index: 301;
				bottom: 90px;
				right: -260px;
				color: #999
			}
			
			.mod_aside_v2 .mod_aside_v2 i.iconfont {
				color: #666;
			}
			
			.mod_aside_v2 .mod_aside_v2_mask {
				position: fixed;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
				background: rgba(0, 0, 0, .5);
				display: none;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav {
				width: 260px;
				padding: 8px 0;
				background: #fff;
				border-radius: 4px 0 0 4px;
				height: 47px;
				z-index: 99999;
				position: relative;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_btn,
			.route {
				width: 45px;
				height: 40px;
				background: rgba(0, 0, 0, .7);
				position: absolute;
				left: -45px;
				top: 50%;
				margin-top: -20px;
				border-radius: 4px 0 0 4px;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_btn i,
			.route i {
				color: #fff;
				font-size: 10px;
				width: 2.2em;
				line-height: 1.3em;
				position: absolute;
				top: 50%;
				left: 20px;
				-webkit-transform: translateY(-50%);
				transform: translateY(-50%);
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_btn em,
			i {
				font-style: normal;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_btn a,
			.mod_aside_v2 .mod_aside_v2_nav_btn a:visited {
				text-decoration: none;
				color: #333;
				text-decoration: none;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_item span {
				display: block;
				padding: 0 5px;
				font-size: 10px;
				color: #666;
				margin-top: 8px;
				overflow: hidden;
				text-overflow: ellipsis;
				white-space: nowrap;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_item {
				float: left;
				width: 20%;
				text-align: center;
				position: relative;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_item img {
				width: 30px;
				height: 30px;
			}
			
			.mod_aside_v2 .mod_aside_v2_nav_btn:before,
			.route:before {
				content: "";
				position: absolute;
				left: 2px;
				top: 50%;
				width: 20px;
				height: 20px;
				margin-top: -10px;
				background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+aRQ2gAAAAIXRSTlMAIQhJ5XY8MifRhttuYlQZFMZ9aCu1qhwO+PC5o41QolvXYtHjAAAAvklEQVQ4y+3TOQ7DIBAFULOYxezGW7wl9z9lCg/pGKVMJP9qiifEfERz529Cu7aMJGCwn7ri1Iy4dnwScFLRurNplNekhFzq7qUTg/OYiHXHjM7gPCN1J7iBRWbnZd0NnO/X9WN2ou6IWbflctaeyML6oQNU1DtwFTg1BZ4NEsJXWCW2VmBScp5haesUJhk3pW7nAya9SfJT+ILJrDcCT80ExWSf9gj1iwGV3XhQkJJgkB5TC6NS4fuvcOfn8wbNnAbTPEyetAAAAABJRU5ErkJggg==) no-repeat 0 0;
				background-size: 100%;
			}
			
			.mod_aside_v2 .route:before {
				transform: rotate(-180deg);
			}
		</style>

		<div class="mod_aside_v2 main">
			<div class="mod_aside_v2_mask"></div>
			<div class="mod_aside_v2_nav">
				<div class="mod_aside_v2_nav_btn">
					<i data-tag="openNav">快速导航</i>
				</div>
				<div id="sideNavItems">
					<a href='<?php echo U('Index/car');?>' class="mod_aside_v2_nav_item">
						<img src="/query/Public/img/2.png" alt="">
						<span>订单管理</span>
					</a>
					<a href='<?php echo U('Index/addgonghuoshang');?>' class="mod_aside_v2_nav_item">
						<img src="/query/Public/img/1.png" alt="">
						<span>新增供应商</span>
					</a>
					<a href='<?php echo U('Index/add');?>' class="mod_aside_v2_nav_item img">
						<img src="/query/Public/img/3.png" alt="">
						<span>新增商品</span>
					</a>
					<a href='<?php echo U('Index/fenlei');?>' class="mod_aside_v2_nav_item img">
						<img src="/query/Public/img/fe1.png" alt="">
						<span>商品分类</span>
					</a>
					<a href="<?php echo U('Login/updpwd');?>" class="mod_aside_v2_nav_item img">
						<img src="/query/Public/img/pwd1.png" alt="">
						<span>修改密码</span>
					</a>
				</div>
			</div>
		</div>

		<script>
			$(function() {

				$(".mod_aside_v2_nav_btn").click(function() {
					var div = $(".mod_aside_v2");
					if(div.hasClass("main")) {
						div.removeClass("main").animate({
							right: "0"
						}, 300);
						$(this).addClass("route").find("i").html("收起");
						$('.mod_aside_v2_mask').css({
							"display": "block",
							"z-index": "9999"
						})
					} else {
						div.addClass("main").animate({
							right: "-260px"
						}, 300);
						$(this).removeClass("route").find("i").html("快速导航");
						$('.mod_aside_v2_mask').css("display", "none")

					}
				})

			});
		</script>
		<!-- <div style="text-align:center;margin:100px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div> -->
	</body>
	<script type="text/javascript">
		$(".button").click(function() {
			if($(".txt").val() == "") {
				alert("搜索内容不能为空");
				return false;
			} 
		});
	</script>

</html>