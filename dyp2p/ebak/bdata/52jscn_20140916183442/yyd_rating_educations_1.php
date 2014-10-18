<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_rating_educations`;");
E_C("CREATE TABLE `yyd_rating_educations` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '???????',
  `status` int(2) NOT NULL COMMENT '?????0????????งต?1????????2???ฆฤ???',
  `name` varchar(100) NOT NULL COMMENT '?งต????',
  `degree` varchar(100) NOT NULL COMMENT '???',
  `in_year` varchar(100) NOT NULL COMMENT '??????',
  `professional` varchar(100) NOT NULL COMMENT '??',
  `verify_userid` int(11) NOT NULL COMMENT '???????id',
  `verify_remark` varchar(200) NOT NULL COMMENT '??????',
  `verify_time` varchar(50) NOT NULL COMMENT '???????',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='????????'");

require("../../inc/footer.php");
?>