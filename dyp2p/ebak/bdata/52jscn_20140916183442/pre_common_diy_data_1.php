<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_diy_data`;");
E_C("CREATE TABLE `pre_common_diy_data` (
  `targettplname` varchar(100) NOT NULL default '',
  `tpldirectory` varchar(80) NOT NULL default '',
  `primaltplname` varchar(255) NOT NULL default '',
  `diycontent` mediumtext NOT NULL,
  `name` varchar(255) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`targettplname`,`tpldirectory`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_diy_data` values('group/index','./template/default','group/index','a:3:{s:8:\"spacecss\";s:133:\"#portal_block_1 .dxb_bc {margin-left:0px !important;}#portal_block_2 .dxb_bc {font-size:14px !important;margin-left:10px !important;}\";s:10:\"layoutdata\";a:10:{s:4:\"diy1\";s:0:\"\";s:13:\"diycontenttop\";s:0:\"\";s:4:\"diy5\";a:1:{s:17:\"frame`frameS2ZEjl\";a:3:{s:4:\"attr\";a:4:{s:4:\"name\";s:11:\"frameS2ZEjl\";s:8:\"moveable\";s:4:\"true\";s:9:\"className\";s:28:\"frame move-span cl frame-1-1\";s:6:\"titles\";s:0:\"\";}s:23:\"column`frameS2ZEjl_left\";a:2:{s:4:\"attr\";a:2:{s:4:\"name\";s:16:\"frameS2ZEjl_left\";s:9:\"className\";s:18:\"column frame-1-1-l\";}s:20:\"block`portal_block_1\";a:1:{s:4:\"attr\";a:3:{s:4:\"name\";s:14:\"portal_block_1\";s:9:\"className\";s:15:\"block move-span\";s:6:\"titles\";s:0:\"\";}}}s:25:\"column`frameS2ZEjl_center\";a:2:{s:4:\"attr\";a:2:{s:4:\"name\";s:18:\"frameS2ZEjl_center\";s:9:\"className\";s:18:\"column frame-1-1-r\";}s:20:\"block`portal_block_2\";a:1:{s:4:\"attr\";a:3:{s:4:\"name\";s:14:\"portal_block_2\";s:9:\"className\";s:15:\"block move-span\";s:6:\"titles\";s:0:\"\";}}}}}s:13:\"diycommendtop\";s:0:\"\";s:14:\"diycategorytop\";s:0:\"\";s:16:\"diycontentbottom\";s:0:\"\";s:10:\"diysidetop\";s:0:\"\";s:13:\"diysidemiddle\";s:0:\"\";s:13:\"diysidebottom\";s:0:\"\";s:4:\"diy4\";s:0:\"\";}s:5:\"style\";s:0:\"\";}','','0','','0');");

require("../../inc/footer.php");
?>