<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_word`;");
E_C("CREATE TABLE `pre_common_word` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `admin` varchar(15) NOT NULL default '',
  `type` smallint(6) NOT NULL default '1',
  `find` varchar(255) NOT NULL default '',
  `replacement` varchar(255) NOT NULL default '',
  `extra` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>