<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_onlinetime`;");
E_C("CREATE TABLE `pre_common_onlinetime` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `thismonth` smallint(6) unsigned NOT NULL default '0',
  `total` mediumint(8) unsigned NOT NULL default '0',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_onlinetime` values('1','0','330','1368864359');");
E_D("replace into `pre_common_onlinetime` values('2','0','30','1365649832');");
E_D("replace into `pre_common_onlinetime` values('7','0','40','1365596221');");
E_D("replace into `pre_common_onlinetime` values('11','0','30','1365925715');");
E_D("replace into `pre_common_onlinetime` values('54','0','20','1369039285');");
E_D("replace into `pre_common_onlinetime` values('58','0','20','1369203870');");
E_D("replace into `pre_common_onlinetime` values('55','0','90','1371095397');");
E_D("replace into `pre_common_onlinetime` values('66','0','10','1369019071');");
E_D("replace into `pre_common_onlinetime` values('53','0','500','1410891540');");
E_D("replace into `pre_common_onlinetime` values('60','0','10','1369043371');");
E_D("replace into `pre_common_onlinetime` values('61','0','30','1369127910');");
E_D("replace into `pre_common_onlinetime` values('88','0','10','1370163795');");
E_D("replace into `pre_common_onlinetime` values('759','0','10','1371134316');");

require("../../inc/footer.php");
?>