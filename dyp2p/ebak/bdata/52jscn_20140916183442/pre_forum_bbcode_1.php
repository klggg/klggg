<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_bbcode`;");
E_C("CREATE TABLE `pre_forum_bbcode` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `available` tinyint(1) NOT NULL default '0',
  `tag` varchar(100) NOT NULL default '',
  `icon` varchar(255) NOT NULL,
  `replacement` text NOT NULL,
  `example` varchar(255) NOT NULL default '',
  `explanation` text NOT NULL,
  `params` tinyint(1) unsigned NOT NULL default '1',
  `prompt` text NOT NULL,
  `nest` tinyint(3) unsigned NOT NULL default '1',
  `displayorder` tinyint(3) NOT NULL default '0',
  `perm` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_bbcode` values('1','0','fly','bb_fly.gif','<marquee width=\"90%\" scrollamount=\"3\">{1}</marquee>','[fly]This is sample text[/fly]','使内容横向滚动，这个效果类似 HTML 的 marquee 标签，注意：这个效果只在 Internet Explorer 浏览器下有效。','1','请输入滚动显示的文字:','1','19','1	2	3	12	13	14	15	16	17	18	19');");
E_D("replace into `pre_forum_bbcode` values('2','1','qq','bb_qq.gif','<a href=\"http://wpa.qq.com/msgrd?V=1&Uin={1}&amp;Site=[Discuz!]&amp;Menu=yes\" target=\"_blank\"><img src=\"http://wpa.qq.com/pa?p=1:{1}:1\" border=\"0\"></a>','[qq]688888[/qq]','显示 QQ 在线状态，点这个图标可以和他（她）聊天','1','请输入显示在线状态 QQ 号码:','1','21','1	2	3	12	13	14	15	16	17	18	19');");
E_D("replace into `pre_forum_bbcode` values('3','0','sup','bb_sup.gif','<sup>{1}</sup>','X[sup]2[/sup]','上标','1','请输入上标文字：','1','22','1	2	3	12	13	14	15	16	17	18	19');");
E_D("replace into `pre_forum_bbcode` values('4','0','sub','bb_sub.gif','<sub>{1}</sub>','X[sub]2[/sub]','下标','1','请输入下标文字：','1','23','1	2	3	12	13	14	15	16	17	18	19');");

require("../../inc/footer.php");
?>