<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>邮件详情</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
   		<ul class="list-group">
      		<li class="list-group-item">发件人：<?php echo ($detail["revfrom"]); ?></li>
      		<li class="list-group-item">接收时间：<?php echo ($detail["time"]); ?></li>
      		<li class="list-group-item">标题：<?php echo ($detail["title"]); ?></li>
      		<li class="list-group-item">附件：<a href="__APP__/Index/fileDownload?filename=<?php echo ($filename); ?>&stat=0"><?php echo ($detail["filename"]); ?></a></li>
   		</ul>
   		<div class="panel-heading">正文</div>
      	<div class="panel-body">
         	<p><?php echo ($detail["content"]); ?></p>
   		</div>
	</div>
   <form action="__APP__/ListByUser/resend/id/<?php echo ($detail["id"]); ?>" method="post">
      <input type="submit" value="转发" class="btn btn-default btn-lg" />
   </form>&nbsp;&nbsp;
   <form action="__APP__/Index/reply/sendto/<?php echo ($detail["revfrom"]); ?>" method="post">
      <input type="submit" value="回复" class="btn btn-default btn-lg" />
   </form><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>