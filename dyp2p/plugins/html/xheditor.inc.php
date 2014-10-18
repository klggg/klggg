<?php
/**
 *  xheditor²å¼þÉÏ´«
 *
 *  Copyright(c) 2013 by jichu.com. All rights reserved
 *
*/


$_G['upimg']['file'] = "filedata";
$_G['upimg']['code'] = "articles";
$_G['upimg']['filesize'] = "2048";
$_G['upimg']['type'] = "article";
$_G['upimg']['user_id'] = $_G['user_id'];
$_G['upimg']['article_id'] = 1;
$uploadfiles = $upload->UpfileXheditorUpload($_G['upimg']);	
	
$err = "";
$msg = "''";
if (!is_array($uploadfiles)){
	$err = $uploadfiles;
}else{
	$targetPath = $uploadfiles["filename"];
	$localName = $uploadfiles["localName"];
}

$targetPath=jsonString($targetPath);
if($_REQUEST['immediate']=='1')$targetPath='!'.$targetPath;

$msg="{'url':'".$targetPath."','localname':'".jsonString($localName)."','id':'1'}";

echo "{'err':'".jsonString($err)."','msg':".$msg."}";


function jsonString($str)
{
	return preg_replace("/([\\\\\/'])/",'\\\$1',$str);
}
?>