<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>发件箱</title>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-striped" style="table-layout: fixed;">
		<thead><tr><th>收件人</th><th>标题</th><th>发送时间</th></tr></thead>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mail): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($mail["sendto"]); ?></td>
		    <td style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;" title="<?php echo ($mail["title"]); ?>"><a href="__APP__/ListByUser/sendDetail/id/<?php echo ($mail["id"]); ?>"><?php echo ($mail["title"]); ?></a></td>
		    <td><?php echo ($mail["time"]); ?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<table align="center"><tr><td>共<?php echo ($page); ?></td></tr></table>
</body>
</html>