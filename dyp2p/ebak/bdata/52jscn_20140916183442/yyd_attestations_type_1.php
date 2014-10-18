<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_attestations_type`;");
E_C("CREATE TABLE `yyd_attestations_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL COMMENT '????',
  `nid` varchar(100) NOT NULL COMMENT '?????',
  `order` int(11) NOT NULL COMMENT '????',
  `credit` int(11) NOT NULL COMMENT '????????',
  `remark` varchar(200) NOT NULL COMMENT '????',
  `validity` int(11) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_attestations_type` values('1','信用认证','credit','10','10','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('2','工作认证','work','10','10','','12','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('3','收入认证','income','10','5','','12','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('4','居住认证','live','10','5','','12','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('5','户口认证','hukou','10','5','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('6','借款承诺函认证','chengnuo','10','10','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('7','其他借款记录','linkman','10','5','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('8','结婚认证','marry','10','5','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('9','固话认证','guohua','10','5','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('10','购房认证','house','10','15','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('11','购车认证','car','10','5','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('12','现场认证','spot','10','10','','0','1376101802','121.207.162.61');");
E_D("replace into `yyd_attestations_type` values('24','还款承诺书','hkxys','10','10','','0','1376101802','121.207.167.90');");
E_D("replace into `yyd_attestations_type` values('19','技术职称','professional','10','5','','0','1376101802','127.0.0.1');");
E_D("replace into `yyd_attestations_type` values('18','央行信用报告','bank_report','10','15','','6','1376101802','127.0.0.1');");
E_D("replace into `yyd_attestations_type` values('17','近6个月银行资金流水','bank_six','10','10','','6','1376101802','127.0.0.1');");
E_D("replace into `yyd_attestations_type` values('20','直系亲属认证','kinsfolk','10','10','','0','1376101802','127.0.0.1');");
E_D("replace into `yyd_attestations_type` values('25','微博/QQ认证','weibo','10','5','','0','1376101802','27.154.167.198');");
E_D("replace into `yyd_attestations_type` values('22','其他有价值认证','other','10','10','','0','1376101802','127.0.0.1');");

require("../../inc/footer.php");
?>