<?php
$url = '/index.php?r=gamesites&gname=dpcq';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();