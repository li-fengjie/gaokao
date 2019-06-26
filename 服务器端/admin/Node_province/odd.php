<?php
//用户名用户头像用户电话用户微信ID
$province=isset($_POST['province'])?$_POST['province']:'';
$batch=isset($_POST['batch'])?$_POST['batch']:'';
$prosel=isset($_POST['prosel'])?$_POST['prosel']:'';
$graa=isset($_POST['graa'])?$_POST['graa']:'';
$grab=isset($_POST['grab'])?$_POST['grab']:'';
$grac=isset($_POST['grac'])?$_POST['grac']:'';
if (!empty($province)&&!empty($batch)&&!empty($prosel)) {
    # code...
    //$require_once()
    require_once ('.././conn/conn.php');
    $sql="insert into gk_pro (province,batch,prosel,graa,grab,grac) values ('$province','$batch','$prosel','$graa','$grab','$grac')";
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
<form action="odd.php" method="post" class="definewidth m20" >
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">省份名称</td>
        <td><input type="text" name="province" /></td>
    </tr>
    <tr>
        <td class="tableleft">批次选择</td>
        <td><input type="text" name="batch" /></td>
    </tr>
    <tr>
        <td class="tableleft">省份文理科</td>
        <td><input type="text" name="prosel"/></td>
    </tr>
    <tr>
        <td class="tableleft">15分数</td>
        <td><input type="text" name="graa"/></td>
    </tr>
     <tr>
        <td class="tableleft">16分数</td>
        <td><input type="text" name="grab"/></td>
    </tr>
    <tr>
        <td class="tableleft">17分数</td>
        <td><input type="text" name="grac"/></td>
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