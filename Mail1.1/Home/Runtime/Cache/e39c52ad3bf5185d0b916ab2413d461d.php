<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>部门管理</title>
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/Css/font.css">
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
<form action="__APP__/Department/hidJump" method="post" class="form-inline" role="form">
  新增部门：
  <input type="text" class="form-control" name="depname" placeholder="请输入名称" />
  <input type="submit" value="添加" class="btn btn-default btn-md" /><br/><br/>
  <input type="hidden" name="oper" value="add" />
</form>
<form action="__APP__/Department/hidJump" method="post">
  <table class="table table-striped" id="head">
    <tr><td></td><th>部门名称</th><th>创建时间</th></tr>
      <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dep): $mod = ($i % 2 );++$i;?><tr><td><input type="checkbox" name="select[]" value="<?php echo ($dep["id"]); ?>" /></td>
          <td><?php echo ($dep["depname"]); ?></td>
          <td><?php echo ($dep["createtime"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  <table align="left">
    <tr>
      <td><input type="submit" value="删除" name="oper" class="btn btn-default btn-sm" /></td>
    </tr>
  </table>
  <table align="right">
    <tr><td>共<?php echo ($page); ?></td></tr>
  </table>
  <input type="hidden" name="oper" value="del" />
</form>
</body>
</html>