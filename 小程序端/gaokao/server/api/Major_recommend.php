<?php
require_once('./get_data.php');
$majorselect=$_GET['ev_majorselect'];
//志愿专业
$localselect=$_GET['ev_localselect'];
//志愿地区
$userregion=$_GET['ev_userregion'];
//所在地区
$usergrade=$_GET['ev_usergrade'];
//高考分数

// $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
// mysqli_set_charset($link, 'utf8');
//测试一下下
// $majorselect='哲学';//志愿专业
// $localselect='北京';//志愿地区
// $userregion='广东';//所在地区
// $usergrade=666;//高考分数

 $i=0;//保存个数
 
       //取数据库数据
    $sql = "SELECT gk_school.id,gk_school.address,gk_school.name,gk_sch_input.batch,gk_school.beijing  
FROM gk_sch_input, gk_school
WHERE gk_sch_input.id = gk_school.id   
AND gk_school.address like '%$localselect%'
AND gk_sch_input.province='$userregion'
AND (gk_sch_input.avera+gk_sch_input.averb+gk_sch_input.averc)/3<='$usergrade'
";
/*--WHERE gk_sch_input.id = gk_school.id //使这两个表一一对应起来
--AND gk_school.address like '%'$localselect'%'//模糊搜索学校地址拥有志愿地区这字段的数据
--AND  AVG((gk_sch_input.avera+gk_sch_input.averb+gk_sch_input.averc)/3)<='$usergrade'
--AND gk_sch_input.province='$userregion'//区配用户所在地
*/

    $result = mysqli_query($link, $sql);
//下面这个判断条件会返回SQL错误给我们，希望没有错误吧，上帝保佑
if (!$result) {
 printf("Error: %s\n", mysqli_error($link));
 exit();
}
    if(!$result)
    $i=-1;
else{
   while($row = mysqli_fetch_array($result)){
       $data[$i]=$row;
       $i++;
    }
}
 //将需要的数据保存到$turn数组中
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
//gk_Sch_input
        // 学校基础数据表gk_School
    //将需要的数据保存到$turn数组中
    for($j=0;$j<$i;$j++)
    {
        $turn[$j]['res_schpro']=$data[$j]['address'];
        // 对应学校地区
        $turn[$j]['res_schid']=$data[$j]['id'];
        // 对应学校的id
        $turn[$j]['res_schname']=$data[$j]['name'];
        // 对应学校的名称
        $turn[$j]['res_schbacth']=$data[$j]['batch'];
        // 对应学校的层次
        $turn[$j]['res_schbeijing']=$data[$j]['beijing'];
        // 对应学校的背景
    }

}

//传回数据
print json_encode($turn);
?>