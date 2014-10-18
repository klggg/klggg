<?php
$url = '/index.php?r=gamesites&gname=wlmz';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();