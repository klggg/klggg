<?php
//$url = '/index.php?r=gamesites&gname=zqx';
$url = '/index.php?r=gsite&gn=xlfc';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();