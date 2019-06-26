<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/6
 * Time: 21:10
 */

require_once('./get_data.php');
$id=$_GET['sp_proid'];
// $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
// mysqli_set_charset($link, 'utf8');
 // $id=1;
// $table='gk_schprospp';
// $where[0]='sp_proid';
// $where[1]=$sp_proid;
// $num=count($where)/2;
// $i=get_data($num,$table,$data,$where);
// if($i==-1)
$sql="SELECT * FROM gk_schprospp
WHERE numbe LIKE '{$id}__'";
$result=mysqli_query($link,$sql);
// if (!$result) {
//  printf("Error: %s\n", mysqli_error($link));
//  exit();
// }
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
   //提取数组相同元素
   $a3=0;
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
   $turn[$i]['spp_proname']=$data[$i]['proname'];
   $turn[$i]['spp_numbe']=$data[$i]['numbe'];
   $turn[$i]['spp_proid']=$data[$i]['spp_proid'];
  }
}
 // print json_encode($rep);

/*$abc=0;
  for($i=0;$i<sizeof($data);$i++)
    {
    if (in_array($data[$i]['numbe'], $rep))
  {
if ($abc==0) {
  # code...
          $turn[$i]['spp_proname']=$data[$i]['proname'];
          $turn[$i]['spp_numbe']=$data[$i]['numbe'];
          $turn[$i]['spp_proid']=$data[$i]['spp_proid'];
          $abc=1;
          }
  }
else
  {
          $turn[$i]['spp_proname']=$data[$i]['proname'];
          $turn[$i]['spp_numbe']=$data[$i]['numbe'];
          $turn[$i]['spp_proid']=$data[$i]['spp_proid']; 
  }
    }*/
        
}

 //传回数据
 print json_encode($turn);
?>