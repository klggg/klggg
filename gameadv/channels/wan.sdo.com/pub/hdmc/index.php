<?php
$url = '/index.php?r=gamesites&gname=hdmc';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();