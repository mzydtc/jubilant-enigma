<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>部门管理</title>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="__APP__/Department/addDepProcess" method="post" class="form-inline" role="form">
                    新增部门：<input type="text" class="form-control" name="depname" placeholder="请输入名称" />
        <input type="submit" value="添加" class="btn btn-default btn-md" /><br/><br/>
    </form>
        <table class="table table-striped" style="table-layout: fixed;">
            <tr><th>部门名称</th><th>创建时间</th><th>操作</th></tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dep): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($dep["depname"]); ?></td>
               		<td><?php echo ($dep["createtime"]); ?></td>
               		<td><a href="__APP__/Department/delDep/id/<?php echo ($dep["id"]); ?>">删除</a></td>
               	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
</body>
</html>