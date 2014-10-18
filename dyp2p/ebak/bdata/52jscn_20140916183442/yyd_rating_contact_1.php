<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_rating_contact`;");
E_C("CREATE TABLE `yyd_rating_contact` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `linkman2` varchar(30) NOT NULL COMMENT '???',
  `phone2` varchar(30) NOT NULL COMMENT '??????',
  `linkman3` varchar(30) NOT NULL COMMENT '??????',
  `phone3` varchar(30) NOT NULL COMMENT '?????????',
  `linkman4` varchar(30) NOT NULL COMMENT '???',
  `phone4` varchar(30) NOT NULL COMMENT '???ดย',
  `linkman5` varchar(30) NOT NULL COMMENT '?????????',
  `phone5` varchar(30) NOT NULL COMMENT '?????????ดย',
  `linkman6` varchar(30) NOT NULL COMMENT '???????2',
  `phone6` varchar(30) NOT NULL COMMENT '???????2?ดย',
  `linkman7` varchar(30) NOT NULL COMMENT '???2',
  `phone7` varchar(30) NOT NULL COMMENT '???2?ดย',
  `linkman8` varchar(30) NOT NULL COMMENT '????1',
  `phone8` varchar(30) NOT NULL COMMENT '????1?ดย',
  `linkman9` varchar(30) NOT NULL COMMENT '????2',
  `phone9` varchar(30) NOT NULL COMMENT '????2?ดย',
  `linkman10` varchar(30) NOT NULL COMMENT '??1',
  `phone10` varchar(30) NOT NULL COMMENT '??1?ดย',
  `linkman11` varchar(30) NOT NULL COMMENT '??2',
  `phone11` varchar(30) NOT NULL COMMENT '??2?ดย',
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=267 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_rating_contact` values('256','1935','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('257','1934','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('258','1940','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('259','1942','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('260','1941','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('261','1946','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('262','1954','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('263','1956','1','','','ษ๒ีýวไ1','13751388761','ษ๒ีýวไ3','13751388763','ษ๒ีýวไ5','13751388765','ษ๒ีýวไ2','13751388762','','','ษ๒ีýวไ4','13751388764','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('264','1960','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('265','1938','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");
E_D("replace into `yyd_rating_contact` values('266','1970','0','','','','','','','','','','','','','','','','','','','','','0','','','','');");

require("../../inc/footer.php");
?>