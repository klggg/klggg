<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_article_count`;");
E_C("CREATE TABLE `pre_portal_article_count` (
  `aid` mediumint(8) unsigned NOT NULL default '0',
  `catid` mediumint(8) unsigned NOT NULL default '0',
  `viewnum` mediumint(8) unsigned NOT NULL default '0',
  `commentnum` mediumint(8) unsigned NOT NULL default '0',
  `favtimes` mediumint(8) unsigned NOT NULL default '0',
  `sharetimes` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>