<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$aa = "localhost";               //数据库连接地址
$bb = "root";                   //数据库用户名
$cc = "123456";                  //数据库密码
$dd = "yiaoshiye";                //数据库名称

$conn = mysql_connect($aa, $bb, $cc);
if (mysql_select_db($dd, $conn)) {

} else {
    echo "数据库连接失败！";
}
mysql_query("set names 'utf8'");