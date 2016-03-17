<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>邮件转发</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/jquery.min.js"></script>
</head>
<body>
<div class="col-xs-9">
	<form action="__APP__/ListByUser/resendProcess?urlfilename=<?php echo ($urlfilename); ?>" method="post" enctype="multipart/form-data" role="form">
    	<div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="请输入标题" /><br/>    
          <input type="text" name="sendto" class="form-control" placeholder="请选择收件人" id="sendto" readonly/><br/>
          <textarea class="form-control" cols="40" rows="15" name="content">
          &#13;&#10
          &#13;&#10
          &#13;&#10
          &#13;&#10
          原始发件人：<?php echo ($revfrom); ?>&#13;&#10
          发送时间：<?php echo ($time); ?>&#13;&#10
          标题：<?php echo ($title); ?>&#13;&#10
          正文：<?php echo ($content); ?>
          </textarea><br/>
          <input type="checkbox" name="attach" value="select" /><label for="name">&nbsp;&nbsp;附件：</label>
          <a href="__APP__/Index/fileDownload?filename=<?php echo ($urlfilename); ?>&stat=0"><?php echo ($filename); ?></a><br/><br/>
          <input type="submit" value="发送" class="btn btn-default btn-lg" />
      </div>
  </form>
</div>
<div class="col-xs-3">
	<form role="form">
		<label for="name">选择收件人</label>
  	<div class="form-group">
  		<select class="form-control" id="department"> 
          <option>请选择</option>
        <?php if(is_array($dep)): $i = 0; $__LIST__ = $dep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data["depname"]); ?>"><?php echo ($data["depname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
  		</select>
  	</div>
  	<div class="form-group">
    	<select multiple class="form-control" id="personell"> 
  		</select>
  	</div>
  </form>
</div>
<script>
  $("#department").change(function(){
    $("#personell").empty();
    var dep_val = $("#department").val(); // 得到第一个选择框的值
    $.get('__APP__/User/getUserByDep/dep/' + dep_val, function(user){
      //alert(JSON.stringify(user.data)); // 解析JSON对象为字符串
      for (var i = 0; i < user.data.length; i++) {
        var user_val = JSON.stringify(user.data[i]);
        user_val = user_val.replace(/(^")|("$)/g,''); // 替换字符串中的"符号
        $("#personell").append("<option value='" + user_val + "'>" + user_val + "</option>");
      }
    });
  });
  $("#personell").dblclick(function(){
    //alert("fuck");
    var per_val = $("#personell").val();
    $("#sendto").val($("#sendto").val() + per_val + ";");
  });
</script>
</body>
</html>