<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_replycredit`;");
E_C("CREATE TABLE `pre_forum_replycredit` (
  `tid` mediumint(6) unsigned NOT NULL,
  `extcredits` mediumint(6) unsigned NOT NULL default '0',
  `extcreditstype` tinyint(1) NOT NULL default '0',
  `times` smallint(6) unsigned NOT NULL default '0',
  `membertimes` smallint(6) unsigned NOT NULL default '0',
  `random` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>