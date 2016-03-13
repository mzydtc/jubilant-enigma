<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet">
<link href="__PUBLIC__/Css/signin.css" rel="stylesheet">
<title>登录</title>
</head>
 <body>
    <div class="container">
      <form action="__APP__/User/login" method="post" class="form-signin">
        <h2 class="form-signin-heading">请登录</h2>
        <label for="inputEmail" class="sr-only">用户名</label>
        <input type="username"  id="inputEmail" name="username" class="form-control" placeholder="登录名" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="密码" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 记住我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
        <button class="btn btn-lg btn-primary btn-block" type="reset">重置</button>
      </form>
    </div>
  </body>
</html>