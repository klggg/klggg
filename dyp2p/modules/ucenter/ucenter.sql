
DROP TABLE IF EXISTS `{ucenter}`;
CREATE TABLE IF NOT EXISTS `{ucenter}` (
	`user_id` INT NOT NULL,
	`uc_user_id` INT NOT NULL,
  PRIMARY KEY (`user_id`)) ENGINE=MyISAM;

CREATE TABLE `{ucenter_set}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY (`id`));