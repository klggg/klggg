<?php
$url = '/index.php?r=gamesites&gname=smzt';
//$url = $_SERVE['HTTP_HOST'].'/index.php?r=gamesites/smzt';
//$url = $_SERVE['HTTP_HOST'].'/index.php?r=gamesites&gid=800169500';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();