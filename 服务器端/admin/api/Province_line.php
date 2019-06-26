<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/5
 * Time: 0:26
 */
require_once('./get_data.php');


$pro_province=$_GET['pro_province'];//获取省份
$pro_prosel=$_GET['pro_prosel'];//获取理科文科
$pro_batch=$_GET['pro_batch'];//获取批次

/*
//测试数据
$pro_province=2;
$pro_prosel=2;
$pro_batch=2;
*/

//取省控线的数据
$table='gk_pro';
$where[0]='province';
$where[1]=$pro_province;

$where[2]='prosel';
$where[3]=$pro_prosel;

$where[4]='batch';
$where[5]=$pro_batch;

$num=count($where)/2;
$i=get_data($num,$table,$data,$where);
if($i==-1)
{
    echo -1;
    return;

}
else if($i===0)
{
    echo 0;
    return;
}
else{

    //将需要的数据保存到$turn数组中
    $turn['pro_graa']=$data[0]['graa'];
    $turn['pro_grab']=$data[0]['grab'];
    $turn['pro_grac']=$data[0]['grac'];

}

//传回数据
print json_encode($turn);
?>