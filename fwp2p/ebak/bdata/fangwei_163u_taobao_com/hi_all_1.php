<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `hi_all`;");
E_C("CREATE TABLE `hi_all` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(255) NOT NULL,
  `a_key` varchar(255) NOT NULL,
  `a_disc` varchar(255) NOT NULL,
  `a_bottom` varchar(255) NOT NULL,
  `a_alipay` varchar(50) NOT NULL,
  `a_paykey` varchar(50) NOT NULL,
  `a_pid` varchar(50) NOT NULL,
  `a_alipayclass` varchar(1) NOT NULL,
  `a_tel` varchar(20) CHARACTER SET greek NOT NULL,
  `a_qq` varchar(20) NOT NULL,
  `a_www` varchar(20) NOT NULL,
  `s_jf` int(10) NOT NULL,
  `mysite` varchar(200) NOT NULL,
  `yjbl` varchar(10) NOT NULL,
  `fx` varchar(1) CHARACTER SET gb2312 NOT NULL,
  `user_top` text NOT NULL,
  `p_gs` int(3) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `hi_all` values('1','�ƽ�棨�Զ��Ƹ�����ϵͳ!','�ƽ�棨�Զ��Ƹ�����ϵͳ!','�ƽ�棨�Զ��Ƹ�����ϵͳ!','Copyright &#169; 2012-2013 ���ƽ�棨�Զ��Ƹ�����ϵͳ!��ƽ̨ ��Ȩ���� <script language=\"javascript\" type=\"text/javascript\" src=\"http://js.users.51.la/15836921.js\"></script>','xxxxxxx@qq.com','dkhdihnj5kjkljn5hklnhw2kjlklklnl4','5462132323232313','2','','123456','mall','1','127.0.0.1','0.0','0','<p class=\"hip\">\r\n        	1��������ר���ƹ����ӣ�������QQȺ�����͡���̳������...ֻҪ����ͨ����������������վע��ɹ������������ <span style=\"color:#ff0000; font-size:14px\">1����/��</span>��\r\n        </p>\r\n        <p class=\"hip\">\r\n2�������ƹ��������10�ˣ������������Ϊ��ʽ�ƹ��ߣ���ʼ��óɽ�50%������ɣ�\r\n        </p>\r\n        <p class=\"hip\">\r\n3�����˻��������Զһ���վ��ؾ�Ʒ�ɻ���Դ������ʵ�ִ�����1000������50000�ķ�Ծ�������ƹ�Ļ�Ա����ڱ�վ�����ֽ����ѣ�������Զ����50%������ɣ���ʱ�����֣�\r\n</p>\r\n','0');");

require("../../inc/footer.php");
?>