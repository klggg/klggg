<?php
$url = '/index.php?r=gamesites&gname=zqjl';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();