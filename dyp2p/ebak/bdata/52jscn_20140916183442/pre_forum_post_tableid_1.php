<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_post_tableid`;");
E_C("CREATE TABLE `pre_forum_post_tableid` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_post_tableid` values('1');");
E_D("replace into `pre_forum_post_tableid` values('2');");
E_D("replace into `pre_forum_post_tableid` values('3');");
E_D("replace into `pre_forum_post_tableid` values('4');");
E_D("replace into `pre_forum_post_tableid` values('5');");
E_D("replace into `pre_forum_post_tableid` values('6');");
E_D("replace into `pre_forum_post_tableid` values('7');");
E_D("replace into `pre_forum_post_tableid` values('8');");
E_D("replace into `pre_forum_post_tableid` values('9');");
E_D("replace into `pre_forum_post_tableid` values('10');");
E_D("replace into `pre_forum_post_tableid` values('11');");
E_D("replace into `pre_forum_post_tableid` values('12');");
E_D("replace into `pre_forum_post_tableid` values('13');");
E_D("replace into `pre_forum_post_tableid` values('14');");
E_D("replace into `pre_forum_post_tableid` values('15');");
E_D("replace into `pre_forum_post_tableid` values('16');");
E_D("replace into `pre_forum_post_tableid` values('17');");
E_D("replace into `pre_forum_post_tableid` values('18');");
E_D("replace into `pre_forum_post_tableid` values('19');");
E_D("replace into `pre_forum_post_tableid` values('20');");
E_D("replace into `pre_forum_post_tableid` values('21');");

require("../../inc/footer.php");
?>