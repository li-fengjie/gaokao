<?php
require_once ('.././conn/conn.php');
$userid=isset($_GET['userid'])?$_GET['userid']:'';
if(!empty($userid)){
    $sql1="select * from gk_usernew where userid='$userid'";
    $result1=mysqli_query($link,$sql1);
    $row=mysqli_fetch_array($result1);
//用户名用户头像用户电话用户微信ID
$username=$row['username'];
$userInfo=$row['userInfo'];
$mobilePhoneNumber=$row['mobilePhoneNumber'];
$authData=$row['authData'];
}

if(!empty($_POST['userid'])) {
$userid=$_POST['userid'];
$authData=$_POST['authData'];
$username=$_POST['username'];
$mobilePhoneNumber=$_POST['mobilePhoneNumber'];
$fileInfo=$_FILES['userInfo'];
if(!empty($_FILES['userInfo']['tmp_name'])){
$maxSize=10485760;//10M,10*1024*1024
$allowExt=array('jpeg','jpg','png','tif');
$path="uploads";
//$fileInfo=$_FILES['userInfo'];
//引入前面封装了的上传函数uploadFile.php
include_once '.././uploadFile.php';
$url=uploadFile($fileInfo, $path, $allowExt, $maxSize);
//$userInfo=$url;
 $sql2="update gk_usernew set authData='$authData',userInfo='$url',username='$username',mobilePhoneNumber='$mobilePhoneNumber' where userid='$userid'";
}
else
 $sql2="update gk_usernew set authData='$authData',username='$username',mobilePhoneNumber='$mobilePhoneNumber' where userid='$userid'";
    # code...
    //$require_once()
    $result2=mysqli_query($link,$sql2);
    if($result2)
    {
        echo "<script>alert('update success');window.location.href='index.php';</script>";
        exit();
    }
    else
    {
        echo "<script>alert('update fail');window.location.href='index.php';</script>";
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
<form action="edit.php" method="post" class="definewidth m20" enctype="multipart/form-data">
    <input type="hidden" name="userid" value="<?php echo $userid?>">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">用户名</td>
        <td><input type="text" name="username" value="<?php echo $username;?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户头像</td>
       <td> <img src='<?php echo $userInfo;?>' width='200' height='200' />
        <input type="file" name="userInfo" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户电话</td>
        <td><input type="text" name="mobilePhoneNumber" value="<?php echo $mobilePhoneNumber;?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">用户微信ID</td>
        <td><input type="text" name="authData" value="<?php echo $authData;?>"/></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary">修改信息</button>
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