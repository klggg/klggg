<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_rsscache`;");
E_C("CREATE TABLE `pre_forum_rsscache` (
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `forum` char(50) NOT NULL default '',
  `author` char(15) NOT NULL default '',
  `subject` char(80) NOT NULL default '',
  `description` char(255) NOT NULL default '',
  `guidetype` char(10) NOT NULL default '',
  UNIQUE KEY `tid` (`tid`),
  KEY `fid` (`fid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_rsscache` values('1393962416','37','19','1380414826','公告专区','tianjin','新系统上线了！赶快来体验一下吧！','新系统上线了！赶快来体验一下吧！','');");

require("../../inc/footer.php");
?>