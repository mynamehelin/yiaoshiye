<?php
session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf8");
require_once "config.php";
	$uid=$_POST['userid'];
	$id=$_POST['dealId'];
	$moneyNum=$_POST['sunMoney'];
	$dealInfo=$_POST['dealInfo'];
	$userName=$_POST['userName'];
	$mobile=$_POST['userMobile'];
	$sql=mysql_query("INSERT INTO fanwe_user_sharing(user_id,deal_id,money,deal_info,user_name,is_succee,user_mobile) VALUES('".$uid."','".$id."','".$moneyNum."','".$dealInfo."','".$userName."','1','".$mobile."')");
	$retval="";
	if($sql){
		$retval=1;
	}else{
		$retval=0;
	}
echo $retval;

?>