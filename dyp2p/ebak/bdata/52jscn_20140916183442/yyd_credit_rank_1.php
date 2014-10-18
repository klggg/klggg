<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_credit_rank`;");
E_C("CREATE TABLE `yyd_credit_rank` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL COMMENT '???????',
  `nid` varchar(100) NOT NULL COMMENT '????',
  `rank` varchar(50) default '0' COMMENT '???',
  `class_id` int(11) NOT NULL COMMENT '???????',
  `point1` int(11) default '0' COMMENT '??????',
  `point2` int(11) default '0' COMMENT '???????',
  `pic` varchar(100) default NULL COMMENT '??',
  `remark` varchar(256) default NULL COMMENT '???',
  `addtime` int(11) default NULL COMMENT '???????',
  `addip` varchar(30) default NULL COMMENT '????IP',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=gbk COMMENT='??????????'");
E_D("replace into `yyd_credit_rank` values('41','A','0.01','A','6','150','164','credit_a.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('40','B','0.015','B','6','135','149','credit_b.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('39','C','0.02','C','6','125','134','credit_c.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('38','D','0.025','D','6','115','124','credit_d.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('37','E','0.03','E','6','105','114','credit_e.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('36','HR','0.04','HR','6','0','104','credit_hr.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('7','1星','','','3','1','5','rank_1.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('8','二星','','二星','3','6','15','rank_2.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('11','四星','','四星','3','31','50','rank_4.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('10','三星','','三星','3','16','30','rank_3.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('12','五星','','五星','3','51','100','rank_5.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('13','一钻','','一钻','3','101','200','credit_zhuan_1.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('14','二钻','','二钻','3','201','400','credit_zhuan_2.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('15','三钻','','三钻','3','401','700','credit_zhuan_3.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('16','四钻','','四钻','3','701','1000','credit_zhuan_4.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('17','五钻','','五钻','3','1001','1500','credit_zhuan_5.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('18','一皇冠','','一皇冠','3','1501','2000','credit_huang_1.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('19','二皇冠','','二皇冠','3','2001','2600','credit_huang_2.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('20','三皇冠','','三皇冠','3','2601','3700','credit_huang_3.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('21','四皇冠','','四皇冠','3','3701','4500','credit_huang_4.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('22','五皇冠','','五皇冠','3','4501','10000','credit_huang_5.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('23','一红冠','','一红冠','3','10001','20000','credit_s31.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('24','二红冠','','二红冠','3','20001','40000','credit_s32.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('25','三红冠','','三红冠','3','40001','70000','credit_s33.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('26','四红冠','','四红冠','3','70001','100000','credit_s34.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('27','五红冠','','五红冠','3','100001','150000','credit_s35.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('28','一金冠','','一金冠','3','150001','200000','credit_crown_1.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('29','二金冠','','二金冠','3','200001','260000','credit_crown_2.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('30','三金冠','','三金冠','3','260001','370000','credit_crown_3.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('31','四金冠','','四金冠','3','370001','450000','credit_crown_4.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('33','五金冠','','五金冠','3','450001','1000000','credit_crown_5.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('35','0星','','0星','3','-999999','0','rank_0.gif','',NULL,NULL);");
E_D("replace into `yyd_credit_rank` values('42','AA','0','AA','6','165','999999','credit_aa.gif','',NULL,NULL);");

require("../../inc/footer.php");
?>