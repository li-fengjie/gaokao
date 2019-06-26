<?php
//header("Content-Type:image/pjpeg");
require_once ('.././conn/conn.php');
 $page = isset($_GET['p'])?$_GET['p']:1;
 $to_sql="SELECT COUNT(*) FROM gk_psy";
 $to_result=mysqli_fetch_array(mysqli_query($link,$to_sql));
 $to=$to_result[0];
 $ShowPage=5;
 $PageSize=5;
 $to_pages=ceil($to/$PageSize);
 $page_banner="";

$sql="select * from gk_psy LIMIT ".($page-1)*$PageSize .",$PageSize";
$result=mysqli_query($link,$sql);
//$row=mysqli_fetch_array($result);

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
<form class="form-inline definewidth m20" action="index.php" method="get">
    问卷名称：
    <input type="text" name="rolename" id="rolename" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增问卷</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>心理问卷id</th>
        <th>测试类型</th>
        <th>测试简介</th>
        <th>URL链接</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php
    while ($row=mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['content']?></td>
            <td><?php echo $row['url']?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'];?>">编辑</a>
                <a href="delete.php?id=<?php echo $row['id'];?>">删除</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<div class="inline pull-right page">
<?php
 //计算偏移量
 $pageffset=($ShowPage-1)/2;//页面偏移码
 if($page>1){
 $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
 $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
 }
 //初始化数据
 $start=1;//分页第一个标记
 $end=$to_pages;//分页最后一个标记
 if ($to_pages>$ShowPage){//如果总页数大于显示页码数目，$to_pages超过4则满足
 if($page>$pageffset+1){//如果当前页大于页面偏移码+1的话，则左标显示...
 $page_banner.="...";
 }
 if ($page>$pageffset){//如果页面大于页面偏移码
 $start=$page-$pageffset;//分页标记改变，当前页码-偏移码=中间分页码最左边页码
 $end=$to_pages>$page+$pageffset?$page+$pageffset:$to_pages;
 //判断语句，如果总页数大于当前页数+偏移码，真则$end=页数+偏移码，假则$end=总页数
 }else{//如果页面不大于页面偏移码
 $start=1;//开始页为首页
 $end=$to_pages>$ShowPage?$ShowPage:$to_pages;
 }
 if ($page+$pageffset>$to_pages){//到了最后几页
 $start=$start-($page+$pageffset-$end);//最后几页的第一标记
 }
 }
 for($i=$start;$i<=$end;$i++){
 $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($i)."'>{$i}</a>";
 }
 //尾部省略
 if ($to_pages>$ShowPage&&$to_pages>$page+$pageffset){
 //如果总页数大于显示页码且总页数大于当前页加偏移页
 $page_banner.="...";
 }
 if ($page<$to_pages){
 $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
 $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."'>尾页</a>";
 }
 $page_banner.="&nbsp;&nbsp;";
$page_banner.="共{$to_pages}页";
$page_banner.="<form action='index.php' method='get'>";
$page_banner.="到第<input type='text'size='2'name='p'>页";
$page_banner.="<input type='submit'value='确定'>";
$page_banner.="</form></div>";
echo $page_banner;
 ?>
</div>
</body>
</html>
<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.php";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>