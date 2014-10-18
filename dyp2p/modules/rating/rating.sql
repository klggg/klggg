-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 02 月 01 日 14:23
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
-- 表的结构 `dw_rating_assets`
--

CREATE TABLE IF NOT EXISTS `dw_rating_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `assetstype` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `account` varchar(30) NOT NULL,
  `other` text NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_company`
--

CREATE TABLE IF NOT EXISTS `dw_rating_company` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '所属用户',
  `status` int(2) NOT NULL COMMENT '认证，0表示审核中，1表示通过，2表示未通过',
  `name` varchar(100) NOT NULL COMMENT '公司名称',
  `type` varchar(100) NOT NULL COMMENT '公司类型',
  `industry` varchar(100) NOT NULL COMMENT '所属行业',
  `office` varchar(100) NOT NULL COMMENT '工作职位',
  `rank` varchar(100) NOT NULL COMMENT '所属级别',
  `worktime1` varchar(100) NOT NULL COMMENT '服务开始时间',
  `worktime2` varchar(100) NOT NULL COMMENT '服务结束时间',
  `workyear` varchar(100) NOT NULL COMMENT '工作年限',
  `provename` varchar(30) NOT NULL COMMENT '证明人姓名',
  `provetel` varchar(30) NOT NULL COMMENT '证明人电话',
  `tel` varchar(100) NOT NULL COMMENT '电话',
  `address` varchar(200) NOT NULL COMMENT '公司地址',
  `weburl` varchar(100) NOT NULL COMMENT '网址',
  `remark` varchar(200) NOT NULL COMMENT '备注',
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='目前所在公司的资料' AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_contact`
--

CREATE TABLE IF NOT EXISTS `dw_rating_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `linkman2` varchar(30) NOT NULL COMMENT '联系人2',
  `relation2` varchar(30) NOT NULL COMMENT '联系人2关系',
  `phone2` varchar(30) NOT NULL COMMENT '联系人2手机',
  `linkman3` varchar(30) NOT NULL COMMENT '联系人3',
  `relation3` varchar(30) NOT NULL COMMENT '联系人3关系',
  `phone3` varchar(30) NOT NULL COMMENT '联系人3手机',
  `qq` varchar(30) NOT NULL,
  `wangwang` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `other` varchar(30) NOT NULL COMMENT '其他联系方式',
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_educations`
--

CREATE TABLE IF NOT EXISTS `dw_rating_educations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '所属用户',
  `status` int(2) NOT NULL COMMENT '认证，0表示审核中，1表示通过，2表示未通过',
  `name` varchar(100) NOT NULL COMMENT '学校名称',
  `degree` varchar(100) NOT NULL COMMENT '学历',
  `in_year` varchar(100) NOT NULL COMMENT '入学时间',
  `professional` varchar(100) NOT NULL COMMENT '专业',
  `verify_userid` int(11) NOT NULL COMMENT '审核用户id',
  `verify_remark` varchar(200) NOT NULL COMMENT '审核备注',
  `verify_time` varchar(50) NOT NULL COMMENT '审核时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='教育背景' AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_finance`
--

CREATE TABLE IF NOT EXISTS `dw_rating_finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `type` int(11) NOT NULL,
  `use_type` int(2) NOT NULL COMMENT '1为收入，2为支出',
  `account` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `other` varchar(200) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_houses`
--

CREATE TABLE IF NOT EXISTS `dw_rating_houses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '所属用户',
  `status` int(2) NOT NULL COMMENT '认证，0表示审核中，1表示通过，2表示未通过',
  `name` varchar(100) NOT NULL COMMENT '公司名称',
  `address` varchar(250) NOT NULL COMMENT '所在地',
  `areas` varchar(200) NOT NULL COMMENT '房产面积',
  `in_year` varchar(100) NOT NULL COMMENT '建筑年份',
  `repay` varchar(100) NOT NULL COMMENT '供款状况',
  `holder1` varchar(100) NOT NULL COMMENT '所有权1',
  `right1` varchar(100) NOT NULL COMMENT '份额1',
  `holder2` varchar(100) NOT NULL COMMENT '所有权2',
  `right2` varchar(100) NOT NULL COMMENT '份额2',
  `load_year` varchar(100) NOT NULL COMMENT '贷款年限',
  `repay_month` varchar(100) NOT NULL COMMENT '每月还款',
  `balance` varchar(100) NOT NULL COMMENT '还款金额',
  `bank` varchar(100) NOT NULL COMMENT '银行',
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='房产资料' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_info`
--

CREATE TABLE IF NOT EXISTS `dw_rating_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `sex` int(2) NOT NULL,
  `marry` int(2) NOT NULL,
  `children` int(2) NOT NULL,
  `income` int(2) NOT NULL,
  `dignity` int(2) NOT NULL COMMENT '身份',
  `remark` text NOT NULL COMMENT '自我简介',
  `edu` int(11) NOT NULL,
  `house` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `is_car` int(2) NOT NULL,
  `address` varchar(200) NOT NULL COMMENT '现居住地址',
  `phone` varchar(30) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `dw_rating_jobs`
--

CREATE TABLE IF NOT EXISTS `dw_rating_jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '所属用户',
  `status` int(2) NOT NULL COMMENT '认证，0表示审核中，1表示通过，2表示未通过',
  `name` varchar(100) NOT NULL COMMENT '公司名称',
  `department` varchar(50) NOT NULL COMMENT '部门',
  `office` varchar(200) NOT NULL COMMENT '职位',
  `in_year` varchar(100) NOT NULL COMMENT '入学时间',
  `prover` varchar(100) NOT NULL COMMENT '证明人',
  `prover_tel` varchar(100) NOT NULL COMMENT '证明人电话',
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='工作经历' AUTO_INCREMENT=5 ;
