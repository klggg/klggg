<?php
$url = 'http://g.sdo.com/mszj/index.php?t='.time();
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();