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
       	    <input type="text" name="username" class="form-control" placeholder="请输入用户名" /><br/>
  		</div>
        <div class="form-group">
  			<select class="form-control" id="department" name="depname"> 
        		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dep): $mod = ($i % 2 );++$i;?><option value="<?php echo ($dep["depname"]); ?>"><?php echo ($dep["depname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
  			</select>
	    </div>
	    <input type="submit" value="注册" class="btn btn-default btn-lg" />
	</form>
</body>
</html>