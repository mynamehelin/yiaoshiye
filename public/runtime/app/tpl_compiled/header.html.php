<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['site_name']; ?></title>
<link rel="shortcut icon" type="image/ico" href="/101.png">
<meta name="keywords" content="<?php if ($this->_var['page_seo_keyword'] != ''): ?><?php echo $this->_var['page_seo_keyword']; ?><?php else: ?><?php echo $this->_var['seo_keyword']; ?><?php endif; ?>" />
<meta name="description" content="<?php if ($this->_var['page_seo_description'] != ''): ?><?php echo $this->_var['page_seo_description']; ?><?php else: ?><?php echo $this->_var['seo_description']; ?><?php endif; ?>" />
<?php
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/fanweUI.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/weebox.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/common_css/layout.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/common_css/style.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/article.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/login.css";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/common_js/jquery-1.8.2.min.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.bgiframe.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.weebox.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/lazyload.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/fanweUI.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/fanweUI.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/zcUI.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/zcUI.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/script.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/script.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/common_js/script.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/common_js/script.js";
if(app_conf("APP_MSG_SENDER_OPEN")==1)
{
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
}
if(HAS_DEAL_NOTIFY>0)
{
$this->_var['notifypagejs'][] = $this->_var['TMPL_REAL']."/js/notify_sender.js";
$this->_var['cnotifypagejs'][] = $this->_var['TMPL_REAL']."/js/notify_sender.js";
}
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/plupload/plupload.full.min.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/plupload/plupload.full.min.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['pagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['pagejs'],
  'c' => $this->_var['cpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<script type="text/javascript">
var APP_ROOT = '<?php echo $this->_var['APP_ROOT']; ?>';
var LOADER_IMG = '<?php echo $this->_var['TMPL']; ?>/images/lazy_loading.gif';
var ERROR_IMG = '<?php echo $this->_var['TMPL']; ?>/images/image_err.gif';
<?php if (app_conf ( "APP_MSG_SENDER_OPEN" ) == 1): ?>
var send_span = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SEND_SPAN',
);
echo $k['name']($k['v']);
?>000;
<?php endif; ?>
</script>
<style>
.logo{margin-top:24px;}
</style>
<?php if (HAS_DEAL_NOTIFY > 0): ?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['notifypagejs'],
  'c' => $this->_var['cnotifypagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<?php endif; ?>
<script type='text/javascript'  src='<?php echo $this->_var['APP_ROOT']; ?>/public/region.js'></script>
<!--[if IE 6]>
	<script src="<?php echo $this->_var['TMPL']; ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
	DD_belatedPNG.fix('img , .banner .btn_tit ul li.on , .banner .btn_tit ul li , .mx_1 , .mx_2 , .mx_3 , .mx_4 , .xzdq1 , .zcz , .timeline-left-gray , .deal_log_title .title , .timeline-comment-top , .timeline-start span , .pageleft a , .dz , .kj , .mf , .boxaddress , .xzdq , .con6 .sub , .fx i , .attention_focus_deal i , .head_down_icon , .banner .prev , .banner .next , .mxr_1 , .mxr_2 , .mxr_3 , .shenhe .shenhe_info li , .mod_title i , .box4 .mod_cont3 .leader_t , .box4 .mod_cont3 .leader_w , .box4 .mod_cont3 .leader_r , .box4 .mod_cont3 .leader_x , .box4 .mod_cont3 .leader_p , .step_box , .pageleft a i , .invester_all .col_a , .article_l li.on , .article_box .article_r_list h3 , .deals_cate_equity .equity_box .equity_box_l .inf_2 i , .fa , .send_message , .sidebar ul li .sidetop , .sidebar ul li .sidetop:hover , .header .header_nav_box .main_publish .btn_publish , .login_tip span a.zc_phone , .icon_arrow_down , .homeleft .menutitle .icons , .uinfo_settting .set , .u_header .u_total_box , .u_header .u_img .u_img_bg , .jcDateIco');
	</script>
<![endif]-->
</head>
<body>
<div class="header" id="" >
	<div class="header_top wrap">
		<!--logo-->
		<div class="logo f_l">
			<a class="link" href="<?php echo $this->_var['APP_ROOT']; ?>/">
				<?php
					$this->_var['logo_image'] = app_conf("SITE_LOGO");
				?>
				<?php 
$k = array (
  'name' => 'load_page_png',
  'v' => $this->_var['logo_image'],
);
echo $k['name']($k['v']);
?>
			</a>
		</div>
		<!--搜索
		<div class="header_search f_l">
			<form action="<?php
echo parse_url_tag("u:deals|"."".""); 
?>" method="post" id="header_search_form">

				<input type="text" id="header_keyword" name="k" placeholder="搜索项目" class="seach_text">
				<input type="button" value="搜索" class="seach_submit" id="header_submit" />
			</form>
        </div>
		-->
		<!--登陆-->
        <div class="f_r" style="width: 167px;height: 40px;line-height: 21px;border-radius: 10px;margin-top:60px;margin-right:-10px;">
			<?php 
$k = array (
  'name' => 'login_tip',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
		</div>
	</div>

	<div class="header_nav " style="width:777px">
		<div class="header_nav_box"  style="width:777px">
			<ul class="main_nav f_l"  style="width:777px">
				<?php $_from = $this->_var['nav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_item');if (count($_from)):
    foreach ($_from AS $this->_var['nav_item']):
?>

				<li  style="width:120px" >
					<a style="font-size:20px;" href="<?php echo $this->_var['nav_item']['url']; ?>"  target="<?php if ($this->_var['nav_item']['blank'] == 1): ?>_blank<?php endif; ?>" title="<?php echo $this->_var['nav_item']['name']; ?>"><b><?php echo $this->_var['nav_item']['name']; ?></b></a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php if (! app_conf ( "PROJECT_HIDE" )): ?>
			<div class="main_publish f_r">
				<a href="javascript:check_tg();" class="btn_publish"></a>
				<input type="hidden" name="check_login" value="<?php echo $this->_var['user_info']['id']; ?>">
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	(function(){
		if(!($(".zc_phone_drop").children().length)){
			$(".zc_phone").remove();
		}
	})();
	$(function(){
		$(".search_cate").bind('click',function(){
			$(this).attr("checked",true).addClass("cur").siblings().attr("checked",false).removeClass("cur");
			$("input[name='type']").val($(this).attr("livalue"));
		});

		//解决input中placeholder值在ie中无法支持的问题
		var doc=document,inputs=doc.getElementsByTagName('input'),supportPlaceholder='placeholder'in doc.createElement('input'),placeholder=function(input){var text=input.getAttribute('placeholder'),defaultValue=input.defaultValue;
		if(defaultValue==''){
			input.value=text}
			input.onfocus=function(){
				if(input.value===text){
				this.value=''
				}
			};
			input.onblur=function(){
				if(input.value===''){
					this.value=text
				}
			}
		};
		if(!supportPlaceholder){
			for(var i=0,len=inputs.length;i<len;i++){
				var input=inputs[i],text=input.getAttribute('placeholder');
				if(input.type==='text'&&text){
					placeholder(input)
				}
			}
		}
	});

	function check_tg(){
		var is_tg=<?php echo $this->_var['is_tg']; ?>,
			is_user_tg=<?php echo $this->_var['is_user_tg']; ?>,
			is_user_investor=<?php echo $this->_var['is_user_investor']; ?>,
			check_login=$("input[name='check_login']").val();
		if(check_login){
			if(is_tg){
				if(!is_user_tg){
					$.showErr("您未绑定资金托管账户，无法发起项目，点击确定后跳转到绑定页面",function(){
						window.location.href=APP_ROOT +"/index.php?ctl=collocation&act=CreateNewAcct&user_type=0&user_id=<?php echo $this->_var['user_info']['id']; ?>";
					});
				}else{
					window.location.href="<?php
echo parse_url_tag("u:project#choose|"."".""); 
?>";
				}
			}else{

				if(is_user_investor ==1){
					window.location.href="<?php
echo parse_url_tag("u:project#choose|"."".""); 
?>";
				}else if(is_user_investor ==2){
					$.showErr("您的实名认证正在审核中，还不能发起项目，请联系网站管理员");
				}
				else{
					$.showErr("您未进行身份认证，无法发起项目，点击确定后跳转到身份认证页面",function(){
						window.location.href="<?php
echo parse_url_tag("u:settings#security|"."method=setting-id-box".""); 
?>";
					});
				}

			}
		}
		else{
			$.showErr("请先登录再进行发起项目",function(){
				show_pop_login();
			});
		}
	}
</script>