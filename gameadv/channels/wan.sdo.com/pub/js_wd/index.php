<?php
$url = '/index.php?r=xjwd&appid=991000212';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();