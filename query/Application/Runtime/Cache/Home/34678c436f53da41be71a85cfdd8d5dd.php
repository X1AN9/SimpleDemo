<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<link type="text/css" rel="stylesheet" href="/query/Public/css/base.css" />
		<link rel="stylesheet" href="/query/Public/css/weui.min.css">
		<link rel="stylesheet" href="/query/Public/css/jquery-weui.css">
		<title>查看商品</title>
		<style type="text/css" media="screen">
			body {
				background-color: #fff;
				margin: 0 auto 50px;
				max-width: 700px;
				font-size: 16px
			}
			
			body,
			input,
			button {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			
			.container {
				width: 100%;
				margin: 0 auto;
				text-align: left;
			}
			
			a {
				color: #4183c4;
				text-decoration: none;
				font-weight: bold;
			}
			
			img {
				vertical-align: middle;
			}
			
			.item-detail {
				background: #FFF;
			}
			
			.item-detail .detail-row {
				padding: 8px 15px;
				overflow: hidden;
				border-bottom: 1px solid #eee
			}
			
			.item-detail .item-tit {
				line-height: 1.35rem;
				font-size: 18px;
				vertical-align: middle;
				display: table-cell;
				color: #000;
				overflow: hidden;
				text-overflow: ellipsis;
			}
			
			.item-detail .item-price .price {
				color: #E02E24;
				font-size: 1.02rem;
				margin: 0;
			}
			
			.item-detail .item-price .discout {
				color: #999;
				font-size: 14px;
				margin: 0;
			}
			
			.item-detail .item-price .sprice {
				color: #999;
				margin: 0;
			}
			
			.item-detail .item-price .sprice del {
				color: #999;
			}
			
			.item-detail .item-price .sellnum {
				float: right;
				color: #999;
				font-size: 12px;
			}
			
			.item-detail .item-tips {
				font-size: 12px;
			}
			
			.item-detail .item-tips img {
				width: 11px;
				height: 11px;
				position: absolute;
				top: 1px;
				left: 0
			}
			
			.item-detail .item-tips em {
				margin-right: 10px;
				font-style: normal;
				position: relative;
				padding-left: 14px
			}
			
			.item-detail .item-tips i {
				margin-top: 3px;
				color: #0099cc;
				width: 20px;
			}
			
			.item-intro-xq {
				position: relative;
				overflow: hidden;
				max-width: 100%;
				background: #FFF;
				/*border-top: thin solid #eee;*/
				border-bottom: thin solid #eee;
				margin-top: 15px
			}
			
			.item-intro-xq h2 {
				height: 40px;
				line-height: 40px;
				font-size: 16px;
				padding: 0 15px;
				border-bottom: thin solid #eee;
				font-weight: normal;
			}
			
			.item-intro-xq .intro-bd {
				line-height: 25px;
				font-size: 14px;
				overflow: hidden;
				padding: 0 15px
			}
			
			.item-intro-xq .intro-bd span,
			.item-intro-xq .intro-bd p {
				width: 45%;
				text-align: left;
				display: inline-block;
				line-height: 35px;
				font-size: 14px;
				color: #777
			}
			
			.item-intro-xq .intro-bd p {
				width: 100%;
				margin: 0
			}
			
			.cart-bar {
				position: fixed;
				right: 0px;
				left: 0px;
				background: #FAFAFA;
				backface-visibility: hidden;
				border-top: 0px solid #dedede
			}
			
			.cart-bar {
				overflow: hidden;
				font-size: 0px;
				bottom: 0px;
				max-width: 680px;
				height: 50px;
				padding: 0px;
				margin: 0 auto
			}
			
			.cart-bar .cart {
				float: left;
				width: 70px;
				height: 50px;
				color: #999;
				text-align: center;
				border-top: 1px solid #dedede
			}
			
			.cart-bar span {
				color: #999;
			}
			
			.cart-bar .result {
				position: relative;
				float: left;
				width: calc(100% - 70px);
				height: 50px;
				z-index: 10000;
			}
			
			.cart-bar button {
				font-size: 18px;
				position: relative;
				background: #FF9900;
				color: #fff;
				border: 0;
				height: 50px;
				border: 0;
				padding: 0;
				margin: 0;
			}
			
			.mode {
				background: #000;
				opacity: .6;
				position: fixed;
				top: 0;
				left: 0;
				z-index: 11;
				width: 100%;
				height: 100%
			}
			
			.main {
				background: #fff;
				max-width: 700px;
				height: 30%;
				position: fixed;
				bottom: 50px;
				left: 0;
				z-index: 888;
				margin: 0 auto;
				right: 0
			}
			
			.buy {
				height: 50px;
				background-color: #317EF3;
				position: fixed;
				bottom: 0;
				max-width: 700px;
				left: 0;
				z-index: 888;
				margin: 0 auto;
				right: 0;
				text-align: center;
				color: #fff;
				line-height: 50px;
				font-size: 16px
			}
		</style>

	</head>

	<body>
		<div class="header" style="margin:20px;">
			<img src="/query/Public/img/yuxing3.0.png" height="44" alt="">
		</div>
		<div class="container" style="border-top:1px solid #e0e0e0">
			<?php if(is_array($sp)): foreach($sp as $key=>$sp): ?><div class="item-detail">
					<div style="width:100%;min-height:150px;border-bottom:1px solid #efefef">
						<img src="/query/Uploads/<?php echo ($sp["shop_img"]); ?>" class="pimg" style="width:80%;padding: 0 10%;" />
					</div>
					<div class="detail-row" style="">
						<div class="item-tit" style="">
							<?php echo ($sp["shop_name"]); ?>
						</div>
					</div>
					<div class="detail-row" style="">
						<div class="item-price" style="">
							<p class="price">
								<span id="price_jiage">新价格：￥<?php echo ($sp["shop_newprice"]); ?></span>
								<span class="discout" style="margin-left:5px"> 单价：￥<?php echo ($sp["shop_price"]); ?></span>

								<span class="sellnum">销量 43</span>
							</p>
						</div>
					</div>
				</div>

				<div class="item-intro-xq">
					<h2>商品详情</h2>
					<div class="intro-bd" id="view">
						<span>商品编号：<?php echo ($sp["shop_bianhao"]); ?></span>
						<span>供货商：<?php echo ($sp["shop_gonghuoshang"]); ?></span>
						<span>供应商编号：<?php echo ($sp["shop_kehao"]); ?></span>

						<span>重量：<?php echo ($sp["shop_weight"]); ?> kg</span>
						<span>数量：<?php echo ($sp["shop_number"]); ?> 个/箱</span>
						<div style="color: #777;line-height: 37px;">规格：<?php echo ($sp["shop_c"]); ?> x <?php echo ($sp["shop_w"]); ?> x <?php echo ($sp["shop_h"]); ?> cm</div>
					</div>
				</div><?php endforeach; endif; ?>

			<footer class="cart-bar">
				<a class="cart" href='<?php echo U('Mark/car');?>'>
					<i><img src="/query/Public/img/shop.png" alt="" width="30" height="30" style="margin-top:9px"></i>
				</a>
				<div class="result">
					<a href="javascript:;" class="open-popup" data-target="#full" data-button="data-button-gm">
						<button class="backbtn" style="background:#317EF3;width:30%">
							返回
						</button>
					</a>
					<a href="<?php echo U('Mark/update');?>?id=<?php echo ($sp["shop_id"]); ?>" class="open-popup" data-target="#full" data-button="data-button-gm">
						<button class="" style="background:#E02E24;width:35%">
							纠正商品
						</button>
					</a>
					<a href='<?php echo U('Mark/addcar');?>?id=<?php echo ($sp["shop_id"]); ?>&gonghuoshang=<?php echo ($sp["shop_gonghuoshang"]); ?>'>
						<button class="open-popup1" data-target="#full" data-button="data-button-gwc" style="width:35%">
							加入订单
			            </button>
					</a>

				</div>
			</footer>

			<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2;width:100%;height:100%;display:none;">
				<div id="innerdiv" style="position:absolute;">
					<img id="bigimg" style="border:5px solid #fff;" src="" />
				</div>
			</div>
		</div>
		<!-- <div style="text-align:center;margin:100px 0; font:normal 14px/24px 'MicroSoft YaHei';">
		</div> -->
	</body>
	<script src="/query/Public/js/jquery-2.1.4.js"></script>
	<script src="/query/Public/js/jquery-weui.js"></script>
	<script type="text/javascript">
		$('.open-popup1').click(function(){
			alert("加入成功");
//			$.toast('加入成功!');
		})
		
		$(function() {
			$(".pimg").click(function() {
				var _this = $(this); //将当前的pimg元素作为_this传入函数
				imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
			});
		});

		function imgShow(outerdiv, innerdiv, bigimg, _this) {
			var src = _this.attr("src"); //获取当前点击的pimg元素中的src属性
			$(bigimg).attr("src", src); //设置#bigimg元素的src属性

			/*获取当前点击图片的真实大小，并显示弹出层及大图*/
			$("<img/>").attr("src", src).load(function() {
				var windowW = $(window).width(); //获取当前窗口宽度
				var windowH = $(window).height(); //获取当前窗口高度
				var realWidth = this.width; //获取图片真实宽度
				var realHeight = this.height; //获取图片真实高度
				var imgWidth, imgHeight;
				var scale = 0.8; //缩放尺寸，当图片真实宽度和高度大于窗口宽度和高度时进行缩放

				if(realHeight > windowH * scale) { //判断图片高度
					imgHeight = windowH * scale; //如大于窗口高度，图片高度进行缩放
					imgWidth = imgHeight / realHeight * realWidth; //等比例缩放宽度
					if(imgWidth > windowW * scale) { //如宽度扔大于窗口宽度
						imgWidth = windowW * scale; //再对宽度进行缩放
					}
				} else if(realWidth > windowW * scale) { //如图片高度合适，判断图片宽度
					imgWidth = windowW * scale; //如大于窗口宽度，图片宽度进行缩放
					imgHeight = imgWidth / realWidth * realHeight; //等比例缩放高度
				} else { //如果图片真实高度和宽度都符合要求，高宽不变
					imgWidth = realWidth;
					imgHeight = realHeight;
				}
				$(bigimg).css("width", imgWidth); //以最终的宽度对图片缩放

				var w = (windowW - imgWidth) / 2; //计算图片与窗口左边距
				var h = (windowH - imgHeight) / 2; //计算图片与窗口上边距
				$(innerdiv).css({
					"top": h,
					"left": w
				}); //设置#innerdiv的top和left属性
				$(outerdiv).fadeIn("fast"); //淡入显示#outerdiv及.pimg
			});

			$(outerdiv).click(function() { //再次点击淡出消失弹出层
				$(this).fadeOut("fast");
			});
		}
	</script>
	<script type="text/javascript">
		$(".backbtn").click(function() {
			history.go(-1);
		})
	</script>

</html>