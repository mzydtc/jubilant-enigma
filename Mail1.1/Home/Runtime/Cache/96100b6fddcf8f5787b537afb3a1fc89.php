<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>新增用户</title>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="__APP__/User/addUserProcess" method="post" role="form">
		<div class="form-group">
			<label for="name">用户名</label>
       	    <input type="text" name="username" class="form-control" placeholder="请输入用户名" /><br/>
       	    <label for="name">部&nbsp;&nbsp;&nbsp;&nbsp;门</label>
            <input type="text" name="depname" class="form-control" placeholder="请输入所在部门"/><br/>
	    <input type="submit" value="注册" class="btn btn-default btn-lg" />
	    </div>
	</form>
</body>
</html>