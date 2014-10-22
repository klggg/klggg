<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_topic`;");
E_C("CREATE TABLE `fanwe_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fav_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT 'focus关注，1',
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `l_user_id` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  KEY `is_effect` (`is_effect`),
  KEY `ordery_sort` (`create_time`),
  KEY `multi_key` (`is_effect`,`create_time`),
  KEY `index_01` (`fav_id`,`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_topic` values('1','1','message','44','','3','1','1380047209');");
E_D("replace into `fanwe_topic` values('2','2','message','44','','6','1','1381195820');");
E_D("replace into `fanwe_topic` values('3','4','message','48','','22','1','1389511496');");
E_D("replace into `fanwe_topic` values('4','5','message','44','','21','1','1403917439');");

require("../../inc/footer.php");
?>