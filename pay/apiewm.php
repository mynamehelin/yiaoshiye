<?php
//获取GMTime
function get_gmtime()
{
	return (time() - date('Z'));
}

function to_date($utc_time, $format = 'Y-m-d H:i:s') {
	if (empty ( $utc_time )) {
		return '';
	}
	$timezone = intval(app_conf('TIME_ZONE'));
	$time = $utc_time + $timezone * 3600; 
	return date ($format, $time );
}


session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf8");
require_once "config.php";
	$money_off=$_POST['money_off'];
	$tran_id=$_POST['tran_id'];
	$off_way=$_POST['off_way'];
	$off_bank=$_POST['off_bank'];
	$uaername=$_POST['uaername'];
	$time=get_gmtime();
	
	$user_id=$_POST['user_id'];
	$create_time=$_POST['create_time'];
	$notice_sn=$_POST['notice_sn'];
	
	$_SESSION['notice_sn'] = $notice_sn; 

	$sql=mysql_query("INSERT INTO fanwe_payment_below(money_off,tran_id,off_way,off_bank,time,pay_state,pay_type,username) VALUES('".$money_off."','".$tran_id."','".$off_way."','".$off_bank."','".$time."','充值未完成','线下充值','".$uaername."')");

		$aa=mysql_query("INSERT INTO fanwe_payment_notice(notice_sn,create_time,is_paid,user_id,money,Godpay_id,payment_name) VALUES('".$notice_sn."','".$create_time."',0,'".$user_id."','".$money_off."','".$tran_id."','线下充值')");
		
	$retval="";
	if($sql){
		$retval=1;
	}else{
		$retval=0;
	}
echo $retval;

?>