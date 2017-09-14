1.55;
delete from `%DB_PREFIX%conf` where `name`='KF_PHONE';

delete from `%DB_PREFIX%conf` where `name`='KF_QQ';

delete from `%DB_PREFIX%conf` where `name`='PROJECT_HIDE';

delete from `%DB_PREFIX%conf` where `name`='WORK_TIME';

delete from `%DB_PREFIX%conf` where `name`='IDENTIFY_POSITIVE';

delete from `%DB_PREFIX%conf` where `name`='IDENTIFY_NAGATIVE';

delete from `%DB_PREFIX%conf` where `name`='BUSINESS_LICENCE';

delete from `%DB_PREFIX%conf` where `name`='BUSINESS_CODE';

delete from `%DB_PREFIX%conf` where `name`='BUSINESS_TAX';
-- ----------------------------
-- Table structure for `%DB_PREFIX%vote`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%vote` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT '调查的项目名称',
  `begin_time` int(11) NOT NULL COMMENT '开始时间',
  `end_time` int(11) NOT NULL COMMENT '结束时间',
  `is_effect` tinyint(1) NOT NULL COMMENT '有效性',
  `sort` int(11) NOT NULL,
  `description` text NOT NULL COMMENT '描述',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%vote
-- ----------------------------

-- ----------------------------
-- Table structure for `%DB_PREFIX%vote_ask`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%vote_ask` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT '投票项名称',
  `type` tinyint(1) NOT NULL COMMENT '投票类型，单选多选/自定义可叠加 1:单选 2:多选 3:自定义',
  `sort` int(11) NOT NULL COMMENT ' 排序 大到小',
  `vote_id` int(11) NOT NULL COMMENT '调查ID',
  `val_scope` text NOT NULL COMMENT '预选范围 逗号分开',
  `is_fill` tinyint(1) NOT NULL COMMENT '1表示该项必填，0表示可以不填',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%vote_ask
-- ----------------------------

-- ----------------------------
-- Table structure for `%DB_PREFIX%vote_result`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%vote_result` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT '投票的名称',
  `count` int(11) NOT NULL COMMENT '计数',
  `vote_id` int(11) NOT NULL COMMENT '调查项ID',
  `vote_ask_id` int(11) NOT NULL COMMENT '投票项（问题）ID',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%vote_result
-- ----------------------------

-- ----------------------------
-- Table structure for `%DB_PREFIX%vote_list`
-- ----------------------------
CREATE TABLE `%DB_PREFIX%vote_list` (
  `id` int(11) NOT NULL auto_increment,
  `vote_id` int(11) NOT NULL COMMENT '调查项ID',
  `value` text NOT NULL COMMENT '问题答案',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%vote_list
-- ----------------------------

INSERT INTO `%DB_PREFIX%role_group` VALUES ('84', '问卷调查设置', '11', '0', '1', '84');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('139', 'Vote', '问卷调查', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6869', 'index', '问卷调查列表', '1', '0', '84', '139');


INSERT INTO `%DB_PREFIX%role_module` VALUES ('141', 'Collocation', '资金托管', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6871', 'index', '资金托管', '1', '0', '75', '141');


ALTER TABLE `%DB_PREFIX%user_log`
MODIFY COLUMN `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '类型 0表示普通的 1表示 加入诚意金 2表示违约扣除诚意金 3表示分红' ,
ADD COLUMN `deal_id`  int(11) NOT NULL COMMENT '商品ID号' ;

ALTER TABLE `%DB_PREFIX%deal_item`
ADD COLUMN `is_share`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否分红' ,
ADD COLUMN `share_fee`  int(11) NOT NULL COMMENT '分红金额' ;

