<?php
$prop_propid=$_GET['prop_propid'];
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

        table.last {
            width: 70%;
            margin: 20px auto;
        }
    </style>

</head>
<body>

<form action="index.php?prop_propid=<?php echo $prop_propid?>&add_id=<?php echo $prop_propid ?>" method="post" >
<table class="table table-bordered table-hover definewidth m10 last">
    <tr>
        <td width="15%" class="tableleft">省份名称<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
        </td>
        <td><input type="text" name="province" value=""/></td>
    </tr>

    <tr>
        <td width="15%" class="tableleft">专业平均分<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
        </td>
        <td><input type="text" name="propgrade" value=""/></td>
    </tr>
    <tr>
        <td width="15%" class="tableleft">专业批次<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span>
        </td>
        <td><input type="text" name="propbatch" value=""/></td>
    </tr>


    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" >保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.php?prop_propid=<?php echo $prop_propid?>";
		 });

    });
</script>