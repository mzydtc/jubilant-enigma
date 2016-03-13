<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>登录</title>
</head>
<body>
	<form action="__URL__/login" method="post">
                         用户名 :<input type="text" name="username"/><br/>
                             密码:<input type="password" name="password" /><br/>
             <input type="submit" value="登录" />
             <input type="reset" value="重新填写" />
    </form>
</body>
</html>