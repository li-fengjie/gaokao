<?php
//封装上传函数
//定义一个uploadFile函数
function uploadFile($fileInfo,$path,$allowExt,$maxSize){
//取出$_FILES中的数据
$filename=$fileInfo["name"];
$tmp_name=$fileInfo["tmp_name"];
$size=$fileInfo["size"];
$error=$fileInfo["error"];
$type=$fileInfo["type"];
//取出文件路径中文件的类型的部分
$ext=pathinfo($filename,PATHINFO_EXTENSION);
//确定是否存在存放图片的文件夹，没有则新建一个
if (!file_exists($path)) {  //当目录不存在，就创建目录
  mkdir($path,0777,true);//创建目录
  chmod($path, 0777);//改变文件模式,所有人都有执行权限、写权限、度权限
}
//得到唯一的文件名！防止因为文件名相同而产生覆盖
$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
//目标存放文件地址
$destination=$path."/".$uniName;
//当文件上传成功，存入临时文件夹，服务器端开始判断
if ($error==0) {
  if ($size>$maxSize) {
    exit("上传文件过大！");
  }
  if (!in_array($ext, $allowExt)) {
    exit("非法文件类型");
  }
  if (!is_uploaded_file($tmp_name)) {
    exit("上传方式有误，请使用post方式");
  }
  //判断是否为真实图片（防止伪装成图片的病毒一类的
  if (!getimagesize($tmp_name)) {//getimagesize真实返回数组，否则返回false
    exit("不是真正的图片类型");
  }
  if (@move_uploaded_file($tmp_name, $destination)) {//@错误抑制符，不让用户看到警告
    echo "文件".$filename."上传成功!";
  }else{
    echo "文件".$filename."上传失败!";
  }
}else{
  switch ($error){
    case 1:
      echo "超过了上传文件的最大值，请上传2M以下文件";
      break;
    case 2:
      echo "上传文件过多，请一次上传20个及以下文件！";
      break;
    case 3:
      echo "文件并未完全上传，请再次尝试！";
      break;
    case 4:
      echo "未选择上传文件！";
      break;
    case 7:
      echo "没有临时文件夹";
      break;
  }
}
return $destination;
}

?>