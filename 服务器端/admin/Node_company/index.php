<?php
require_once('.././conn/conn.php');
include_once('.././uploadFile.php');
//允许上传的文件格式
$allowExt = array('jpeg', 'jpg', 'png', 'tif');
//允许上传的最大文件
$maxSize = 10485760;//10m
//存放的路径
$path = "../uploads";
?>
<?php
//更改功能

if (empty($_POST['change_name'])) ;
else {
    $change_images = $change_beijing = NULL;
    $change_name = $_POST['change_name'];
    $change_address = $_POST['change_address'];
    $change_brief = $_POST['change_brief'];
    $change_details = $_POST['change_details'];
    $change_url = $_POST['change_url'];
    $change_id = $_GET['id'];


    $sql = "select * from gk_company WHERE id='$change_id'";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $change_images = $row['images'];
        $change_beijing = $row['beijing'];
    }



//保存图片
    if ($_FILES["change_images"]["error"] > 0) ;
    else {
        if (file_exists($change_images)) {
            unlink($change_images);
        }

        $fileInfo = $_FILES['change_images'];
        $change_images = uploadFile($fileInfo, $path, $allowExt, $maxSize);
    }
    if ($_FILES["change_beijing"]["error"] > 0) ;
    else {
        if (file_exists($change_beijing)) {
            unlink($change_beijing);
        }
        $fileInfo = $_FILES['change_beijing'];

        $change_beijing = uploadFile($fileInfo, $path, $allowExt, $maxSize);
    }

    $sql = "UPDATE `gk_company` SET `name`='$change_name',`beijing`='$change_beijing',
`images`='$change_images',`brief`='$change_brief',`details`='$change_details',`address`='$change_address',`url`='$change_url' WHERE id='$change_id'";

    $result = mysqli_query($link, $sql);
}
?>
<?php
//删除功能
if (!empty($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $del_images = $del_beijing = NULL;

    //删除图片文件
    $sql = "select * from gk_company WHERE id='$del_id'";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $del_images = $row['images'];
        $del_beijing = $row['beijing'];
    }
    if (file_exists($del_images)) {
        unlink($del_images);
    }
    if (file_exists($del_beijing)) {
        unlink($del_beijing);
    }

    //删除数据库记录
    $sql = "DELETE FROM `gk_company` WHERE id='$del_id'";
    $result = mysqli_query($link, $sql);

}


?>
<?php
//增加功能

if (empty($_POST['name'])) ;
else {

    //保存图片
    $fileInfo = $_FILES['images'];

    $images = uploadFile($fileInfo, $path, $allowExt, $maxSize);

    $fileInfo = $_FILES['beijing'];

    $beijing = uploadFile($fileInfo, $path, $allowExt, $maxSize);

    $name = $_POST['name'];
    $address = $_POST['address'];
    $brief = $_POST['brief'];
    $details = $_POST['details'];
    $url= $_POST['url'];



    $sql = "INSERT INTO `gk_company`(`name`, `beijing`, `images`, `brief`, `details`, `address`, `url`) 
VALUES ('$name','$beijing','$images','$brief','$details','$address','$url')";

    $result = mysqli_query($link, $sql);

}

?>

<?php
//查询功能
if (empty($_POST['rolename'])) {
    $sql = "select * from gk_company";
    $result = mysqli_query($link, $sql);
} else {
    $rolename = $_POST['rolename'];
    $sql = "select * from gk_company WHERE name='$rolename'";
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
<form class="form-inline definewidth m20" action="index.php" method="post">
    公司名称：
    <input type="text" name="rolename" id="rolename" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
    <button type="button" class="btn btn-success" id="all_school">所有公司</button>
    <button type="button" class="btn btn-success" id="addnew">新增公司</button>
</form>
<table class="table table-bordered table-hover definewidth m10 last">

    <tr>
        <th>编号id</th>
        <th>公司名称</th>
        <th>公司头像</th>
        <th>公司背景</th>
        <th>公司简介</th>
        <th>公司详情</th>
        <th>公司地址</th>
        <th>公司链接</th>
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
                <td><?php echo $row['name']; ?></td>
                <td><img src="<?php echo $row['images']; ?>" class="school_img"/></td>
                <td><img src="<?php echo $row['beijing']; ?>" class="school_img"/></td>
                <td><?php echo $row['brief']; ?></td>
                <td><?php echo $row['details']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['url']; ?></td>



                <td>

                    <span><a href="edit.php?id=<?php echo $row['id'] ?>">编辑 </a></span>
                    <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span onclick="del(<?php echo $row['id'] ?>)"><a href="#">删除</a></span>


                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<div class="inline pull-right page" style="margin-right:8%;">
    <?php echo $all_i ?>条记录 <?php echo $ye_i ?>/<?php echo ceil($all_i / $num_ye) ?> 页
    <a href="./index.php?ye_i=1">首页</a>
    <?php if ($ye_i > 1) { ?><a href="./index.php?ye_i=<?php echo $ye_i - 1; ?>">上一页</a><?php } ?>
    <span class='current'><?php echo $ye_i; ?></span>
    <?php if ($ye_i + 1 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?ye_i=<?php echo $ye_i + 1; ?>"><?php echo $ye_i + 1; ?></a><?php } ?>
    <?php if ($ye_i + 2 <= ceil($all_i / $num_ye)) { ?> <a
        href="./index.php?ye_i=<?php echo $ye_i + 2; ?>"><?php echo $ye_i + 2; ?></a><?php } ?>
    <?php if ($ye_i + 3 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?ye_i=<?php echo $ye_i + 3; ?>"><?php echo $ye_i + 3; ?></a><?php } ?>
    <?php if ($ye_i + 4 <= ceil($all_i / $num_ye)) { ?><a
        href="./index.php?ye_i=<?php echo $ye_i + 4; ?>"><?php echo $ye_i + 4; ?></a><?php } ?>
    <?php if ($ye_i < ceil($all_i / $num_ye)) { ?> <a href="./index.php?ye_i=<?php echo $ye_i + 1; ?>">下一页</a><?php } ?>

    <a href="./index.php?ye_i=<?php echo ceil($all_i / $num_ye) ?>">最后一页</a>

</div>
</body>
</html>
<script>

    $(function () {

        $('#all_school').click(function () {

            window.location.href = "index.php";
        });


    });
    $(function () {

        $('#addnew').click(function () {

            window.location.href = "add.php";
        });


    });

    function del(id) {

        if (confirm("确定要删除吗？")) {


            var url = "index.php";
            var url_i = "?del_id=" + id;
            window.location.href = url + url_i;

        }


    }

</script>