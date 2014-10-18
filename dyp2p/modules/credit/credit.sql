

CREATE TABLE IF NOT EXISTS `dw_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '会员ID',
  `credits` longtext NOT NULL COMMENT '总积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_credit_class`
--

CREATE TABLE IF NOT EXISTS `dw_credit_class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_credit_log`
--

CREATE TABLE IF NOT EXISTS `dw_credit_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL,
  `nid` varchar(200) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `addtime` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_credit_rank`
--

CREATE TABLE IF NOT EXISTS `dw_credit_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '等级名称',
  `nid` varchar(100) NOT NULL COMMENT '分类',
  `rank` varchar(50) DEFAULT '0' COMMENT '等级',
  `class_id` int(11) NOT NULL COMMENT '积分分类',
  `point1` int(11) DEFAULT '0' COMMENT '开始分值',
  `point2` int(11) DEFAULT '0' COMMENT '最后分值',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `remark` varchar(256) DEFAULT NULL COMMENT '备注',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='会员积分日志' AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_credit_type`
--

CREATE TABLE IF NOT EXISTS `dw_credit_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '积分名称',
  `nid` varchar(50) DEFAULT NULL COMMENT '积分代码',
  `code` varchar(50) NOT NULL COMMENT '模块',
  `status` int(2) NOT NULL COMMENT '状态',
  `class_id` varchar(50) NOT NULL COMMENT '分类',
  `value` int(11) DEFAULT '0' COMMENT '积分数值',
  `cycle` tinyint(1) DEFAULT '2' COMMENT '积分周期，1:一次,2:每天,3:间隔分钟,4:不限',
  `award_times` tinyint(4) DEFAULT NULL COMMENT '奖励次数,0:不限',
  `interval` int(11) DEFAULT '1' COMMENT '时间间隔，单位分钟',
  `remark` varchar(256) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ct_nid` (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='积分类型' AUTO_INCREMENT=27 ;
