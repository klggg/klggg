2.7;
ALTER table `%DB_PREFIX%deal` ADD max_loan_money double NOT NULL default '0';
INSERT INTO `%DB_PREFIX%role_node` VALUES (635, 'index', '借贷统计', 1, 0, 24, 120);
INSERT INTO `%DB_PREFIX%role_module` VALUES (120, 'Statistics', '借贷统计', 1, 0);
ALTER table  `%DB_PREFIX%deal` add `is_delivery` tinyint(1) NOT NULL;

DROP TABLE IF EXISTS `%DB_PREFIX%promote_msg`;
CREATE TABLE `%DB_PREFIX%promote_msg` (
  `id` int(11) NOT NULL auto_increment,
  `type` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `send_status` tinyint(1) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `send_type_id` int(11) NOT NULL,
  `send_define_data` text NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%promote_msg_list`;
CREATE TABLE `%DB_PREFIX%promote_msg_list` (
  `id` int(11) NOT NULL auto_increment,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `msg_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `dest_idx` (`dest`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

UPDATE `%DB_PREFIX%conf` set `value` = replace(`value`,'短期周转','{$deal.type_info.name}') WHERE `name` = 'CONTRACT_0' OR `name` = 'CONTRACT_1';

DELETE FROM `%DB_PREFIX%role_node` WHERE id= '383' and `name`='第三方验证日志';

UPDATE `%DB_PREFIX%conf` set `value` = '2.7' where name = 'DB_VERSION';