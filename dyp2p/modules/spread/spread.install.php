<?
/******************************
 * $File: group.install.php
 * $Description: 群组
 * $Author: hummer 
 * $Time:2012-03-09
 * $Vesion:1.0
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
 ******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "

CREATE TABLE IF NOT EXISTS `yyd_spread_user` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
`user_id` INT( 11 ) NOT NULL COMMENT  '推广人',
`spread_userid` INT( 11 ) NOT NULL COMMENT  '推广客户',
`type` INT( 2 ) NOT NULL COMMENT  '1投资2借款3其他',
`addtime` VARCHAR( 30 ) NOT NULL ,
`addip` VARCHAR( 30 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;


CREATE TABLE IF NOT EXISTS `yyd_spread_setting` (
`id` INT( 11 ) NOT NULL ,
`admin_userid` INT( 11 ) NOT NULL COMMENT  '操作管理员',
`type` INT( 2 ) NOT NULL COMMENT  '1投资2借款3审核4其他',
`month` INT( 2 ) NOT NULL COMMENT  '月份',
`task` INT( 11 ) NOT NULL COMMENT  '任务额',
`task_fee` DECIMAL( 2, 2 ) NOT NULL COMMENT  '提成利率',
`task_first` INT( 11 ) NOT NULL COMMENT  '金额开始值',
`task_last` INT( 11 ) NOT NULL COMMENT  '金额结束值',
`addtime` VARCHAR( 30 ) NOT NULL ,
`addip` VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM ;
";

$mysql->db_querys($sql);
