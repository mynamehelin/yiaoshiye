<?php 
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(97139915@qq.com)
// +----------------------------------------------------------------------

require './system/system_init.php';
require './app/Lib/App.class.php';

if($_REQUEST['is_pc']==1)
	es_cookie::set("is_pc","1",24*3600*30);
 
 /*
if (isMobile() && !isset($_REQUEST['is_pc']) && es_cookie::get("is_pc")!=1&&is_dir(APP_ROOT_PATH."wap")){
	$ctl=$_REQUEST['ctl']?$_REQUEST['ctl']:'index';
	$act=$_REQUEST['act']?$_REQUEST['act']:'index';
	$id=$_REQUEST['id'];
	if($id){
		app_redirect(url_wap($ctl."#".$act,array('id'=>$id)));
	}else{
		app_redirect(url_wap($ctl."#".$act));
	}
	
}else{
	*/
	set_source_url();
 	//实例化一个网站应用实例

//var_dump( '<pre>',$_REQUEST );exit;
	$AppWeb = new App();
//}
//实例化一个网站应用实例
 

?>