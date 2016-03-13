<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>邮件详情</title>
</head>
<body>
	当前用户：<?php echo ($username); ?><br/><br/>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?>收件人：<?php echo ($detail["sendto"]); ?><br/>
	---------------------------------<br/>
	发送时间：<?php echo ($detail["time"]); ?><br/>
	---------------------------------<br/>
	标题：<?php echo ($detail["title"]); ?><br/>
	---------------------------------<br/>
	正文：<?php echo ($detail["content"]); ?><br/>
	---------------------------------<br/>
	附件：<?php echo ($detail["filename"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>