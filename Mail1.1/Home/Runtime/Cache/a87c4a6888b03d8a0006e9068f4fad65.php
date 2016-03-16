<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>收件箱</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/Css/font.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
<form action="__APP__/ListByUser/mailOper" method="post">
	<table class="table table-striped" id="head">
		<thead><tr><th></th><th>发件人</th><th>标题</th><th>发送时间</th></tr></thead>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mail): $mod = ($i % 2 );++$i;?><tr><td><input type="checkbox" name="select[]" value="<?php echo ($mail["id"]); ?>" /></td>
			<td><?php echo ($mail["revfrom"]); ?></td>
		    <td id="wrap" title="<?php echo ($mail["title"]); ?>"><a href="__APP__/ListByUser/revDetail/id/<?php echo ($mail["id"]); ?>"><?php echo ($mail["title"]); ?></a></td>
		    <td><?php echo ($mail["time"]); ?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<table align="left">
		<tr>
			<td><input type="submit" value="放入垃圾箱" name="oper" class="btn btn-default btn-sm" /></td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="submit" value="永久删除" name="oper" class="btn btn-default btn-sm" /></td>
		</tr>
	</table>
	<table align="right">
		<tr><td>共<?php echo ($page); ?></td></tr>
	</table>
</form>
</body>
</html>