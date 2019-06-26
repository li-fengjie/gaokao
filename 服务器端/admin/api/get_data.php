<?php
/**
 * Created by PhpStorm.
 * User: 老头子ai老太婆
 * Date: 2018/6/4
 * Time: 15:58
 */
//$num 用到的条件的段名的个数
//$table 指点表格的名字；$where 指定查找的条件数组，偶数下标为段名，奇数下标为值；
// $data为获取到的二维数组，第一维是由0开始的下标，二维是取到的每一组数据
//返回的是取到的满足条件的组数,错误(没取到数据库数据)则返回-1
//如果要取整个表的数据则不传入$where,$num为0
    $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
    mysqli_set_charset($link, 'utf8'); //设定字符集

function get_data($num,$table,&$data,$where=1)
{
    //连接localhost，用户名gaokao,密码gaokao ,数据库gaokao
    $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
    mysqli_set_charset($link, 'utf8'); //设定字符集

    $where_all='';//保存所有的条件
    for($i=0;$i<2*$num;$i+=2)
    {

      $where_all.=$where[$i].' = '."'".$where[$i+1]."'";
      if($i+2<$num*2)
          $where_all.=' and ';
    }
    //传入的条件为0则取所有数据
    if($num===0) $where_all=$where;
//echo $i.'<br/>';

    //取数据库数据
    $sql = "select * from $table WHERE $where_all";
    $result = mysqli_query($link, $sql);
    if(!$result)
    return -1;

    //将数据保存到数组$data中
    $j=0;//保存个数
   while($row = mysqli_fetch_array($result)){
       $data[$j]=$row;
       $j++;
   }


return $j;
}

//测试
/*
$table='gk_schpro';
$where[0]='id';
$where[1]='4';
$where[2]='proid';
$where[3]='20';
$data='';
//$i=get_data(0,$table,$data);
$i=get_data(count($where)/2,$table,$data,$where);
//print_r($data);
print json_encode($data);
*/
?>