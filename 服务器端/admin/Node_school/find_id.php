<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/2
 * Time: 1:26
 */
require_once('.././conn/conn.php');
$num=$_GET['num'];
if (empty($_POST['rolename']));
else{
    $rolename=$_POST['rolename'];
    $sql = "select * from gk_school WHERE name='$rolename'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $id=$row['id'];

    if($_GET['num']==0)
    {
        echo '<script> window.location.href ="../Node_input/index.php?id='.$id.'";</script>';
    }
    else{
        echo '<script>window.location.href ="../Node_class/index.php?id='.$id.'";</script>';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="../Css/style.css"/>
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

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }


        .school_img {
            width: 30px;
            height: 30px;
        }
        table.last {
            width: 85%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="find_id.php?num=<?php echo $num?>" method="post" >
    学校名称：
    <input type="text" name="rolename" id="rolename" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
</form>
</body>
</html>
