<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>用户管理</title>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script>
		function jump() {
			window.location="__APP__/Department/depQueryToAddUser";
		}
    </script>
</head>
<body>
	<button onclick="jump()" class="btn btn-default btn-lg">新增用户</button><br/><br/>
        <table class="table table-striped" style="table-layout: fixed;">
            <tr><th>用户名</th><th>部门</th><th>注册时间</th><th>操作</th></tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
            	<td><?php echo ($user["username"]); ?></td>
            	<td><?php echo ($user["depname"]); ?></td>
            	<td><?php echo ($user["registertime"]); ?></td>
            	<td><a href="__APP__/User/delUser/id/<?php echo ($user["id"]); ?>/username/<?php echo ($user["username"]); ?>">删除</a>
            	   /<a href="__APP__/User/modiUser/id/<?php echo ($user["id"]); ?>/username/<?php echo ($user["username"]); ?>">修改</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
     <table align="center"><tr><td>共<?php echo ($page); ?></td></tr></table>
</body>
</html>