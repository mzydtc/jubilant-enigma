<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>邮箱首页</title>
</head>
<body>
	当前用户：<?php echo ($username); ?><br/>
	<a href="sendMail.php">新建邮件</a><br/>
    <a href="revBox.php">收件箱</a><br/>
    <a href="sendBox.php">发件箱</a><br/>
    <a href="garbageBox.php">垃圾箱</a><br/>
    <a href="">退出登录</a><br/>
</body>
</html>