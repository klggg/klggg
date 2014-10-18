<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_credit_type`;");
E_C("CREATE TABLE `yyd_credit_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL COMMENT '????????',
  `nid` varchar(50) default NULL COMMENT '???????',
  `code` varchar(50) NOT NULL COMMENT '???',
  `status` int(2) NOT NULL COMMENT '??',
  `class_id` varchar(50) NOT NULL COMMENT '????',
  `value` int(11) default '0' COMMENT '???????',
  `cycle` tinyint(1) default '2' COMMENT '?????????1:???,2:???,3:????????,4:????',
  `award_times` tinyint(4) default NULL COMMENT '????????,0:????',
  `interval` int(11) default '1' COMMENT '???????????λ????',
  `remark` varchar(256) default NULL COMMENT '???',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `idx_ct_nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=gbk COMMENT='????????'");
E_D("replace into `yyd_credit_type` values('1','实名认证','realname','payment','1','6','5','1','1','0','');");
E_D("replace into `yyd_credit_type` values('2','手机认证','phone','payment','1','6','2','1','1','0','');");
E_D("replace into `yyd_credit_type` values('3','学历认证','education','payment','1','6','2','1','1','60','');");
E_D("replace into `yyd_credit_type` values('4','视频认证','video','payment','1','6','3','1','1','0','');");
E_D("replace into `yyd_credit_type` values('36','VIP充值金币冲抵','vip_gold','payment','1','4','-20','3',NULL,'525600',NULL);");
E_D("replace into `yyd_credit_type` values('33','完善个人信息','info_credit','credit','1','6','2','1','1','60','');");
E_D("replace into `yyd_credit_type` values('7','还款成功','borrow_success','borrow','1','3','1','4','1','0','');");
E_D("replace into `yyd_credit_type` values('8','迟还款','borrow_repay_slow','borrow','1','3','-100','4','1','60','');");
E_D("replace into `yyd_credit_type` values('9','一般逾期还款','borrow_repay_late_common','borrow','1','3','-200','4','1','60','');");
E_D("replace into `yyd_credit_type` values('10','严重逾期还款','borrow_repay_late_serious','borrow','1','3','-300','4','1','60','');");
E_D("replace into `yyd_credit_type` values('11','恶意逾期还款','borrow_repay_late_spite','links','1','6','-400','4','1','60','');");
E_D("replace into `yyd_credit_type` values('13','收到完整本息','tender_repay_time','borrow','1','4','0','4','1','60','');");
E_D("replace into `yyd_credit_type` values('14','投资提前还款','tender_repay_advance','links','1','4','0','4','1','60','');");
E_D("replace into `yyd_credit_type` values('15','按时还款','tender_repay_ontime','borrow','1','4','0','4','1','60','');");
E_D("replace into `yyd_credit_type` values('34','工作信息','work_credit','credit','1','6','3','1','1','60','');");
E_D("replace into `yyd_credit_type` values('35','财产信息','finance_credit','credit','1','6','5','1','1','60','');");
E_D("replace into `yyd_credit_type` values('26','借入学习测试','borrow_study','borrow','1','6','5','1','1','0','');");
E_D("replace into `yyd_credit_type` values('29','会员注册','reg','payment','1','4','30','1','1','0','');");
E_D("replace into `yyd_credit_type` values('30','邀请注册','invite','payment','1','4','10','4','0','0','');");
E_D("replace into `yyd_credit_type` values('31','邀请人投标成功','tender_invite','borrow','1','4','1','4','0','0','');");
E_D("replace into `yyd_credit_type` values('37','主要联系人信息','contact_credit','credit','1','6','5','1','1','60','');");

require("../../inc/footer.php");
?>