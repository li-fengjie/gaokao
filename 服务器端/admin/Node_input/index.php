<?php
require_once('.././conn/conn.php');
$readonly = "readonly";

?>


<?php
//编辑
if (empty($_GET['change_id']))
    $input1 = "编辑";
else {
    $change_id = $_GET['change_id'];
    $input1 = $_GET['input1'];
    if (!strcmp($input1, "编辑")) {
        $input1 = "保存";
        $readonly = "";
        // echo "1";
    } else {
        $input1 = "编辑";
        $readonly = "readonly";
        $province = $_POST['province'];
        $inp_select=$_POST['inp_select'];
        $batch=$_POST['batch'];
        $avera = $_POST['avera'];
        $averb = $_POST['averb'];
        $averc = $_POST['averc'];
        $mina = $_POST['mina'];
        $minb = $_POST['minb'];
        $minc = $_POST['minc'];

        $mark = 0;
        $sql = "select * from gk_sch_input WHERE  1";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            if ($row['id'] == $change_id)
                $mark = 1;
        }
        if ($mark === 1) {
            $sql = "UPDATE `gk_sch_input` SET `province`='$province',`inp_select`='$inp_select',`batch`='$batch',`avera`='$avera',`averb`='$averb',
      `averc`='$averc',`mina`='$mina',`minb`='$minb',`minc`='$minc' WHERE id='$change_id'";

        } else {
            $sql = "INSERT INTO `gk_sch_input` VALUES ('$change_id','$province','$inp_select','$batch','$avera','$averb','$averc','$mina','$minb','$minc')";

        }
        $result = mysqli_query($link, $sql);
        //echo "2";
    }

}
?>
<?php
//查询功能
if (empty($_GET['id']))
    $id = $_GET['change_id'];
else
    $id = $_GET['id'];

$sql = "select * from gk_sch_input WHERE  id='$id'";
$result = mysqli_query($link, $sql);

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

        .table td {

            text-align: center;
            vertical-align: middle;
        }

        table.last {
            width: 60%;
            margin: 20px auto;
        }

        .tableleft {
            width: 40%;

        }

        .table {
            width: 60%;
        }
    </style>
</head>


<?php
$row = mysqli_fetch_array($result);
?>

<form action="./index.php?change_id=<?php echo $id ?>&input1=<?php echo $input1 ?>" method="post">
    <table class="table table-bordered table-hover definewidth m10 last">


        <tr>
            <td class="tableleft">省份名称</td>
            <td><input type="text" name="province" value="<?php echo $row['province'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;省
            </td>
        </tr>
        <tr>
            <td class="tableleft" >学校文理科<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
            </td>
            <td>
                <input type="radio" name="inp_select" value="0" <?php if($row['inp_select']==0) echo "checked";?> <?php echo $readonly ?>/> 文科
                <input type="radio" name="inp_select" value="1"<?php if($row['inp_select']==1) echo "checked";?> <?php echo $readonly ?>/> 理科
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
            </td>
        </tr>
        <tr>
            <td class="tableleft" >学校批次<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
            </td>
            <td>
                <input type="radio" name="batch" value="0" <?php if($row['batch']==0) echo "checked";?> <?php echo $readonly ?>/> 一批
                <input type="radio" name="batch" value="1"<?php if($row['batch']==1) echo "checked";?> <?php echo $readonly ?>/> 二批
                <input type="radio" name="batch" value="2"<?php if($row['batch']==2) echo "checked";?> <?php echo $readonly ?>/> 三批
                <input type="radio" name="batch" value="3"<?php if($row['batch']==3) echo "checked";?> <?php echo $readonly ?>/> 四批
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>

        <tr>
            <td class="tableleft">2015年该校录取线平均分</td>
            <td><input type="text" name="avera" value="<?php echo $row['avera'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;分
            </td>
        </tr>
        <tr>
            <td class="tableleft">2016年该校录取线平均分</td>
            <td><input type="text" name="averb" value="<?php echo $row['averb'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;分
            </td>
        </tr>
        <tr>
            <td class="tableleft">2017年该校录取线平均分</td>
            <td><input type="text" name="averc" value="<?php echo $row['averc'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;分
            </td>
        </tr>
        <tr>
            <td class="tableleft">2015年该校录取线最低分</td>
            <td><input type="text" name="mina" value="<?php echo $row['mina'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;分
            </td>
        </tr>

        <tr>
            <td class="tableleft">2016年该校录取线最低分</td>
            <td><input type="text" name="minb" value="<?php echo $row['minb'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;分
            </td>
        </tr>
        <tr>
            <td class="tableleft">2017年该校录取线最低分</td>
            <td><input type="text" name="minc" value="<?php echo $row['minc'] ?>" <?php echo $readonly ?>/>&nbsp;&nbsp;&nbsp;&nbsp;分
            </td>
        </tr>
        <tr>
            <td class="tableleft">管理操作</td>
            <td>
                <button type="submit" class="btn btn-primary"><?php echo $input1 ?></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-success" name="backid" id="backid">
                    返回列表
                </button>
            </td>
        </tr>

    </table>
</form>
</body>
</html>
<script>
    $(function () {
        $('#backid').click(function () {
            window.location.href = "../Node_school/index.php";
        });

    });
</script>