<?php
session_start();
require_once ('.././conn/conn.php');
$sql="select * from gk_admin";
$result=mysqli_query($link,$sql);
$username=isset($_SESSION['username'])?$_SESSION['username']:'';
//echo $username;
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.php" method="get">
    用户名称：
    <input type="text" name="username" id="username" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增管理员</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户id</th>
        <th>用户名称</th>
        <th>真实姓名</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php
    while ($row=mysqli_fetch_array($result))
    {
    ?>
	     <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['username']?></td>
            <td>管理员</td>
            <td><?php
                if($username!=$row['username'])
                {  echo "下线";}
                elseif($username=$row['username'])
                { echo "在线";}
                ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'];?>">编辑</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="add.php";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.php";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>