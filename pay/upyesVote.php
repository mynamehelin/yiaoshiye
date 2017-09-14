<?php
session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf8");
require_once "config.php";
	  $id=$_POST['id'];
	  $uid=$_POST['uid'];
	  $time=time();
	  $sql=mysql_query("select count(*) from fanwe_deal_support_log where user_id='$uid' and  deal_id='$id'");
	  $count=mysql_result($sql,0);
	 if($count>0){
		  $sql=mysql_query("select count(*) from fanwe_uservote_Record where userid='$uid' and  goodid='$id'");
		  $count=mysql_result($sql,0);
		  if($count>0){
			echo '您已经投过票，请勿再次投票！';  
		  }	else{
				//$sql="INSERT INTO fanwe_uservote_Record(userid,time) VALUES('".$uid."','".$time."')";	
				$sql=mysql_query("INSERT INTO fanwe_uservote_Record(userid,goodid,time) VALUES('".$uid."','".$id."','".$time."')");			
				$sql=mysql_query("UPDATE fanwe_deal SET yes_vote=yes_vote+'1' WHERE id='".$id."' ");
				$sql=mysql_query("UPDATE fanwe_deal_order SET vote_type='1' WHERE deal_id='".$id."' && user_id='".$uid."'");
				$retval="";
				if($sql){
					$retval=1;
				}else{
					$retval=0;
				}
				echo $retval;
			}
	}else{
       echo '您未支持此项目，请勿投票！'; 
	}
?>