ALTER TABLE `%DB_PREFIX%deal`
MODIFY COLUMN `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 表示普通众筹，1表示股权众筹,2表示众筹买房' ;


INSERT INTO `%DB_PREFIX%role_module` VALUES ('139', 'UserBank', '会员银行', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('692', 'index', '会员银行列表', '1', '0', '0', '139');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('693', 'edit', '编辑页面', '1', '0', '0', '139');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('694', 'update', '编辑执行', '1', '0', '0', '139');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('695', 'add', '增加页面', '1', '0', '0', '139');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('696', 'insert', '增加执行', '1', '0', '0', '139');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('697', 'delete', '删除', '1', '0', '0', '139');
 

ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `ips_mer_code`  varchar(10) NOT NULL COMMENT '由IPS颁发的商户号 is_investor = 2' ;


 CREATE TABLE `%DB_PREFIX%yeepay_bind_bank_card` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT 'yeepay_log.id',
  `platformUserNo` int(11) NOT NULL default '0' COMMENT 'fanwe_user.id',
  `platformNo` varchar(20) NOT NULL,
  `bankCardNo` varchar(50) NOT NULL default '' COMMENT '绑定的卡号',
  `bank` varchar(20) NOT NULL default '' COMMENT '卡的开户行',
  `cardStatus` varchar(20) NOT NULL COMMENT '卡的状态VERIFYING 认证中 VERIFIED 已认证',
  `is_callback` tinyint(1) NOT NULL default '0',
  `bizType` varchar(50) default NULL COMMENT '业务名称',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `message` varchar(255) default NULL COMMENT '描述异常信息',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_cp_transaction`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_cp_transaction` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT 'yeepay_log.id',
  `platformNo` varchar(20) NOT NULL,
  `platformUserNo` int(11) NOT NULL default '0' COMMENT 'fanwe_user.id',
  `userType` varchar(20) NOT NULL default 'MEMBER' COMMENT '出款人用户类型，目前只支持传入 MEMBER\r\nMEMBER 个人会员 MERCHANT 商户 ',
  `bizType` varchar(50) NOT NULL COMMENT 'TENDER 投标 REPAYMENT 还款 CREDIT_ASSIGNMENT 债权转让 TRANSFER 转账 COMMISSION 分润，仅在资金转账明细中使用',
  `expired` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '超过此时间即不允许提交订单',
  `tenderOrderNo` int(11) default '0' COMMENT '项目编号',
  `tenderName` varchar(255) default NULL COMMENT '项目名称 ',
  `tenderAmount` decimal(20,2) default NULL COMMENT '项目金额',
  `tenderDescription` varchar(255) default NULL COMMENT '项目描述信息',
  `borrowerPlatformUserNo` int(11) default NULL COMMENT '项目的借款人平台用户编号',
  `originalRequestNo` int(11) default NULL COMMENT '需要转让的投资记录流水号',
  `paymentAmount` decimal(20,2) NOT NULL default '0.00' COMMENT '投标金额',
  `details` text COMMENT '资金明细记录',
  `extend` text COMMENT '业务扩展属性，根据业务类型的不同，需要传入不同的参数。',
  `transfer_id` int(11) NOT NULL default '0' COMMENT '债权转让id fanwe_deal_load_transfer.id',
  `is_callback` tinyint(1) NOT NULL default '0',
  `is_complete_transaction` tinyint(1) NOT NULL default '0' COMMENT 'is_callback=1时，才生效;判断是否已经完成转帐',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `message` varchar(255) default NULL COMMENT '描述异常信息',
  `description` varchar(255) default NULL,
  `deal_repay_id` int(11) default NULL COMMENT '还款计划ID',
  `fee` decimal(20,2) default NULL,
  `repay_start_time` varchar(50) default NULL COMMENT '记录还款时间',
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_cp_transaction_detail`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_cp_transaction_detail` (
  `id` int(10) NOT NULL auto_increment,
  `pid` int(10) NOT NULL default '0' COMMENT 'fanwe_yeepay_repayment.id',
  `deal_load_repay_id` int(11) NOT NULL default '0' COMMENT '用户回款计划表',
  `targetUserType` int(11) NOT NULL default '0' COMMENT '用户类型',
  `targetPlatformUserNo` int(11) NOT NULL default '0' COMMENT '平台用户编号',
  `amount` decimal(20,2) NOT NULL default '0.00' COMMENT '转入金额',
  `bizType` varchar(20) NOT NULL default '' COMMENT '资金明细业务类型。根据业务的不同，需要传入不同的值，见【业务类型',
  `repay_manage_impose_money` decimal(20,2) default NULL COMMENT '平台收取借款者的管理费逾期罚息',
  `impose_money` decimal(20,2) default NULL COMMENT '投资者收取借款者的逾期罚息',
  `repay_status` int(11) default NULL COMMENT '还款状态',
  `true_repay_time` int(11) default NULL COMMENT '还款时间',
  `fee` decimal(20,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_enterprise_register`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_enterprise_register` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT 'yeepay_log.id',
  `platformUserNo` int(11) default '0' COMMENT 'fanwe_user.id',
  `platformNo` varchar(20) default NULL,
  `enterpriseName` varchar(50) default NULL COMMENT '企业名称',
  `bankLicense` varchar(50) default NULL COMMENT '开户银行许可证',
  `orgNo` varchar(50) default NULL COMMENT '组织机构代码',
  `businessLicense` varchar(50) default NULL COMMENT '营业执照编号',
  `taxNo` varchar(20) default NULL COMMENT '税务登记号',
  `legal` varchar(50) default NULL COMMENT '法人姓名',
  `legalIdNo` varchar(20) default NULL COMMENT '法人身份证号',
  `contact` varchar(20) default NULL COMMENT '企业联系人',
  `contactPhone` varchar(20) default NULL COMMENT '联系人手机号',
  `email` varchar(50) default NULL COMMENT '联系人邮箱',
  `memberClassType` varchar(255) default NULL COMMENT '会员类型ENTERPRISE：企业借款人;GUARANTEE_CORP：担保公司',
  `is_callback` tinyint(1) NOT NULL default '0',
  `bizType` varchar(50) default NULL COMMENT '业务名称',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `message` varchar(255) default NULL COMMENT '描述异常信息',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_log`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_log` (
  `id` int(10) NOT NULL auto_increment,
  `code` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `strxml` text,
  `html` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71606 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_recharge`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_recharge` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT 'yeepay_log.id',
  `platformUserNo` int(11) NOT NULL default '0' COMMENT 'fanwe_user.id',
  `platformNo` varchar(20) NOT NULL,
  `amount` decimal(20,2) NOT NULL default '0.00' COMMENT '充值金额',
  `feeMode` varchar(50) NOT NULL default 'PLATFORM' COMMENT '费率模式PLATFORM',
  `is_callback` tinyint(1) NOT NULL default '0',
  `bizType` varchar(50) default NULL COMMENT '业务名称',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `message` varchar(255) default NULL COMMENT '描述异常信息',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_register`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_register` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT 'yeepay_log.id',
  `platformUserNo` int(11) default '0' COMMENT 'fanwe_user.id',
  `platformNo` varchar(20) default NULL,
  `nickName` varchar(50) default NULL,
  `realName` varchar(50) default NULL,
  `idCardNo` varchar(50) default NULL,
  `idCardType` varchar(50) default NULL,
  `mobile` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `is_callback` tinyint(1) NOT NULL default '0',
  `bizType` varchar(50) default NULL COMMENT '业务名称',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `message` varchar(255) default NULL COMMENT '描述异常信息',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%yeepay_withdraw`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%yeepay_withdraw` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT 'yeepay_log.id',
  `platformUserNo` int(11) NOT NULL default '0' COMMENT 'fanwe_user.id',
  `platformNo` varchar(20) NOT NULL,
  `amount` decimal(20,2) NOT NULL default '0.00' COMMENT '充值金额',
  `feeMode` varchar(50) NOT NULL default '' COMMENT 'PLATFORM 收取商户手续费 USER 收取用户手续费',
  `is_callback` tinyint(1) NOT NULL default '0',
  `bizType` varchar(50) default NULL COMMENT '业务名称',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `message` varchar(255) default NULL COMMENT '描述异常信息',
  `description` varchar(255) default NULL,
  `cardNo` varchar(50) default NULL COMMENT '绑定的卡号',
  `bank` varchar(20) default NULL COMMENT '卡的开户行',
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `%DB_PREFIX%collocation`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%collocation` (
  `id` int(11) NOT NULL auto_increment,
  `class_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `fee_type` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fanwe_collocation
-- ----------------------------


ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `ips_acct_no`  varchar(255) NULL COMMENT '托管平台账户号' ;

ALTER TABLE `%DB_PREFIX%deal`
ADD COLUMN `ips_bill_no`  varchar(255) NOT NULL COMMENT '托管项目' ;


-- ----------------------------
-- Table structure for `%DB_PREFIX%user_carry_config`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%user_carry_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '简称',
  `min_price` decimal(20,0) NOT NULL COMMENT '最低额度',
  `max_price` decimal(20,0) NOT NULL COMMENT '最高额度',
  `fee` decimal(20,2) NOT NULL COMMENT '费率',
  `fee_type` tinyint(1) NOT NULL COMMENT '费率类型 0 是固定值 1是百分比',
  `vip_id` int(11) NOT NULL COMMENT 'VIP等级     0默认配置  否则就是对应VIP等级设置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fanwe_user_carry_config
-- ----------------------------
INSERT INTO `%DB_PREFIX%user_carry_config` VALUES ('2', '5万以内', '10001', '50000', '20.00', '0', '0');
INSERT INTO `%DB_PREFIX%user_carry_config` VALUES ('1', '1万以内', '0', '10000', '10.00', '0', '0');

INSERT INTO `%DB_PREFIX%role_module` VALUES ('140', 'UserCarry', '提现手续费', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6870', 'config', '提现手续费', '1', '0', '5', '140');

----chenhua 150313---
ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `share_fee`  decimal(20,0) NOT NULL COMMENT '分红金额' ,
ADD COLUMN `share_status`  tinyint(1) NOT NULL COMMENT '分红是否发放：0未发放，1已发' ;

ALTER TABLE `%DB_PREFIX%deal`
ADD COLUMN `share_fee_amount`  decimal(20,2) NOT NULL COMMENT '分红总金额';

INSERT INTO `%DB_PREFIX%role_node` VALUES ('698', 'sharefee_list', '查看分红列表', '1', '0', '0', '118');
----chenhua 150313---

--linling ----------------------------
-- Table structure for `%DB_PREFIX%deal_vote`
-- ----------------------------
DROP TABLE IF EXISTS `%DB_PREFIX%deal_vote`;
CREATE TABLE `%DB_PREFIX%deal_vote` (
  `id` int(11) NOT NULL auto_increment COMMENT 'id',
  `deal_id` int(11) NOT NULL COMMENT '项目id',
  `create_time` int(11) NOT NULL COMMENT '投票创建时间',
  `begin_time` int(11) NOT NULL COMMENT '投票开始时间',
  `end_time` int(11) NOT NULL COMMENT '投票结束时间',
  `money` decimal(20,2) NOT NULL COMMENT '卖出金额',
  `status` tinyint(1) NOT NULL COMMENT '0表示未同意 1表示同意 2表示投票失败',
  `yes_num` int(11) NOT NULL COMMENT '同意的总票数',
  `no_num` int(11) NOT NULL COMMENT '不同意的总票数',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%deal_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `%DB_PREFIX%deal_vote_log`
-- ----------------------------
DROP TABLE IF EXISTS `%DB_PREFIX%deal_vote_log`;
CREATE TABLE `%DB_PREFIX%deal_vote_log` (
  `id` int(11) NOT NULL auto_increment COMMENT 'id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `deal_vote_id` int(11) NOT NULL COMMENT '投票id',
  `vote_status` tinyint(1) NOT NULL COMMENT '0表示不同意 1表示同意',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%deal_vote_log
-- linling----------------------------



ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `is_tg`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否是第三方托管'  ;


ALTER TABLE `%DB_PREFIX%deal_order`
MODIFY COLUMN `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '订单类型 0表示普通众筹 1表示股权众筹 '  ,
MODIFY COLUMN `is_tg`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 表示在线支付 1表示第三方托管'  ;

ALTER TABLE `%DB_PREFIX%deal_pay_log`
MODIFY COLUMN `money`  decimal(20,2) NOT NULL,
ADD COLUMN `comissions`  decimal(20,2) NOT NULL DEFAULT 0 COMMENT '佣金' ;

----yao qing fan li chenhua---
CREATE TABLE `%DB_PREFIX%referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '邀请人ID（即需要返利的会员ID）',
  `user_name` varchar(50) NOT NULL COMMENT '邀请人名称（即需要返利的会员名称）',
  `rel_user_id` int(11) NOT NULL COMMENT '被邀请人ID',
  `rel_user_name` varchar(50) NOT NULL COMMENT '被邀请人名称',
  `money` double(20,4) NOT NULL COMMENT '返利的现金',
  `create_time` int(11) NOT NULL COMMENT '返利生成的时间',
  `pay_time` int(11) NOT NULL COMMENT '返利发放的时间',
  `score` int(11) NOT NULL COMMENT '返利的积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='邀请返利记录表';

ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `pid`  int(11) NOT NULL COMMENT '推荐人id',
ADD COLUMN `score`  int(11) NOT NULL COMMENT '积分';

update `%DB_PREFIX%conf` set `value` =1,`is_effect`=0 where `name`='INVITE_REFERRALS_TYPE';
delete from `%DB_PREFIX%conf` where `name`='REFERRAL_LIMIT';
delete from `%DB_PREFIX%conf` where `name`='REFERRALS_DELAY';

INSERT INTO `%DB_PREFIX%role_group` VALUES ('85', '会员邀请', '5', '0', '1', '31');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('142', 'Referrals', '会员邀请', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('700', 'referrals_count', '会员邀请统计', '1', '0', '85', '142');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('701', 'index', '会员邀请返利列表', '1', '0', '85', '142');

ALTER TABLE `%DB_PREFIX%user_log`
ADD COLUMN `score`  int(11) NOT NULL COMMENT '积分';

--------150401------
ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `is_send_referrals`  tinyint(1) NOT NULL COMMENT '是否发放推荐返利给推存人，0：没有推荐人,不用发放返利，1：未发，2.已发';
----yao qing fan li chenhua---

----moblie and email verify chenhua---
update `%DB_PREFIX%conf` set `value_scope` ='0,1,2,3,4' where `name`='USER_VERIFY';

-------150424 chenhua-------
INSERT INTO `%DB_PREFIX%conf` VALUES ('184', 'BUY_INVITE_REFERRALS', '20', '4', '0', '', '1', '1', '67');
INSERT INTO `%DB_PREFIX%conf` VALUES ('186', 'REFERRAL_LIMIT', '1', '4', '0', '', '1', '1', '69');
ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `referral_count`  int(11) NOT NULL COMMENT '返利数量',
ADD COLUMN `point`  int(11) NOT NULL COMMENT '信用值';

ALTER TABLE `%DB_PREFIX%user_level`
ADD COLUMN `point`  int(11) NOT NULL COMMENT '所需信用值';


ALTER TABLE `%DB_PREFIX%user_level`
ADD COLUMN `icon`  varchar(255) NOT NULL COMMENT '等级图标';

ALTER TABLE `%DB_PREFIX%user_log`
ADD COLUMN `point`  int(11) NOT NULL COMMENT '信用值';

ALTER TABLE `%DB_PREFIX%referrals`
ADD COLUMN `order_id`  int(11) NOT NULL COMMENT '订单id',
ADD COLUMN `type`  tinyint(1) NOT NULL COMMENT '类型：1表示注册奖励，2购买奖励';
-------150424 chenhua-------


ALTER TABLE `%DB_PREFIX%user_log`
MODIFY COLUMN `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '类型 0表示充值 1表示 加入诚意金 2表示违约扣除诚意金 3表示分红  4提现 5购买回报 6购买股权 7积分购买 8积分消费 9退款';

delete from `%DB_PREFIX%conf` where `name`='USER_INVESTMENT';
delete from `%DB_PREFIX%conf` where `id`=25;
delete from `%DB_PREFIX%conf` where `id`=261;

ALTER TABLE `%DB_PREFIX%conf` ADD UNIQUE INDEX `name` (`name`) ;

INSERT INTO `%DB_PREFIX%conf` VALUES ('279', 'KF_PHONE', '', '3', '0', '', '1', '1', '279');
INSERT INTO `%DB_PREFIX%conf` VALUES ('280', 'KF_QQ', '', '3', '0', '', '1', '1', '280');

update `%DB_PREFIX%conf` set `group_id` =3 where `name`='QR_CODE';

update `%DB_PREFIX%conf` set `is_effect` =0 where `name`='PUBLIC_DOMAIN_ROOT';
update `%DB_PREFIX%conf` set `is_effect` =0 where `name`='IMAGE_USERNAME';
update `%DB_PREFIX%conf` set `is_effect` =0 where `name`='IMAGE_PASSWORD';


-------3947-3953-linling-------
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('15', '统计模块', '0', '1', '8');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('86', '回报项目统计', '15', '0', '1', '86');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('87', '股权项目统计', '15', '0', '1', '87');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('88', '平台统计', '15', '0', '1', '88');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('143', 'Statistics', '统计', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6872', 'project', '项目统计', '1', '0', '86', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6874', 'usernum_total', '人数统计', '1', '0', '86', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6875', 'investe_total', '项目统计', '1', '0', '87', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6876', 'money_total', '金额统计', '1', '0', '86', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6877', 'hasback_total', '回报统计', '1', '0', '86', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6878', 'overdue_total', '逾期统计', '1', '0', '86', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6879', 'investors_total', '投资人统计', '1', '0', '87', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6880', 'financing_amount_total', '融资金额', '1', '0', '87', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6881', 'breach_convention_total', '违约统计', '1', '0', '87', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6882', 'money_inchange_total', '充值统计', '1', '0', '88', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6883', 'money_carry_bank_total', '提现统计', '1', '0', '88', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6884', 'user_total', '用户统计', '1', '0', '88', '143');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6885', 'site_costs_total', '网站费用统计', '1', '0', '88', '143');
-------3947-3953-linling-------=======

ALTER TABLE `%DB_PREFIX%deal`
ADD COLUMN `is_special`  tinyint(1) NOT NULL COMMENT '专题';

ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `cate_name`  varchar(255) NOT NULL COMMENT '投资领域';

----150429 chenhua---

INSERT INTO `%DB_PREFIX%conf` VALUES ('275', 'SCORE_TRADE_NUMBER', '100', '4', '0', '', '1', '1', '72');
ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `score`  int(11) NOT NULL COMMENT '付款积分',
ADD COLUMN `score_money`  decimal(20,2) NOT NULL COMMENT '积分对换的余额,对换的余额已加到余额支付里，这里记录是用在查看，退款时用';

----150429 chenhua---

----150429 xiawu chenhua---
INSERT INTO `%DB_PREFIX%conf` VALUES ('276', 'BUY_PRESEND_SCORE_MULTIPLE', '1', '4', '0', '', '1', '1', '72');
INSERT INTO `%DB_PREFIX%conf` VALUES ('277', 'BUY_PRESEND_POINT_MULTIPLE', '1', '4', '0', '', '1', '1', '72');
ALTER TABLE `fanwe_deal_order`
ADD COLUMN `sp_multiple`  varchar(255) NOT NULL COMMENT '记录\"购买送支付金额的几倍信用/积分\"的倍数的反序列数组array(\"score_multiple\"=>\'倍数\',\"point_multiple\"=>\'倍数\'）,退款时用';
----150429 xiawu chenhua---


update `%DB_PREFIX%m_config` set title="android是否强制升级(0:否;1:是)"  where id =31;
update `%DB_PREFIX%m_config` set title="ios是否强制升级(0:否;1:是)"  where id =32;

---lym----
INSERT INTO `%DB_PREFIX%conf` VALUES ('281', 'PROJECT_HIDE', '0', '3', '1', '0,1', '1', '1', '69');
ALTER TABLE `%DB_PREFIX%m_config` ADD COLUMN `value_scope`  varchar(50) NULL AFTER `sort`;
ALTER TABLE `%DB_PREFIX%m_config` ADD UNIQUE INDEX `code` (`code`) ;
INSERT INTO `%DB_PREFIX%m_config` VALUES ('45', 'wx_controll', '一站式登录方式', '0', '4', '45', '0,1');

ALTER TABLE `%DB_PREFIX%deal_msg_list`
ADD COLUMN `code`  varchar(60) NOT NULL COMMENT '发送的验证码';

INSERT INTO `%DB_PREFIX%role_group` VALUES ('89', '留言列表', '5', '0', '1', '89');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('144', 'Message', '留言列表', '1', '0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('145', 'MessageCate', '留言分类列表', '1', '0');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6886', 'index', '留言分类列表', '1', '0', '89', '145');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('6887', 'index', '留言列表', '1', '0', '89', '144');



 

CREATE TABLE `%DB_PREFIX%message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '该留言所属人ID',
  `user_name` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COMMENT='// 用户留言';

CREATE TABLE `%DB_PREFIX%message_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) NOT NULL,
  `is_project` tinyint(1) NOT NULL DEFAULT '0' COMMENT '项目发起的分类 0表示否 1表示 是',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='// 用户留言分类';


