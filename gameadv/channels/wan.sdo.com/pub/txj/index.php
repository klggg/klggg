<?php
$url = '/index.php?r=gsite&gn=txj';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();