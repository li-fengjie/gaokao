<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/4
 * Time: 23:49
 */
require_once('./get_data.php');

$prop_propid=$_GET['prop_propid'];
$prop_province=$_GET['prop_province'];
$prop_propbatch=$_GET['prop_propbatch'];

// $prop_propid=5;
// $prop_province='河北';
// $prop_propbatch='一批';



//取专业的名字
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
    $prop_propname=$data[0]['propname'];
}

$k=0;//用来保存找到了多少个符合回传条件的数据组

//取有同一个专业名字的专业的id
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
else if($i===0)
{
    echo 0;
    return;
}
else{
    for($j=0;$j<$i;$j++)
    {
        $prop_propid=$data[$j]['prop_propid'];

        //取学科的数据
        $table='gk_schpropgra';
        $where[0]='prop_propid';
        $where[1]=$prop_propid;
        $where[2]='province';
        $where[3]=$prop_province;
        $where[4]='propbatch';
        $where[5]=$prop_propbatch;
        $num=count($where)/2;
        $i=get_data($num,$table,$data,$where);
        if($i==-1)
        {
            echo -1;
            return;

        }
        else if($i===0);
        else{
            $turn[$k]['prop_propname']=$prop_propname;
            $turn[$k]['prop_propbatch']=$data[0]['propbatch'];
            $turn[$k]['prop_propgrade']=$data[0]['propgrade'];
            $k++;

        }
    }
}

if($k==0)
{
    echo 0;
    return;
}

//传回数据
print json_encode($turn);
?>