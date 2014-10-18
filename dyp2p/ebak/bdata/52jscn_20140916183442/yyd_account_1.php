<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_account`;");
E_C("CREATE TABLE `yyd_account` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) default '0' COMMENT '???????',
  `total` decimal(11,2) default '0.00' COMMENT '??????',
  `income` decimal(11,2) NOT NULL default '0.00' COMMENT '????',
  `expend` decimal(11,2) NOT NULL default '0.00' COMMENT '???',
  `balance` decimal(11,2) NOT NULL default '0.00' COMMENT '???????',
  `balance_cash` decimal(11,2) NOT NULL default '0.00' COMMENT '??????',
  `balance_frost` decimal(11,2) NOT NULL default '0.00' COMMENT '????????',
  `frost` decimal(11,2) NOT NULL default '0.00' COMMENT '????????',
  `await` decimal(11,2) NOT NULL default '0.00' COMMENT '???????',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_account` values('968','1934','53042.16','59263.12','6220.96','52531.16','57931.16','-5400.00','511.00','0.00');");
E_D("replace into `yyd_account` values('969','1935','19844.67','25050.00','5205.33','19844.67','24945.00','-5100.33','0.00','0.00');");
E_D("replace into `yyd_account` values('970','1938','97986.97','267083.62','169096.65','97470.97','164646.78','-67175.81','516.00','0.00');");
E_D("replace into `yyd_account` values('971','1937','2019.04','14120.00','12100.96','2019.04','4019.04','-2000.00','0.00','0.00');");
E_D("replace into `yyd_account` values('972','1940','12706.24','1038707.24','1026001.00','10906.24','38706.24','-27800.00','1800.00','0.00');");
E_D("replace into `yyd_account` values('973','0','-353.74','0.00','353.74','-353.74','-353.74','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('974','1948','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('975','1949','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('976','1946','100001.00','100001.00','0.00','99801.00','99801.00','0.00','200.00','0.00');");
E_D("replace into `yyd_account` values('977','1950','100.00','100.00','0.00','0.00','0.00','0.00','100.00','0.00');");
E_D("replace into `yyd_account` values('978','1952','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('979','1953','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('980','1954','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('981','1955','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('982','1956','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('983','1957','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('984','1958','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('985','1959','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('986','1960','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('987','1961','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('988','1962','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('989','1963','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('990','1964','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('991','1965','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('992','1966','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('993','1967','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('994','1968','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('995','1969','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('996','1970','100200.00','100200.00','0.00','100200.00','100200.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('997','1971','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('998','1972','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('999','1973','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");
E_D("replace into `yyd_account` values('1000','1974','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00');");

require("../../inc/footer.php");
?>