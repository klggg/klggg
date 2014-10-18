<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_applications`;");
E_C("CREATE TABLE `pre_ucenter_applications` (
  `appid` smallint(6) unsigned NOT NULL auto_increment,
  `type` varchar(16) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `authkey` varchar(255) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `viewprourl` varchar(255) NOT NULL,
  `apifilename` varchar(30) NOT NULL default 'uc.php',
  `charset` varchar(8) NOT NULL default '',
  `dbcharset` varchar(8) NOT NULL default '',
  `synlogin` tinyint(1) NOT NULL default '0',
  `recvnote` tinyint(1) default '0',
  `extra` text NOT NULL,
  `tagtemplates` text NOT NULL,
  `allowips` text NOT NULL,
  PRIMARY KEY  (`appid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `pre_ucenter_applications` values('1','DISCUZX','Discuz! Board','http://demo.52jscn.com/bbs/','8271xVINh+4zq+lwrj3oEATH6QV+MQePWcJ8vD82LbmIgbXsFpW7o9nz3vQ9jmjsqHvBpMQd3oyIzIJCKeTEhxbtxZoE7zLirG9CYHedJ3/rxr0y7kxefLLp8IDi','','','uc.php','','','1','1','a:2:{s:7:\"apppath\";s:0:\"\";s:8:\"extraurl\";a:0:{}}','<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n	<item id=\"template\"><![CDATA[]]></item>\r\n</root>','');");
E_D("replace into `pre_ucenter_applications` values('2','OTHER','wangdai','http://demo.52jscn.com/modules/ucenter','ef76JRotpaNO+Re8UmF6JbWrF6AxFpHnEA0S/rH4lLc1kFEglvvzdAy9DtyfALeXWLWRh70d6W0HjN5KTCCPT6fsGl2YRZuP+IykNLbqoSVjw/rWGhFYtv+sHykv','','','uc.php','','','1','1','a:2:{s:7:\"apppath\";s:0:\"\";s:8:\"extraurl\";a:0:{}}','<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n	<item id=\"template\"><![CDATA[]]></item>\r\n</root>','');");

require("../../inc/footer.php");
?>