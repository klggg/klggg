<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_stylevar`;");
E_C("CREATE TABLE `pre_common_stylevar` (
  `stylevarid` smallint(6) unsigned NOT NULL auto_increment,
  `styleid` smallint(6) unsigned NOT NULL default '0',
  `variable` text NOT NULL,
  `substitute` text NOT NULL,
  PRIMARY KEY  (`stylevarid`),
  KEY `styleid` (`styleid`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_stylevar` values('1','1','menuhoverbgcolor','#005AB4 nv_a.png no-repeat 50% -33px');");
E_D("replace into `pre_common_stylevar` values('2','1','lightlink','#FFF');");
E_D("replace into `pre_common_stylevar` values('3','1','floatbgcolor','#FFF');");
E_D("replace into `pre_common_stylevar` values('4','1','dropmenubgcolor','#FEFEFE');");
E_D("replace into `pre_common_stylevar` values('5','1','floatmaskbgcolor','#000');");
E_D("replace into `pre_common_stylevar` values('6','1','dropmenuborder','#DDD');");
E_D("replace into `pre_common_stylevar` values('7','1','specialbg','#E5EDF2');");
E_D("replace into `pre_common_stylevar` values('8','1','specialborder','#C2D5E3');");
E_D("replace into `pre_common_stylevar` values('9','1','commonbg','#F2F2F2');");
E_D("replace into `pre_common_stylevar` values('10','1','commonborder','#CDCDCD');");
E_D("replace into `pre_common_stylevar` values('11','1','inputbg','#FFF');");
E_D("replace into `pre_common_stylevar` values('12','1','stypeid','1');");
E_D("replace into `pre_common_stylevar` values('13','1','inputborderdarkcolor','#848484');");
E_D("replace into `pre_common_stylevar` values('14','1','headerbgcolor','');");
E_D("replace into `pre_common_stylevar` values('15','1','headerborder','0');");
E_D("replace into `pre_common_stylevar` values('16','1','sidebgcolor',' vlineb.png repeat-y 0 0');");
E_D("replace into `pre_common_stylevar` values('17','1','msgfontsize','14px');");
E_D("replace into `pre_common_stylevar` values('18','1','bgcolor','#FFF background.png repeat-x 0 0');");
E_D("replace into `pre_common_stylevar` values('19','1','noticetext','#F26C4F');");
E_D("replace into `pre_common_stylevar` values('20','1','highlightlink','#369');");
E_D("replace into `pre_common_stylevar` values('21','1','link','#333');");
E_D("replace into `pre_common_stylevar` values('22','1','lighttext','#999');");
E_D("replace into `pre_common_stylevar` values('23','1','midtext','#666');");
E_D("replace into `pre_common_stylevar` values('24','1','tabletext','#444');");
E_D("replace into `pre_common_stylevar` values('25','1','smfontsize','0.83em');");
E_D("replace into `pre_common_stylevar` values('26','1','threadtitlefont','Tahoma,Helvetica,''SimSun'',sans-serif');");
E_D("replace into `pre_common_stylevar` values('27','1','threadtitlefontsize','14px');");
E_D("replace into `pre_common_stylevar` values('28','1','smfont','Tahoma,Helvetica,sans-serif');");
E_D("replace into `pre_common_stylevar` values('29','1','titlebgcolor','#E5EDF2 titlebg.png repeat-x 0 0');");
E_D("replace into `pre_common_stylevar` values('30','1','fontsize','12px/1.5');");
E_D("replace into `pre_common_stylevar` values('31','1','font','Tahoma,Helvetica,''SimSun'',sans-serif');");
E_D("replace into `pre_common_stylevar` values('32','1','styleimgdir','');");
E_D("replace into `pre_common_stylevar` values('33','1','imgdir','');");
E_D("replace into `pre_common_stylevar` values('34','1','boardimg','logo.png');");
E_D("replace into `pre_common_stylevar` values('35','1','available','');");
E_D("replace into `pre_common_stylevar` values('36','1','headertext','#444');");
E_D("replace into `pre_common_stylevar` values('37','1','footertext','#666');");
E_D("replace into `pre_common_stylevar` values('38','1','menubgcolor','#2B7ACD nv.png no-repeat 0 0');");
E_D("replace into `pre_common_stylevar` values('39','1','menutext','#FFF');");
E_D("replace into `pre_common_stylevar` values('40','1','menuhovertext','#FFF');");
E_D("replace into `pre_common_stylevar` values('41','1','wrapbg','#FFF');");
E_D("replace into `pre_common_stylevar` values('42','1','wrapbordercolor','#CCC');");
E_D("replace into `pre_common_stylevar` values('43','1','contentwidth','630px');");
E_D("replace into `pre_common_stylevar` values('44','1','contentseparate','#C2D5E3');");
E_D("replace into `pre_common_stylevar` values('45','1','inputborder','#E0E0E0');");
E_D("replace into `pre_common_stylevar` values('46','2','font','Tahoma,Helvetica,''SimSun'',sans-serif');");
E_D("replace into `pre_common_stylevar` values('47','2','fontsize','12px/1.5');");
E_D("replace into `pre_common_stylevar` values('48','2','titlebgcolor','#f5f9fb titlebg.png repeat-x 0 0');");
E_D("replace into `pre_common_stylevar` values('49','2','menuhoverbgcolor','#026890 nv_a.png no-repeat 50% -33px');");
E_D("replace into `pre_common_stylevar` values('50','2','lightlink','#FFF');");
E_D("replace into `pre_common_stylevar` values('51','2','floatbgcolor','#FFF');");
E_D("replace into `pre_common_stylevar` values('52','2','dropmenubgcolor','#FEFEFE');");
E_D("replace into `pre_common_stylevar` values('53','2','floatmaskbgcolor','#000');");
E_D("replace into `pre_common_stylevar` values('54','2','dropmenuborder','#DDD');");
E_D("replace into `pre_common_stylevar` values('55','2','specialbg','#f5f9fb');");
E_D("replace into `pre_common_stylevar` values('56','2','specialborder','#d5e9f2');");
E_D("replace into `pre_common_stylevar` values('57','2','commonbg','#F2F2F2');");
E_D("replace into `pre_common_stylevar` values('58','2','commonborder','#DFDFDF');");
E_D("replace into `pre_common_stylevar` values('59','2','inputbg','#FFF');");
E_D("replace into `pre_common_stylevar` values('60','2','stypeid','1');");
E_D("replace into `pre_common_stylevar` values('61','2','inputborderdarkcolor','#DFDFDF');");
E_D("replace into `pre_common_stylevar` values('62','2','headerbgcolor','');");
E_D("replace into `pre_common_stylevar` values('63','2','headerborder','0');");
E_D("replace into `pre_common_stylevar` values('64','2','sidebgcolor',' vlineb.png repeat-y 0 0');");
E_D("replace into `pre_common_stylevar` values('65','2','msgfontsize','14px');");
E_D("replace into `pre_common_stylevar` values('66','2','bgcolor','#FFF background.png repeat-x 0 0');");
E_D("replace into `pre_common_stylevar` values('67','2','noticetext','#F26C4F');");
E_D("replace into `pre_common_stylevar` values('68','2','highlightlink','#FF0000');");
E_D("replace into `pre_common_stylevar` values('69','2','link','#333');");
E_D("replace into `pre_common_stylevar` values('70','2','lighttext','#999');");
E_D("replace into `pre_common_stylevar` values('71','2','midtext','#666');");
E_D("replace into `pre_common_stylevar` values('72','2','tabletext','#444');");
E_D("replace into `pre_common_stylevar` values('73','2','smfontsize','0.83em');");
E_D("replace into `pre_common_stylevar` values('74','2','threadtitlefont','Tahoma,Helvetica,''SimSun'',sans-serif');");
E_D("replace into `pre_common_stylevar` values('75','2','threadtitlefontsize','14px');");
E_D("replace into `pre_common_stylevar` values('76','2','smfont','Arial');");
E_D("replace into `pre_common_stylevar` values('77','2','styleimgdir','template/singcere_note/src/img/');");
E_D("replace into `pre_common_stylevar` values('78','2','imgdir','');");
E_D("replace into `pre_common_stylevar` values('79','2','boardimg','logo.png');");
E_D("replace into `pre_common_stylevar` values('80','2','available','');");
E_D("replace into `pre_common_stylevar` values('81','2','headertext','#444');");
E_D("replace into `pre_common_stylevar` values('82','2','footertext','#666');");
E_D("replace into `pre_common_stylevar` values('83','2','menubgcolor','#026890 nv.png no-repeat 0 0');");
E_D("replace into `pre_common_stylevar` values('84','2','menutext','#FFF');");
E_D("replace into `pre_common_stylevar` values('85','2','menuhovertext','#FFF');");
E_D("replace into `pre_common_stylevar` values('86','2','wrapbg','#FFF');");
E_D("replace into `pre_common_stylevar` values('87','2','wrapbordercolor','#DFDFDF');");
E_D("replace into `pre_common_stylevar` values('88','2','contentwidth','630px');");
E_D("replace into `pre_common_stylevar` values('89','2','contentseparate','#d5e9f2');");
E_D("replace into `pre_common_stylevar` values('90','2','inputborder','#E0E0E0');");

require("../../inc/footer.php");
?>