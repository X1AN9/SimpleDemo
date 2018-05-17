<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

	<head>

		<meta charset="utf-8">
		<title>宇星登录</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- CSS -->
		<link rel="stylesheet" href="/query/Public/css/reset.css">
		<link rel="stylesheet" href="/query/Public/css/style.css">
		<link rel="stylesheet" href="/query/Public/css/weui.min.css">
		<link rel="stylesheet" href="/query/Public/css/jquery-weui.css">

	</head>

	<body>

		<div class="page-container">
			<img src="/query/Public/img/yuxing3.0.png" alt="">
			<div class="div-login">
				<input type="text" name="username" class="username" placeholder="账号">
				<input type="password" name="userpwd" class="userpwd" placeholder="密码">
				<button type="submit" class="login">登录</button>
			</div>
		</div>
	</body>
	<script src="/query/Public/js/jquery-2.1.4.js"></script>
	<script src="/query/Public/js/jquery-weui.js"></script>

	<script type="text/javascript">
		$(".login").click(function() {
			$inc = '<?php echo U("Login/index");?>';
			$adm_name = $(".username").val();
			$adm_pwd = $(".userpwd").val();
			if($adm_name == "") {
				alert("请输入账号!");
//				$.toast('请输入账号!');
				return false;
			}
			if($adm_pwd == "") {
				alert("请输入密码!");
//				$.toast('请输入密码!');
				return false;
			}
			$.post($inc, {
				adm_name: $adm_name,
				adm_pwd: $adm_pwd
			}, function(dd) {
				if(dd.trim() == "1") {
					alert('登录成功!');
//					$.toast('登录成功!');
					setTimeout(function(){
                      location.href='<?php echo U("Mark/index");?>';
                    },1000)
				} else {
					alert('账号或密码错误,请重新输入!');
//					$.toast('账号或密码错误,请重新输入!');
				}
			})
		})
	</script>

</html>