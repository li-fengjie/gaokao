<?php
require_once('./get_data.php');


//取测试的数据
$table='gk_psy';

$i=get_data(0,$table,$data);

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

    //将需要的数据保存到$turn数组中
    $turn[$j]['psy_title']=$data[$j]['title'];
    $turn[$j]['psy_content']=$data[$j]['content'];
    $turn[$j]['psy_url']=$data[$j]['url'];

}

}



//传回数据
print json_encode($turn);




?>