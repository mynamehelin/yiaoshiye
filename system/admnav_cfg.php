<?php 
return array( 
	"index"	=>	array(
		"name"	=>	"系统首页", 
		"key"	=>	"index", 
		"groups"	=>	array( 
			"index"	=>	array(
				"name"	=>	"系统首页", 
				"key"	=>	"index", 
				"nodes"	=>	array( 
					array("name"=>"待办事务","module"=>"Index","action"=>"main"),
				),
			),
			"syslog"	=>	array(
				"name"	=>	"系统日志", 
				"key"	=>	"syslog", 
				"nodes"	=>	array( 
					array("name"=>"系统日志列表","module"=>"Log","action"=>"index"),
				),
			),
		),
	),
 	"user"	=>	array(
			"name"	=>	"会员管理",
			"key"	=>	"user",
			"groups"	=>	array(
					"user"	=>	array(
							"name"	=>	"会员管理",
							"key"	=>	"user",
							"nodes"	=>	array(
									array("name"=>"会员列表","module"=>"User","action"=>"index"),
									array("name"=>"会员等级","module"=>"UserLevel","action"=>"index"),
									array("name"=>"身份认证申请列表","module"=>"UserInvestor","action"=>"index"),
 							),
					),
					"referrals"	=>	array(
							"name"	=>	"会员邀请",
							"key"	=>	"referrals",
							"nodes"	=>	array(
									array("name"=>"邀请返利列表","module"=>"Referrals","action"=>"index"),
									array("name"=>"邀请统计列表","module"=>"Referrals","action"=>"referrals_count"),
  							),
					),
					"message"	=>	array(
							"name"	=>	"留言列表",
							"key"	=>	"message",
							"nodes"	=>	array(
									array("name"=>"留言分类列表","module"=>"MessageCate","action"=>"index"),
									array("name"=>"留言列表","module"=>"Message","action"=>"index"),
							),
					),
 					"integrate"	=>	array(
							"name"	=>	"会员插件管理",
							"key"	=>	"notice",
							"nodes"	=>	array(
									array("name"=>"会员整合插件","module"=>"Integrate","action"=>"index"),
									array("name"=>"同步登陆插件","module"=>"ApiLogin","action"=>"index"),
							),
					),
				   
					
			),
	),
	"dealcate"	=>	array(
			"name"	=>	"项目管理",
			"key"	=>	"dealcate",
			"groups"	=>	array(
					"dealcate"	=>	array(
							"name"	=>	"项目管理",
							"key"	=>	"dealcate",
							"nodes"	=>	array(
									array("name"=>"分类列表","module"=>"DealCate","action"=>"index"),
									array("name"=>"上线项目","module"=>"Deal","action"=>"online_index"),
									array("name"=>"未审核项目","module"=>"Deal","action"=>"submit_index"),
									array("name"=>"项目回收站","module"=>"Deal","action"=>"delete_index"),
  							),
					),
					
 					"dealorder"	=>	array(
							"name"	=>	"项目信息",
							"key"	=>	"dealorder",
							"nodes"	=>	array(
									array("name"=>"项目支持","module"=>"DealOrder","action"=>"index"),
									array("name"=>"项目点评","module"=>"DealComment","action"=>"index"),
									array("name"=>"地区列表","module"=>"RegionConf","action"=>"index"),
							),
					),
				   
					
			),
	),
	"payment"	=>	array(
			"name"	=>	"资金管理",
			"key"	=>	"payment",
			"groups"	=>	array(
					"payment"	=>	array(
							"name"	=>	"支付接口",
							"key"	=>	"payment",
							"nodes"	=>	array(
									array("name"=>"支付接口列表","module"=>"Payment","action"=>"index"),
									array("name"=>"第三方资金托管","module"=>"Collocation","action"=>"index"),
   							),
					),
					
 					"paymentnotice"	=>	array(
							"name"	=>	"资金日志",
							"key"	=>	"paymentnotice",
							"nodes"	=>	array(
									array("name"=>"线上充值","module"=>"PaymentNotice","action"=>"index"),
									array("name"=>"线下充值","module"=>"PaymentBelow","action"=>"index"),
									array("name"=>"提现记录","module"=>"UserRefund","action"=>"index"),
 							),
					),
				   
					
			),
	),
	"nav"	=>	array(
			"name"	=>	"前端管理",
			"key"	=>	"nav",
			"groups"	=>	array(
					"nav"	=>	array(
							"name"	=>	"前端设置",
							"key"	=>	"nav",
							"nodes"	=>	array(
									array("name"=>"导航菜单列表","module"=>"Nav","action"=>"index"),
									array("name"=>"广告位列表","module"=>"Adv","action"=>"index"),
    							),
					),
  					"articlecate"	=>	array(
							"name"	=>	"文章管理",
							"key"	=>	"articlecate",
							"nodes"	=>	array(
									array("name"=>"文章分类列表","module"=>"ArticleCate","action"=>"index"),
									array("name"=>"文章分类回收站","module"=>"ArticleCate","action"=>"trash"),
									array("name"=>"文章列表","module"=>"Article","action"=>"index"),
									array("name"=>"文章回收站","module"=>"Article","action"=>"trash"),
 							),
					),
				   "link"	=>	array(
							"name"	=>	"友情链接管理",
							"key"	=>	"link",
							"nodes"	=>	array(
									array("name"=>"友情链接分组列表","module"=>"LinkGroup","action"=>"index"),
									array("name"=>"友情链接列表","module"=>"Link","action"=>"index"),
  							),
					),
					/*
					"vote"	=>	array(
							"name"	=>	"问卷调查设置",
							"key"	=>	"vote",
							"nodes"	=>	array(
									array("name"=>"投票调查列表","module"=>"Vote","action"=>"index"),
   							),
					),
					*/
					
					
			),
	),
	"msgtemplate"	=>	array(
			"name"	=>	"短信邮件",
			"key"	=>	"msgtemplate",
			"groups"	=>	array(
					"msgtemplate"	=>	array(
							"name"	=>	"消息模板",
							"key"	=>	"payment",
							"nodes"	=>	array(
									array("name"=>"消息模板","module"=>"MsgTemplate","action"=>"index"),
    							),
					),
					
 					"mailserver"	=>	array(
							"name"	=>	"邮件管理",
							"key"	=>	"mailserver",
							"nodes"	=>	array(
									array("name"=>"邮件服务器列表 ","module"=>"MailServer","action"=>"index"),
									array("name"=>"邮件列表","module"=>"PromoteMsg","action"=>"mail_index"),
 							),
					),
					"sms"	=>	array(
							"name"	=>	"短信管理",
							"key"	=>	"sms",
							"nodes"	=>	array(
									array("name"=>"短信接口列表","module"=>"Sms","action"=>"index"),
									array("name"=>"短信列表","module"=>"PromoteMsg","action"=>"sms_index"),
 							),
					),
					"dealmsgList"	=>	array(
							"name"	=>	"队列管理",
							"key"	=>	"dealmsgList",
							"nodes"	=>	array(
									array("name"=>"业务队列列表","module"=>"DealMsgList","action"=>"index"),
									array("name"=>"推广队列列表","module"=>"PromoteMsgList","action"=>"index"),
 							),
					),
				   
					
			),
	),
	"statistics"	=>	array(
			"name"	=>	"统计模块",
			"key"	=>	"statistics",
			"groups"	=>	array(
					"statistics"	=>	array(
							"name"	=>	"回报项目统计",
							"key"	=>	"statistics",
							"nodes"	=>	array(
									array("name"=>"项目统计","module"=>"Statistics","action"=>"project"),
									array("name"=>"人数统计","module"=>"Statistics","action"=>"usernum_total"),
									array("name"=>"金额统计","module"=>"Statistics","action"=>"money_total"),
									array("name"=>"回报统计","module"=>"Statistics","action"=>"hasback_total"),
									array("name"=>"逾期统计","module"=>"Statistics","action"=>"overdue_total"),
									
   							),
					),
					
 					"statistics_gq"	=>	array(
							"name"	=>	"股权项目统计",
							"key"	=>	"statistics_gq",
							"nodes"	=>	array(
									array("name"=>"项目统计","module"=>"Statistics","action"=>"investe_total"),
									array("name"=>"投资人统计","module"=>"Statistics","action"=>"investors_total"),
									array("name"=>"融资金额统计","module"=>"Statistics","action"=>"financing_amount_total"),
									array("name"=>"违约统计","module"=>"Statistics","action"=>"breach_convention_total"),
 							),
					),
				   
				   "statistics_pt"	=>	array(
							"name"	=>	"平台统计",
							"key"	=>	"statistics_pt",
							"nodes"	=>	array(
									array("name"=>"充值统计","module"=>"Statistics","action"=>"money_inchange_total"),
									array("name"=>"提现统计","module"=>"Statistics","action"=>"money_carry_bank_total"),
									array("name"=>"用户统计","module"=>"Statistics","action"=>"user_total"),
									array("name"=>"网站费用统计","module"=>"Statistics","action"=>"site_costs_total"),
 							),
					),
					
			),
	),
	"system"	=>	array(
		"name"	=>	"系统设置", 
		"key"	=>	"system", 
		"groups"	=>	array( 
			"sysconf"	=>	array(
				"name"	=>	"系统设置", 
				"key"	=>	"sysconf", 
				"nodes"	=>	array( 
					array("name"=>"系统配置","module"=>"Conf","action"=>"index"),
					array("name"=>"轮播广告设置","module"=>"IndexImage","action"=>"index"),
					array("name"=>"帮助列表","module"=>"Help","action"=>"index"),
					array("name"=>"常见问题","module"=>"Faq","action"=>"index"),
					array("name"=>"银行列表","module"=>"Bank","action"=>"index"),
					array("name"=>"提现手续费","module"=>"UserCarry","action"=>"config"),
 				),
			),
		 
 			
			"mobile"	=>	array(
				"name"	=>	"移动平台设置", 
				"key"	=>	"mobile", 
				"nodes"	=>	array( 
					array("name"=>"手机端配置","module"=>"Conf","action"=>"mobile"),
					array("name"=>"手机端广告列表","module"=>"MAdv","action"=>"index"),
				),
			),		
			"admin"	=>	array(
				"name"	=>	"系统管理员", 
				"key"	=>	"admin", 
				"nodes"	=>	array( 
					array("name"=>"管理员分组列表","module"=>"Role","action"=>"index"),
					array("name"=>"管理员分组回收站","module"=>"Role","action"=>"trash"),
					array("name"=>"管理员列表","module"=>"Admin","action"=>"index"),
					array("name"=>"管理员回收站","module"=>"Admin","action"=>"trash"),
				),
			),
			 
			"datebase"	=>	array(
				"name"	=>	"数据库", 
				"key"	=>	"datebase", 
				"nodes"	=>	array( 
					array("name"=>"数据库备份","module"=>"Database","action"=>"index"),
					array("name"=>"SQL操作","module"=>"Database","action"=>"sql"),
				),
			),
			"sqlcheck"	=>	array(
				"name"	=>	"系统监测", 
				"key"	=>	"sqlcheck", 
				"nodes"	=>	array( 
					array("name"=>"系统监测列表","module"=>"SqlCheck","action"=>"index"),
 				),
			),
		),
	),
	
	/*
	"Crowd"	=>	array(
			"name"	=>	"众筹管理",
			"key"	=>	"Crowd",
			"groups"	=>	array(
					"Crowd_manage"	=>	array(
							"name"	=>	"项目管理",
							"key"	=>	"Crowd_manage",
							"nodes"	=>	array(
									array("name"=>"分类列表","module"=>"CrowdCate","action"=>"index"),
									array("name"=>"上线项目列表","module"=>"Crowd","action"=>"online_index"),	
									array("name"=>"未审核项目","module"=>"Crowd","action"=>"submit_index"),						
									),
					),
					"Crowd_order"	=>	array(
							"name"	=>	"项目支持",
							"key"	=>	"Crowd_order",
							"nodes"	=>	array(
									array("name"=>"项目支持","module"=>"CrowdOrder","action"=>"index"),
 									),
					),
	
			),
			
	),	
*/
		
);
?>