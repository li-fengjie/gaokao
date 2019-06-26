<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/4
 * Time: 23:49
 */

//连接localhost，用户名gaokao,密码gaokao ,数据库gaokao
require_once('./get_data.php');

$my_userid=$_GET['my_userid'];
$mk_onegrade=$_GET['mk_onegrade'];
$mk_twograde=$_GET['mk_twograde'];
$mk_thrgrade=$_GET['mk_thrgrade'];
$mz_oneschool=$_GET['mz_oneschool'];
$mz_twoschool=$_GET['mz_twoschool'];
$mz_thrschool=$_GET['mz_thrschool'];
$my_mobilePhoneNumber=$_GET['my_mobilePhoneNumber'];
//echo $my_userid;

/*$my_userid=1;
$mk_onegrade=1;
$mk_twograde=1;
$mk_thrgrade=10;
$mz_oneschool=10;
$mz_twoschool=1;
$mz_thrschool=1;
$my_mobilePhoneNumber=1;*/

//保存电话号码
$sql ="select * from gk_usernew WHERE userid='$my_userid'";
// $link = mysqli_connect('localhost', 'root', '', 'gaokao');  
$result = mysqli_query($link, $sql);
$i=mysqli_fetch_row($result);
if($i>0)
{
    $sql ="UPDATE `gk_usernew` SET `mobilePhoneNumber`='$my_mobilePhoneNumber' WHERE userid='$my_userid'";
    $result = mysqli_query($link, $sql);
    if(!$result)
    {
        echo -1;

    }
}

else{
    echo "不存在此用户userid!请联系管理员！";
    return;
}




//保存模拟考成绩
$sql ="select * from gk_usergrade WHERE userid='$my_userid'";
$result = mysqli_query($link, $sql);
$i=0;
while ($row = mysqli_fetch_array($result)) {
    $i++;
}
if($i>0){
    $sql = "UPDATE `gk_usergrade` SET `onegrade`='$mk_onegrade',`twograde`='$mk_twograde',`thrgrade`='$mk_thrgrade' WHERE userid=$my_userid";
}
else {

    $sql = "INSERT INTO `gk_usergrade`(`userid`, `onegrade`, `twograde`, `thrgrade`) VALUES ('$my_userid','$mk_onegrade','$mk_twograde','$mk_thrgrade')";
}
$result = mysqli_query($link, $sql);

if(!$result)
{
    echo -1;
    return;
}

//保存志愿高校
$sql ="select * from gk_userselect WHERE userid='$my_userid'";
$result = mysqli_query($link, $sql);
$i=0;
while ($row = mysqli_fetch_array($result)) {
    $i++;
}
if($i>0){
    $sql = "UPDATE `gk_userselect` SET `oneschool`='$mz_oneschool',`twoschool`='$mz_twoschool',`thrschool`='$mz_thrschool' WHERE userid='$my_userid'";
}
else {
    $sql = "INSERT INTO `gk_userselect`(`userid`, `oneschool`, `twoschool`, `thrschool`) VALUES ('$my_userid','$mz_oneschool','$mz_twoschool','$mz_thrschool')";
}
$result = mysqli_query($link, $sql);

if(!$result)
{
    echo -1;
    return;
}

echo 1;

?>