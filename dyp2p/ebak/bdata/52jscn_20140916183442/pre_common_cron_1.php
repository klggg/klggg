<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_cron`;");
E_C("CREATE TABLE `pre_common_cron` (
  `cronid` smallint(6) unsigned NOT NULL auto_increment,
  `available` tinyint(1) NOT NULL default '0',
  `type` enum('user','system') NOT NULL default 'user',
  `name` char(50) NOT NULL default '',
  `filename` char(50) NOT NULL default '',
  `lastrun` int(10) unsigned NOT NULL default '0',
  `nextrun` int(10) unsigned NOT NULL default '0',
  `weekday` tinyint(1) NOT NULL default '0',
  `day` tinyint(2) NOT NULL default '0',
  `hour` tinyint(2) NOT NULL default '0',
  `minute` char(36) NOT NULL default '',
  PRIMARY KEY  (`cronid`),
  KEY `nextrun` (`available`,`nextrun`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_cron` values('1','1','system','��ս��շ�����','cron_todaypost_daily.php','1410891531','1410969600','-1','-1','0','0');");
E_D("replace into `pre_common_cron` values('2','1','system','��ձ�������ʱ��','cron_onlinetime_monthly.php','1410891567','1412092800','-1','1','0','0');");
E_D("replace into `pre_common_cron` values('3','1','system','ÿ����������','cron_cleanup_daily.php','1410891563','1410903000','-1','-1','5','30');");
E_D("replace into `pre_common_cron` values('5','1','system','ÿ�չ�������','cron_announcement_daily.php','1410891534','1410969600','-1','-1','0','0');");
E_D("replace into `pre_common_cron` values('6','1','system','��ʱ��������','cron_threadexpiry_hourly.php','1410891529','1410894000','-1','-1','-1','0');");
E_D("replace into `pre_common_cron` values('7','1','system','��̳�ƹ�����','cron_promotion_hourly.php','1410891536','1410969600','-1','-1','0','00');");
E_D("replace into `pre_common_cron` values('8','1','system','ÿ����������','cron_cleanup_monthly.php','1410891568','1412114400','-1','1','6','00');");
E_D("replace into `pre_common_cron` values('9','1','system','�����Զ�����','cron_magic_daily.php','1410891540','1410969600','-1','-1','0','0');");
E_D("replace into `pre_common_cron` values('10','1','system','ÿ����֤�ʴ����','cron_secqaa_daily.php','1410891566','1410904800','-1','-1','6','0');");
E_D("replace into `pre_common_cron` values('11','1','system','ÿ�ձ�ǩ����','cron_tag_daily.php','1410891543','1410969600','-1','-1','0','0');");
E_D("replace into `pre_common_cron` values('12','1','system','ÿ��ѫ�¸���','cron_medal_daily.php','1410891544','1410969600','-1','-1','0','0');");
E_D("replace into `pre_common_cron` values('13','1','system','������ڶ�̬','cron_cleanfeed.php','1410891544','1410969600','-1','-1','0','0');");
E_D("replace into `pre_common_cron` values('14','1','system','ÿ�ջ�ȡ��ȫ����','cron_checkpatch_daily.php','1410891763','1410978120','-1','-1','2','22');");
E_D("replace into `pre_common_cron` values('15','1','system','��ʱ��������','cron_publish_halfhourly.php','1410891530','1410892200','-1','-1','-1','0	30');");
E_D("replace into `pre_common_cron` values('16','1','system','ÿ�ܹ㲥�鵵','cron_follow_daily.php','1410891546','1410976800','-1','-1','2','0');");
E_D("replace into `pre_common_cron` values('17','1','system','����ÿ�ղ鿴��','cron_todayviews_daily.php','1410891552','1410895200','-1','-1','3','0	5	10	15	20	25	30	35	40	45	50	55');");
E_D("replace into `pre_common_cron` values('18','0','system','ÿ���û����Ż�','cron_member_optimize_daily.php','0','1365570219','-1','-1','2','0	5	10	15	20	25	30	35	40	45	50	55');");
E_D("replace into `pre_common_cron` values('19','1','user','','cron_security_daily.php','1410891551','1410976800','-1','-1','2','0');");

require("../../inc/footer.php");
?>