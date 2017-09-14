<?php echo $this->fetch('inc/header.html'); ?>
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/countUp.min.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/countUp.min.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/swiper.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.SuperSlide.2.1.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.SuperSlide.2.1.js";

$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/ajax_user_login.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/ajax_user_login.js";

?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<style type="text/css">

	.nav_item1 .ui-progress,.nav_item1 .ui-success{height:12px;}
	.nav_item1 .ui-progress span,.ui-success span{height:12px;line-height:12px;font-size:12px;color:#fff;text-align:right;}
	#pin_box{margin-top:10px;}
	.nav_item .nav_item1 .nav_item2{cursor:pointer;}
	.item_info .mask_text .item_title.other_info .every_info em {display: inline-block;width: 100%;text-align: center;}
	.item_info{bottom: -55px; width: 288px;height: 86px;}
	.item_info:hover{bottom:0;}
	.f_sharing{display: block;left: 0;bottom: 0;z-index: 1;height:20px;width:54px;line-height:22px;font-size:12px;background: #f93030;color:#fff;text-align: center;}
	.f_succee{display: block;left: 0;bottom: 0;z-index: 1;height:20px;width:54px;line-height:22px;font-size:12px;background:#f98530;color:#fff;text-align: center;}

.nav_item{padding-top:10px;margin:0 16px 15px 0;}
.nav_item:nth-child(4n+0){margin:0 0 16px 0;}
    #pin_box{margin-top:-20px;}
	.clear{height:143px;}
	

</style>
<script> 

$(document).keydown(function (event) {
if (event.keyCode == 13) {
$("#btn_do_login").click();
}
});

 </script>
<!--
..item_info {bottom: -55px; width: 288px;height: 86px;}
	..mask_text {position: absolute;z-index: 99;width: 100%;height: 100%;}
	..item_title {padding: 8px 15px;display: block; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;}
	..other_info {width: 288px;height: 46px;}
	..other_info .every_info em.info_num {font-size: 14px;font-family: Verdana;line-height: 14px;}
	..other_info .every_info em.info_name {font-size: 12px;line-height: 12px;font-family: "SimSun";margin-top: 7px;}

-->
<!--  海报区域开始  -->



		<div class="banner slideBox" id="banner" style="height:730px; ">
	<div class="banner_cont effect_bd" style="height:730px;">
		<ul style="height:730px">
			<?php $_from = $this->_var['image_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image_item');if (count($_from)):
    foreach ($_from AS $this->_var['image_item']):
?>
			<li style="height:730px"><a href="#" target=_blank style="display:block;background: url(<?php echo $this->_var['image_item']['image']; ?>)50% 50%; no-repeat;height:730px;"></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
	<div class="btn_tit effect_hd">
		<?php $_from = $this->_var['image_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image_item');if (count($_from)):
    foreach ($_from AS $this->_var['image_item']):
?>
		<span></span>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
	<div class="fy_box" style="">
		<!--左右翻页按钮，可以不用-->
		<a class="prev" href="javascript:void(0)"></a>
		<a class="next" href="javascript:void(0)"></a>
	</div>
</div>
<script type="text/javascript">
	if(!$(".banner_cont ul").has('li').length){
		$("#banner").css("display","none");
	}

	if($(".banner_cont ul").find('li').length==1){
		$(".btn_tit").css("display","none");
	}
	else if($(".banner_cont ul").find('li').length>1){
		$(".btn_tit").css("display","block");
	}
	if($(".banner_cont ul").find('li').length>1){
		jQuery("#banner").slide({mainCell:".banner_cont ul",titCell:".effect_hd span",effect:"leftLoop",easing:"easeInOutQuint",delayTime:500,autoPlay:true});
		$("#banner").mousemove(function(){
			$(this).find(".prev").show();
			$(this).find(".next").show();
		}).mouseout(function(){
			$(this).find(".prev").hide();
			$(this).find(".next").hide();
		});
	}
</script>



<!--  海报区域结束  -->
<!--登录注册开始-->

<?php
    if($_SESSION['fanweuser_info']['user_name']){
?>

<?php
}else{
?>
<div class="login" style="margin-top:120px;right:5%;width:350px;background: rgba(0, 0, 0, 0.4)">
	<div class="login_box">
		<form id="user_login_form" name="user_login_form" action="<?php
echo parse_url_tag("u:user#do_login|"."".""); 
?>">
		<div class="login_top">
			<span style="padding-right:174px;">用户登录</span>
			<a  href="<?php
echo parse_url_tag("u:user#register|"."".""); 
?>" style="font-size:16px;">注册新用户</a>
		</div>
		<div class="login_inp">
			<img src="app/Tpl/fanwe_1/images/dl_1.png"/>
			<input type="text" name="email" id="email" value="" placeholder="用户名"/>
		</div>
		<div class="login_inp">
			<img src="app/Tpl/fanwe_1/images/dl_1.png"/>
			<input type="password" name="user_pwd"   placeholder="请输入密码"/>
		</div>
		<div class="login_yzm" style="margin-right:75px;">
			<input class="inp_d" type="text" name="adm_verify"  id="adm_verify" value="" placeholder="请输入验证码"/>
			<img src="/verify.php"  id="verify" align="absmiddle"/>
		</div>
		<div class="login_che">
			<label><input type="checkbox" name="" id="" value="" checked />记住密码</label>
			<a href="<?php
echo parse_url_tag("u:user#getpassword|"."".""); 
?>" style="color:#fff">忘记密码？</a>
		</div>
		<div class="login_inp">
			<input type="button" value="登录" name="submit_form" class="btn_do_login login_btn" id="btn_do_login" />
			<input type="hidden" value="1" name="ajax" />
			<div class="blank15"></div>
		</div>
		</form>
	</div>
</div>
<?php
}
?>



<!--登录注册结束-->
<div class="adv_index">
	<adv adv_id="index_top" />
</div>

<!-- 统计模块 结束 -->
<!-- 专题推荐 开始 -->
<div class="index_m index_recommend" style="background:#fff5e7;">
<div class="index_sum">
	<ul class="sum_wrap">
		<li class="cont_pr sum_money">
			<i></i>
			<span id="sum_money"><?php echo $this->_var['virtual_money']; ?></span>累计交易金额
			<input type="hidden" name="sum_money" value="<?php echo $this->_var['virtual_money']; ?>" />
		</li>
		<li class="cont_pr sum_success">
			<i></i>
			<span id="sum_success"><?php echo $this->_var['success_sum']; ?></span>完成项目
			<input type="hidden" name="success_sum" value="<?php echo $this->_var['success_sum']; ?>" />
		</li>
		<li class="cont_pr sum_online">
			<i></i>
			<span id="sum_online"><?php echo $this->_var['virtual_effect']; ?></span>在线项目
			<input type="hidden" name="sum_online" value="<?php echo $this->_var['virtual_effect']; ?>" />
		</li>
		<li class="cont_pr sum_user">
			<i></i>
			<span id="sum_user"><?php echo $this->_var['register_sum']; ?></span>累计注册人数
			<input type="hidden" name="sum_user" value="<?php echo $this->_var['register_sum']; ?>" />
		</li>
	</ul>
</div>
	<div class="wrap">
		<div class="recommend1 hide">
			<a href="" target="_blank"><img src="<?php echo $this->_var['TMPL']; ?>/images/index_re1.jpg" /></a>
			<a href="" target="_blank"><img src="<?php echo $this->_var['TMPL']; ?>/images/index_re1.jpg" /></a>
			<a href="" target="_blank"><img src="<?php echo $this->_var['TMPL']; ?>/images/index_re1.jpg" /></a>
			<a href="" target="_blank" class="last"><img src="<?php echo $this->_var['TMPL']; ?>/images/index_re1.jpg" /></a>
		</div>
		<div class="recommend2">

			<script type="text/javascript">
				jQuery("#special_effect").slide({titCell:".special_hd ul",mainCell:".special_list ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click",easing:"easeOutBack",delayTime:500});
			</script>
	<!--
		<div class="project_com_tit clear" style="color: #feb106;width: 250px;font-size: 28px;height: 65px;line-height: 65px;text-align: center;margin: 0 auto;border: 2px solid #acdddd;border-radius: 10px;">

		众筹项目

		</div>
		-->
				<div class="project_com_tit clear">
					<img src="<?php echo $this->_var['TMPL']; ?>/images/text_2.png"  style="margin:30px auto 60px;"/>
				</div>
		<!---->
		<div id="pin_box" style="margin-top:-30px;">
		  <?php $_from = $this->_var['deal_recommend_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_recommend_item');$this->_foreach['deal_recommend'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_recommend']['total'] > 0):
    foreach ($_from AS $this->_var['deal_recommend_item']):
        $this->_foreach['deal_recommend']['iteration']++;
?>
			  <?php if ($this->_foreach['deal_recommend']['iteration'] <= 3): ?>
		   <div class="recommend_box " style="width:357px; margin-left:25px;height:391px;padding: 10px 0;margin-bottom: 20px;margin-top: 29px;border:4px solid #feb006;float: left;">
				<div class="recommend_right recommend_m f_l" style="width:357px;float: left; margin-top:-10px;">
					<ul>
						<li class="<?php if ($this->_foreach['deal_recommend']['iteration'] % 1 == 0): ?>last <?php endif; ?><?php if ($this->_foreach['deal_recommend']['iteration'] % 2 == 0 || $this->_foreach['deal_recommend']['iteration'] % 2 == 0): ?><?php endif; ?>">
							<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_recommend_item']['id']."".""); 
?>" target="_blank">
								<img src="<?php if ($this->_var['deal_recommend_item']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_recommend_item']['image'],
  'w' => '350',
  'h' => '285',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal_recommend_item']['name']; ?>" lazy="true"/>
							</a>
						</li>
					</ul>
				</div>
			   <div class="recommend_box_l">
					<div class="recommend_box_lintro" style="width:357px;">
                        <span style="width: 96%;font-size: 16px"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_recommend_item']['name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></span>
						<span>众筹金额：<em><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_recommend_item']['support_amount'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em>元</span>
						<span>众筹金额：<em><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_recommend_item']['limit_price'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em>元</span>
					</div>
					<div class="progress_barcx clear" style="width:75%;margin-left:-9px;margin-top:10px;">
						<div class="ui_progress">
							<span class="bg_orange" style="width:<?php echo $this->_var['deal_recommend_item']['percent']; ?>%"></span>
						</div>
						<span class="progress_bar_num"><?php echo $this->_var['deal_recommend_item']['percent']; ?>%</span>
					</div>
					<div class="recommend_box_l_time" style="margin:-108px -3px">
						最后时间：<span><?php echo $this->_var['deal_recommend_item']['remain_days']; ?></span> 天
					</div>
					<a style="margin-top:77px;" class="recommend_box_l_btn" href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_recommend_item']['id']."".""); 
?>">立即参与</a>
			   </div>
		   </div>
	   <?php endif; ?>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</div>
</div>
<!-- 专题推荐 结束 -->

<!-- 最新创意 开始 -->
<!--

<div class="index_m index_new">
	<div class="wrap">
	<div class="project_com_tit clear"><img src="<?php echo $this->_var['TMPL']; ?>/images/text_12.png"  style="margin:30px auto 60px;"/></div>
		<div id="pin_box">
			<?php $_from = $this->_var['deal_cart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cart_pos');$this->_foreach['deal_cart_lists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_cart_lists']['total'] > 0):
    foreach ($_from AS $this->_var['cart_pos']):
        $this->_foreach['deal_cart_lists']['iteration']++;
?>
			<?php if ($this->_foreach['cart_pos']['iteration'] <= 4): ?>

			<div class="nav_item<?php if ($this->_foreach['deal_cart_list']['iteration'] % 4 == 1): ?> first<?php endif; ?>">

				<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['cart_pos']['id']."".""); 
?>" target="_blank">
				<div class="project_image">
					<img src="<?php if ($this->_var['cart_pos']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['cart_pos']['image'],
  'w' => '285',
  'h' => '200',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal_cart_list']['name']; ?>" lazy="true" />

					&lt;!&ndash;状态&ndash;&gt;
					<?php if ($this->_var['cart_pos']['type'] == 0): ?>
					<?php if ($this->_var['cart_pos']['begin_time'] > $this->_var['now']): ?>
					<span class="project_step project_begin">预热中</span>
					<?php elseif ($this->_var['cart_pos']['issharing'] == 1): ?>
					<span <?php if ($this->_var['cart_pos']['issharing'] == 1): ?>class="project_step project_success"<?php else: ?>class="project_step project_fail"<?php endif; ?>><?php if ($this->_var['cart_pos']['issharing'] == 1): ?>已分红<?php else: ?>已成功<?php endif; ?></span>
					<?php else: ?>
					<?php if ($this->_var['cart_pos']['percent'] >= 100): ?>
					<span class="project_step project_fail">已成功</span>
					<?php else: ?>
					<span class="project_step project_sprite">
							<?php if ($this->_var['cart_pos']['end_time'] == 0): ?>
							长期项目
							<?php else: ?>
								<?php if ($this->_var['cart_pos']['type'] == 1): ?>
								融资中
								<?php else: ?>
								众筹中
								<?php endif; ?>
		 					<?php endif; ?>
						</span>
					<?php endif; ?>
					<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="project_text">
					&lt;!&ndash;项目名称&ndash;&gt;
					<span class="project_title"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['cart_pos']['name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></span>
					<div class="project_schedule">
						<?php if ($this->_var['cart_pos']['begin_time'] > $this->_var['now']): ?>

						<?php else: ?>
						&lt;!&ndash;money&ndash;&gt;
						<div class="div3 div3_middle">

							<?php if ($this->_var['cart_pos']['type'] == 1): ?>
							<span class="til">已预购</span>
							<?php else: ?>
							<span class="til">已众筹:</span>
							<?php endif; ?>
							<span class="num"><font><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['cart_pos']['support_amount'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></font>元</span>
						</div>

						&lt;!&ndash;title&ndash;&gt;
						<div class="div3 div3_last">
					<span class="til">
						<?php if ($this->_var['cart_pos']['begin_time'] > $this->_var['now']): ?>
							已经预热
						<?php elseif (( $this->_var['cart_pos']['end_time'] < $this->_var['now'] && $this->_var['deal_cart_list']['end_time'] != 0 )): ?>
							结束时间
						<?php else: ?>
							<?php if ($this->_var['cart_pos']['end_time'] == 0): ?>
								长期项目
							<?php else: ?>
								剩余时间:
							<?php endif; ?>
						<?php endif; ?>
					</span>
							<?php echo $this->_var['cart_pos']['left_begin_days']; ?>
							<?php if ($this->_var['cart_poseal_cart_list']['begin_time'] > $this->_var['now']): ?>
							<span class="num" ><font><?php echo $this->_var['cart_pos']['left_begin_days']; ?></font>天</span>
							<?php elseif ($this->_var['cart_pos']['end_time'] < $this->_var['now'] && $this->_var['cart_pos']['end_time'] != 0): ?>
							<span class="num" ><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['cart_pos']['end_time'],
  'f' => 'y/m/d',
);
echo $k['name']($k['v'],$k['f']);
?></span>
							<?php else: ?>
							<span class="num">
						<?php if ($this->_var['cart_pos']['end_time'] == 0): ?>
						长期项目
						<?php else: ?>
						<font><?php echo $this->_var['cart_pos']['remain_days']; ?></font>天
						<?php endif; ?>
					</span>
							<?php endif; ?>
						</div>

						<?php endif; ?>
						<span class="f_l"style="margin-top: 3px;margin-left: 2px;">众筹额：<em class="f_red"><i class="font-yen">¥</i><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['cart_pos']['limit_price'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em></span>
					</div>

				</div>
				</a>

			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
 </div>-->

<!-- 最新创意 结束 -->
<!-- 热门投资 开始
<div class="index_m index_hot">
	<div class="wrap">
		<h3 class="index_title">
		 	<span>|&nbsp;有你，有我，有梦想</span>
		 	<?php if (app_conf ( 'INVEST_STATUS' ) == 0 || app_conf ( 'INVEST_STATUS' ) == 1): ?>
 			 	<a href="<?php
echo parse_url_tag("u:deals|"."focus=1".""); 
?>" target="_blank" class="more_browse f_r">查看更多</a>
			 <?php else: ?>
				<a href="<?php
echo parse_url_tag("u:deals|"."type=1&focus=1".""); 
?>" target="_blank" class="more_browse f_r">查看更多</a>
			 <?php endif; ?>
			<div class="blank0"></div>
		</h3>
		<div id="pin_box">
		 	<?php if (app_conf ( 'INVEST_STATUS' ) == 0 || app_conf ( 'INVEST_STATUS' ) == 2): ?>
			 	<?php echo $this->fetch('inc/deal_list_invest_hot_invest.html'); ?>
	 		<?php else: ?>
	 			<?php echo $this->fetch('inc/deal_list_index_hot_pro.html'); ?>
		 	<?php endif; ?>
		</div>
	</div>
 </div>-->
<!-- 热门投资 结束 -->
<!-- 新增商砼众筹项目    开始-->
<div class="index_m index_new">
	<div class="wrap">
		<div class="project_com_tit clear"><img src="<?php echo $this->_var['TMPL']; ?>/images/text_11.png"  style="margin:30px auto 60px;"/></div>
		<div id="pin_box">

			<?php $_from = $this->_var['deal_st_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'st_pos');$this->_foreach['deal_st_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_st_list']['total'] > 0):
    foreach ($_from AS $this->_var['st_pos']):
        $this->_foreach['deal_st_list']['iteration']++;
?>
			<?php if ($this->_foreach['st_pos']['iteration'] <= 4): ?>

			<div class="nav_item<?php if ($this->_foreach['deal_cart_list_result']['iteration'] % 4 == 1): ?> first<?php endif; ?>">

				<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['st_pos']['id']."".""); 
?>" target="_blank">
				<div class="project_image">
					<img src="<?php if ($this->_var['st_pos']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['st_pos']['image'],
  'w' => '285',
  'h' => '200',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['st_pos']['name']; ?>" lazy="true" />

					<!--状态-->
					<?php if ($this->_var['st_pos']['type'] == 0): ?>
					<?php if ($this->_var['st_pos']['begin_time'] > $this->_var['now']): ?>
					<span class="project_step project_begin">预热中</span>
					<?php elseif ($this->_var['st_pos']['issharing'] == 1): ?>
					<span <?php if ($this->_var['st_pos']['issharing'] == 1): ?>class="project_step project_success"<?php else: ?>class="project_step project_fail"<?php endif; ?>><?php if ($this->_var['st_pos']['issharing'] == 1): ?>已分红<?php else: ?>已成功<?php endif; ?></span>
					<?php else: ?>
					<?php if ($this->_var['st_pos']['percent'] >= 100): ?>
					<span class="project_step project_fail">已成功</span>
					<?php else: ?>
					<span class="project_step project_sprite">
							<?php if ($this->_var['st_pos']['end_time'] == 0): ?>
							长期项目
							<?php else: ?>
								<?php if ($this->_var['st_pos']['type'] == 1): ?>
								融资中
								<?php else: ?>
								众筹中
								<?php endif; ?>
		 					<?php endif; ?>
						</span>
					<?php endif; ?>
					<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="project_text">
					<!--项目名称-->
					<span class="project_title"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['st_pos']['name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></span>
					<div class="project_schedule">
						<?php if ($this->_var['st_pos']['begin_time'] > $this->_var['now']): ?>

						<?php else: ?>
						<!--money-->
						<div class="div3 div3_middle">

							<?php if ($this->_var['st_pos']['type'] == 1): ?>
							<span class="til">已预购</span>
							<?php else: ?>
							<span class="til">已众筹:</span>
							<?php endif; ?>
							<span class="num"><font><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['st_pos']['support_amount'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></font>元</span>
						</div>

						<!--title-->
						<div class="div3 div3_last">
					<span class="til">
						<?php if ($this->_var['st_pos']['begin_time'] > $this->_var['now']): ?>
							已经预热
						<?php elseif (( $this->_var['st_pos']['end_time'] < $this->_var['now'] && $this->_var['st_pos']['end_time'] != 0 )): ?>
							结束时间
						<?php else: ?>
							<?php if ($this->_var['st_pos']['end_time'] == 0): ?>
								长期项目
							<?php else: ?>
								剩余时间:
							<?php endif; ?>
						<?php endif; ?>
					</span>
							<?php echo $this->_var['st_pos']['left_begin_days']; ?>
							<?php if ($this->_var['st_pos']['begin_time'] > $this->_var['now']): ?>
							<span class="num" ><font><?php echo $this->_var['st_pos']['left_begin_days']; ?></font>天</span>
							<?php elseif ($this->_var['st_pos']['end_time'] < $this->_var['now'] && $this->_var['st_pos']['end_time'] != 0): ?>
							<span class="num" ><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['st_pos']['end_time'],
  'f' => 'y/m/d',
);
echo $k['name']($k['v'],$k['f']);
?></span>
							<?php else: ?>
							<span class="num">
						<?php if ($this->_var['st_pos']['end_time'] == 0): ?>
						长期项目
						<?php else: ?>
						<font><?php echo $this->_var['st_pos']['remain_days']; ?></font>天
						<?php endif; ?>
					</span>
							<?php endif; ?>
						</div>

						<?php endif; ?>
						<span class="f_l"style="margin-top: 3px;margin-left: 2px;">众筹额：<em class="f_red"><i class="font-yen">¥</i><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['st_pos']['limit_price'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em></span>
					</div>

				</div>
				</a>

			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</div>
</div>
<!-- 新增商砼众筹项目    结束-->

<!-- 成功项目 开始 -->
<div class="index_m index_success">
	<div class="wrap">
	<!--
		<div class="project_com_tit clear" style="color: #feb106;width: 250px;font-size: 28px;height: 65px;line-height: 65px;text-align: center;margin: 15px auto;border: 2px solid #acdddd;border-radius: 10px;">
	成功项目
		</div>
-->
<div class="project_com_tit clear"><img src="<?php echo $this->_var['TMPL']; ?>/images/text_3.png"  style="margin:30px auto 60px;"/></div>
	<div class="nav_list" >
			<?php $_from = $this->_var['deal_success_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_success_item');$this->_foreach['deal_success_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_success_items']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_success_item']):
        $this->_foreach['deal_success_items']['iteration']++;
?>
			<?php if ($this->_foreach['deal_success_items']['iteration'] <= 8): ?>

			<div style="margin-top:10px;" class="nav_item<?php if ($this->_foreach['deal_success_items']['iteration'] % 4 == 1): ?> first<?php endif; ?>">

		<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_success_item']['id']."".""); 
?>" target="_blank">
		<div class="project_image">
			<img src="<?php if ($this->_var['deal_success_item']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_success_item']['image'],
  'w' => '285',
  'h' => '200',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal_success_item']['name']; ?>" lazy="true" />

			<!--状态-->
				<?php if ($this->_var['deal_success_item']['type'] == 0): ?>
				<?php if ($this->_var['deal_success_item']['begin_time'] > $this->_var['now']): ?>
				<span class="project_step project_begin">预热中</span>
				<?php elseif ($this->_var['deal_success_item']['issharing'] == 1): ?>
				<span <?php if ($this->_var['deal_success_item']['issharing'] == 1): ?>class="project_step project_success"<?php else: ?>class="project_step project_fail"<?php endif; ?>><?php if ($this->_var['deal_success_item']['issharing'] == 1): ?>已分红<?php else: ?>已成功<?php endif; ?></span>
				<?php else: ?>
					<?php if ($this->_var['deal_success_item']['percent'] >= 100): ?>
						<span class="project_step project_fail">已成功</span>
					<?php else: ?>
						<span class="project_step project_sprite">
							<?php if ($this->_var['deal_success_item']['end_time'] == 0): ?>
							长期项目
							<?php else: ?>
								<?php if ($this->_var['deal_success_item']['type'] == 1): ?>
								融资中
								<?php else: ?>
								众筹中
								<?php endif; ?>
		 					<?php endif; ?>
						</span>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="project_text">
		<!--项目名称-->
			<span class="project_title"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_success_item']['name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></span>
		 	<div class="project_schedule">
				<?php if ($this->_var['deal_success_item']['begin_time'] > $this->_var['now']): ?>

				<?php else: ?>
				<!--money-->
				<div class="div3 div3_middle">

		 			<?php if ($this->_var['deal_success_item']['type'] == 1): ?>
					<span class="til">已预购</span>
					<?php else: ?>
					<span class="til">已众筹:</span>
					<?php endif; ?>
					<span class="num"><font><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_success_item']['support_amount'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></font>元</span>
				</div>

				<!--title-->
				<div class="div3 div3_last">
					<span class="til">
						<?php if ($this->_var['deal_success_item']['begin_time'] > $this->_var['now']): ?>
							已经预热
						<?php elseif (( $this->_var['deal_success_item']['end_time'] < $this->_var['now'] && $this->_var['deal_success_item']['end_time'] != 0 )): ?>
							结束时间
						<?php else: ?>
							<?php if ($this->_var['deal_success_item']['end_time'] == 0): ?>
								长期项目
							<?php else: ?>
								剩余时间:
							<?php endif; ?>
						<?php endif; ?>
					</span>
					<?php echo $this->_var['deal_success_item']['left_begin_days']; ?>
					<?php if ($this->_var['deal_success_item']['begin_time'] > $this->_var['now']): ?>
					<span class="num" ><font><?php echo $this->_var['deal_success_item']['left_begin_days']; ?></font>天</span>
					<?php elseif ($this->_var['deal_success_item']['end_time'] < $this->_var['now'] && $this->_var['deal_success_item']['end_time'] != 0): ?>
					<span class="num" ><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_success_item']['end_time'],
  'f' => 'y/m/d',
);
echo $k['name']($k['v'],$k['f']);
?></span>
					<?php else: ?>
					<span class="num">
						<?php if ($this->_var['deal_success_item']['end_time'] == 0): ?>
						长期项目
						<?php else: ?>
						<font><?php echo $this->_var['deal_success_item']['remain_days']; ?></font>天
						<?php endif; ?>
					</span>
					<?php endif; ?>
				</div>

				<?php endif; ?>
				<span class="f_l"style="margin-top: 3px;margin-left: 2px;">众筹额：<em class="f_red"><i class="font-yen">¥</i><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_success_item']['limit_price'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em></span>
			</div>

		</div>
	</a>

			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
		<div class="blank0"></div>
	</div>
</div>
<!-- 成功项目 结束 -->


<!-- 看看谁加入了 开始 -->
	<div class="project_news clear" style="width: 100%;margin-bottom: 80px;max-width:1200px;padding-top:20px;">
		<div class="project_com_tit clear"><img src="<?php echo $this->_var['TMPL']; ?>/images/text_4.png"/ style="margin:30px auto 60px;"></div>
		<div class="project_news_r project_newss" style="width: 500px;float: left;margin-left:20px;">
			<div class="project_news_top" style="width: 100%;height: 36px;line-height: 36px;border-bottom: 2px solid #feb006;margin-bottom: 25px;">
				<h1 style="width: 87%;display: inline-block;*display: block;font-size: 16px;color: #131313; font-size:20px">新闻资讯</h1>
				<a href="http://www.yiaoshiye.com/index.php?ctl=article_cate&id=38" style="width: 10%;display: inline-block;*display: block;text-align: right;font-size: 14px;color: #131313;">更多</a>
			</div>
			<ul class="project_news_list" style="width: 100%;">
				<?php $_from = $this->_var['artilce_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_item');if (count($_from)):
    foreach ($_from AS $this->_var['article_item']):
?>
				<li class="clear" style="width: 100%;height: 50px;line-height: 50px;border-bottom: 2px dashed #dcdcdb;background: url(app/Tpl/fanwe_1/images/dian.jpg) no-repeat 0px center;font-size: 14px;color: #131313;">
					<a href="" style="blr: expression(this.onFocus=this.blur());text-decoration: none;color: #333;">
						<div class="list_l" style="width: 65%;float: left;margin-left: 5%;"><a href="<?php echo $this->_var['article_item']['url']; ?>"><?php echo $this->_var['article_item']['title']; ?></a></div>
						<div class="list_r" style="width: 30%;float: left;text-align: right;"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['article_item']['update_time'],
  'p' => 'Y-m-d',
);
echo $k['name']($k['v'],$k['p']);
?></div>
					</a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

			</ul>
		</div>
		<div class="project_news_r project_newss" style="width: 500px;float: right;margin-left:20px;">
			<div class="project_news_top" style="width: 100%;height: 36px;line-height: 36px;border-bottom: 2px solid #feb006;margin-bottom: 25px;">
				<h1 style="width: 87%;display: inline-block;*display: block;font-size: 16px;color: #131313;font-size:20px">企业动态</h1>
				<a href="http://www.yiaoshiye.com/index.php?ctl=dongtai_cate&id=39" style="width: 10%;display: inline-block;*display: block;text-align: right;font-size: 14px;color: #131313;">更多</a>
			</div>
			<ul class="project_news_list" style="width: 100%;">
				<?php $_from = $this->_var['artilce_gonggao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_item');if (count($_from)):
    foreach ($_from AS $this->_var['article_item']):
?>
				<li class="clear" style="width: 100%;height: 50px;line-height: 50px;border-bottom: 2px dashed #dcdcdb;background: url(app/Tpl/fanwe_1/images/dian.jpg) no-repeat 0px center;font-size: 14px;color: #131313;">
					<a href="" style="blr: expression(this.onFocus=this.blur());text-decoration: none;color: #333;">
						<div class="list_l" style="width: 65%;float: left;margin-left: 5%;"><a href="<?php echo $this->_var['article_item']['url']; ?>"><?php echo $this->_var['article_item']['title']; ?></a></div>
						<div class="list_r" style="width: 30%;float: left;text-align: right;"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['article_item']['update_time'],
  'p' => 'Y-m-d',
);
echo $k['name']($k['v'],$k['p']);
?></div>
					</a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
	</div>

<!-- 看看谁加入了 结束 -->
<script type="text/javascript">
(function(){
	// 统计数值滚动
	var options = {
	    useEasing : true,
	    useGrouping : true,
	    separator : ',',
	    decimal : '.',
	    prefix : '',
	    suffix : ''
	};
	var sum_money = new countUp("sum_money", 0, <?php echo $this->_var['virtual_money']; ?>, 2, 2.5, options);
	var sum_success = new countUp("sum_success", 0, <?php echo $this->_var['success_sum']; ?>, 0, 2.5, options);
	var sum_online = new countUp("sum_online", 0, <?php echo $this->_var['virtual_effect']; ?>, 0, 2.5, options);
	var sum_user = new countUp("sum_user", 0, <?php echo $this->_var['register_sum']; ?>, 0, 2.5, options);
	sum_money.start();
	sum_success.start();
	sum_online.start();
	sum_user.start();
})();

// 会员头像列表
(function(){


    $(".user_text").hide();
    var $reg_user_list=$(".reg_user_list");
    var $reg_user_list_li=$(".reg_user_list").find("li");
    if($reg_user_list_li.length>=10){
    	$reg_user_list_li.eq(9).removeClass("left_o").addClass("right_o");
    	$reg_user_list_li.eq(10).removeClass("left_o").addClass("right_o");
    	if($reg_user_list_li.length>=21){
    		$reg_user_list_li.eq(20).removeClass("left_o").addClass("right_o");
    		$reg_user_list_li.eq(21).removeClass("left_o").addClass("right_o");
    	}
    }
    $reg_user_list_li.css("zIndex","1");
 	$reg_user_list_li.hover(function(){
		$obj=$(this);
		$obj.css({zIndex:"2"});

		$obj.find(".user_img").css("zIndex","101");
 		if($obj.hasClass("left_o")){
 			$obj.prevAll().css("zIndex","3");
		 	$obj.find(".user_text").stop().animate({left:'106'}, {duration:500}).show().css("zIndex","100");
 		}
 		else{
 			$obj.nextAll().css("zIndex","3");
 			$obj.find(".user_text").stop().animate({right:'106'}, {duration:500}).show().css("zIndex","100");
 		}
    },function(){
    	$reg_user_list_li.css("zIndex","1");
    	$obj.css("zIndex","1");
    	if($obj.hasClass("left_o")){
	 		$obj.find(".user_text").stop().animate({left:'106'}, {duration: "fast"}).hide();
   	 		$obj.find(".user_text").animate({left:'-96'}, {duration: 0}).hide();
    	}
    	else{
    		$obj.find(".user_text").stop().animate({right:'106'}, {duration: "fast"}).hide();
   	 		$obj.find(".user_text").animate({right:'-93'}, {duration: 0}).hide();
    	}
    });
})();

ajax_get_recommend_project();
//获取会员所有项目列表
function ajax_get_recommend_project(){
	$("a[name='recommend_project']").bind("click",function(){
		if($(this).attr("rel")=='<?php echo $this->_var['user_info']['id']; ?>'){
			$.showErr("不能给自己推荐！");
			return false;
		}
		var ajaxurl ='<?php
echo parse_url_tag("u:ajax#ajax_get_recommend_project|"."".""); 
?>';
		var query=new Object();
		//推荐人id
		query.id='<?php echo $this->_var['user_info']['id']; ?>';
		//被推荐人id
		query.user_id=$(this).attr("rel");
		$.ajax({
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success:function(ajaxobj){
				if(ajaxobj.status==0){
					show_pop_login();
					return false;
				}
				if(ajaxobj.status==1){
					$.showErr(ajaxobj.info);
					return false;
				}
				if(ajaxobj.status==2){
					$.weeboxs.open(ajaxobj.html, {boxid:'project_recommend_page',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'我的项目',width:480,type:'wee'});
					return false;
				}
			}
		});
	});
}
</script>
<script type="text/javascript">
	leftTimeAct(".left_time");
	leftTimeAct(".left_times");
	// 未开始项目倒计时
    function leftTimeAct(left_time){
    	var leftTimeActInv = null;
		clearTimeout(leftTimeActInv);
		$(left_time).each(function(){
			var leftTime = parseInt($(this).attr("data"));
			if(leftTime > 0)
			{
				var day  =  parseInt(leftTime / 24 /3600);
				var hour = parseInt((leftTime % (24 *3600)) / 3600);
				var min = parseInt((leftTime % 3600) / 60);
				var sec = parseInt((leftTime % 3600) % 60);
				$(this).find(".day").html((day<10?"0"+day:day));
				$(this).find(".hour").html((hour<10?"0"+hour:hour));
				$(this).find(".min").html((min<10?"0"+min:min));
				$(this).find(".sec").html((sec<10?"0"+sec:sec));
				leftTime--;
				$(this).attr("data",leftTime);
			}
			else{
				window.location.reload();
				return false;
			}
		});
		leftTimeActInv = setTimeout(function(){
			leftTimeAct(left_time);
		},1000);
	}
</script>
	<script type="text/javascript">
		$(".login_top2 a").click(function(){
			$(this).addClass("login_top2_a").siblings("a").removeClass("login_top2_a");
			var index=$(this).index();
			$(".login_cont").eq(index).show().siblings(".login_cont").hide();
		})
	</script>
<?php echo $this->fetch('inc/footer.html'); ?>