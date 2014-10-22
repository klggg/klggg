<?php
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问
$q = !isset($_REQUEST['q'])?"":$_REQUEST['q'];
$file = ROOT_PATH."/plugins/html/".$q.".inc.php";
if (file_exists($file)){
	include_once ($file);exit;
}

?>
