<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_modwork`;");
E_C("CREATE TABLE `pre_forum_modwork` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `modaction` char(3) NOT NULL default '',
  `dateline` date NOT NULL default '2006-01-01',
  `count` smallint(6) unsigned NOT NULL default '0',
  `posts` smallint(6) unsigned NOT NULL default '0',
  KEY `uid` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_modwork` values('1','MOV','2013-04-10','4','4');");
E_D("replace into `pre_forum_modwork` values('53','EDT','2013-05-22','2','2');");

require("../../inc/footer.php");
?>