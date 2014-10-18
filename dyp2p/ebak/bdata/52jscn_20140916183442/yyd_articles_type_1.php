<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_articles_type`;");
E_C("CREATE TABLE `yyd_articles_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `contents` text NOT NULL,
  `order` int(11) NOT NULL default '10' COMMENT '????',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_articles_type` values('6','最新公告','publicnotice','0','','10');");
E_D("replace into `yyd_articles_type` values('10','常见问题','cjwt','11','','9');");
E_D("replace into `yyd_articles_type` values('11','帮助中心','help','0','','10');");
E_D("replace into `yyd_articles_type` values('12','新手上路','jczs','11','','12');");
E_D("replace into `yyd_articles_type` values('13','账户相关','zhxg','11','','10');");
E_D("replace into `yyd_articles_type` values('14','投资相关','tzxg','11','','10');");
E_D("replace into `yyd_articles_type` values('15','借款相关','jcxg','11','','10');");
E_D("replace into `yyd_articles_type` values('16','关于我们','aboutus','0','　朴客帝国   作为中国一批基于互联网的P2P信息咨询行业，高效、诚信、互惠互助的商业模式赢得了良好的用户口碑，朴客帝国P2P信息咨询系统不断升级，通过有效的用户模型和大规模的数据挖掘，逐步建立完善符合时代特征的金融风险定价体系，让人们有机会帮助到需要帮助的人并解决创业问题,帮助投资者及创业者更好地应对目前世界金融危机影响下的经济困境。<br />\r\n<br />\r\n <br />\r\n<br />\r\n   随着朴客帝国服务平台的不断升级，朴客帝国迈入飞速发展的快车道，朴客帝国严格遵守国家相关法律法规，在法律、法规规定的范围内为供需双方提供中介服务，促使民间借贷行为阳光化、合法化，从体制、机制上解决中小微企业的融资问题。同时,我们也将竭尽所能,不断完善对网站平台的管理,努力提升网站管理员的素质，竭诚为广大用户提供更优质的理财产品，更完善的服务为客户创造投资价值，本着诚信、公开、透明的服务理念，利用朴客帝国P2P信息咨询平台为广大的创业者共同打造一个诚信、公平、自由的互联网金融服务平台。<br />\r\n<br />\r\n <br />\r\n<br />\r\n   朴客帝国欢迎您的加入，为您共创美好的未来！<br />\r\n','11');");
E_D("replace into `yyd_articles_type` values('21','协议文本','xywb','11','','10');");
E_D("replace into `yyd_articles_type` values('22','审核相关','shxg','11','','10');");
E_D("replace into `yyd_articles_type` values('23','充值提现','qztx','11','','10');");
E_D("replace into `yyd_articles_type` values('29','会员专享','hyzx','11','','11');");
E_D("replace into `yyd_articles_type` values('30','媒体报道','reports','0','媒体报道','10');");
E_D("replace into `yyd_articles_type` values('31','热点问题','hotque','0','','10');");
E_D("replace into `yyd_articles_type` values('34','常见问题','sense','0','常见问题','10');");
E_D("replace into `yyd_articles_type` values('35','客服中心','kefu','0','','10');");
E_D("replace into `yyd_articles_type` values('38','法律文本','hetong','0','','10');");

require("../../inc/footer.php");
?>