<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/1
 * Time: 16:47
 */
require_once('.././conn/conn.php');
$school_id = $_GET['id'];

$sql = "select * from gk_school WHERE  id='$school_id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$beijing = $row['beijing'];
$images = $row['images'];
$address = $row['address'];
$brief = $row['brief'];
$details = $row['details'];
$type = $row['type'];
$code = $row['code'];
$super = $row['super'];

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">

    <style type="text/css">

        .detail_all{
            width:1200px;
            min-height:700px;
            margin:20px auto;
            overflow: hidden;
            z-index:0;
            position: relative;;
        }
       .detail_all .beijing {
            width:100%;
            height:100%;
            z-index:0;
        }
        .detail_all .mengceng{
            width:100%;
            height:100%;
            z-index:2;
            background: #ccc;
            opacity: 0.7;
            position: absolute;
            top:0;
            left:0;

        }
        .detail_all .images{
            width:150px;
            height:150px;
            border-radius: 150px;
            border:1px solid #0e90d2;
            z-index:5;
            position: absolute;
            top:150px;
            left:100px;
        }
        .detail_all .top_right{
            z-index:5;
            position:absolute;
            min-width:700px;
            top:80px;
            right:100px;
            font-size:18px;
        }
        .detail_all .title{
            margin:20px 0;
        }


        .detail_all .second{
            font-size:16px;
            margin-left:6px;
        }

        .detail_all .second_s{
            padding:10px;
            font-size:16px;
            margin-left:6px;
            width:80%;
            min-height: 100px;

            border:1px solid #555;

        }
    </style>
</head>
<body>
<div class="detail_all">
    <img class="beijing" src="<?php echo $beijing ?>"/>
    <div class="mengceng"></div>
    <div class="top">
        <img class="images" src="<?php echo $images ?>"/>
        <div class="top_right">
            <div class="title">
            <span>学校名称:</span>
            <span class="second"><?php echo $name ?></span>
            </div>
            <div class="title">
            <span>学校代码:</span>
            <span class="second"><?php echo $code ?></span>
            </div>
            <div class="title">
            <span>学校类型:</span>
            <span class="second">
                <?php if ($type == 0) echo "理科"; else echo "文科" ?>
            </span>
            </div>
            <div class="title">
            <span>学校层次:</span>
            <span class="second">
                <?php
                switch ($super) {
                    case 0:
                        echo "本科";
                        break;
                    case 1:
                        echo "211";
                        break;
                    case 2:
                        echo "985";
                        break;
                    case 3:
                        echo "大专";
                        break;
                    case 4:
                        echo "中专";
                        break;

                }

                ?>
            </span>
            </div>
            <div class="title">
            <span>学校地址:</span>
            <span class="second"><?php echo $address ?></span>
            </div>
            <div class="title">学校简介:</div>
            <div class="second_s "><?php echo $details ?></div>
            <div class="title">学校语录:</div>
            <div class="second_s"><?php echo $brief ?></div>
        </div>


    </div>
    <div class="zhongjian">

    </div>
    <div class="bottom">


    </div>


</div>
</body>

</html>

