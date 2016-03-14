<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>新邮件</title>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-xs-9">
	<form action="__APP__/ListByUser/send" method="post" enctype="multipart/form-data" role="form">
    	<div class="form-group">
    		
            <input type="text" name="title" class="form-control" placeholder="标题" /><br/>
            
            <input type="text" name="sendto" class="form-control" placeholder="请选择收件人" /><br/>
            
            <textarea class="form-control" cols="40" rows="5" name="content" placeholder="正文"></textarea><br/>
            <label for="name">附&nbsp;&nbsp;&nbsp;&nbsp;件</label>
            <input type="file" name="file" class="file" />*附件大小不能超过100MB<br/><br/>
        <input type="submit" value="发送" class="btn btn-default btn-lg" />
        </div>
    </form>
</div>
<div class="col-xs-3">
	<form role="form">
		<label for="name">选择收件人</label>
  		<div class="form-group">
    		<select class="form-control"> 
      			<option>部门列表</option> 
      		</select>
  		</div>
  		<div class="form-group">
    		<select class="form-control"> 
      			<option>部门所含人员列表</option> 
      		</select>
  		</div>
  	</form>
</div>
</body>
</html>