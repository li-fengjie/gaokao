<?php
require_once ('.././conn/conn.php');
if(!empty($_POST['id']))
{
    $id=$_POST['id'];
    $majorselect=$_POST['majorselect'];
    $localselect=$_POST['localselect'];
    $userregion=$_POST['userregion'];
    $usergrade=$_POST['usergrade'];
    $sql2="update gk_ev set majorselect='$majorselect',localselect='$localselect',userregion='$userregion',usergrade='$usergrade' where id='$id'";
    $result2=mysqli_query($link,$sql2);
    if($result2)
    {
        echo "<script>alert('update success');window.location.href='index.php';</script>";
        exit();
    }
    else{
        echo "<script>alert('update fail');window.location.href='index.php';</script>";
        exit();
    }
}
elseif(!empty($_GET['id']))
{
    $id=isset($_GET['id'])?$_GET['id']:"";
    $sql="select * from gk_ev where id='$id'";
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
       <input type="hidden" name="id" value="<?php echo $row['id'];?>">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">单号id</td>
        <td><?php echo $row['id'];?></td>
    </tr>
    <tr>
        <td class="tableleft">用户专业信息</td>
        <td><input type="text" name="majorselect" value="<?php echo $row['majorselect'];?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户志愿地区</td>
        <td><input type="text" name="localselect" value="<?php echo $row['localselect'];?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户所在地</td>
        <td><input type="text" name="userregion" value="<?php echo $row['userregion'];?>" /></td>
    </tr>
     <tr>
        <td class="tableleft">用户高考分数</td>
        <td><input type="text" name="usergrade" value="<?php echo $row['usergrade'];?>" /></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">修改信息</button>
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