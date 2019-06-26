<?php
session_start();
header("content-type:text/html;charset=utf-8;");
$username=isset($_POST['username'])?$_POST['username']:'';
$password=isset($_POST['password'])?$_POST['password']:'';
$_SESSION['username']=$username;
require_once ('.././conn/conn.php');
if(empty($username)&&empty($password))
{
	echo "<script>alert('failing to login,please chat with admin');window.location.history.go(-1);</script>";
	exit();
}
else
{
	//$sql="select password from gk_admin where username=$username";
	//$result=mysqli_query($conn,$sql);
	//$row=mysqli_fetch_array($result);
	$sql_select="select username,password from gk_admin where username= ?"; //从数据库查询信息
	$stmt=mysqli_prepare($link,$sql_select);
	mysqli_stmt_bind_param($stmt,'s',$username);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	$row=mysqli_fetch_assoc($result);
	if($row)
	{
		if ($password=$row['password']) {
			# code...
			echo "<script>alert('login success');window.location.href='.././index.php'</script>";
			exit();
		}
		else
		{
			echo "<script>alert('password may be false');window.location.history.go(-1);</script>";
		}

	}else
	{
		echo "<script>alert('no have this username');window.location.history.go(-1);</script>";
		exit();
	}
}
?>