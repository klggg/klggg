<?
/******************************
 * $File: module.php
 * $Description: 模块类处理文件
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

/**
 * 如果模块为空的话则显示出文件夹里所有的模块
**/

if ($s == "uploadimg" || $s == "uploadannex"){
	include_once("upload.php");
}
?>