<?php
require_once('./get_data.php');
$table='gk_index';

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
    echo $data[0]['data'];
}

?>