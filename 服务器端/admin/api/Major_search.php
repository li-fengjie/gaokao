<?php
require_once('./get_data.php');
$keyword=$_GET['keyword'];
$whatnum=$_GET['whatnum'];

if($whatnum==1)
{
    $k=0;
    $table='gk_school';
    $i=get_data(0,$table,$data);
    if($i==-1)
    {
        echo -1;
        return;

    }
    else

    for($j=0;$j<$i;$j++)
    {
      if(strstr($data[$j]['name'],$keyword))
      {
          $turn[$k]['sch_name']=$data[$j]['name'];
          $turn[$k]['sch_id']=$data[$j]['id'];
          $k++;
      }
    }


}
else if($whatnum==2)
{
    $table='gk_schprop';
    $k=0;

    $i=get_data(0,$table,$data);
    if($i==-1)
    {
        echo -1;
        return;

    }
    else

        for($j=0;$j<$i;$j++)
        {
            if(strstr($data[$j]['propname'],$keyword))
            {
                $turn[$k]['prop_propname']=$data[$j]['propname'];
                $turn[$k]['prop_propid']=$data[$j]['prop_propid'];
                $k++;
            }
        }

}
else $k=0;

if($k==0)
{
    echo 0;
    return;
}
else
//传回数据
print json_encode($turn);

?>