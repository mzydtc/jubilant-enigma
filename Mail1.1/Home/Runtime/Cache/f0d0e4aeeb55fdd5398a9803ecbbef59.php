<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>新邮件</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/jquery.min.js"></script>
</head>
<body>
<div class="col-xs-9">
	<form action="__APP__/ListByUser/send" method="post" enctype="multipart/form-data" role="form">
    	<div class="form-group">	
        <input type="text" name="title" class="form-control" placeholder="标题" /><br/>    
          <input type="text" name="sendto" class="form-control" placeholder="请选择收件人" id="sendto" readonly/><br/>
          <textarea class="form-control" cols="40" rows="10" name="content" placeholder="正文"></textarea><br/>
          <label for="name">附&nbsp;&nbsp;&nbsp;&nbsp;件</label>
          <input type="file" name="file" class="file" />*附件大小不能超过100MB<br/><br/>
          <input type="submit" value="发送" class="btn btn-default btn-lg" />
      </div>
  </form>
</div>
<div class="col-xs-3">
	<form role="form" class="bs-example bs-example-form">
		<label for="name">选择收件人</label>
  	<div class="form-group">
  		<select class="form-control" id="department"> 
          <option>请选择</option>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dep): $mod = ($i % 2 );++$i;?><option value="<?php echo ($dep["depname"]); ?>"><?php echo ($dep["depname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
  		</select>
  	</div>
  	<div class="form-group">
    	<select multiple class="form-control" id="personell"> 
  		</select>
  	</div>
    <div class="col-lg-13">
            <div class="input-group">
               <input type="text" class="form-control" id="rev">
               <span class="input-group-btn">
                  <button class="btn btn-default" type="button" id="search">
                     搜索
                  </button>
               </span>
            </div><!-- /input-group -->
         </div><!-- /.col-lg-6 -->
         <p id="msg">&nbsp;</p>
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
    var per_val = $("#personell").val();
    $("#sendto").val($("#sendto").val() + per_val + ";");
  });

  $("#search").click(function(){
    if ($("#rev").val() == '') {
      $("#msg").html("<font color='red' size='2'>&nbsp;&nbsp;不能为空</font>");
      return;
    }
    $.post("__APP__/User/userSearch", {rev:$("#rev").val()}, function(user){
      if (user.status == 1) {
        //alert(user.data);
        $("#personell").append("<option value='" + user.data + "'>" + user.data + "</option>");
      } else {
        $("#msg").html("<font color='red' size='2'>&nbsp;&nbsp;用户不存在</font>");
      }
    });
  });
</script>
</body>
</html>