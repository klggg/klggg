<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_credit`;");
E_C("CREATE TABLE `yyd_credit` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0' COMMENT '???ID',
  `credit` int(11) NOT NULL COMMENT '?????',
  `credits` longtext NOT NULL COMMENT '?????',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1963 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_credit` values('1921','1934','72','a:2:{i:0;a:2:{s:3:\"num\";s:2:\"17\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1922','1935','57','a:3:{i:0;a:2:{s:3:\"num\";s:1:\"7\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}i:2;a:2:{s:3:\"num\";s:2:\"50\";s:8:\"class_id\";N;}}');");
E_D("replace into `yyd_credit` values('1923','1936','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1924','1937','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1925','1938','-704','a:4:{i:0;a:2:{s:3:\"num\";s:2:\"11\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}i:2;a:2:{s:3:\"num\";s:5:\"-1000\";s:8:\"class_id\";s:1:\"3\";}i:3;a:2:{s:3:\"num\";s:3:\"280\";s:8:\"class_id\";N;}}');");
E_D("replace into `yyd_credit` values('1926','1939','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1927','1940','5','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"5\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1928','1941','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1929','1942','65','a:2:{i:0;a:2:{s:3:\"num\";s:2:\"15\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1930','1943','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1931','1944','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1932','1945','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1933','1946','15','a:2:{i:0;a:2:{s:3:\"num\";s:2:\"10\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1934','1947','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1935','1948','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1936','1949','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1937','1950','7','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"7\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1938','1951','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1939','1952','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1940','1953','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1941','1954','5','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"5\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1942','1955','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1943','1956','68','a:2:{i:0;a:2:{s:3:\"num\";s:2:\"18\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1944','1957','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1945','1958','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1946','0','0','a:0:{}');");
E_D("replace into `yyd_credit` values('1947','1959','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1948','1960','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1949','1961','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1950','1962','2','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"2\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1951','1963','2','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"2\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1952','1964','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1953','1965','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1954','1966','2','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"2\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1955','1967','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1956','1968','7','a:2:{i:0;a:2:{s:3:\"num\";s:1:\"7\";s:8:\"class_id\";s:1:\"6\";}i:1;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1957','1969','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1958','1970','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1959','1971','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1960','1972','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1961','1973','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");
E_D("replace into `yyd_credit` values('1962','1974','0','a:1:{i:0;a:2:{s:3:\"num\";s:2:\"30\";s:8:\"class_id\";s:1:\"4\";}}');");

require("../../inc/footer.php");
?>