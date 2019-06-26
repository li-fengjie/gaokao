<?php
require_once('./get_data.php');
//$code=$_GET['code'];//获取到code
$code=$_GET['code'];
$APPID=$_GET['appid'];
$SECRET=$_GET['secret'];

//从小程序后台获取下面两个值填入
// $APPID='';
// $SECRET='';
/*$code='023Ms5jh1EcHVy0ohljh1Dsdjh1Ms5jX';
$APPID='wx80341c9cc41b1049';
$SECRET='4e438d5b1a16a789571a630b2910a664';*/
//方法一
$curl = curl_init();
    // 使用curl_setopt()设置要获取的URL地址
    $url='https://api.weixin.qq.com/sns/jscode2session?appid='.$APPID.'&secret='.$SECRET.'&js_code='.$code.'&grant_type=authorization_code';
    curl_setopt($curl, CURLOPT_URL, $url);
    // 设置是否输出header
    curl_setopt($curl, CURLOPT_HEADER, false);
    // 设置是否输出结果
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // 设置是否检查服务器端的证书
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // 使用curl_exec()将CURL返回的结果转换成正常数据并保存到一个变量
    $data = curl_exec($curl);
    // 使用 curl_close() 关闭CURL会话
    curl_close($curl);

    $data = json_decode($data);
    $data = get_object_vars($data);

   /* echo '<pre>';
    print_r($data['errcode']);*/
        $openid=$data['openid'];
    $session_key=$data['session_key'];
// $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
// mysqli_set_charset($link, 'utf8'); //设定字符集

//查询用户信息
$sql2 ="select * from gk_usernew WHERE authData='$openid'";
$result2 = mysqli_query($link, $sql2);
if (mysqli_num_rows($result2)==0) {
    # code...
    //保存用户数据
    $sql1 = "INSERT INTO gk_usernew( authData,session_key) VALUES ('$openid','$session_key')";
    $result1 = mysqli_query($link, $sql1);
    $sql3 = "select * from gk_usernew WHERE authData='$openid'";
    $result3 = mysqli_query($link, $sql3);
    if (mysqli_num_rows($result3)==0) {
        $row = mysqli_fetch_array($result3);
        $turn['my_userid'] = $row['userid'];
        $turn['my_authData'] = $row['authData'];
    }
}
else
{
    $row = mysqli_fetch_array($result2);
    $turn['my_userid'] = $row['userid'];
    $turn['my_authData'] = $row['authData'];
}

  //传回数据
 print json_encode($turn);

//    // 方法二：
//     //开始获取openid
// $url="https://api.weixin.qq.com/sns/jscode2session?appid=$APPID&secret=$SECRET&js_code=$code&grant_type=authorization_code";
// $weixin=file_get_contents($url);
// $jsondecode=json_decode($weixin);
// $data=get_object_vars($jsondecode);

//     $openid=$data['openid'];
//     $session_key=$data['session_key'];
// $link = mysqli_connect('localhost', 'root', '', 'gaokao');  //链接数据库
// mysqli_set_charset($link, 'utf8'); //设定字符集

// //查询用户信息
// $sql2 ="select * from gk_usernew WHERE authData='$openid'";
// $result2 = mysqli_query($link, $sql2);
// if (!$result2) {
//     # code...
//     //保存用户数据
//     $sql1 = "INSERT INTO gk_usernew( authData,session_key) VALUES ('$openid','$session_key')";
//     $result1 = mysqli_query($link, $sql1);
//     $sql3 = "select * from gk_usernew WHERE authData='$openid'";
//     $result3 = mysqli_query($link, $sql3);
//     if ($result3) {
//         $row = mysqli_fetch_array($result3);
//         $turn['my_userid'] = $row['userid'];
//         $turn['my_authData'] = $row['authData'];
//     }
// }
// else
// {
//     $row = mysqli_fetch_array($result2);
//     $turn['my_userid'] = $row['userid'];
//     $turn['my_authData'] = $row['authData'];
// }

//   //传回数据
//  print json_encode($turn);
?>