<?php
require_once ('.././conn/conn.php');
$userid=isset($_GET['userid'])?$_GET['userid']:'';
if(!empty($userid)) {
    $sql = "select * from gk_userselect where userid='$userid'";
    $result = mysqli_query($link, $sql);
    $row=mysqli_fetch_array($result);
}
else {
    echo "<script>alert('get userid fail');window.history.go(-1);</script>";
    exit();
}
//mysqli_fetch_array();
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
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
    &nbsp;&nbsp; <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户id</th>
        <th>第一志愿</th>
        <th>第二志愿</th>
        <th>第三志愿</th>

    </tr>
    </thead>
    <tr>
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['oneschool'];?></td>
        <td><?php echo $row['twoschool'];?></td>
        <td><?php echo $row['thrschool'];?></td>

    </tr>
</table>
</body>
</html>
<script>
    $(function () {
        $('#backid').click(function(){
            window.location.href="index.php";
        });

    });

    $(function () {


        $('#addnew').click(function(){

            window.location.href="add.php";
        });


    });
</script>