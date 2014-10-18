<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: file_php.inc.php 79 2012-04-16 10:06:12Z wangbin $
 */

(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) && exit('Access Denied');
if(submitcheck('templatesubmit') || submitcheck('attsubmit') || submitcheck('staticsubmit') || submitcheck('othersubmit')) {
	$filelist = '';
	if($_GET['templatesubmit']) {
		findfile('./template',array('php'));
	} elseif($_GET['attsubmit']) {
		findfile('./data/attachment',array('php'));	
	} elseif($_GET['staticsubmit']) {
		findfile('./static',array('php'));	
	} elseif($_GET['othersubmit']) {
		findfile('./data',array('php'),array('attachment','template','threadcache','request','cache','log','plugindata'));
	}
}
showformheader("plugins&cp=file_php&pmod=safe&operation=$operation&do=$do&identifier=$identifier");
showtipss($toolslang['file_phptip']);
showtableheaders($toolslang['file_php']);
showsubmit('templatesubmit','submit',$toolslang['template_php']);
showsubmit('attsubmit','submit',$toolslang['attachment_php']);
showsubmit('staticsubmit','submit',$toolslang['static_php']);
showsubmit('othersubmit','submit',$toolslang['other_php']);
showtablefooter();
if(is_array($filelist) && count($filelist) > 0){
	showtableheader($toolslang['file_php_result']);
	showsubtitle(array('', $toolslang['file_path']));
	foreach($filelist as $value) {
		showtablerow('',array(),array('',realpath($value)));	
	}
	showtablefooter();	
}
?>