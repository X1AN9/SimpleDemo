<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0058)http://www.17sucai.com/preview/1/2017-01-14/123/index.html -->
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>商品分类</title>
		<link rel="stylesheet" href="/query/Public/css/ectouch.css">
	</head>
	<style type="text/css">
		@media (min-width: 300px) {
			.w-3 img {
				width: 70%;
				height: 75px;
				background-color: #FAFAFA;
			}
		}
		
		@media (min-width: 600px) {
			.w-3 img {
				width: 80%;
				height: 110px;
				background-color: #FAFAFA;
			}
		}
		.btn-back{
			border-radius: 10px;
			background-color: #5B9BFE;
			width: 100%;
			height: 37px;
			padding: 0 15px;
			width: 640px;
			border: none;
			height: 35px;
			line-height: 35px;
			font-size: 13px;
			color: #FFFFFF;
			text-align: center;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			margin: 0 auto;
			z-index: 998;
		}
		.top-title {
			padding: 0;
			position: relative;
			margin: 0px auto;
			text-align: center;
			font-size: 16px;
			width: 640px;
		}
		*{box-sizing: border-box;}
	</style>

	<body style="max-width: 640px; font-size: 14px;">
		
		<div class="top-title top-search">
			<input type="text" class="btn-back" readonly="readonly" value="返回"/>
		</div>
		<div class="con">
			<aside>
				<div class="menu-left scrollbar-none" id="sidebar">
					<ul>
						<?php if(is_array($qr)): foreach($qr as $k=>$qu): ?><li <?php if(($k == 0)): ?>class="active"<?php endif; ?> data-cataid="<?php echo ($qu["type_id"]); ?>"><?php echo ($qu["type_name"]); ?></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</aside>

			<?php if(is_array($shop)): foreach($shop as $key=>$sp): ?><section class="menu-right padding-all j-content" style="display: none;">
					<ul>
						<?php if(is_array($sp)): foreach($sp as $key=>$sp1): ?><li class="w-3">
								<a href='<?php echo U("Mark/searchById");?>?shop_id=<?php echo ($sp1["shop_id"]); ?>'></a>
								<img src="/query/Uploads/<?php echo ($sp1["shop_img"]); ?>">
								<span style="font-size:12px;white-space: nowrap;overflow: hidden;"><?php echo ($sp1["shop_name"]); ?></span>
							</li><?php endforeach; endif; ?>
					</ul>
				</section><?php endforeach; endif; ?>
		</div>

		<script type="text/javascript" src="/query/Public/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="/query/Public/js/swiper-3.2.5.min.js"></script>
		<script type="text/javascript">
			$(function($) {
				$('.j-content').eq(0).show();
				$('#sidebar ul li').click(function() {
					$(this).addClass('active').siblings('li').removeClass('active');
					var index = $(this).index();
					$('.j-content').eq(index).show().siblings('.j-content').hide();
				})
			})
			
			$(".btn-back").click(function() {
				history.go(-1);
			})
		</script>

	</body>

</html>