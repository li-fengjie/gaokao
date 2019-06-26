<?php
require_once('./get_data.php');

//echo $_GET['college_page'];
//echo $_GET['now_inc'];


$college_page=empty($_GET['college_page'])?'':$_GET['college_page'];
$company_page=empty($_GET['company_page'])?'':$_GET['company_page'];
$now_inc=$_GET['now_inc'];



$k=0;//用来保存取到的数据组数
//取学校的数据
if($now_inc==true)
{

    $table='gk_school';
    $i=get_data(0,$table,$data);

    if($i==-1)
    {
        echo -1;
        return;

    }
    else if($i==0)
    {
        echo 0;
        return;
    }
    else{
        for($j=0;$j<$i;$j++)
        {
if($j<$college_page*6)
    continue;
else if($j>$college_page*6+5)
    break;
else{

    //将需要的数据保存到$turn数组中
    $turn[$k]['sch_name']=$data[$j]['name'];
    $turn[$k]['sch_brief']=$data[$j]['brief'];
    $turn[$k]['sch_images']=$data[$j]['images'];
    $turn[$k]['sch_beijing']=$data[$j]['beijing'];
    $turn[$k]['sch_address']=$data[$j]['address'];
    $turn[$k]['sch_code']=$data[$j]['code'];
    $turn[$k]['sch_super']=$data[$j]['super'];
    $turn[$k]['sch_id']=$data[$j]['id'];
    $k++;

}

        }

    }



}
//取公司数据
if($now_inc==false){
    
    $table='gk_company';
    $i=get_data(0,$table,$data);

    if($i==-1)
    {
        echo -1;
        return;

    }
    else if($i==0)
    {
        echo 0;
        return;
    }
    else{
        for($j=0;$j<$i;$j++)
        {
            if($j<$company_page*6)
                continue;
            else if($j>$company_page*6+5)
                break;
            else{

                //将需要的数据保存到$turn数组中
                $turn[$j]['com_images']=$data[$j]['images'];
                $turn[$j]['com_name']=$data[$j]['name'];
                $turn[$j]['com_brief']=$data[$j]['brief'];
                $turn[$j]['com_address']=$data[$j]['address'];
                $turn[$j]['com_id']=$data[$j]['id'];
                $k++;
            }

        }

    }

}

if($k==0)
    echo 0;
else

//传回数据
print json_encode($turn);


?>