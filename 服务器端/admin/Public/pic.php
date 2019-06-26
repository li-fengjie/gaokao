<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/5/22
 * Time: 11:17
 */
session_start();
$image=imagecreatetruecolor(100,30);
$bgcolor=imagecolorallocate($image,000,255,255);
imagefill($image,0,0,$bgcolor);
$captch_code="";
//实现验证码
for($i=0;$i<4;$i++)
{//循环出四个数字
    $fontsize=6;//字体的大小为6
//定义字体的颜色
    $fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
//定义字体的取值范围
    //$fontcontent=rand(0,9);
    //数字与字母结合输出
    //确定字典
    $data='abcdefghijklmnopqrstuvwxyz1234567890';
    $fontcontent=substr($data,rand(0,strlen($data)),1);
    $captch_code.="$fontcontent";
    //截取字典的某一个字符
    $x=($i*100/4)+rand(5,10);
    $y=rand(5,10);
    //在范围内随机定义坐标
imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
$_SESSION['code']=$captch_code;//保存验证码
for($i=0;$i<200;$i++)//增加点，循环200个点
{
    $pointcolor=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
    //使用imagecolorallocate创建颜色
    imagesetpixel($image,rand(1,99),rand(1,99),$pointcolor);
    //使用imagesetpixel创建单一点
}
for($i=0;$i<8;$i++)
{
    //循环8次
    $linecolor=imagecolorallocate($image,rand(60,220),rand(60,220),rand(60,220));
    imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
}
/**
imagestring() 用 col 颜色将字符串 s 画到 image 所代表的
图像的 x，y 坐标处（这是字符串左上角坐标，整幅图像的左上角
为 0，0）。如果font 是 1，2，3，4 或 5，则使用内置字体。
 */
header("content-type:image/png");
imagepng($image);
imagedestroy($image);
?>