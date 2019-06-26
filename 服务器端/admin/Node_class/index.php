<?php
require_once('.././conn/conn.php');
$school_id=$_GET['id'];
?>
<?php
//更改功能
if(empty($_GET['change_id']));
else{
    $change_id=$_GET['change_id'];
    $proname=$_POST['proname_i'];


    $sql = "UPDATE `gk_schprosp` SET `proname`='$proname' WHERE id ='$school_id' and sp_proid='$change_id'";
    $result = mysqli_query($link, $sql);
}
?>
<?php
//删除功能
if (!empty($_GET['del_id'])) {
    $del_id = $_GET['del_id'];

    //删除数据库记录
    $sql = "DELETE FROM `gk_schprosp` WHERE id=$school_id and sp_proid=$del_id";
    $result = mysqli_query($link, $sql);

}


?>
<?php
//增加功能

if (empty($_GET['add_id'])) ;
else {

    $proname=$_POST['proname_i'];


    $sql="INSERT INTO gk_schprosp(`id`, `proname`)
 VALUES ('$school_id','$proname')";
    $result = mysqli_query($link, $sql);

}

?>

<?php
//查询功能

if (empty($_POST['proname'])) {


    $sql = "select * from gk_schprosp WHERE id='$school_id'";
    $result = mysqli_query($link, $sql);

} else {

    $proname= $_POST['proname'];
    $sql = "select * from gk_schprosp WHERE id='$school_id' and proname='$proname'";
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
<form class="form-inline definewidth m20" action="index.php?id=<?php echo $school_id?>" method="post" >
    学科名称：
    <input type="text" name="proname"  class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
    <button type="button" class="btn btn-success" id="all_school">所有学科类</button>
    <button type="button" class="btn btn-success" id="addnew">新增学科类</button>
    <button type="button" class="btn btn-success" id="turn_back">返回学校列表</button>
</form>
<table class="table table-bordered table-hover definewidth m10 last">

    <tr>
        <th>学校id</th>
        <th>学科类id</th>
        <th>学科类名称</th>
        <th>下属</th>
        <th>管理操作</th>

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
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['sp_proid']; ?></td>

                <td><?php echo $row['proname']; ?></td>
                <td> <span><a href="../Node_class2/index.php?sp_proid=<?php echo $row['sp_proid']?>">学科</a></span></td>
                <td>
                    <span><a href="edit.php?id=<?php echo $row['id'] ?>&change_id=<?php echo $row['sp_proid']?>">编辑 </a></span>
                    <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span onclick="del(<?php echo $row['id'] ?>,<?php echo $row['sp_proid']?>)"><a href="#">删除</a></span>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<div class="inline pull-right page" style="margin-right:8%;">
    <?php echo $all_i ?>条记录 <?php echo $ye_i ?>/<?php echo ceil($all_i / $num_ye) ?> 页
    <a href="./index.php?id=<?php echo $school_id?>&ye_i=1">首页</a>
    <?php if ($ye_i > 1) { ?><a href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo $ye_i - 1; ?>">上一页</a><?php } ?>
    <span class='current'><?php echo $ye_i; ?></span>
    <?php if ($ye_i + 1 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo $ye_i + 1; ?>"><?php echo $ye_i + 1; ?></a><?php } ?>
    <?php if ($ye_i + 2 <= ceil($all_i / $num_ye)) { ?> <a
        href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo $ye_i + 2; ?>"><?php echo $ye_i + 2; ?></a><?php } ?>
    <?php if ($ye_i + 3 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo $ye_i + 3; ?>"><?php echo $ye_i + 3; ?></a><?php } ?>
    <?php if ($ye_i + 4 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo $ye_i + 4; ?>"><?php echo $ye_i + 4; ?></a><?php } ?>
    <?php if ($ye_i < ceil($all_i / $num_ye)) { ?> <a href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo $ye_i + 1; ?>">下一页</a><?php } ?>

    <a href="./index.php?id=<?php echo $school_id?>&ye_i=<?php echo ceil($all_i / $num_ye) ?>">最后一页</a>

</div>
</body>
</html>
<script>

    $(function () {

        $('#all_school').click(function () {

            window.location.href = "index.php?id=<?php echo $school_id?>";
        });


    });
    $(function () {

        $('#addnew').click(function () {

            window.location.href = "add.php?id=<?php echo $school_id?>";
        });


    });
    $(function () {

        $('#turn_back').click(function () {

            window.location.href = "../Node_school/index.php";
        });


    });

    function del(id,del_id) {


        if (confirm("确定要删除吗？")) {
         var id_s="id="+id;
         var del_id_s="&del_id="+del_id;

            var url = "index.php?";
            window.location.href = url + id_s+del_id_s;

        }


    }
</script>