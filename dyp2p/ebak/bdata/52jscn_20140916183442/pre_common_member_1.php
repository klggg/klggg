<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member`;");
E_C("CREATE TABLE `pre_common_member` (
  `uid` mediumint(8) unsigned NOT NULL auto_increment,
  `email` char(40) NOT NULL default '',
  `username` char(15) NOT NULL default '',
  `password` char(32) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `emailstatus` tinyint(1) NOT NULL default '0',
  `avatarstatus` tinyint(1) NOT NULL default '0',
  `videophotostatus` tinyint(1) NOT NULL default '0',
  `adminid` tinyint(1) NOT NULL default '0',
  `groupid` smallint(6) unsigned NOT NULL default '0',
  `groupexpiry` int(10) unsigned NOT NULL default '0',
  `extgroupids` char(20) NOT NULL default '',
  `regdate` int(10) unsigned NOT NULL default '0',
  `credits` int(10) NOT NULL default '0',
  `notifysound` tinyint(1) NOT NULL default '0',
  `timeoffset` char(4) NOT NULL default '',
  `newpm` smallint(6) unsigned NOT NULL default '0',
  `newprompt` smallint(6) unsigned NOT NULL default '0',
  `accessmasks` tinyint(1) NOT NULL default '0',
  `allowadmincp` tinyint(1) NOT NULL default '0',
  `onlyacceptfriendpm` tinyint(1) NOT NULL default '0',
  `conisbind` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `groupid` (`groupid`),
  KEY `conisbind` (`conisbind`)
) ENGINE=MyISAM AUTO_INCREMENT=1303 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_member` values('53','','admin','cfb4c140059eb09f7068ee90ad40bae3','0','0','0','0','1','1','0','','1368864616','58','0','9999','0','0','0','1','0','0');");
E_D("replace into `pre_common_member` values('1302','swolves@yeah.net','fxy','d41d8cd98f00b204e9800998ecf8427e','0','0','0','0','0','0','0','','1390490765','0','0','','0','0','0','0','0','0');");
E_D("replace into `pre_common_member` values('1301','425841784@qq.com','ttw321','d41d8cd98f00b204e9800998ecf8427e','0','0','0','0','0','0','0','','1390333672','0','0','','0','0','0','0','0','0');");
E_D("replace into `pre_common_member` values('1279','1582978230@qq.com','ttw123','d41d8cd98f00b204e9800998ecf8427e','0','0','0','0','0','0','0','','1382702014','0','0','','0','0','0','0','0','0');");
E_D("replace into `pre_common_member` values('1288','64868318@qq.com','sixfeel','4747404c948d5ec82e29368ff77230b9','0','0','0','0','0','10','0','','1383998254','2','0','9999','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>