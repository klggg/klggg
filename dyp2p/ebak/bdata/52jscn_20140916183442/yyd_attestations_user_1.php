<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_attestations_user`;");
E_C("CREATE TABLE `yyd_attestations_user` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `credit` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=692 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_attestations_user` values('668','1942','4','1','5','');");
E_D("replace into `yyd_attestations_user` values('669','1942','18','1','15','');");
E_D("replace into `yyd_attestations_user` values('670','1942','17','1','10','');");
E_D("replace into `yyd_attestations_user` values('671','1942','3','1','5','');");
E_D("replace into `yyd_attestations_user` values('672','1942','2','1','10','');");
E_D("replace into `yyd_attestations_user` values('673','1942','5','1','5','');");
E_D("replace into `yyd_attestations_user` values('674','1934','4','1','5','');");
E_D("replace into `yyd_attestations_user` values('675','1934','18','1','15','');");
E_D("replace into `yyd_attestations_user` values('676','1934','17','1','10','');");
E_D("replace into `yyd_attestations_user` values('677','1934','3','1','5','');");
E_D("replace into `yyd_attestations_user` values('678','1934','2','1','10','');");
E_D("replace into `yyd_attestations_user` values('679','1934','5','1','5','');");
E_D("replace into `yyd_attestations_user` values('680','1946','5','1','5','');");
E_D("replace into `yyd_attestations_user` values('681','1946','4','1','5','');");
E_D("replace into `yyd_attestations_user` values('682','1946','18','1','15','');");
E_D("replace into `yyd_attestations_user` values('683','1946','17','1','10','');");
E_D("replace into `yyd_attestations_user` values('684','1946','3','1','5','');");
E_D("replace into `yyd_attestations_user` values('685','1946','2','1','10','');");
E_D("replace into `yyd_attestations_user` values('686','1956','5','1','5','');");
E_D("replace into `yyd_attestations_user` values('687','1956','4','1','5','');");
E_D("replace into `yyd_attestations_user` values('688','1956','18','1','15','');");
E_D("replace into `yyd_attestations_user` values('689','1956','17','1','10','');");
E_D("replace into `yyd_attestations_user` values('690','1956','3','1','5','');");
E_D("replace into `yyd_attestations_user` values('691','1956','2','1','10','');");

require("../../inc/footer.php");
?>