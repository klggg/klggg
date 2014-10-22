<?php
$url = '/index.php?r=gamesites&gname=rxsg2';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();