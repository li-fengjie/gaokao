<?php
require_once ('.././conn/conn.php');
if(!empty($_GET['id']))
{
    $id=isset($_GET['id'])?$_GET['id']:"";
    $sql="select * from gk_odd where id='$id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($result);
}
else
{
    echo "<script>alert('get id fail'); window.location.href='index.php';</script>";
    exit();
}
?>
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
       <input type="hidden" name="id" value="<?php echo $id;?>">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">单号id</td>
        <td><?php echo $row['id'];?></td>
    </tr>
    <tr>
        <td class="tableleft">用户id</td>
        <td><?php echo $row['userid'];?></td>
    </tr>
    <tr>
        <td class="tableleft">本次结果</td>
        <td><?php echo $row['result'];?></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
           <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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