<?php
$url = '/index.php?r=gamesites&gname=mhfx';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();