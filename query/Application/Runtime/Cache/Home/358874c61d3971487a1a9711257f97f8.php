<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0058)http://www.17sucai.com/preview/1/2017-01-14/123/index.html -->
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>所有分类</title>
		<link rel="stylesheet" href="/query/Public/css/ectouch.css">
	</head>

	<body style="max-width: 640px; font-size: 14px;">
		<div class="con">
			<aside>
				<div class="menu-left scrollbar-none" id="sidebar">
					<ul>
						<?php if(is_array($qr)): foreach($qr as $k=>$qu): ?><li <?php if(($k == 0)): ?>class="active"<?php endif; ?> data-cataid="<?php echo ($qu["type_id"]); ?>"><?php echo ($qu["type_name"]); ?></li><?php endforeach; endif; ?>
					</ul>

				</div>
			</aside>

			<section class="menu-right padding-all j-content">
				<ul>
					<?php if(is_array($shop)): foreach($shop as $key=>$sp): ?><li class="w-3">
						<?php if(is_array($sp)): foreach($sp as $key=>$sp1): if(($sp2[shop_typeid] == $sp2[type_id])): ?><a href='<?php echo U(' Index/searchById ');?>?shop_id=<?php echo ($sp1["shop_id"]); ?>'></a> 
								<img src="/query/Uploads/<?php echo ($sp1["shop_img"]); ?>">
								<span><?php echo ($sp1["shop_name"]); ?></span><?php endif; endforeach; endif; ?>
					</li><?php endforeach; endif; ?>
				</ul>
			</section>
		</div>

		<script type="text/javascript" src="/query/Public/js/jquery.min(1).js"></script>
		<script type="text/javascript" src="/query/Public/js/swiper-3.2.5.min.js"></script>
		<script type="text/javascript">
			$(function($) {
				$('#sidebar ul li').click(function() {
					$(this).addClass('active').siblings('li').removeClass('active');
					var index = $(this).index();
					$('.j-content').eq(index).show().siblings('.j-content').hide();
				})
			})
		</script>

	</body>

</html>