<?php
session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf8");
require_once "config.php";
	$id=$_POST['id'];
	
	$sql=mysql_query("UPDATE fanwe_payment_below SET pay_state='充值成功' WHERE id='".$id."' ");
	
	
		$shu_exchange=mysql_query("select id from fanwe_payment_notice where notice_sn='".$_SESSION['notice_sn']."'");
		$long_exchange=mysql_fetch_row($shu_exchange);
		
	$aaa=mysql_query("UPDATE fanwe_payment_notice SET is_paid='1' WHERE id='".$long_exchange[0]."' ");
	
	//mysql_query("UPDATE fanwe_payment_notice SET is_paid=1 WHERE id='".$aa."' ");
	$retval="";
	if($sql){
		$retval=1;
	}else{
		$retval=0;
	}
echo $retval;

?>