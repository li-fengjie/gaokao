<?php
require_once('.././conn/conn.php');
$change_id = $_GET['id'];
$sql = "select * from gk_company WHERE id='$change_id'";
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
                <td width="15%" class="tableleft">公司名称<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
                <td><input type="text" name="change_name" value="<?php echo $row['name']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft">公司头像</td>
                <td><input type="file" name="change_images" value="<?php echo $row['images']?>"/></td>
            </tr>
            <tr>
                <td class="tableleft">公司背景</td>
                <td><input type="file" name="change_beijing" value="<?php echo $row['beijing']?>"/></td>
            </tr>

            <tr>
                <td class="tableleft">公司简介<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
                <td><textarea name="change_brief" ><?php echo $row['brief']?></textarea></td>
            </tr>
            <tr>
                <td  class="tableleft">公司详情</td>
                <td><textarea name="change_details"><?php echo $row['details']?></textarea></td>
            </tr>
            <tr>
                <td  class="tableleft">公司地址<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
                <td><input type="text" name="change_address" value="<?php echo $row['address']?>"/></td>
            </tr>
            <tr>
                <td  class="tableleft">公司链接</td>
                <td><input type="text" name="change_url" value="<?php echo $row['url']?>"/></td>
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