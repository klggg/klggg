<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_email_active`;");
E_C("CREATE TABLE `yyd_users_email_active` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `addtime` varchar(32) NOT NULL,
  `addip` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1794 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_users_email_active` values('1762','1935','64868318@qq.com','1','1383793046','117.22.71.105');");
E_D("replace into `yyd_users_email_active` values('1763','1934','1582978230@qq.com','1','1383811149','60.55.40.4');");
E_D("replace into `yyd_users_email_active` values('1764','1936','btdyxhfw@163.com','1','1384134909','110.16.12.74');");
E_D("replace into `yyd_users_email_active` values('1765','1937','gongkepop@sina.com','1','1386143960','222.94.187.146');");
E_D("replace into `yyd_users_email_active` values('1766','1938','1027901300@qq.com','1','1386144501','222.94.187.146');");
E_D("replace into `yyd_users_email_active` values('1767','1940','728853482@qq.com','1','1386147865','222.94.187.146');");
E_D("replace into `yyd_users_email_active` values('1768','1942','401616060@qq.com','1','1387173400','171.216.224.45');");
E_D("replace into `yyd_users_email_active` values('1769','1944','yanqin@vip.sina.com','1','1387764063','124.65.129.102');");
E_D("replace into `yyd_users_email_active` values('1770','1945','dtybs_pll@163.com','1','1387767645','101.226.33.204');");
E_D("replace into `yyd_users_email_active` values('1771','1946','mmsbb@163.com','1','1389110497','211.162.34.19');");
E_D("replace into `yyd_users_email_active` values('1772','1947','363783736@qq.com','1','1389933791','125.85.41.236');");
E_D("replace into `yyd_users_email_active` values('1773','1949','swolves@yeah.net','1','1390490744','58.240.102.112');");
E_D("replace into `yyd_users_email_active` values('1774','1950','samax@126.com','1','1392859473','14.156.41.252');");
E_D("replace into `yyd_users_email_active` values('1775','1951','shuke@163.co.com','1','1392894578','180.153.206.37');");
E_D("replace into `yyd_users_email_active` values('1776','1952','13713356306@139.com','1','1392965988','14.221.105.92');");
E_D("replace into `yyd_users_email_active` values('1777','1953','790196829@qq.com','1','1392966006','14.18.168.6');");
E_D("replace into `yyd_users_email_active` values('1778','1954','228104223@qq.com','1','1392995840','59.36.84.249');");
E_D("replace into `yyd_users_email_active` values('1779','1955','371608908@qq.com','1','1393292509','27.24.141.41');");
E_D("replace into `yyd_users_email_active` values('1780','1956','39333715@qq.com','1','1393345737','14.127.24.153');");
E_D("replace into `yyd_users_email_active` values('1781','1957','724577201@qq.com','1','1393397234','121.13.249.10');");
E_D("replace into `yyd_users_email_active` values('1782','1958','173848751@qq.com','1','1393401688','14.29.90.13');");
E_D("replace into `yyd_users_email_active` values('1783','1959','2674615860@qq.com','1','1393550675','117.62.227.29');");
E_D("replace into `yyd_users_email_active` values('1784','1960','344136609@qq.com','1','1393551865','117.62.227.29');");
E_D("replace into `yyd_users_email_active` values('1785','1963','ddd@qq.com','1','1393575196','101.226.66.180');");
E_D("replace into `yyd_users_email_active` values('1786','1964','test123@qq.com','1','1393576401','180.153.201.79');");
E_D("replace into `yyd_users_email_active` values('1787','1965','415267408@qq.com','1','1393594908','183.42.247.94');");
E_D("replace into `yyd_users_email_active` values('1788','1967','505279601@qq.com','1','1393685995','121.15.220.137');");
E_D("replace into `yyd_users_email_active` values('1789','1968','refo@qq.com','1','1393769357','220.187.194.108');");
E_D("replace into `yyd_users_email_active` values('1790','1970','898181618@qq.com','1','1393913768','222.178.221.94');");
E_D("replace into `yyd_users_email_active` values('1791','1971','1195897920@qq.com','1','1393985477','125.88.77.22');");
E_D("replace into `yyd_users_email_active` values('1792','1972','2644380989@qq.com','1','1393985769','113.112.195.222');");
E_D("replace into `yyd_users_email_active` values('1793','1973','aamm126@126.com','1','1393987473','106.34.153.167');");

require("../../inc/footer.php");
?>