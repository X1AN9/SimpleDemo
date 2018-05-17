<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

	<head>

		<meta charset="utf-8">
		<title>Fullscreen Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- CSS -->
		<link rel="stylesheet" href="/query/Public/css/reset.css">
		<link rel="stylesheet" href="/query/Public/css/style.css">
		<script src="/query/Public/js/jquery-2.1.4.js" type="text/javascript" charset="utf-8"></script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

	</head>

	<body>

		<div class="page-container">
			<h1>登录</h1>
			<div class="div-login">
				<input type="text" name="username" class="username" placeholder="账号">
				<input type="password" name="userpwd" class="userpwd" placeholder="密码">
				<button type="submit" class="login">登录</button>
			</div>
		</div>
	</body>

	<script type="text/javascript">
		$(".login").click(function() {
			$inc = '<?php echo U("Index/login");?>';
			$adm_name = $(".username").val();
			if($adm_name == "") {
				alert("请输入账号!");
				return false;
			}
			$adm_pwd = $(".userpwd").val();
			$.post($inc, {
				adm_name: $adm_name,
				adm_pwd: $adm_pwd
			}, function(dd) {
				if(dd.trim() == "1") {
					alert('登录成功!');
					setTimeout(function(){
                      location.href="index.html";
                    },1000)
				} else {
					alert('登录失败!');
				}
			})
		})
	</script>

</html>