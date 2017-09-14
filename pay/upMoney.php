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
	$name=$_POST['userName'];
	$uid=$_POST['usrId'];
	$moneyNum=$_POST['moneyNum'];
	$dealInfo=$_POST['dealInfo'];
	$sid=$_POST['sid'];
	$rationMoney=$_POST['rationMoney'];
	$charingMoney=$_POST['charingMoney'];
	$sumMnoney=$_POST['sumMnoney'];
	$time=get_gmtime();
	$sql=mysql_query("UPDATE fanwe_user SET money= money +'".$moneyNum."' WHERE user_name='".$name."'");
	$sql=mysql_query("UPDATE fanwe_deal SET issharing='1' WHERE name='".$dealInfo."'");
	$sql=mysql_query("UPDATE fanwe_deal_order SET issharing='1' WHERE deal_name='".$dealInfo."'");
	$sql=mysql_query("UPDATE fanwe_user_sharing SET sharing_money='".$charingMoney."',cont_money='".$sumMnoney."',proportion_money='".$rationMoney."' WHERE id='".$sid."'");
	$sql=mysql_query("INSERT INTO fanwe_user_log (log_info,money,type,user_id,log_time) VALUES('分红成功','".$moneyNum."','3','".$uid."','".$time."')");
	$retval="";
	if($sql){
		$retval=1;
	}else{
		$retval=0;
	}
echo $retval;

?>