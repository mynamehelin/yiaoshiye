<?php
$GLOBALS['gateway_new'] = "http://www.yiaoshiye.com/system/payment/Shanpay/index.php";
function md5VerifyShan($p1, $p2,$p3,$sign,$key,$pid) {
	$prestr = $p1.$p2.$p3.$pid.$key;
	$mysgin = md5($prestr);
	if($mysgin == $sign) {
		return true;
	}else {
		return false;
	}
}

/**
 * 建立请求，以表单HTML形式构造（默认）
 * @param $para_temp 请求参数数组
 *
 */


/**
 * 建立请求，以表单HTML形式构造（默认）
 * @param $para_temp 请求参数数组
 *
 */
function buildRequestFormShan($para_temp,$key) {
	//待请求参数数组
	$para = buildRequestParaShan($para_temp,$key);
	$get_id=$_GET['id'] ;
	$GFB = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."payment_notice where id =$get_id ");
	//充值的钱数
	$money      = $GFB[0][money];
	$user_id    =$GFB[0][user_id];

	$useid=   $GFB[0][id];//充值信息id

	//交易时间
	$create_time= $GFB[0][create_time];

	$create_times=date('Y-m-d H:i:s', ($create_time +8*3600));

	$sHtml = "<form id='paysubmit' name='paysubmit' action='".$GLOBALS['gateway_new']."' accept-charset='utf-8' method='POST'>";
	while (list ($key, $val) = each ($para)) {
        $sHtml.= '
		<input type="hidden" id="language" name="pay_amount" value="'.$money.'" size="50"/>//交易金额
        <input type="hidden" id="tranCode" name="pay_applydate" value="'.$create_times.'" size="50"/>//交易时间
		<input type="hidden" id="language" name="user_id" value="'.$user_id.'" size="50"/>//交易金额
		<input type="" id="language" name="payid" value="'.$useid.'" size="50"/>//充值信息id';
    }

	//submit按钮控件请不要含有name属性
    $sHtml = $sHtml."<button type='submit' class='ui-button paybutton' rel='blue'>前往烽火支付</button></form>";

	$sHtml = $sHtml."<script>document.forms['paysubmit'].submit();</script>";
	return $sHtml;
}

/**
 * 生成要请求给云通付的参数数组
 * @param $para_temp 请求前的参数数组
 * @return 要请求的参数数组
 */
function buildRequestParaShan($para_temp,$key) {
	//除去待签名参数数组中的空值和签名参数
	$para_filter = paraFilterShan($para_temp);
	//对待签名参数数组排序
	$para_sort = argSortShan($para_filter);
	//生成签名结果
	$mysign = buildRequestMysignShan($para_sort,$key);

	//签名结果与签名方式加入请求提交参数组中
	$para_sort['sign'] = $mysign;

	return $para_sort;
}
/**
 * 除去数组中的空值和签名参数
 * @param $para 签名参数组
 * return 去掉空值与签名参数后的新签名参数组
 */
function paraFilterShan($para) {
	$para_filter = array();
	while (list ($key, $val) = each ($para)) {
		if($key == "sign" || $val == "")continue;
		else	$para_filter[$key] = $para[$key];
	}
	return $para_filter;
}
/**
 * 对数组排序
 * @param $para 排序前的数组
 * return 排序后的数组
 */
function argSortShan($para) {
	ksort($para);
	reset($para);
	return $para;
}
/**
 * 生成签名结果
 * @param $para_sort 已排序要签名的数组
 * return 签名结果字符串
 */
function buildRequestMysignShan($para_sort,$key) {
	//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	$prestr = createLinkstringShan($para_sort);
	$mysign = md5SignShan($prestr, $key);
	return $mysign;
}
function md5SignShan($prestr, $key) {
	$prestr = $prestr . $key;
	return md5($prestr);
}
/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstringShan($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);

	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}

	return $arg;
}
