<?php
require_once('./get_data.php');

$sch_id=$_GET['sch_id'];
$inp_province=$_GET['inp_province'];
$inp_select=$_GET['inp_select'];
$inp_batch=$_GET['inp_batch'];

/*
$sch_id='1';
$inp_province='广东';
$inp_select='0';
$inp_batch='0';
*/

//取学校的数据
$table='gk_school';
$where[0]='id';
$where[1]=$sch_id;
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
    $turn['sch_name']=$data[0]['name'];
    $turn['sch_images']=$data[0]['images'];
    $turn['sch_beijing']=$data[0]['beijing'];
    $turn['sch_brief']=$data[0]['brief'];
    $turn['sch_address']=$data[0]['address'];
    $turn['sch_super']=$data[0]['super'];
    $turn['sch_type']=$data[0]['type'];
    $turn['sch_id']=$data[0]['id'];
    $turn['sch_details']=$data[0]['details'];
    $turn['sch_code']=$data[0]['code'];
}

//学校历年录取线数据
$table='gk_sch_input';
$where[0]='id';
$where[1]=$sch_id;
$where[2]='province';
$where[3]=$inp_province;
$where[4]='inp_select';
$where[5]=$inp_select;
$where[6]='batch';
$where[7]=$inp_batch;
$num=count($where)/2;
$i=get_data($num,$table,$data,$where);
if($i==-1)
{
    echo -1;
    return;

}
else if($i==0);

else{

    //将需要的数据保存到$turn数组中
    $turn['inp_avera']=$data[0]['avera'];
    $turn['inp_averb']=$data[0]['averb'];
    $turn['inp_averc']=$data[0]['averc'];
    $turn['inp_mina']=$data[0]['mina'];
    $turn['inp_minb']=$data[0]['minb'];
    $turn['inp_minc']=$data[0]['minc'];

}
$where=array();
$data=array();
//取省控线
$table='gk_pro';

$where[0]='province';
$where[1]=$inp_province;
$where[2]='prosel';
$where[3]=$inp_select;
$where[4]='batch';
$where[5]=$inp_batch;
$num=count($where)/2;
$i=get_data($num,$table,$data,$where);

if($i==-1)
{
    echo -1;
    return;

}
if($i==0);


else{

    //将需要的数据保存到$turn数组中
    $turn['pro_graa']=$data[0]['graa'];
    $turn['pro_grab']=$data[0]['grab'];
    $turn['pro_grac']=$data[0]['grac'];

}

$where=array();
$data=array();
//取学科数据

$table='gk_schprospp';
$where[0]='id';
$where[1]=$sch_id;
$num=count($where)/2;
$i=get_data($num,$table,$data,$where);

if($i==-1)
{
    echo -1;
    return;

}
if($i==0);
else{
for($j=0;$j<$i;$j++)
{
    //将需要的数据保存到$turn数组中
    $turn['major_all'][$j]['spp_proname']=$data[$j]['proname'];
    $turn['major_all'][$j]['spp_proid']=$data[$j]['spp_proid'];
}

}

//传回数据
print json_encode($turn);
?>