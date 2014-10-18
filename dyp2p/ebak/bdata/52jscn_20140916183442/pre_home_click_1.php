<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_click`;");
E_C("CREATE TABLE `pre_home_click` (
  `clickid` smallint(6) unsigned NOT NULL auto_increment,
  `name` char(50) NOT NULL default '',
  `icon` char(100) NOT NULL default '',
  `idtype` char(15) NOT NULL default '',
  `available` tinyint(1) unsigned NOT NULL default '0',
  `displayorder` tinyint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`clickid`),
  KEY `idtype` (`idtype`,`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gbk");
E_D("replace into `pre_home_click` values('1','路过','luguo.gif','blogid','1','0');");
E_D("replace into `pre_home_click` values('2','雷人','leiren.gif','blogid','1','0');");
E_D("replace into `pre_home_click` values('3','握手','woshou.gif','blogid','1','0');");
E_D("replace into `pre_home_click` values('4','鲜花','xianhua.gif','blogid','1','0');");
E_D("replace into `pre_home_click` values('5','鸡蛋','jidan.gif','blogid','1','0');");
E_D("replace into `pre_home_click` values('6','漂亮','piaoliang.gif','picid','1','0');");
E_D("replace into `pre_home_click` values('7','酷毙','kubi.gif','picid','1','0');");
E_D("replace into `pre_home_click` values('8','雷人','leiren.gif','picid','1','0');");
E_D("replace into `pre_home_click` values('9','鲜花','xianhua.gif','picid','1','0');");
E_D("replace into `pre_home_click` values('10','鸡蛋','jidan.gif','picid','1','0');");
E_D("replace into `pre_home_click` values('11','路过','luguo.gif','aid','1','0');");
E_D("replace into `pre_home_click` values('12','雷人','leiren.gif','aid','1','0');");
E_D("replace into `pre_home_click` values('13','握手','woshou.gif','aid','1','0');");
E_D("replace into `pre_home_click` values('14','鲜花','xianhua.gif','aid','1','0');");
E_D("replace into `pre_home_click` values('15','鸡蛋','jidan.gif','aid','1','0');");

require("../../inc/footer.php");
?>