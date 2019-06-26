<?php 
	require_once('./get_data.php');
	$company_page=empty($_GET['company_page'])?'':$_GET['company_page'];
	$k=0;//用来保存取到的数据组数
	$now_inc=false;
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