<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<title>查看商品</title>
		<script src="/query/Public/js/jquery-2.1.4.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="/query/Public/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="/query/Public/js/shopping.js"></script>

		<link type="text/css" rel="stylesheet" href="/query/Public/css/base.css" />
		<link type="text/css" rel="stylesheet" href="/query/Public/css/module.css" />
		<style>
			@media (min-width: 300px) {
				.header {
					display: none
				}
				.header1 {
					display: inline-block;
				}
			}
			
			@media (min-width: 900px) {
				.header {
					display: inline-block;
				}
				.header1 {
					display: none
				}
			}
			
			#id {
				display: none;
			}
			
			.del-shop {
				/*display: none;*/
			}
			
			.num {
				display: none;
			}
			
			#goods_id {
				display: none;
			}
			
			#shuliang {
				display: none;
			}
			.head-img img{
				float: right;
				width: 48px;
				height: 48px;
				margin-left: 495px;
			}
			.phone-img img{
				position:fixed;right: 5px;
				width: 36px;
				height: 40px;
			}
		</style>
	</head>

	<body>

		<!--头部开始-->
		<div class="header" style="margin:20px 0">
			<img src="/query/Public/img/yuxing3.0.png" height="40" alt="">
			<h2 style="position:absolute;top:15px;left:50%;margin-left:-56px">订单管理</h2>
			<a href="<?php echo U("Form/query");?>" class="head-img">
				<img src="/query/Public/img/search-yellow.png"/>
			</a>
		</div>
		<div class="header1">
			<!-- <img src="/query/Public/img/yuxing3.0.png" height="40" alt=""> -->
			<h2>订单管理</h2>
			<a href="#" class="back" onclick="history.go(-1)"><span></span></a>
			<a href="<?php echo U("Form/query");?>" class="phone-img">
				<img src="/query/Public/img/search-yellow.png"/>
			</a>
		</div>
		<!--头部结束-->

		<!--商品详情-->
		<div class="shopping">
			<?php if(is_array($sp)): foreach($sp as $key=>$sp1): ?><div class="shop-group-item">
					<div class="shop-name">
						<input type="checkbox" class="check goods-check shopCheck">
						<h4 style="padding-left:20px;">
							<a href="#">
								<?php if(is_array($gs)): foreach($gs as $key=>$ghs): if($ghs[id] == $sp1[0][shop_gonghuoshang]): echo ($ghs["name"]); endif; endforeach; endif; ?>
							</a>
						</h4>
					</div>
					<input type="text" id="shuliang" value="" />
					<input type="text" id="goods_id" value="" />
					<?php if(is_array($sp1)): foreach($sp1 as $key=>$sp2): ?><ul>
						<?php if(is_array($sp2["cp"])): foreach($sp2["cp"] as $key=>$sp3): ?><li data="shop-info-<?php echo ($sp1[0]['shop_id']); ?>">
								<div class="shop-info">
									<input type="checkbox" class="check goods-check goodsCheck" value="<?php echo ($sp3["shop_id"]); ?>">
									<input type="text" id="id" data-hq='data-hq' value="<?php echo ($sp3["shop_id"]); ?>" />
									<div class="shop-info-img">
										<a href="#"><img src="/query/Uploads/<?php echo ($sp3["shop_img"]); ?>" /></a>
									</div>
									<div class="shop-info-text">
										<h3><?php echo ($sp3["shop_name"]); ?></h3>
										<div class="shop-brief">
											<span>规格:<?php echo ($sp3["shop_c"]); ?>x<?php echo ($sp3["shop_w"]); ?>x<?php echo ($sp3["shop_h"]); ?>cm</span>
										</div>
										<div class="shop-price">
											<div class="shop-pices">￥<b class="price"><?php echo ($sp3["shop_price"]); ?></b></div>
											<div class="shop-arithmetic">
												<a href="javascript:;" class="minus ssss" datafldjian="<?php echo ($sp3["shop_id"]); ?>">-</a>
												<input type="text" class="num" name="" datafld="<?php echo ($sp3["shop_id"]); ?>" value="1" />
												<a href="javascript:;" class="plus ssss" datafldjian="<?php echo ($sp3["shop_id"]); ?>">+</a>
											</div>
											<span class="fa fa-trash-o del" style="cursor: pointer;font-size:14px;color:#888"><a href='<?php echo U("Mark/delcar");?>?shop_id=<?php echo ($sp3["shop_id"]); ?>'>删除</a></span>
										</div>
									</div>
								</div>
							</li><?php endforeach; endif; ?>
					</ul><?php endforeach; endif; ?>
					<div class="shopPrice">
						本店总计：￥<span class="shop-total-amount ShopTotal" style="padding-right:20px">0.00</span>
						<!--a href='<?php echo U('Mark/form');?>' class="settlement"><?php echo ($sp1[0]['shop_gonghuoshang']); ?>下单</a-->
						<a class="settlement" data="<?php echo ($sp3["shop_id"]); ?>" data-shop=" <?php echo ($sp1[0]['shop_id']); ?>">下单</a>
					</div>
				</div><?php endforeach; endif; ?>
		</div>

		<!--总价结算-->
		<!-- <div class="payment-bar">
			<div class="all-checkbox"><input type="checkbox" class="check goods-check" id="AllCheck">全选</div>
			<div class="shop-total">
				<strong>总价：<i class="total" id="AllTotal">0.00</i></strong>
				<span>减免：123.00</span>
			</div>
			<a href="#" class="settlement">结算</a>
		</div> -->
	</body>
	<script type="text/javascript">
		$('.shopCheck').click(function() {
			if(!$(this).parents().nextAll('ul').children('li').children('.shop-info').children('.goodsCheck').hasClass("weui-visible")) {
				$(this).parents().nextAll('ul').children('li').children('.shop-info').children('.goodsCheck').addClass("weui-visible");
			} else {
				
				
				$(this).parents().nextAll('ul').children('li').children('.shop-info').children('.goodsCheck').removeClass("weui-visible");
			}
			
		})
		$('.goodsCheck').click(function() {

			if(!$(this).hasClass("weui-visible")) {
				$(this).addClass("weui-visible");
			} else {
				$(this).removeClass("weui-visible");
			}

		})

		$('.settlement').click(function() {

			var selected_sucaihuo = "";
			var s = "";

			$('.weui-visible').each(function() {

				selected_sucaihuo += $(this).val() + ",";
				s +=$(this).nextAll('.shop-info-text').children('.shop-price').children('.shop-arithmetic').children('.num').val() + ",";

			})

			//alert('========' + selected_sucaihuo);
			$("#goods_id").val(selected_sucaihuo);
			$("#shuliang").val(s);
			
			if(s!=""&&selected_sucaihuo!=""){
				location.href = '<?php echo U("Form/index");?>?id=' + selected_sucaihuo + '&num=' + s;
			}else{
				alert("你还未选择下单商品!")
			}
		})
	</script>
	<!--<script language="javascript">
		var d = new Date()
		var vYear = d.getFullYear()
		var vMon = d.getMonth() + 1
		var vDay = d.getDate()
		var h = d.getHours();
		var m = d.getMinutes();
		s = vYear + '-' + (vMon < 10 ? "0" + vMon : vMon) + '-' + (vDay < 10 ? "0" + vDay : vDay) + ' ' + (h < 10 ? "0" + h : h) + ':' + (m < 10 ? "0" + m : m);
	</script>-->

</html>