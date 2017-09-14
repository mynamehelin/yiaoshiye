<body onload="document.getElementById('Form1').submit();">
<?php
header("Content-type: text/html; charset=utf-8");
	$pay_memberid = "10040";   //商户ID
	$pay_orderid = date("YmdHis");    //订单号
	$pay_amount = $_POST['pay_amount'];    //交易金额
	$pay_applydate = $_POST['pay_applydate'];  //订单时间
	$pay_bankcode = "ICBC";   //银行编码
	$pay_notifyurl = "http://www.yiaoshiye.com/";  //服务端返回地址
	$pay_callbackurl = "http://www.yiaoshiye.com/system/payment/Shanpay/page.php?payid=".$_POST['payid'];  //页面跳转返回地址

	$Md5key = "gfq1fgYa3UtalfAwmesh8lOVrOYihm";   //密钥

	$tjurl = "http://www.fenghuopay.com/Pay_Index.html";   //提交地址

	$requestarray = array(
        "pay_memberid" => $pay_memberid,
        "pay_orderid" => $pay_orderid,
        "pay_amount" => $pay_amount,
        "pay_applydate" => $pay_applydate,
        "pay_bankcode" => $pay_bankcode,
        "pay_notifyurl" => $pay_notifyurl,
        "pay_callbackurl" => $pay_callbackurl
    );

	    ksort($requestarray);
        reset($requestarray);
        $md5str = "";
        foreach ($requestarray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
		//echo($md5str . "key=" . $Md5key."<br>");
        $sign = strtoupper(md5($md5str . "key=" . $Md5key));
		$requestarray["pay_md5sign"] = $sign;

		$requestarray["pay_tongdao"] = 'FengHuopay'; //必需(不参与签名)
		$requestarray['pay_productname'] ='VIP基础服务'; //必需(不参与签名)
		
        $str = '<form id="Form1" name="Form1" method="post" action="' . $tjurl . '">';
        foreach ($requestarray as $key => $val) {
            $str = $str . '<input type="hidden" name="' . $key . '" value="' . $val . '">';
        }
		//$str = $str . '<input type="submit" value="提交">';
        $str = $str . '</form>';
        $str = $str . '<script>';
        //$str = $str . 'document.Form1.submit();';
        $str = $str . '</script>';
        exit($str);
?>
<body>