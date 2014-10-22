<?php
$url = '/index.php?r=gsite&gn=sq';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();