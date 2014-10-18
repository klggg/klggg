<?
/******************************
 * $File: attestations.unstall.php
 * $Description: 卸载
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "DROP TABLE `{attestations}`, `{attestations_type}`;";
$mysql->db_querys($sql);

?>