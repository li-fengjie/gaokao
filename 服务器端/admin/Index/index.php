<?php
 //header("Content-Type:image/pjpeg");
require_once ('.././conn/conn.php');
$sql="select * from gk_Index";
$sql2="select * from gk_Suggest";
$result=mysqli_query($link,$sql);
$result2=mysqli_query($link,$sql2);
$row=mysqli_fetch_array($result);
$row2=mysqli_fetch_array($result2);

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
    机构名称：
    <input type="text" name="rolename" id="rolename" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">编辑</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>高考时间设定为：<br>
        <?php echo $row['data'];?></th>
    </tr>
    <tr>
        <th>意见与反馈：<br>
        <?php echo $row2['statement'];?></th>
    </tr>
    </thead>
    </table>
</body>
</html>
<script>
    $(function () {
        
        $('#addnew').click(function(){

                window.location.href="add.php";
         });


    });
</script>