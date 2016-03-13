<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>收件箱</title>
</head>
<body>
当前用户：<?php echo ($username); ?>
	<table border="1">
		<tr><th>发件人</th><th>标题</th><th>发送时间</th><th>操作</th></tr>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($user["revfrom"]); ?></td>
			    <td><a href=""><?php echo ($user["title"]); ?></a></td>
			    <td><?php echo ($user["time"]); ?></td>
			    <td><a href="">放入垃圾箱</a>/<a href="">永久删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</body>
</html>