ALTER TABLE `%DB_PREFIX%deal_item`
ADD COLUMN `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 表示回报类型 1表示无私奉献';

ALTER TABLE `%DB_PREFIX%deal_order`
MODIFY COLUMN `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '订单类型 0表示普通众筹 1表示股权众筹 2表示无私奉献' ;

INSERT INTO `%DB_PREFIX%message_cate` VALUES ('1', '项目登记', '1');
INSERT INTO `%DB_PREFIX%message_cate` VALUES ('2', '建议留言', '0');

INSERT INTO `%DB_PREFIX%conf` VALUES ('282', 'WORK_TIME', '', '3', '0', '', '1', '1', '69');

update `%DB_PREFIX%role_module` set  `is_effect`=0 where module='DealLevel';

update `%DB_PREFIX%role_node` set  `is_effect`=0 where `module_id` in (select id from `%DB_PREFIX%role_module`  where module='DealLevel');


INSERT INTO `%DB_PREFIX%conf` VALUES ('283', 'IDENTIFY_POSITIVE', '1', '4', '1', '0,1', '1', '1', '283');
INSERT INTO `%DB_PREFIX%conf` VALUES ('284', 'IDENTIFY_NAGATIVE', '1', '4', '1', '0,1', '1', '1', '284');
INSERT INTO `%DB_PREFIX%conf` VALUES ('285', 'BUSINESS_LICENCE', '1', '4', '1', '0,1', '1', '1', '285');
INSERT INTO `%DB_PREFIX%conf` VALUES ('286', 'BUSINESS_CODE', '1', '4', '1', '0,1', '1', '1', '286');
INSERT INTO `%DB_PREFIX%conf` VALUES ('287', 'BUSINESS_TAX', '1', '4', '1', '0,1', '1', '1', '287');

