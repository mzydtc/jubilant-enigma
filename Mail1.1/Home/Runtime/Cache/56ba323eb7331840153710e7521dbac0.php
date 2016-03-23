<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>修改用户密码</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/jquery.min.js"></script>
</head>
<body>
    <form action="__APP__/User/modiPassProcess" method="post" role="form" id="form">
	  	<div class="form-group">
      	<input type="password" name="origin" class="form-control" placeholder="请输入原密码" id="origin"/>
      	<p id="msg1">&nbsp;</p>
      	<input type="password" name="newpass" class="form-control" placeholder="7位到20位新密码" id="newpass" />
      	<p id="msg2">&nbsp;</p>
      	<input type="password" name="confirm" class="form-control" placeholder="确认新密码" id="confirm"/>
      	<p id="msg3">&nbsp;</p>
      	<input type="button" value="修改" class="btn btn-default btn-lg" id="modi" />
	</form>
	<script>
		$(function(){
			$("#origin").blur(function(){
				$.post("__APP__/User/getPass", {origin:$("#origin").val()}, function(user){
					if (user.status == 1) { // 如果后台返回的status为1，说明原密码输入正确
						$("#msg1").html("<font color='green' size='2'>&nbsp;&nbsp;正确</font>");
					} else {
						$("#msg1").html("<font color='red' size='2'>&nbsp;&nbsp;错误</font>");
					}
				});
			});

			$("#newpass").blur(function(){
				var newpass = $("#newpass").val();
				if (newpass.length < 7) {
					$("#msg2").html("<font color='red' size='2'>&nbsp;&nbsp;密码需大于7位</font>");
				}
				if (newpass.length > 20) {
					$("#msg2").html("<font color='red' size='2'>&nbsp;&nbsp;密码不能大于20位</font>");
				}
				if (newpass.length >= 7 && newpass.length <= 20) {
					$("#msg2").html("<font color='green' size='2'>&nbsp;&nbsp;可以使用</font>");
					$("#msg3").html("&nbsp;");
				}
			});

			$("#confirm").blur(function(){
				var newpass = $("#newpass").val();
				var confirm = $("#confirm").val();
				if (confirm != newpass) {
					$("#msg3").html("<font color='red' size='2'>&nbsp;&nbsp;两次输入密码不相同，请重新输入</font>");
				} else {
					$("#msg3").html("<font color='green' size='2'>&nbsp;&nbsp;正确</font>");
				}
			});

			$("#modi").click(function(){
				var flag = true;
				var np = $("#newpass").val();
				var cf = $("#confirm").val();
				var nplen = $("#newpass").val().length;
				var cflen = $("#confirm").val().length;
				if (np != cf || nplen < 7 || nplen > 20 || cflen < 7 || cflen > 20) {
					flag = false;
				} else {
					flag = true;
				}

				if (flag) {
					$("#form").submit();
				}

			});

		});
	</script>
</body>
</html>