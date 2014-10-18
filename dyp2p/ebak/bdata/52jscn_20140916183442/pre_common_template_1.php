<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_template`;");
E_C("CREATE TABLE `pre_common_template` (
  `templateid` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `directory` varchar(100) NOT NULL default '',
  `copyright` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`templateid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_template` values('1','默认模板套系','./template/default','北京康盛新创科技有限责任公司');");
E_D("replace into `pre_common_template` values('2','Singcere_Note','./template/singcere_note','Singcere! 新诚互联');");

require("../../inc/footer.php");
?>