delete from `%DB_PREFIX%conf` where `name`='MOBILE_MUST';

update `%DB_PREFIX%conf` set  `is_effect`=0 where `name`='COOKIE_PATH';

----150526 huibaosezi linling---
ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `logistics_company`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '物流公司' ,
ADD COLUMN `logistics_links`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '物流链接' ,
ADD COLUMN `logistics_number`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '物流单号' ;
----150526 huibaosezi linling---
ALTER TABLE `%DB_PREFIX%article_cate`
ADD COLUMN `seo_title`  varchar(255) NOT NULL COMMENT 'SEO标题';

----150429 longzichengong chenhua---
ALTER TABLE `%DB_PREFIX%deal`
ADD COLUMN `invest_status`  tinyint(1) NOT NULL COMMENT '融资状态：0未确认，1成功，2失败';
----150429 longzichengong chenhua---

----150528 gerenzhiliao linling---
ALTER TABLE `%DB_PREFIX%user`
ADD COLUMN `company`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公司' ,
ADD COLUMN `job`  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '职位'  ;
----150528 gerenzhiliao linling---

ALTER TABLE `%DB_PREFIX%deal_item`
MODIFY COLUMN `share_fee`  decimal(20,2) NOT NULL COMMENT '分红金额' ;

ALTER TABLE `%DB_PREFIX%deal`
ADD COLUMN `left_money`  decimal(20,2) NOT NULL COMMENT '剩余筹款' ;

ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `invest_id`  int(11) NOT NULL COMMENT '投资id';

----1.542 lym-------------

INSERT INTO `%DB_PREFIX%conf` VALUES ('288', 'VIRSUAL_NUM', '0', '4', '0', '', '1', '1', '288');

ALTER TABLE `%DB_PREFIX%article`
ADD COLUMN `writer`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发布者',
ADD COLUMN `tags`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标签';

update `%DB_PREFIX%article` set writer=(SELECT `value` from `%DB_PREFIX%conf` where name='SITE_NAME' ) where writer='';

UPDATE `%DB_PREFIX%conf` set `value` = '1.542' where name = ''; 

