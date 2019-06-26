<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/5
 * Time: 0:58
 */

require_once('./get_data.php');


    $sch_name = $_GET['sch_name'];//学校名字
    $inp_province = $_GET['inp_province'];//省份
    $inp_batch = $_GET['inp_batch'];//批次
    $inp_select = $_GET['inp_select'];//文理科

/*    //测试数据
    $sch_name='大连海事大学';//学校id
      $inp_province='广东';//省份
      $inp_batch=1;//批次
      $inp_select=1;//文理科*/


    //先获取学校id
    $table = 'gk_school';
    $where[0] = 'name';
    $where[1] = $sch_name;
    $num = count($where) / 2;
    $i = get_data($num, $table, $data, $where);
    $sch_id = $data[0]['id'];


    $where[0] = 'id';
    $where[1] = $sch_id;

    $where[2] = 'province';
    $where[3] = $inp_province;

    $where[4] = 'batch';
    $where[5] = $inp_batch;

    $where[6] = 'inp_select';
    $where[7] = $inp_select;




/*
//测试数据
$pro_province=2;
$pro_prosel=2;
$pro_batch=2;
*/

//取省控线的数据

$table = 'gk_sch_input';
$num = count($where) / 2;
$i = get_data($num, $table, $data, $where);
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
else {

    //将需要的数据保存到$turn数组中
    $turn['inp_mina'] = $data[0]['mina'];
    $turn['inp_minb'] = $data[0]['minb'];
    $turn['inp_minc'] = $data[0]['minc'];

}

//传回数据
print json_encode($turn);


?>