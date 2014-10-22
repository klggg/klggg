<?php
//$url = $_SERVE['HTTP_HOST'].'/index.php?r=gamesites/gtj';
$url = '/index.php?r=gamesites&gname=gtj';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();