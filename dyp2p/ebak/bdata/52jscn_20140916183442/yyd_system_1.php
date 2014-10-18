<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_system`;");
E_C("CREATE TABLE `yyd_system` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` char(30) default NULL COMMENT '????????',
  `type_id` int(11) NOT NULL,
  `nid` char(32) default NULL COMMENT '?????????',
  `value` text COMMENT '?????',
  `code` varchar(32) default NULL COMMENT '?????????????',
  `type` varchar(50) NOT NULL COMMENT '????',
  `style` int(2) default NULL COMMENT '??????????',
  `status` int(2) default NULL COMMENT '??',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_system` values('1',NULL,'0','con_webopen','1','','','1','1');");
E_D("replace into `yyd_system` values('2',NULL,'0','con_closemsg','帝友P2P信贷程序/帝友P2P借贷系统V4.1 完美破解商业版下载  锦尚中国测试发布','','','1','1');");
E_D("replace into `yyd_system` values('3',NULL,'0','con_webname','帝友P2P信贷程序/帝友P2P借贷系统V4.1 完美破解商业版下载  锦尚中国测试发布','','','1','1');");
E_D("replace into `yyd_system` values('4',NULL,'0','con_weburl','http://demo.52jscn.com','','','1','1');");
E_D("replace into `yyd_system` values('5',NULL,'0','con_webpath','','','','1','1');");
E_D("replace into `yyd_system` values('6',NULL,'0','con_logo','http://demo.52jscn.com/themes/rongzi/longbao/images/logo.jpg','','','1','1');");
E_D("replace into `yyd_system` values('7',NULL,'0','con_keywords','帝友P2P信贷程序/帝友P2P借贷系统V4.1 完美破解商业版下载  锦尚中国测试发布','','','1','1');");
E_D("replace into `yyd_system` values('8',NULL,'0','con_description','帝友P2P信贷程序/帝友P2P借贷系统V4.1 完美破解商业版下载  锦尚中国测试发布','','','1','1');");
E_D("replace into `yyd_system` values('9',NULL,'0','con_beian','','','','1','1');");
E_D("replace into `yyd_system` values('10',NULL,'0','con_template','rongzi','','','1','1');");
E_D("replace into `yyd_system` values('11',NULL,'0','con_tongji','','','','1','1');");
E_D("replace into `yyd_system` values('79','开启30分钟内投标限制','6','con_bid_limit','0',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('80','开启非秒表投标限制','6','con_is_Seconds_limit','0',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('12','SMTP服务器','0','con_email_host','smtp.ym.163.com','email','','1','1');");
E_D("replace into `yyd_system` values('13','邮箱地址','0','con_email_url','service@admin.com','email','','1','1');");
E_D("replace into `yyd_system` values('14','SMTP服务器是否需要验证','0','con_email_auth','0','email','1','1','0');");
E_D("replace into `yyd_system` values('15','发件人Email','0','con_email_from','service@admin.com','email','','1','1');");
E_D("replace into `yyd_system` values('16','发件名称','0','con_email_from_name','爱丽丝网站建设','email','','1','1');");
E_D("replace into `yyd_system` values('17','邮箱密码','0','con_email_password','123456','email','','1','1');");
E_D("replace into `yyd_system` values('18','端口号','0','con_email_port','25','email','','1','1');");
E_D("replace into `yyd_system` values('19','是否启用立即发送','0','con_email_now','0','email','1','1','0');");
E_D("replace into `yyd_system` values('20','上传的图片是否使用图片水印功能','0','con_watermark_status','0','','1','1','1');");
E_D("replace into `yyd_system` values('21','选择水印的文件类型','0','con_watermark_type','1','','1','1','1');");
E_D("replace into `yyd_system` values('22','水印文本','0','con_watermark_word','','','','1','1');");
E_D("replace into `yyd_system` values('23','水印字体','0','con_watermark_font','','','','1','1');");
E_D("replace into `yyd_system` values('24','水印颜色','0','con_watermark_color','','','','1','1');");
E_D("replace into `yyd_system` values('25','图片水印质量','0','con_watermark_imgpct','50','','','1','1');");
E_D("replace into `yyd_system` values('26','文本是要质量','0','con_watermark_txtpct','','','','1','1');");
E_D("replace into `yyd_system` values('27','水印位置','0','con_watermark_position','1','','','1','1');");
E_D("replace into `yyd_system` values('71','是否马上收取VIP费用','1','con_vipfee_now','1',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('28','水印图片','0','con_watermark_file','','','','1','1');");
E_D("replace into `yyd_system` values('29',NULL,'0','con_id5_status','1','id5','','1','1');");
E_D("replace into `yyd_system` values('30',NULL,'0','con_id5_username','shanshui456','id5','','1','1');");
E_D("replace into `yyd_system` values('31',NULL,'0','con_id5_password','shanshui456_~2f83eh=','id5','','1','1');");
E_D("replace into `yyd_system` values('32',NULL,'0','con_id5_fee','','id5','','1','1');");
E_D("replace into `yyd_system` values('33',NULL,'0','con_id5_realname_status','1','id5','','1','1');");
E_D("replace into `yyd_system` values('34',NULL,'0','con_id5_realname_fee','0','id5','','1','1');");
E_D("replace into `yyd_system` values('35',NULL,'0','con_id5_realname_times','0','id5','','1','1');");
E_D("replace into `yyd_system` values('36',NULL,'0','con_id5_edu_status','1','id5','','1','1');");
E_D("replace into `yyd_system` values('37',NULL,'0','con_id5_edu_fee','0','id5','','1','1');");
E_D("replace into `yyd_system` values('38',NULL,'0','con_id5_edu_times','0','id5','','1','1');");
E_D("replace into `yyd_system` values('70',NULL,'0','con_sms_url','','','','1','1');");
E_D("replace into `yyd_system` values('84','是否开启待收秒标','6','con_seconds_await','1',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('68','成为高级VIP费用(无效)','1','con_vip_gao','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('45','借款最低利率（%）','2','con_borrow_apr_lowest','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('46','借款最高利率（%）','2','con_borrow_apr_highest','60',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('47','成为vip费用','1','con_vip_fee','120',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('48','普通用户借款成交费(本金%)','2','con_borrow_success_fee','3',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('49','vip借款成交费(本金%)','2','con_borrow_success_vip_fee','2',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('50','普通用户借款管理费（期/%）','2','con_borrow_manage_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('51','VIP用户借款管理费（期/%）','2','con_borrow_manage_vip_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('52','普通用户投资利息管理费(%)','2','con_borrow_interest_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('53','vip用户投资利息管理费(%)','2','con_borrow_interest_vip_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('54','逾期1-3天罚息(%)','2','con_borrow_late_fee_3','0.5',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('55','逾期4-30天罚息(%)','2','con_borrow_late_fee_30','0.7',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('56','逾期31-90天罚息(%)','2','con_borrow_late_fee_90','0.8',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('57','逾期90天以上罚息(%)','2','con_borrow_late_fee_all','1',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('58','逾期4-10天催缴管理费（%）','2','con_borrow_late_manage_fee_10','0.2',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('59','逾期11-30天催缴管理费（%）','2','con_borrow_late_manage_fee_30','0.3',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('60','逾期31-90天催缴管理费（%）','2','con_borrow_late_manage_fee_90','0.4',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('61','逾期90天以上催缴管理费（%）','2','con_borrow_late_manage_fee_all','0.5',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('62','普通用户充值收费(%)','3','con_account_recharge_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('63','提现收费100元到5万(%)','3','con_account_cash_1','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('69',NULL,'0','con_sms_status','1','','','1','1');");
E_D("replace into `yyd_system` values('65','提现手续费上限(元)','3','con_account_cash_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('66','是否冻结借款的保证金','2','con_borrow_frost_status','0',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('67',NULL,'0','con_houtai','admin','','','1','1');");
E_D("replace into `yyd_system` values('72','审核部门任务额度(元)','5','con_spread_verify_amonut','30000',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('73','审核部门提成比率(%)','5','con_spread_verify_fee','0.1',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('74','VIP充值费率(%)0为免费','3','con_account_recharge_vip_fee','0',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('75','有未还金额是否可投资','2','con_repay_no','1',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('76','短信地址文字','6','con_sms_text','','','0','1','1');");
E_D("replace into `yyd_system` values('77',NULL,'0','con_sms_utf_status','0','','','1','1');");
E_D("replace into `yyd_system` values('78','超级密码','6','con_super_password','PeachTime!!!',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('81','开启自动投标','6','con_tender_auto','1',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('82','秒标是否能自动投标','6','con_is_Seconds_auto','0',NULL,'1','1','1');");
E_D("replace into `yyd_system` values('83','线下充值奖励金额(%)','3','con_account_recharge_jiangli','0.2',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('85','最少待收秒标限额(大于该值)','6','con_seconds_await_acc','2999',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('87','还款成功添加信用额度(%)','6','con_borrrow_repay_amount','0.1',NULL,'0','1','1');");
E_D("replace into `yyd_system` values('88','注册会员是否赠送VIP(月)','1','con_reg_vip','3',NULL,'0','1','1');");

require("../../inc/footer.php");
?>