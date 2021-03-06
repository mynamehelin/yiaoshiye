<?php
	/**
	 * 
	 * @param unknown_type $pMerBillNo
	 * @return string
	 */
	function DoDwTradeXml($data,$pWebUrl,$pS2SUrl){	

		$strxml = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>"
				."<request platformNo='".$data['platformNo']."'>"
				."<requestNo>" .$data['requestNo'] ."</requestNo>"
				."<platformUserNo>" .$data['platformUserNo'] ."</platformUserNo>"
				."<amount>" .$data['amount'] ."</amount>"
				."<feeMode>" .$data['feeMode'] ."</feeMode>"			  		
				."<callbackUrl><![CDATA[" .$pWebUrl ."]]></callbackUrl>"
				."<notifyUrl><![CDATA[" .$pS2SUrl ."]]></notifyUrl>"
				."</request>";	
				
		
		$strxml=preg_replace("/[\s]{2,}/","",$strxml);//去除空格、回车、换行等空白符
		$strxml=str_replace('\\','',$strxml);//去除转义反斜杠\		
		return $strxml;		
	}
	


	function DoDwTrade($user_id,$platformNo,$pTrdAmt,$post_url){
	
		
		
		$pWebUrl= SITE_DOMAIN.APP_ROOT."/index.php?ctl=collocation&act=response&class_name=Yeepay&class_act=DoDwTrade&from=".$_REQUEST['from'];//web方式返回
		$pS2SUrl= SITE_DOMAIN.APP_ROOT."/index.php?ctl=collocation&act=notify&class_name=Yeepay&class_act=DoDwTrade&from=".$_REQUEST['from'];//s2s方式返回		
	
		$user = array();
		$user = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$user_id);
		
		
		$yeepay_log = array();
		$yeepay_log['code'] = 'toWithdraw';
		$yeepay_log['create_date'] = to_date(NOW_TIME,'Y-m-d H:i:s');
		$GLOBALS['db']->autoExecute(DB_PREFIX."yeepay_log",$yeepay_log);
		$requestNo = $GLOBALS['db']->insert_id();
		
		
		$data = array();
		$data['requestNo'] = $requestNo;//请求流水号
		$data['platformUserNo'] = $user_id;//
		$data['platformNo'] = $platformNo;// 商户编号
		$data['amount'] = $pTrdAmt;
		$data['feeMode'] = 'USER';//费率模式PLATFORM PLATFORM 收取商户手续费 USER 收取用户手续费

		$GLOBALS['db']->autoExecute(DB_PREFIX."yeepay_withdraw",$data,'INSERT');
		$id = $GLOBALS['db']->insert_id();
	
		$strxml = DoDwTradeXml($data,$pWebUrl,$pS2SUrl);


		
		$pSign=cfca($strxml);
				
		$html = '<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8" /></head><body>
		<form name="form1" id="form1" method="post" action="'.$post_url.'/bha/toWithdraw" target="_self">		
		<input type="text" name="sign" value="'.$pSign.'" />		
				<textarea name="req" cols="100" rows="5">'.$strxml.'</textarea>
						 <input type="submit" value="提交"></input>
		</form>
		</body></html>
		<script language="javascript">document.form1.submit();</script>';
		//echo $html; exit;
		
		$yeepay_log = array();
		$yeepay_log['strxml'] =$strxml;
		$yeepay_log['html'] = $html;
		$GLOBALS['db']->autoExecute(DB_PREFIX."yeepay_log",$yeepay_log,'UPDATE','id='.$requestNo);
		
		return $html;
	
	}
	
	
	function DoDwTradeCallBack($str3Req){
		//print_r($str3XmlParaInfo);
		$requestNo = $str3Req["requestNo"];
		$where = " requestNo = '".$requestNo."'";
		$sql = "update ".DB_PREFIX."yeepay_withdraw set is_callback = 1 where is_callback = 0 and ".$where;
		$GLOBALS['db']->query($sql);
		if ($GLOBALS['db']->affected_rows()){		
			//操作成功
			$data = array();
			

			$GLOBALS['db']->autoExecute(DB_PREFIX."yeepay_withdraw",$str3Req,'UPDATE',$where);
			
				
			return 1;		
			
		}else{
			return 1;
		}
	}	
	
?>