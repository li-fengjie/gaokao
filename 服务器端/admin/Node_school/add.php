
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

table.last{
    width:80%;
    margin:20px auto;
}
    </style>

</head>
<body>

<form action="./index.php" method="post" name="school_add" enctype="multipart/form-data">
<table class="table table-bordered table-hover definewidth m10 last">

    <tr>
        <td width="10%" class="tableleft">学校名称<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
        <td><input type="text" name="school_name"/></td>
    </tr>
    <tr>
        <td class="tableleft">学校头像</td>
        <td><input type="file" name="school_images"/></td>
    </tr>
    <tr>
        <td class="tableleft">背景图</td>
        <td><input type="file" name="school_beijing"/></td>
    </tr>
    <tr>
        <td  class="tableleft">学校地址</td>
        <td><input type="text" name="school_address"/></td>
    </tr>
    <tr>
        <td class="tableleft">学校语录</td>
        <td><textarea name="school_brief"></textarea></td>
    </tr>
    <tr>
        <td  class="tableleft">学校简介</td>
        <td><textarea name="school_details"></textarea></td>
    </tr>
    <tr>
        <td  class="tableleft">学校类型<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
        <td>
            <input type="radio" name="school_type" value="0" checked/> 理科
            <input type="radio" name="school_type" value="1"/> 文科

        </td>
    </tr>
    <tr>
        <td  class="tableleft">学校代码<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
        <td><input type="text" name="school_code"/></td>
    </tr>
    <tr>
        <td  class="tableleft">学校层次<span style="color:red;font-size: 16px;margin-right:0px;">&nbsp;&nbsp;*</span></td>
        <td>
            <input type="radio" name="school_super" value="0" checked/> 本科
            <input type="radio" name="school_super" value="1"/> 211
            <input type="radio" name="school_super" value="2"/> 985
            <input type="radio" name="school_super" value="3"/> 大专
            <input type="radio" name="school_super" value="4"/> 中专
        </td>
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
				window.location.href="index.php";
		 });

    });
</script>