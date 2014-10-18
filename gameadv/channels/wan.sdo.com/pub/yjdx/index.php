<?php
//$url = $_SERVE['HTTP_HOST'].'/index.php?r=gamesites&gid=800141900';
$url = '/yqdx';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();