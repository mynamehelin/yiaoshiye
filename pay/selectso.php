<?php
session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf8");
require_once "config.php";
	$sql=mysql_query("select id from fanwe_deal where 1 order by id desc limit 1");
	
	echo mysql_result($sql,0);


?>