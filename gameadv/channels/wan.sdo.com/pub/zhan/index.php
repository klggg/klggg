<?php
$url = '/index.php?r=gamesites&gname=zhan';
//$url = $_SERVE['HTTP_HOST'].'/index.php?r=gamesites&gid=800204200';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();