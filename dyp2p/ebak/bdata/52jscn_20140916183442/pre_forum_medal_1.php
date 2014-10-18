<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_medal`;");
E_C("CREATE TABLE `pre_forum_medal` (
  `medalid` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `available` tinyint(1) NOT NULL default '0',
  `image` varchar(255) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `description` varchar(255) NOT NULL,
  `expiration` smallint(6) unsigned NOT NULL default '0',
  `permission` mediumtext NOT NULL,
  `credit` tinyint(1) unsigned NOT NULL default '0',
  `price` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`medalid`),
  KEY `displayorder` (`displayorder`),
  KEY `available` (`available`,`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_medal` values('1','最佳新人','0','medal1.gif','0','0','注册账号后积极发帖的会员','0','','0','0');");
E_D("replace into `pre_forum_medal` values('2','活跃会员','0','medal2.gif','0','0','经常参与各类话题的讨论，发帖内容较有主见','0','','0','0');");
E_D("replace into `pre_forum_medal` values('3','热心会员','0','medal3.gif','0','0','经常帮助其他会员答疑','0','','0','0');");
E_D("replace into `pre_forum_medal` values('4','推广达人','0','medal4.gif','0','0','积极宣传本站，为本站带来更多注册会员','0','','0','0');");
E_D("replace into `pre_forum_medal` values('5','宣传达人','0','medal5.gif','0','0','积极宣传本站，为本站带来更多的用户访问量','0','','0','0');");
E_D("replace into `pre_forum_medal` values('6','灌水之王','0','medal6.gif','0','0','经常在论坛发帖，且发帖量较大','0','','0','0');");
E_D("replace into `pre_forum_medal` values('7','突出贡献','0','medal7.gif','0','0','长期对论坛的繁荣而不断努力，或多次提出建设性意见','0','','0','0');");
E_D("replace into `pre_forum_medal` values('8','优秀版主','0','medal8.gif','0','0','活跃且尽责职守的版主','0','','0','0');");
E_D("replace into `pre_forum_medal` values('9','荣誉管理','0','medal9.gif','0','0','曾经为论坛做出突出贡献目前已离职的版主','0','','0','0');");
E_D("replace into `pre_forum_medal` values('10','论坛元老','0','medal10.gif','0','0','为论坛做出突出贡献的会员','0','','0','0');");

require("../../inc/footer.php");
?>