<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_album_category`;");
E_C("CREATE TABLE `pre_home_album_category` (
  `catid` mediumint(8) unsigned NOT NULL auto_increment,
  `upid` mediumint(8) unsigned NOT NULL default '0',
  `catname` varchar(255) NOT NULL default '',
  `num` mediumint(8) unsigned NOT NULL default '0',
  `displayorder` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>