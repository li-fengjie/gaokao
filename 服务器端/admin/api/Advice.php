<?php

require_once('./get_data.php');

$table='gk_suggest';

$i=get_data(0,$table,$data);
$turn=$data[0];
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
//传回数据
    print json_encode($turn);
}
?>