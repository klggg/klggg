-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 02 月 06 日 10:54
-- 服务器版本: 5.1.59
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zaixiandai`
--

-- --------------------------------------------------------

--
-- 表的结构 `dw_account`
--

CREATE TABLE IF NOT EXISTS `dw_account` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户名称',
  `total` decimal(11,2) DEFAULT '0.00' COMMENT '资金总额',
  `income` decimal(11,2) NOT NULL COMMENT '收入',
  `expend` decimal(11,2) NOT NULL COMMENT '支出',
  `balance` decimal(11,2) NOT NULL COMMENT '可用金额',
  `balance_cash` decimal(11,2) NOT NULL COMMENT '可提现',
  `balance_frost` decimal(11,2) NOT NULL COMMENT '不可提现',
  `frost` decimal(11,2) NOT NULL COMMENT '冻结金额',
  `await` decimal(11,2) NOT NULL COMMENT '待收金额',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_balance`
--

CREATE TABLE IF NOT EXISTS `dw_account_balance` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) NOT NULL COMMENT '交易号',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `type` varchar(50) NOT NULL COMMENT '类型',
  `money` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL COMMENT '网站总金额',
  `balance` decimal(11,2) NOT NULL COMMENT '净赚余额',
  `income` decimal(11,2) NOT NULL COMMENT '收入',
  `expend` decimal(11,2) NOT NULL COMMENT '支出',
  `remark` text NOT NULL COMMENT '备注',
  `addtime` varchar(32) NOT NULL,
  `addip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='网站收入和支付' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_bank`
--

CREATE TABLE IF NOT EXISTS `dw_account_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(2) NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT '银行名称',
  `nid` varchar(50) NOT NULL,
  `litpic` varchar(255) DEFAULT NULL COMMENT '缩略图地址',
  `cash_money` varchar(100) DEFAULT NULL COMMENT '最高体现金额',
  `reach_day` int(11) NOT NULL COMMENT '到账日期',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='银行帐户' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_cash`
--

CREATE TABLE IF NOT EXISTS `dw_account_cash` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `account` varchar(50) DEFAULT '0' COMMENT '账号',
  `bank` varchar(302) DEFAULT NULL COMMENT '所属银行',
  `branch` varchar(100) DEFAULT NULL COMMENT '支行',
  `total` decimal(11,2) DEFAULT '0.00' COMMENT '总额',
  `credited` varchar(20) DEFAULT '0' COMMENT '到账总额',
  `fee` varchar(20) DEFAULT '0' COMMENT '手续费',
  `verify_userid` int(11) DEFAULT NULL,
  `verify_time` int(11) DEFAULT NULL,
  `verify_remark` varchar(250) DEFAULT NULL,
  `addtime` varchar(11) DEFAULT NULL,
  `addip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_ids` (`user_id`,`status`),
  KEY `user_idv` (`user_id`,`status`,`verify_userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='提现记录' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_log`
--

CREATE TABLE IF NOT EXISTS `dw_account_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) NOT NULL COMMENT '交易号',
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `type` varchar(100) DEFAULT NULL COMMENT '类型',
  `total` decimal(11,2) DEFAULT '0.00' COMMENT '总金额',
  `money` decimal(11,2) DEFAULT NULL COMMENT '操作金额',
  `income` decimal(11,2) DEFAULT '0.00' COMMENT '收入',
  `expend` decimal(11,2) DEFAULT '0.00' COMMENT '支出',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '可用余额',
  `balance_cash` decimal(11,2) NOT NULL COMMENT '可提现金额',
  `balance_frost` decimal(11,2) NOT NULL COMMENT '不可提现冻结金额',
  `frost` decimal(11,2) NOT NULL COMMENT '冻结金额',
  `await` decimal(11,2) NOT NULL COMMENT '待收金额',
  `to_userid` int(11) DEFAULT NULL COMMENT '交易对方',
  `remark` varchar(250) DEFAULT '0' COMMENT '备注',
  `addtime` varchar(11) DEFAULT NULL,
  `addip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='资金记录' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_payment`
--

CREATE TABLE IF NOT EXISTS `dw_account_payment` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `style` int(2) DEFAULT NULL,
  `config` longtext,
  `fee` int(10) DEFAULT '0',
  `fee_type` int(2) DEFAULT NULL,
  `max_money` int(10) DEFAULT NULL,
  `max_fee` int(10) DEFAULT NULL,
  `description` longtext,
  `order` smallint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_recharge`
--

CREATE TABLE IF NOT EXISTS `dw_account_recharge` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) DEFAULT NULL COMMENT '订单号',
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '金额',
  `fee` decimal(11,2) NOT NULL COMMENT '费用',
  `balance` decimal(11,2) NOT NULL COMMENT '实际到账余额',
  `payment` varchar(100) DEFAULT NULL COMMENT '所属银行',
  `return` text COMMENT '返回的数值',
  `type` varchar(10) DEFAULT '0' COMMENT '类型',
  `remark` varchar(250) DEFAULT '0' COMMENT '备注',
  `verify_userid` int(11) DEFAULT '0' COMMENT '审核人',
  `verify_time` varchar(11) DEFAULT NULL COMMENT '审核时间',
  `verify_remark` varchar(250) DEFAULT '' COMMENT '审核备注',
  `addtime` varchar(11) DEFAULT NULL,
  `addip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  KEY `user_id` (`user_id`),
  KEY `verify_userid` (`verify_userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='充值记录' AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_users`
--

CREATE TABLE IF NOT EXISTS `dw_account_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) NOT NULL COMMENT '交易号',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `type` varchar(50) NOT NULL,
  `money` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL COMMENT '用户总金额',
  `balance` decimal(11,2) NOT NULL COMMENT '余额',
  `income` decimal(11,2) NOT NULL COMMENT '收入',
  `expend` decimal(11,2) NOT NULL COMMENT '支出',
  `remark` text NOT NULL COMMENT '备注',
  `addtime` varchar(32) NOT NULL,
  `addip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='网站收入和支付' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_account_users_bank`
--

CREATE TABLE IF NOT EXISTS `dw_account_users_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `status` int(2) NOT NULL,
  `default_bank` int(2) NOT NULL COMMENT '默认银行，1为默认',
  `account` varchar(100) DEFAULT NULL COMMENT '账号',
  `paypassword` varchar(50) NOT NULL,
  `bank` varchar(50) DEFAULT NULL COMMENT '所属银行',
  `branch` varchar(100) DEFAULT NULL COMMENT '支行',
  `province` int(5) DEFAULT '0' COMMENT '省份',
  `city` int(5) DEFAULT '0' COMMENT '城市',
  `area` int(5) DEFAULT '0' COMMENT '区',
  `addtime` varchar(11) DEFAULT NULL,
  `addip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='银行帐户' AUTO_INCREMENT=10 ;
