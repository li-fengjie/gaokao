<?php
require_once ('.././conn/conn.php');
if(!empty($_POST['id']))
{
    $id=isset($_POST['id'])?$_POST['id']:"";
    $title=$_POST['title'];
    $content=$_POST['content'];
    $url=$_POST['url'];
    $sql="update gk_psy set title='$title',content='$content',url='$url' where id='$id'";
    $result=mysqli_query($link,$sql);
    if($result)
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
    $sql="select * from gk_psy where id='$id'";
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
    <input type="hidden" name="id" value=<?php echo $row['id'];?>>
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">测试类型：</td>
            <td><input type="text" name="title" value=<?php echo $row['title'];?>></td>
        </tr>
        <tr>
            <td class="tableleft">测试简介：</td>
            <td ><textarea type="text" name="content" rows="5" cols="30"><?php echo $row['content'];?></textarea>
                <!--<input type="" name="image">-->
            </td>
        </tr>
        <tr>
            <td class="tableleft">测试URL</td>
            <td><input type="text" name="url" style="width:400px;" value=<?php echo $row['url'];?>></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存修改</button>
                &nbsp;&nbsp;
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