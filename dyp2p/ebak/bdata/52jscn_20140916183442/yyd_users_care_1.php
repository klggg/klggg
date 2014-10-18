<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `yyd_users_care`;");
E_C("CREATE TABLE `yyd_users_care` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `article_id` varchar(50) character set gbk NOT NULL,
  `code` varchar(30) character set gbk NOT NULL,
  `addtime` varchar(30) character set gbk NOT NULL,
  `addip` varchar(30) character set gbk NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1");
E_D("replace into `yyd_users_care` values('22','1938','20140100001','borrow','1390095415','124.156.66.241');");
E_D("replace into `yyd_users_care` values('23','1934','20140100001','borrow','1390488201','122.96.42.228');");
E_D("replace into `yyd_users_care` values('24','1934','20140200001','borrow','1392987533','122.96.43.225');");
E_D("replace into `yyd_users_care` values('25','1934','20140200004','borrow','1393381806','122.96.42.241');");
E_D("replace into `yyd_users_care` values('26','1934','20140200006','borrow','1393427017','122.96.95.190');");
E_D("replace into `yyd_users_care` values('27','1934','20140200005','borrow','1393427033','122.96.95.190');");

require("../../inc/footer.php");
?>