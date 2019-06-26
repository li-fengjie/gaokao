<?php
require_once ('.././conn/conn.php');
if(!empty($_GET['id']))
{
    $id=$_GET['id'];
    echo $id;
    $sql="select * from gk_admin where id=$id";
    $result=mysqli_query($link,$sql);
   //mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    $username=$row['username'];
    $password=$row['password'];
}
elseif(!empty($_POST['id'])&&!empty($_POST['username'])&&!empty($_POST['password']))
{
$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
    $sql="update gk_admin set username='$username',password='$password' where id=$id";
$result=mysqli_query($link,$sql);
if ($result) {
    # code...
    echo "<script>alert('update success');window.location.href='index.php';</script>";
    exit();
}
else
{
    echo "<script>alert('update mydql is fail');window.location.href='index.php';</script>";
    exit();
}
}
else
echo "<script>alert('admin id is null');window.location.href='index.php';</script>";
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
<form action="edit.php" method="post" class="definewidth m20">
<input type="hidden" name="id" value=<?php echo $id;?> />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input type="text" name="username" value=<?php echo $username;?> ></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="password" name="password" value=<?php echo $password;?> ></td>
        </tr>
       
            <td class="tableleft">角色</td>
            <td>admin</td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>
                &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="{:U('Admin/index.php')}";
		 });

    });
</script>