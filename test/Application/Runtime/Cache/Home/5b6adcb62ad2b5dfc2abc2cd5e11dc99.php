<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="/test/Public/css/reset.css">
        <link rel="stylesheet" href="/test/Public/css/supersized.css">
        <link rel="stylesheet" href="/test/Public/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="" method="post">
                <input type="text" name="username" class="username" placeholder="账号">
                <input type="password" name="password" class="password" placeholder="密码">
                <button type="submit">Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>


        <!-- Javascript -->
        <script src="/test/Public/js/jquery-1.8.2.min.js"></script>
        <script src="/test/Public/js/supersized.3.2.7.min.js"></script>
        <script src="/test/Public/js/supersized-init.js"></script>
        <script src="/test/Public/js/scripts.js"></script>

    </body>

</html>