<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/4
 * Time: 23:49
 */
require_once('./get_data.php');

$prop_propid=$_GET['prop_propid'];//获取专业的id


//取学科的数据
$table='gk_schprop';
$where[0]='prop_propid';
$where[1]=$prop_propid;
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
    $turn['prop_propname']=$data[0]['propname'];
    $turn['prop_details']=$data[0]['details'];

    $sch_id=$data[0]['id'];
    $prop_propname=$data[0]['propname'];
}

$j=0;//用来保存学校的第几组数据


//取剩下的有同一个专业名的学校
$table='gk_schprop';
$where[0]='propname';
$where[1]=$prop_propname;
$num=count($where)/2;
$i=get_data($num,$table,$data,$where);
if($i==-1)
{
    echo -1;
    return;

}
else if($i===0);
else{

    for($k=0;$k<$i;$k++)
    {

        $sch_id=$data[$k]['id'];

        //取学校的数据

$table='gk_school';
$where[0]='id';
$where[1]=$sch_id;
$num=count($where)/2;
$i1=get_data($num,$table,$data,$where);
if($i1==-1)
    return -1;
else
        {
            $turn['school'][$j]['sch_name']=$data[0]['name'];
            $turn['school'][$j]['sch_address']=$data[0]['address'];
            $turn['school'][$j]['sch_id']=$data[0]['id'];
            $j++;

        }

    }

}
//传回数据
print json_encode($turn);
?>