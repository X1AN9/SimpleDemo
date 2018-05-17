<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

	<head>

		<meta charset="utf-8">
		<title>修改密码</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- CSS -->
		<link rel="stylesheet" href="/query/Public/css/reset.css">
		<link rel="stylesheet" href="/query/Public/css/style.css">
		<link rel="stylesheet" href="/query/Public/css/weui.min.css">
		<link rel="stylesheet" href="/query/Public/css/jquery-weui.css">
		<script src="/query/Public/js/jquery-2.1.4.js" type="text/javascript" charset="utf-8"></script>
		
	</head>
		<style type="text/css">
			#demo_img1{
				position: absolute;
				bottom: 210px;
				right: 20px;
			}
			#demo_img2{
				position: absolute;
				bottom: 140px;
				right: 20px;
			}
			#demo_img{
				position: absolute;
				bottom: 75px;
				right: 20px;
			}
		</style>
	<body>

		<div class="page-container">
			<h1>修改密码</h1>
			<div class="div-login">
				<input type="text" name="username" class="username" placeholder="账号">
				<img id="demo_img1" onclick="hideShowPsw1()" src="/query/Public/img/eye2.png">
				<img id="demo_img2" onclick="hideShowPsw2()" src="/query/Public/img/eye2.png">
				<img id="demo_img" onclick="hideShowPsw()" src="/query/Public/img/eye2.png">
				<input type="password" name="userpwd" class="userpwdold" id="demo_input1" placeholder="旧密码" />
				<input type="password" name="userpwd" class="userpwdnew1" id="demo_input2" placeholder="新密码" />
				<input type="password" name="userpwd" class="userpwdnew2" id="demo_input" placeholder="新密码" />
				<button type="submit" class="login">修改</button>
			</div>
		</div>
	</body>
	
	<script src="/query/Public/js/jquery-2.1.4.js"></script>
	<script src="/query/Public/js/jquery-weui.js"></script>
	
	<script type="text/javascript">
		$(".username").blur(function() {
			$username = $(this).val();
			$apiUrl = '<?php echo U("Login/queryuser");?>';
			$.post($apiUrl, {username: $username}, function(dd) {
				if(dd.trim() == "1") {
					$(".userpwdold").blur(function() {
						$userpwdold = $(this).val();
						$apiUrl = '<?php echo U("Login/querypwd");?>';
						$.post($apiUrl, {userpwdold: $userpwdold}, function(dd) {
							if(dd.trim() == "1") {
								return false;
							} else if(dd.trim() == "0") {
								alert("该旧密码错误,请重新输入!");
								//$.toast('该旧密码错误,请重新输入!');
								return false;
							}
						});
					});
				} else if(dd.trim() == "0") {
					alert("该账号未注册!");
//					$.toast('该账号未注册!');
					return false;
				}
			});
		});
		
	</script>
	
	<script type="text/javascript">
		$(window).bind('beforeunload',function(){
			return '您的密码未能进行修改，确定离开此页面吗？';
		});
	</script>
	
	<script type="text/javascript">
		$(".login").click(function() {
			$inc = '<?php echo U("Login/updpwd");?>';
			$username = $(".username").val();
			$userpwdold = $(".userpwdold").val();
			$userpwdnew1 = $('.userpwdnew1').val();
			$userpwdnew2 = $('.userpwdnew2').val();
			if($username == "") {
				alert("请输入账号!");
//				$.toast('请输入账号!');
				return false;
			}
			if($userpwdold == "") {
				alert("请输入旧密码!");
//				$.toast('请输入旧密码!');
				return false;
			}
			if($userpwdnew1 == ""){
				alert("请输入新密码!");
//				$.toast('请输入新密码!');
				return false;
			}
			if($userpwdnew2 == ""){
				alert("请输入新密码!");
//				$.toast('请输入新密码!');
				return false;
			}
			if($userpwdnew1 != $userpwdnew2){
				alert("请输入两次相同的新密码!");
//				$.toast('请输入两次相同的新密码!');
				return false;
			}
			$.post($inc, {
				username: $username,
				userpwdold: $userpwdold,
				userpwdnew2: $userpwdnew2
			}, function(dd) {
				if(dd.trim() == "1") {
					alert('修改成功!请重新登录');
//					$.toast('修改成功,请重新登录!');
					setTimeout(function(){
                      location.href='<?php echo U("Login/index");?>';
                    },1000)
				} else {
					alert('账号或密码错误,请重新输入!');
//					$.toast('账号或密码错误,请重新输入!');
					return false;
				}
			})
		})
		
		var demoImg = document.getElementById("demo_img");
		var demoInput = document.getElementById("demo_input");
		//隐藏text block，显示password block  
		function hideShowPsw() {
			if(demoInput.type == "password") {
				demoInput.type = "text";
				demo_img.src = "/query/Public/img/eye2.png";
			} else {
				demoInput.type = "password";
				demo_img.src = "/query/Public/img/eye2.png";
			}
		}
		
		var demoImg1 = document.getElementById("demo_img1");
		var demoInput1 = document.getElementById("demo_input1");
		//隐藏text block，显示password block  
		function hideShowPsw1() {
			if(demoInput1.type == "password") {
				demoInput1.type = "text";
				demo_img1.src = "/query/Public/img/eye2.png";
			} else {
				demoInput1.type = "password";
				demo_img1.src = "/query/Public/img/eye2.png";
			}
		}
		
		var demoImg2 = document.getElementById("demo_img2");
		var demoInput2 = document.getElementById("demo_input2");
		//隐藏text block，显示password block  
		function hideShowPsw2() {
			if(demoInput2.type == "password") {
				demoInput2.type = "text";
				demo_img2.src = "/query/Public/img/eye2.png";
			} else {
				demoInput2.type = "password";
				demo_img2.src = "/query/Public/img/eye2.png";
			}
		}
	</script>

</html>