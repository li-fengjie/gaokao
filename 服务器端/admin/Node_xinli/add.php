<?php
//用户名用户头像用户电话用户微信ID
$title=isset($_POST['title'])?$_POST['title']:'';
$content=isset($_POST['content'])?$_POST['content']:'';
$url=isset($_POST['url'])?$_POST['url']:'';
if (!empty($title)) {
    # code...
    //$require_once()
    require_once ('.././conn/conn.php');
    $sql="insert into gk_psy (title,content,url) values ('$title','$content','$url')";
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
<form action="add.php" method="post" class="definewidth m20">
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">测试类型</td>
            <td><input type="text" name="title"/></td>
        </tr>
        <tr>
            <td class="tableleft">测试内容</td>
            <td><textarea type="text" name="content" rows="5" cols="30"></textarea> </td>
        </tr>
        <tr>
            <td class="tableleft">测试URL</td>
            <td><input type="text" name="url" style="width:400px;" /></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit"  class="btn btn-primary" type="button">增加测试链接</button>
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