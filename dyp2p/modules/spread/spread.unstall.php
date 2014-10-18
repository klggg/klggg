<?php
/******************************
 * $File: admin.module.php
 * $Description: 模块类处理
 * $Author: hummer 
 * $Time:2011-11-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "DROP TABLE `{spread_user}`, `{spread_setting}`;";
$mysql->db_querys($sql);
