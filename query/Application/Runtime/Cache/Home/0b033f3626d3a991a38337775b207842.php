<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>订单详情</title>
		<script src="/query/Public/js/jquery-2.1.4.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			html {
				max-width: 600px;
				margin: 0 auto;
			}
			
			table {
				background-color: #FFF;
				width: 100%;
				color: #565;
				font: 12px arial;
			}
			
			table caption {
				padding: 5px 0;
				font-size: 24px;
				text-align: center;
				margin-bottom: 10px
			}
			
			.foot {
				padding: 5px 0;
				font-size: 14px;
				text-align: center;
			}
			
			table,
			td,
			th {
				line-height: 32px;
				vertical-align: middle;
				text-align: left;
			}
			
			thead td,
			tbody td,
			tfoot td {
				background-color: #fefefe;
				padding: 0 4px;
				line-height: 32px;
			}
			
			thead th,
			tfoot th {
				background-color: #fefefe;
				width: 60px !important;
				padding-left: 5px
			}
			
			tbody th {
				font-size: 14px;
				font-weight: bold;
				line-height: 19px;
				text-align: center;
				padding: 5px
			}
			
			tbody td {
				text-align: center;
			}
			
			.button {
				width: 100%;
				position: relative;
			}
			
			.button span {
				border: none;
				font-size: 16px;
				color: #ffffff;
				margin: 10px 20px 0 0;
				border-radius: 3px;
				float: right;
				color: #444;
				cursor: pointer
			}
			
			.button img {
				vertical-align: middle;
			}
			
			@media (min-width: 300px) {
				.print {
					display: none
				}
				.share {
					display: inline-block;
				}
				.share1 {
					display: none;
				}
			}
			
			@media (min-width: 900px) {
				.print {
					display: inline-block;
				}
				.share {
					display: none;
				}
				.share1 {
					display: inline-block;
				}
			}
			
			#mode {
				position: fixed;
				background: #000;
				opacity: 0.4;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				z-index: 2;
				display: none
			}
			
			#text {
				width: 100%;
				height: 80px;
				line-height: 30px;
				position: fixed;
				left: 0;
				bottom: 0;
				z-index: 666;
				background: #ffffff;
				margin: 0 auto;
				text-align: center;
				padding: 30px 0;
				display: none
			}
			
			#text img {
				vertical-align: middle;
			}
			
			#text span {
				display: inline-block;
				width: 50px;
				color: #666
			}
			
			#sss span {
				display: inline-block;
				color: #666;
				margin: 0;
				font-size: 13px
			}
			
			#sss {
				cursor: pointer;
				background: #ffffff;
				border: 1px solid #cfcfcf;
				width: 100px;
				position: absolute;
				right: 40px;
				top: 40px;
				margin: 0 auto;
				text-align: center;
				padding: 25px 25px;
				display: none;
				border-radius: 5px
			}
			
			a {
				text-decoration: none;
				color: #444;
			}
		</style>
	</head>

	<body>

		<table cellspacing="0" cellpadding="0" border="1" style="border-collapse:collapse">
			<caption>杭州宇星公司采购订单</caption>
			<thead>
				<?php if(is_array($ghs)): foreach($ghs as $key=>$gs): ?><tr>
						<th>供货单位</th>
						<td colspan="3"><?php echo ($gs["name"]); ?></td>
						<th>单号</th>
						<td colspan=4><span class="year">YXMY</span>-<span><?php echo ($gs["danhao"]); ?></span></td>
					</tr>
					<tr>
						<th>联系人</th>
						<td colspan="3"><?php echo ($gs["person"]); ?></td>
						<th></th>
						<td colspan=4></td>
					</tr>
					<tr>
						<th>联系电话</th>
						<td colspan="3"><?php echo ($gs["phone"]); ?></td>

						<th>银行账户</th>
						<td colspan=4><?php echo ($gs["card"]); ?></td>
					</tr>
					<tr>
						<th>公司电话</th>
						<td colspan="3"><?php echo ($gs["zjphone"]); ?></td>
						<th>银行卡号</th>
						<td colspan=4><?php echo ($gs["cardname"]); ?></td>
					</tr>
					<tr>
						<th>地址</th>
						<td colspan="3"><?php echo ($gs["address"]); ?></td>
						<th>开户行</th>
						<td colspan=4><?php echo ($gs["cardkaihuhang"]); ?></td>
					</tr>
					<tr>
						<th>定货时间</th>
						<td colspan="3" class="time"></td>

						<th>交货时间</th>
						<td colspan=4></td>
					</tr><?php endforeach; endif; ?>
			</thead>
			<tbody>
				<tr>
					<th>编号</th>
					<th>品名</th>
					<th>客号</th>
					<th>单价</th>
					<th>箱数</th>
					<th>个/箱</th>
					<th>总数量</th>
					<th>金额</th>
					<th>图片</th>
				</tr>
				<?php if(is_array($shop)): foreach($shop as $key=>$sp): ?><tr>
						<td><?php echo ($sp["shop_bianhao"]); ?></td>
						<td><?php echo ($sp["shop_name"]); ?></td>
						<td><?php echo ($sp["shop_kehao"]); ?></td>
						<td><?php echo ($sp["shop_price"]); ?></td>
						<td><?php echo ($sp["shop_xiangshu"]); ?></td>
						<td><?php echo ($sp["shop_baozhuanglv"]); ?></td>
						<td><?php echo ($sp["shop_num"]); ?></td>
						<td><?php echo ($sp["allprice"]); ?></td>
						<td><img src="/query/Uploads/<?php echo ($sp["shop_img"]); ?>" width="40" height="40" /></td>
					</tr><?php endforeach; endif; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="9" class="foot">
						要求清装全部安图片生产，在内盒上写上我的货号
					</td>
				</tr>
				<tr>
					<td colspan="9" class="foot" style="margin-top:-10px">
						先确定好交货时间，要安交货时间发货
					</td>
				</tr>
				<tr>
					<td colspan="7" style="text-align:right;">已付定金</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<?php if(is_array($ghs)): foreach($ghs as $key=>$gs): ?><td colspan="7" style="text-align:right;">总金额</td>
						<td colspan="2" style="text-align:center"><?php echo ($gs["lastprice"]); ?></td><?php endforeach; endif; ?>
				</tr>
				<tr>
					<th>物流公司</th>
					<td colspan="8">杭州至上货物运输有限公司</td>
				</tr>
				<tr>
					<th>杭州地址</th>
					<td colspan="8"></td>
				</tr>
				<tr>
					<th>收件人</th>
					<td colspan="3">张文楚</td>
					<th>电话</th>
					<td colspan="4">0571-8894783</td>
				</tr>
				<tr>
					<th>联系电话</th>
					<td colspan="3">1538945783</td>
					<th>义务地址</th>
					<td colspan="4">义务樊村9栋1号</td>
				</tr>
				<tr>
					<th>公司电话</th>
					<td colspan="3">8915789</td>
					<th>电话</th>
					<td colspan="4">0579-85250518,83554432</td>
				</tr>
				<tr>
					<th colspan="9">QQ:239940834</th>
				</tr>
			</tfoot>
		</table>

		<div class="button">
			<span type="button" class="print"><img src="/query/Public/img/print.png" alt="" width="20"><a href="javascript:window.print()">打印</a></span>
		</div>
	</body>
	<script type="text/javascript">
		function modeclose() {
			// alert("ssssss")
			document.getElementById("mode").style.display = "none";
			document.getElementById("text").style.display = "none";
			document.getElementById("sss").style.display = "none";
		}

		function app() {
			document.getElementById("mode").style.display = "block";
			document.getElementById("text").style.display = "block";
		}

		function app1() {
			document.getElementById("sss").style.display = "block";
		}
	</script>
</html>