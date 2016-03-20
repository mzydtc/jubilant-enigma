<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>修改用户</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
        <form action="__APP__/User/modiUserProcess/id/<?php echo ($id); ?>/username/<?php echo ($username); ?>" method="post" role="form">
	        <div class="form-group">
	                <label for="name">用户名</label>
                  <input type="text" name="username" value="<?php echo ($username); ?>" class="form-control" placeholder="请输入用户名" /><br/>
        	        <label for="name">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
        	        <input type="password" name="password" class="form-control" placeholder="如果密码为空则默认不修改，该用户密码仍为默认密码" /><br/>
        	        <label for="name">部&nbsp;&nbsp;&nbsp;&nbsp;门</label>
                  <select class="form-control" id="department" name="depname">
                    <option value="<?php echo ($depname); ?>"><?php echo ($depname); ?></option>
                    <option value="">---------</option> 
                    <?php if(is_array($dep)): $i = 0; $__LIST__ = $dep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data["depname"]); ?>"><?php echo ($data["depname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                  <br/>
                      <input type="submit" value="修改" class="btn btn-default btn-lg"/>
                </div>
	</form>
</body>
</html>