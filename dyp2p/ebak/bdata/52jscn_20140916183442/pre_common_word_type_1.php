<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_word_type`;");
E_C("CREATE TABLE `pre_common_word_type` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `typename` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_word_type` values('1','政治');");
E_D("replace into `pre_common_word_type` values('2','广告');");

require("../../inc/footer.php");
?>