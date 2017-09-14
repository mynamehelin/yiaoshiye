<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(97139915@qq.com)
// +----------------------------------------------------------------------
require APP_ROOT_PATH.'app/Lib/shop_lip.php';
public function fenghuo()
{
  
	var_dump(1234);
	exit;
		$ReturnArray = array( // 返回字段
            "memberid" => $_REQUEST["memberid"], // 商户ID
            "orderid" =>  $_REQUEST["orderid"], // 订单号
            "amount" =>  $_REQUEST["amount"], // 交易金额
            "datetime" =>  $_REQUEST["datetime"], // 交易时间
            "returncode" => $_REQUEST["returncode"]
			
        );
      
        $Md5key = "gfq1fgYa3UtalfAwmesh8lOVrOYihm";

		
		///////////////////////////////////////////////////////
		ksort($ReturnArray);
        reset($ReturnArray);
        $md5str = "";
        foreach ($ReturnArray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }

        $sign = strtoupper(md5($md5str . "key=" . $Md5key));

		///////////////////////////////////////////////////////
        if ($sign == $_REQUEST["sign"]) {
            if ($_REQUEST["returncode"] == "00") {

		file_put_contents("text1.txt",$_REQUEST['payid']);
	
		$payid           =   $_REQUEST['payid'];//支付id
		
		$Godpay_id       =   $_REQUEST['orderid'];//订单号 
		$sumb             =  $ReturnArray['amount'];//支付钱数
		
		$user_id         = $GLOBALS['db']->getOne("select sum(user_id) from ".DB_PREFIX."payment_notice where id = ".$payid);//支付User_id
		$ise=$GLOBALS['db']->query("update ".DB_PREFIX."payment_notice set is_paid=1 ,Godpay_id=".$Godpay_id." WHERE id=".$payid);
      if($ise==1){
		$GLOBALS['db']->query("update ".DB_PREFIX."user set money= money + {$sumb} where id = ".$user_id); //账户加钱
                 }
	    header("location: http://yiao1.yiaoshiye.com/index.php?ctl=account&act=record");
				
				
            }
        }
		
		
		
		
		
		

	
		

}