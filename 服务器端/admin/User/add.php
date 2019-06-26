<?php
//用户名用户头像用户电话用户微信ID
$username=isset($_POST['username'])?$_POST['username']:'';
$userInfo='';
$mobilePhoneNumber=isset($_POST['mobilePhoneNumber'])?$_POST['mobilePhoneNumber']:'';
$authData=isset($_POST['authData'])?$_POST['authData']:'';
$fileInfo=isset($_FILES['userInfo'])?$_FILES['userInfo']:'';
if(!empty($_FILES['userInfo']['tmp_name'])){
$maxSize=10485760;//10M,10*1024*1024
$allowExt=array('jpeg','jpg','png','tif');
$path="uploads";
//引入前面封装了的上传函数uploadFile.php
include_once '.././uploadFile.php';
$image=uploadFile($fileInfo, $path, $allowExt, $maxSize);
$userInfo=$image;
}

if (!empty($username)&&!empty($userInfo)&&!empty($mobilePhoneNumber)&&!empty($authData)) {
    # code...
    //$require_once()
    require_once ('.././conn/conn.php');
    $sql="insert into gk_usernew (authData,userInfo,username,mobilePhoneNumber) values ('$authData','$userInfo','$username','$mobilePhoneNumber')";
    $result=mysqli_query($link,$sql);
    if($result)
    {
        echo "<script>alert('insert success');window.location.href='index.php';</script>";
        exit();
    }
    else
    {
        echo "<script>alert('insert fail');window.history.go(-1);</script>";
        exit();
    }
}

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
<form action="add.php" method="post" class="definewidth m20" enctype="multipart/form-data">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">用户名</td>
        <td><input type="text" name="username"/></td>
    </tr>
    <tr>
        <td class="tableleft">用户头像</td>
        <td><input type="file" name="userInfo" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户电话</td>
        <td><input type="text" name="mobilePhoneNumber"/></td>
    </tr>
    <tr>
        <td class="tableleft">用户微信ID</td>
        <td><input type="text" name="authData"/></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">增加用户</button>
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
				window.location.href="index.php";
		 });

    });
</script>