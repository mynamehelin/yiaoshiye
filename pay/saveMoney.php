<?php
session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf8");
require_once "config.php";
	$id=$_POST['shopId'];
	$moneyNum=$_POST['moneyNum'];
	$time=time();
	$sql=mysql_query("INSERT INTO fanwe_deal_item(deal_id,price,time) VALUES('".$id."','".$moneyNum."','".$time."')");
	
	$retval="";
	if($sql){
		$retval=1;
	}else{
		$retval=0;
	}
echo $retval;

?>