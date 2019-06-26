<?php
require_once('./get_data.php');

$com_id=$_GET['com_id'];
$where[0]='id';
$where[1]=$com_id;


$table='gk_company';
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
    $turn['com_beijing']=$data[0]['beijing'];
    $turn['com_images']=$data[0]['images'];
    $turn['com_name']=$data[0]['name'];
    $turn['com_details']=$data[0]['details'];
    $turn['com_brief']=$data[0]['brief'];
    $turn['com_url']=$data[0]['url'];

}



//传回数据
print json_encode($turn);




?>