<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_block_xml`;");
E_C("CREATE TABLE `pre_common_block_xml` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `signtype` varchar(255) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>