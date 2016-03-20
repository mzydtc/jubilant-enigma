<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>用户管理</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/Css/font.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script>
	function add() {
		window.location="__APP__/Department/depQueryToAddUser";
	}

    function modi(val) {
        window.location="__APP__/User/modiUser/id/" + val;
        return false;
    }
   </script>
</head>
<body>
	<button onclick="add()" class="btn btn-default btn-md">新增用户</button><br/><br/>
    <select class="form-control" id="department"> 
          <option>按部门查看</option>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dep): $mod = ($i % 2 );++$i;?><option value="<?php echo ($dep["depname"]); ?>"><?php echo ($dep["depname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <br/>
    <form action="__APP__/User/delUser" method="post">
        <table class="table table-striped" id="head">
            <tr><th></th><th>用户名</th><th>部门</th><th>注册时间</th><td></td></tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr><td><input type="checkbox" name="select[]" value="<?php echo ($user["id"]); ?>,<?php echo ($user["username"]); ?>," /></td>
            	<td><?php echo ($user["username"]); ?></td>
            	<td><?php echo ($user["depname"]); ?></td>
            	<td><?php echo ($user["registertime"]); ?></td>
                <td><button onclick="return modi(<?php echo ($user["id"]); ?>);" class="btn btn-default btn-sm">修改</button></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <table align="left">
            <tr>
                <td><input type="submit" value="删除" name="oper" class="btn btn-default btn-sm" id="del" onclick="return"/></td>
            </tr>
        </table>
        <table align="right">
            <tr><td>共<?php echo ($page); ?></td></tr>
        </table>
    </form>
    <script>
    $("#del").click(function() {
        var num = $("input[type='checkbox']:checked").length;

        if (num == 0) {
            alert("请选择需要删除的用户"); 
            return false;
        } else {
            var r = confirm("确认删除这些用户？");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        } 
    });

    $("#department").change(function(){
        //alert("1");
        $("table").empty();
        //alert($("#department")val());
        $.post("__APP__/User/getUser", {depname:$("#department").val()}, function(dep){
            var d = JSON.stringify(dep);
            alert(dep);
        });
    });
    </script>
</body>
</html>