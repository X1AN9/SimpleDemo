<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<title>新增供货商</title>
		<link rel="stylesheet" href="/query/Public/css/weui.min.css">
		<link rel="stylesheet" href="/query/Public/css/jquery-weui.css">

		<style type="text/css" media="screen">
			body {
				background-color: #ffffff;
				margin: 0 auto;
				max-width: 700px
			}
			
			body,
			input,
			button {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			
			.container {
				margin: 30px auto;
				/* width: 700px; */
				text-align: center;
			}
			
			a {
				color: #4183c4;
				text-decoration: none;
				font-weight: normal;
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
				background-color: #fafafa;
				background-repeat: no-repeat;
				background-position: right center;
				border: 1px solid #ccc;
				border-radius: 3px;
				box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				transition: all 0.15s ease-in;
				-webkit-transition: all 0.15s ease-in 0;
				vertical-align: middle;
			}
			
			.button {
				position: relative;
				display: inline-block;
				margin: 0;
				padding: 8px 15px;
				font-size: 13px;
				font-weight: normal;
				color: #333;
				text-shadow: 0 1px 0 rgba(255, 255, 255, 0.9);
				white-space: nowrap;
				background-color: #eaeaea;
				background-repeat: repeat-x;
				border-radius: 3px;
				border: 1px solid #ddd;
				border-bottom-color: #c5c5c5;
				vertical-align: middle;
				cursor: pointer;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				-webkit-appearance: none;
				margin-top: 10px;
			}
			
			.button:focus,
			input[type=text]:focus,
			input[type=password]:focus {
				outline: none;
				border-color: #51a7e8;
			}
			
			label[for=search] {
				display: block;
				text-align: left;
			}
			
			#search label {
				font-weight: 200;
				padding: 5px 0;
			}
			
			#search input[type=text] {
				font-size: 18px;
				width: 80%;
			}
			
			#search .button {
				padding: 10px;
				width: 90px;
			}
			
			.select {
				width: 120px;
				height: 37px;
			}
			
			.remark {
				margin-top: 10px;
				font-size: 18px;
				width: 500px;
				height: 100px;
				background-color: #fff;
			}
			
			tbody,
			table,
			form {
				width: 90%
			}
			
			tr th {
				width: 90px;
				padding: 2px;
				font-weight: normal;
			}
			
			tr td {
				width: calc(100% - 90px);
				padding: 2px
			}
			
			.button,
			.button1 {
				background: #e02e24;
				border: none;
				color: #ffffff;
				padding: 8px 17px;
				cursor: pointer;
				border-radius: 3px;
				font-weight: normal;
			}
			
			.button1 {
				background: #2B74C3
			}
			
			.td1 {}
		</style>
	</head>

	<body>
		<div class="container">
			<div id="search">
				<form action="<?php echo U('Mark/addgonghuoshang');?>" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<th>供货单位:</th>
							<td><input type="text" class="txtname" name="name"></td>
						</tr>
						<tr>
							<th>联系人:</th>
							<td><input type="text" class="person" name="person"></td>
						</tr>
						<tr>
							<th>联系电话:</th>
							<td><input type="text" class="phone" name="phone"></td>
						</tr>
						<tr>
							<th>公司电话:</th>
							<td><input type="text" class="zjphone" name="zjphone"></td>
						</tr>
						<tr>
							<th>地址:</th>
							<td><input type="text" class="address" name="address"></td>
						</tr>
						<tr>
							<th>银行帐户:</th>
							<td><input type="text" class="card" name="card"></td>
						</tr>
						<tr>
							<th>银行卡号:</th>
							<td><input type="text" class="cardname" name="cardname"></td>
						</tr>
						<tr>
							<th>开户行:</th>
							<td><input type="text" class="cardkaihuhang" name="cardkaihuhang"></td>
						</tr>
					</table>
					<input type="submit" class="button" id="btn" value="添加">
					<input type="button" class="button button1" id="btn1" value="返回">
				</form>
			</div>
		</div>
		<div style="text-align:center;margin:100px 0; font:normal 14px/24px 'MicroSoft YaHei';">
		</div>
		<script src="/query/Public/js/jquery-2.1.4.js"></script>
		<script src="/query/Public/js/jquery-weui.js"></script>
		
		<script type="text/javascript">
			$("#btn").click(function() {
				if($("input").val() == "") {
					alert("添加的商品信息不能为空");
//					$.toast('添加的商品信息不能为空!');
//					return false;
				} else{
					alert("添加成功");
//					$.toast('添加成功!');
				}
				
			});
			$("#btn1").click(function() {
				history.go(-1);
			});
		</script>

		<script type="text/javascript">
			$(".txtname").blur(function() {
				$txt = $(this).val();
				$apiUrl = '<?php echo U("Mark/querygonghuoshang");?>';
				$.post($apiUrl, {name: $txt}, function(dd) {
					if(dd.trim() == "0") {
						
					} else {
						alert("该供货单位已存在");
//						$.toast('该供货单位已存在!');
					}
				});
			});
		</script>
	</body>

</html>