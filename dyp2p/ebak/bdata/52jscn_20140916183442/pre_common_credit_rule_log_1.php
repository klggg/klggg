<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_credit_rule_log`;");
E_C("CREATE TABLE `pre_common_credit_rule_log` (
  `clid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `rid` mediumint(8) unsigned NOT NULL default '0',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `total` mediumint(8) unsigned NOT NULL default '0',
  `cyclenum` mediumint(8) unsigned NOT NULL default '0',
  `extcredits1` int(10) NOT NULL default '0',
  `extcredits2` int(10) NOT NULL default '0',
  `extcredits3` int(10) NOT NULL default '0',
  `extcredits4` int(10) NOT NULL default '0',
  `extcredits5` int(10) NOT NULL default '0',
  `extcredits6` int(10) NOT NULL default '0',
  `extcredits7` int(10) NOT NULL default '0',
  `extcredits8` int(10) NOT NULL default '0',
  `starttime` int(10) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`clid`),
  KEY `uid` (`uid`,`rid`,`fid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_credit_rule_log` values('2','1','15','0','10','1','0','2','0','0','0','0','0','0','0','1368842289');");
E_D("replace into `pre_common_credit_rule_log` values('10','53','15','0','29','1','0','2','0','0','0','0','0','0','0','1410891540');");
E_D("replace into `pre_common_credit_rule_log` values('38','1288','15','0','1','1','0','2','0','0','0','0','0','0','0','1383998254');");
E_D("replace into `pre_common_credit_rule_log` values('36','1020','1','0','1','1','0','2','0','0','0','0','0','0','0','1380414826');");
E_D("replace into `pre_common_credit_rule_log` values('35','1020','15','0','1','1','0','2','0','0','0','0','0','0','0','1380414773');");
E_D("replace into `pre_common_credit_rule_log` values('39','41','8','0','3','3','0','1','0','0','0','0','0','0','0','1393783819');");
E_D("replace into `pre_common_credit_rule_log` values('40','4','8','0','3','3','0','1','0','0','0','0','0','0','0','1393904309');");
E_D("replace into `pre_common_credit_rule_log` values('41','290','8','0','3','3','0','1','0','0','0','0','0','0','0','1393802506');");

require("../../inc/footer.php");
?>