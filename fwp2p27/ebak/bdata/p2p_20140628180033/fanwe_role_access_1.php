<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_role_access`;");
E_C("CREATE TABLE `fanwe_role_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_role_access` values('87','4','0','6');");
E_D("replace into `fanwe_role_access` values('88','4','0','53');");
E_D("replace into `fanwe_role_access` values('89','4','0','77');");
E_D("replace into `fanwe_role_access` values('90','4','0','17');");
E_D("replace into `fanwe_role_access` values('91','4','0','18');");
E_D("replace into `fanwe_role_access` values('92','4','0','92');");
E_D("replace into `fanwe_role_access` values('93','4','0','12');");
E_D("replace into `fanwe_role_access` values('94','4','0','110');");
E_D("replace into `fanwe_role_access` values('95','4','0','13');");
E_D("replace into `fanwe_role_access` values('96','4','0','29');");
E_D("replace into `fanwe_role_access` values('97','4','0','119');");
E_D("replace into `fanwe_role_access` values('98','4','0','28');");
E_D("replace into `fanwe_role_access` values('99','4','0','116');");
E_D("replace into `fanwe_role_access` values('100','4','0','56');");
E_D("replace into `fanwe_role_access` values('101','4','0','41');");
E_D("replace into `fanwe_role_access` values('102','4','0','35');");
E_D("replace into `fanwe_role_access` values('103','4','0','59');");
E_D("replace into `fanwe_role_access` values('104','4','0','19');");
E_D("replace into `fanwe_role_access` values('105','4','0','55');");
E_D("replace into `fanwe_role_access` values('106','4','0','61');");
E_D("replace into `fanwe_role_access` values('107','4','0','60');");
E_D("replace into `fanwe_role_access` values('108','4','0','15');");
E_D("replace into `fanwe_role_access` values('109','4','0','46');");
E_D("replace into `fanwe_role_access` values('110','4','0','47');");
E_D("replace into `fanwe_role_access` values('111','4','0','108');");
E_D("replace into `fanwe_role_access` values('112','4','0','45');");
E_D("replace into `fanwe_role_access` values('113','4','0','44');");
E_D("replace into `fanwe_role_access` values('114','4','0','51');");
E_D("replace into `fanwe_role_access` values('115','4','0','101');");
E_D("replace into `fanwe_role_access` values('116','4','0','100');");
E_D("replace into `fanwe_role_access` values('117','4','0','39');");
E_D("replace into `fanwe_role_access` values('118','4','0','36');");
E_D("replace into `fanwe_role_access` values('119','4','0','37');");
E_D("replace into `fanwe_role_access` values('120','4','0','42');");
E_D("replace into `fanwe_role_access` values('121','4','0','52');");
E_D("replace into `fanwe_role_access` values('122','4','0','57');");
E_D("replace into `fanwe_role_access` values('123','4','0','118');");
E_D("replace into `fanwe_role_access` values('124','4','0','5');");
E_D("replace into `fanwe_role_access` values('125','4','0','48');");
E_D("replace into `fanwe_role_access` values('126','4','0','34');");
E_D("replace into `fanwe_role_access` values('127','4','0','117');");
E_D("replace into `fanwe_role_access` values('128','4','0','32');");
E_D("replace into `fanwe_role_access` values('129','4','0','33');");
E_D("replace into `fanwe_role_access` values('130','4','0','107');");
E_D("replace into `fanwe_role_access` values('131','4','0','54');");

require("../../inc/footer.php");
?>