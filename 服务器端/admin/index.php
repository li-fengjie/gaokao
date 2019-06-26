<?php
//$username=isset($_GET['username'])?$_GET['username']:'';
session_start();
$username=isset($_SESSION['username'])?$_SESSION['username']:'';
if(empty($username))
{
  echo "<script>window.location.href='./Public/login.html'</script>";//检测到没有登录则调到登录页面
  exit();
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo $username;?></span><a href="./Public/edit.php" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        		<li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>
          <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">信息管理</div></li>

      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bui-min.js"></script>
  <script type="text/javascript" src="assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [
      <!--menu为菜单管理，node为机构管理，role为角色管理，user为用户管理-->
      {id:'2',homePage : '3',menu:[{text:'系统管理',
      items:[
      {id:'3',text:'首页管理',href:'Index/index.php'},
      {id:'4',text:'用户管理',href:'User/index.php'},
      {id:'6',text:'管理员管理',href:'Admin/index.php'},
      {id:'7',text:'分数评测管理',href:'Node_fenshu/index.php'},
      {id:'8',text:'心理测试管理',href:'Node_xinli/index.php'}
      ]}]},

      {id:'9',homePage : '11',menu:[{text:'信息管理',
      items:[
      {id:'11',text:'学校基本信息',href:'Node_school/index.php'},
      {id:'12',text:'学校历年录取',href:'Node_school/find_id.php?num=0'},
      {id:'13',text:'学校下属学科',href:'Node_school/find_id.php?num=1'},
      {id:'14',text:'公司基本信息',href:'Node_company/index.php'},
      {id:'15',text:'省控线',href:'Node_province/index.php'}
      ]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>