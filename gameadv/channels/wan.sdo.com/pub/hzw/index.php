<?php
$url = '/index.php?r=gamesites&gname=hzw';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();