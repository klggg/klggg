<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_memberfields`;");
E_C("CREATE TABLE `pre_ucenter_memberfields` (
  `uid` mediumint(8) unsigned NOT NULL,
  `blacklist` text NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_ucenter_memberfields` values('53','');");
E_D("replace into `pre_ucenter_memberfields` values('1302','');");
E_D("replace into `pre_ucenter_memberfields` values('1301','');");
E_D("replace into `pre_ucenter_memberfields` values('1295','');");
E_D("replace into `pre_ucenter_memberfields` values('1296','');");
E_D("replace into `pre_ucenter_memberfields` values('1297','');");
E_D("replace into `pre_ucenter_memberfields` values('1298','');");
E_D("replace into `pre_ucenter_memberfields` values('1299','');");
E_D("replace into `pre_ucenter_memberfields` values('1300','');");
E_D("replace into `pre_ucenter_memberfields` values('1294','');");
E_D("replace into `pre_ucenter_memberfields` values('1293','');");
E_D("replace into `pre_ucenter_memberfields` values('1292','');");
E_D("replace into `pre_ucenter_memberfields` values('1291','');");
E_D("replace into `pre_ucenter_memberfields` values('1290','');");
E_D("replace into `pre_ucenter_memberfields` values('1289','');");
E_D("replace into `pre_ucenter_memberfields` values('1288','');");
E_D("replace into `pre_ucenter_memberfields` values('1279','');");
E_D("replace into `pre_ucenter_memberfields` values('1303','');");
E_D("replace into `pre_ucenter_memberfields` values('1304','');");
E_D("replace into `pre_ucenter_memberfields` values('1305','');");
E_D("replace into `pre_ucenter_memberfields` values('1306','');");
E_D("replace into `pre_ucenter_memberfields` values('1307','');");
E_D("replace into `pre_ucenter_memberfields` values('1308','');");
E_D("replace into `pre_ucenter_memberfields` values('1309','');");
E_D("replace into `pre_ucenter_memberfields` values('1310','');");
E_D("replace into `pre_ucenter_memberfields` values('1311','');");
E_D("replace into `pre_ucenter_memberfields` values('1312','');");
E_D("replace into `pre_ucenter_memberfields` values('1313','');");
E_D("replace into `pre_ucenter_memberfields` values('1314','');");
E_D("replace into `pre_ucenter_memberfields` values('1315','');");
E_D("replace into `pre_ucenter_memberfields` values('1316','');");
E_D("replace into `pre_ucenter_memberfields` values('1317','');");
E_D("replace into `pre_ucenter_memberfields` values('1318','');");
E_D("replace into `pre_ucenter_memberfields` values('1319','');");
E_D("replace into `pre_ucenter_memberfields` values('1320','');");
E_D("replace into `pre_ucenter_memberfields` values('1321','');");
E_D("replace into `pre_ucenter_memberfields` values('1322','');");
E_D("replace into `pre_ucenter_memberfields` values('1323','');");
E_D("replace into `pre_ucenter_memberfields` values('1324','');");
E_D("replace into `pre_ucenter_memberfields` values('1325','');");
E_D("replace into `pre_ucenter_memberfields` values('1326','');");

require("../../inc/footer.php");
?>