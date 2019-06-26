<?php
//用户名用户头像用户电话用户微信ID
$userid=isset($_POST['userid'])?$_POST['userid']:'';
$majorselect=isset($_POST['majorselect'])?$_POST['majorselect']:'';
$localselect=isset($_POST['localselect'])?$_POST['localselect']:'';
$userregion=isset($_POST['userregion'])?$_POST['userregion']:'';
$usergrade=isset($_POST['usergrade'])?$_POST['usergrade']:'';

if (!empty($userid)&&!empty($majorselect)&&!empty($localselect)&&!empty($userregion)&&!empty($usergrade)) {
    # code...
    //$require_once()
    require_once ('.././conn/conn.php');
    $sql="insert into gk_ev (userid,majorselect,userregion,usergrade,localselect) values ('$userid','$majorselect','$userregion','$usergrade','$localselect')";
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
<form action="add.php" method="post" class="definewidth m20" >
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">用户id</td>
        <td><input type="text" name="userid" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户专业信息</td>
        <td><input type="text" name="majorselect" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户志愿地区</td>
        <td><input type="text" name="localselect"/></td>
    </tr>
    <tr>
        <td class="tableleft">用户所在地</td>
        <td><input type="text" name="userregion"/></td>
    </tr>
     <tr>
        <td class="tableleft">用户高考分数</td>
        <td><input type="text" name="usergrade"/></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">增加信息</button>
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