<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/5/25
 * Time: 9:51
 */
//开启 Session
session_start();
//unset($_SESSION["username"]);//清空指定的session
//彻底销毁 Session
session_destroy();
echo "<script>alert('quit success');window.location.href='login.html';</script>";
?>