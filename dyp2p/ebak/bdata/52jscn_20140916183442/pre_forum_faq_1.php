<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_faq`;");
E_C("CREATE TABLE `pre_forum_faq` (
  `id` smallint(6) NOT NULL auto_increment,
  `fpid` smallint(6) unsigned NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `identifier` varchar(20) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `displayplay` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>