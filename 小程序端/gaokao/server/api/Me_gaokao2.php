<?php
require_once('./get_data.php');
$my_userid=$_GET['my_userid'];
// $my_userid=12;
//$my_userid=9;

//取模拟考数据
$table='gk_usergrade';
$where[0]='userid';
$where[1]=$my_userid;

$num=count($where)/2;
$i=get_data($num,$table,$data,$where);
if($i==-1)
{
    echo -1;
    return;

}
else if($i===0){
    echo -1;
    return;
}
    
else {
    $turn['mk_onegrade']=$data[0]['onegrade'];
    $turn['mk_twograde']=$data[0]['twograde'];
    $turn['mk_thrgrade']=$data[0]['thrgrade'];
}



//取志愿高校数据

$table='gk_userselect';
$where[0]='userid';
$where[1]=$my_userid;

$num=count($where)/2;
$i=get_data($num,$table,$data,$where);
if($i==-1)
{
    echo -2;
    return;

}
else if($i===0){
    echo -22;
    return;
}
    
else {
    $turn['mz_oneschool']=$data[0]['oneschool'];
    $turn['mz_twoschool']=$data[0]['twoschool'];
    $turn['mz_thrschool']=$data[0]['thrschool'];
}



//取电话号码
$table='gk_usernew';
$where[0]='userid';
$where[1]=$my_userid;

$num=count($where)/2;
$i=get_data($num,$table,$data,$where);
if($i==-1)
{
    echo -3;
    return;

}
else if($i===0){
    echo -33;
    return;
}
else {
    $turn['my_mobilePhoneNumber']=$data[0]['mobilePhoneNumber'];
}



//传回数据
if(isset($turn))
print json_encode($turn);
else  echo 0;
?>