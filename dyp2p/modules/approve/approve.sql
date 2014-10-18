
CREATE TABLE IF NOT EXISTS `dw_linkages` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `nid` varchar(50) NOT NULL COMMENT '标识名',
  `value` text NOT NULL COMMENT '值',
  `status` smallint(2) unsigned DEFAULT '0' COMMENT '状态',
  `order` smallint(6) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `dw_linkages_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '类型名称',
  `nid` varchar(50) DEFAULT NULL COMMENT '类型标示名',
  `code` varchar(50) NOT NULL COMMENT '所属模块',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;
