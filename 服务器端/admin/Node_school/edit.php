<?php
require_once('.././conn/conn.php');
$change_id = $_GET['id'];
$sql = "select * from gk_school WHERE id='$change_id'";
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

        table.last {
            width: 80%;
            margin: 20px auto;
        }
    </style>

</head>
<body>

<form action="./index.php?id=<?php echo $change_id?>" method="post" name="school_add" enctype="multipart/form-data">
    <table class="table table-bordered table-hover definewidth m10 last">
        <?php
        while ($row = mysqli_fetch_array($result)) {

            ?>
            <tr>
                <td width="10%" class="tableleft">学校名称<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
                </td>
                <td><input type="text" name="change_name" value="<?php echo $row['name']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft" >学校头像</td>
                <td><input type="file" name="change_images" value="<?php echo $row['images']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft" >背景图</td>
                <td><input type="file" name="change_beijing" value="<?php echo $row['beijing']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft" >学校地址</td>
                <td><input type="text" name="change_address" value="<?php echo $row['address']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft" >学校语录</td>
                <td><textarea name="change_brief" ><?php echo $row['brief']?></textarea></td>
            </tr>
            <tr>
                <td class="tableleft" >学校简介</td>
                <td><textarea name="change_details" ><?php echo $row['details']?></textarea></td>
            </tr>
            <tr>
                <td class="tableleft" >学校类型<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
                </td>
                <td>
                    <input type="radio" name="change_type" value="0" <?php if($row['type']==0) echo "checked";?>/> 理科
                    <input type="radio" name="change_type" value="1" <?php if($row['type']==1) echo "checked";?>/> 文科

                </td>
            </tr>
            <tr>
                <td class="tableleft" >学校代码<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
                </td>
                <td><input type="text" name="change_code" value="<?php echo $row['code']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft" >学校层次<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
                </td>
                <td>
                    <input type="radio" name="change_super" value="0" <?php if($row['super']==0) echo "checked";?>/> 本科
                    <input type="radio" name="change_super" value="1"<?php if($row['super']==1) echo "checked";?>/> 211
                    <input type="radio" name="change_super" value="2"<?php if($row['super']==2) echo "checked";?>/> 985
                    <input type="radio" name="change_super" value="3"<?php if($row['super']==3) echo "checked";?>/> 大专
                    <input type="radio" name="change_super" value="4"<?php if($row['super']==4) echo "checked";?>/> 中专
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;<button type="button"
                                                                                             class="btn btn-success"
                                                                                             name="backid" id="backid">
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
            window.location.href = "index.php";
        });

    });
</script>