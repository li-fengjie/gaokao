<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/6
 * Time: 21:17
 */
require_once('./get_data.php');
$spp_proid=$_GET['spp_proid'];

// $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
// mysqli_set_charset($link, 'utf8');
// $table='gk_schprop';
// $where[0]='spp_proid';
// $where[1]=$spp_proid;
// $num=count($where)/2;
// $i=get_data($num,$table,$data,$where);
$sql="SELECT * FROM gk_schprop
WHERE numbe LIKE '{$spp_proid}__'";
$result=mysqli_query($link,$sql);

if(mysqli_num_rows($result)==0)
{
    echo -1;
    return;

}
else{
 //将数据保存到数组$data中
    $j=0;//保存个数
   while($row = mysqli_fetch_array($result)){
       $data[$j]=$row;
       $j++;
   }
    //将需要的数据保存到$turn数组中
   //将需要的数据保存到$turn数组中
   //提取数组相同元素
   $a3=0;
   $q=0;
   //$rep[$a3]=$data[$a3]['numbe'];
$rep[$a3]='';
for($i=0;$i<sizeof($data);$i++){
  $k=0;
  for($j=0;$j<sizeof($rep);$j++){
    if($data[$i]['numbe']!=$rep[$j])
    {
      $k++;
    }
  }
  if ($k==sizeof($rep)) {
    # code...
    $a3++;
    $rep[$a3]=$data[$i]['numbe'];
   $turn[$q]['prop_propname']=$data[$i]['propname'];
   $turn[$q]['prop_numbe']=$data[$i]['numbe'];
   $turn[$q]['prop_propid']=$data[$i]['prop_propid'];
   $q++;
  }
}

/*
    for($i=0;$i<$j;$i++)
    {
        $turn[$i]['prop_propname']=$data[$i]['propname'];
        $turn[$i]['prop_numbe']=$data[$i]['numbe'];
        $turn[$i]['prop_propid']=$data[$i]['prop_propid'];
    }
*/
}

//传回数据
print json_encode($turn);

?>