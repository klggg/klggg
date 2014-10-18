<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_secquestion`;");
E_C("CREATE TABLE `pre_common_secquestion` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `type` tinyint(1) unsigned NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>