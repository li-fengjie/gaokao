<?php
header('content-type:text/html;charset=utf-8');
 require_once('.././conn/conn.php');
        $sql1 = "select * from gk_index";
        $sql2 = "select * from gk_suggest";
        $result1 = mysqli_query($link, $sql1);
        $result2 = mysqli_query($link, $sql2);
        $row = mysqli_fetch_array($result1);
        $row2 = mysqli_fetch_array($result2);
        if(!empty($row['data'])&&!empty($row2['statement'])){
       echo "<script>alert('loading');window.location.href='edit.php'</script>;";
       exit();
    }
    else{
        $data = '';
      /*  $say = '';
        $image = '';*/
        $statement = '';
    }

if (!empty($_POST['data']) && !empty($_POST['statement'])) {
        $data = $_POST['data'];
        // $say = $_POST['say'];
        $statement = $_POST['statement'];
       /* $fileInfo=$_FILES["image"];
$maxSize=10485760;//10M,10*1024*1024
$allowExt=array('jpeg','jpg','png','tif');
$path="uploads";
//引入前面封装了的上传函数uploadFile.php
include_once '.././uploadFile.php';
$image=uploadFile($fileInfo, $path, $allowExt, $maxSize);*/

        $sql = "insert into gk_index (data) VALUES ('$data')";
        $sql2 = "insert into gk_suggest (statement) VALUES ('$statement')";
        $result = mysqli_query($link, $sql);
        $result2 = mysqli_query($link, $sql2);
        if ($result && $result2) {
            echo "<script>alert('mysql insert success');window.location.href='index.php';</script>";

        } else {
            echo "<script>alert('mysql insert have fail');window.location.href='index.php';</script>";

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
<body>
<form action="add.php" method="post" class="definewidth m20" enctype="multipart/form-data">
<table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">高考时间设定为：</td>
        <td><input type="text" name="data" placeholder="例如:2018-01-01" value=<?php echo $data;?>>&nbsp;例如:2018-01-01</td>
    </tr>
   <!--  <tr>
       <td class="tableleft">首页高考语录：</td>
       <td ><input type="text" name="say" value=<?php echo $say;?>></td>
   </tr>  
   <tr>
       <td class="tableleft">首页背景图片：</td>
       <td >
           <input type="" name="image">
           <input type="file" name="image" />
       </td>
   </tr> -->
      <tr>
        <td class="tableleft">意见与反馈：</td>
        <td ><textarea type="text" name="statement" cols="60" rows="5"><?php echo $statement;?></textarea></td>
    </tr> 
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">初次保存</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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