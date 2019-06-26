<?php
require_once('.././conn/conn.php');
$prop_propid=$_GET['prop_propid'];
$sql = "select * from gk_schprop WHERE  prop_propid ='$prop_propid'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$spp_proid=$row['spp_proid'];
?>
<?php
//更改功能
if(empty($_GET['change_id']));
else{

    $province=$_GET['change_id'];
    $propgrade=$_POST['propgrade'];
    $propbatch=$_POST['propbatch'];

$sql="UPDATE `gk_schpropgra` SET `propgrade`='$propgrade',`propbatch`='$propbatch' WHERE prop_propid='$prop_propid'&&province='$province'";
    $result = mysqli_query($link, $sql);
}
?>
<?php
//删除功能
if (!empty($_GET['province_del'])) {
    $province = $_GET['province_del'];

    //删除数据库记录
    $sql = "DELETE FROM `gk_schpropgra` WHERE  province='$province'";
    $result = mysqli_query($link, $sql);
}


?>
<?php
//增加功能

if (empty($_GET['add_id'])) ;
else {
    $prop_propid=$_GET['prop_propid'];
    $province=$_POST['province'];
    $propgrade=$_POST['propgrade'];
    $propbatch=$_POST['propbatch'];

    $sql="INSERT INTO `gk_schpropgra`(`prop_propid`, `province`, `propgrade`, `propbatch`) 
VALUES ('$prop_propid','$province','$propgrade','$propbatch')";
    $result = mysqli_query($link, $sql);

}

?>

<?php
//查询功能
if (empty($_POST['propname'])) {

    $sql = "select * from gk_schpropgra WHERE prop_propid='$prop_propid'";
    $result = mysqli_query($link, $sql);
} else {

    $propname= $_POST['propname'];

    $sql = "select * from gk_schpropgra WHERE  prop_propid='$prop_propid' and province='$propname'";
    $result = mysqli_query($link, $sql);

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



        table.last {
            width: 85%;
            margin: 20px auto;
        }
    </style>


</head>
<body>
<form class="form-inline definewidth m20" action="index.php?prop_propid=<?php echo $prop_propid?>" method="post" >
    省份名称：
    <input type="text" name="propname"  class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
    <button type="button" class="btn btn-success" id="all_school">所有平均分</button>
    <button type="button" class="btn btn-success" id="addnew">新增平均分</button>
    <button type="button" class="btn btn-success" id="turn_back">返回专业列表</button>
</form>
<table class="table table-bordered table-hover definewidth m10 last">

    <tr>
        <th>专业id</th>
        <th>省份名称</th>
        <th>专业平均分</th>
        <th>专业批次</th>
        <th>管理操作</th>
    </tr>


    </tr>
    <?php
    if (isset($_GET['ye_i'])) {
        $ye_i = $_GET['ye_i'];
    } else
        $ye_i = 1;//用来保存页数

    $all_i = 0;//用来保存学校个
    $num_ye = 10;//每页显示的数量
    while ($row = mysqli_fetch_array($result)) {
        $all_i++;
        if ($all_i > ($ye_i - 1) * $num_ye && $all_i <= ($ye_i) * $num_ye) {
            ?>
            <tr>
                <td><?php echo $row['prop_propid'] ?></td>
                <td><?php echo $row['province']; ?></td>

                <td><?php echo $row['propgrade']; ?></td>
                <td><?php echo $row['propbatch']; ?></td>

                <td>
                    <span><a href="edit.php?change_id=<?php echo $row['prop_propid']?>&province=<?php echo $row['province']?>">编辑 </a></span>
                    <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span onclick="del(<?php echo $prop_propid?>,<?php echo $row['province']?>)"><a href="#">删除</a></span>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<div class="inline pull-right page" style="margin-right:8%;">
    <?php echo $all_i ?>条记录 <?php echo $ye_i ?>/<?php echo ceil($all_i / $num_ye) ?> 页
    <a href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=1">首页</a>
    <?php if ($ye_i > 1) { ?><a href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=<?php echo $ye_i - 1; ?>">上一页</a><?php } ?>
    <span class='current'><?php echo $ye_i; ?></span>
    <?php if ($ye_i + 1 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=<?php echo $ye_i + 1; ?>"><?php echo $ye_i + 1; ?></a><?php } ?>
    <?php if ($ye_i + 2 <= ceil($all_i / $num_ye)) { ?> <a
        href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=<?php echo $ye_i + 2; ?>"><?php echo $ye_i + 2; ?></a><?php } ?>
    <?php if ($ye_i + 3 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=<?php echo $ye_i + 3; ?>"><?php echo $ye_i + 3; ?></a><?php } ?>
    <?php if ($ye_i + 4 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=<?php echo $ye_i + 4; ?>"><?php echo $ye_i + 4; ?></a><?php } ?>
    <?php if ($ye_i < ceil($all_i / $num_ye)) { ?> <a href="./index.php?ye_i=<?php echo $ye_i + 1; ?>">下一页</a><?php } ?>

    <a href="./index.php?prop_propid=<?php echo $prop_propid?>&ye_i=<?php echo ceil($all_i / $num_ye) ?>">最后一页</a>

</div>
</body>
</html>
<script>

    $(function () {

        $('#all_school').click(function () {

            window.location.href = "index.php?prop_propid=<?php echo $prop_propid?>";
        });


    });
    $(function () {

        $('#addnew').click(function () {

            window.location.href = "add.php?prop_propid=<?php echo $prop_propid?>";
        });


    });
    $(function () {

        $('#turn_back').click(function () {

            window.location.href = "../Node_class3/index.php?spp_proid=<?php echo $spp_proid?>";
        });


    });

    function del(del_id,province) {


        if (confirm("确定要删除吗？")) {
var province_s="&province_del="+province;
         var del_id_s="prop_propid="+del_id;

            var url = "index.php?";
            window.location.href = url +del_id_s+province_s;

        }


    }
</script>