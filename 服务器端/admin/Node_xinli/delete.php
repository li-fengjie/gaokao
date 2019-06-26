<?php
require_once ('.././conn/conn.php');
if(!empty($_GET['id']))
{
    $id=isset($_GET['id'])?$_GET['id']:"";
    $sql="delete from gk_psy where id='$id'";
    $result=mysqli_query($link,$sql);
    if($result)
    {
        echo "<script>alert('delete success');window.location.href='index.php';</script>";
        exit();
    }
    else{
        echo "<script>alert('delete fail');window.location.href='index.php';</script>";
        exit();
    }
}