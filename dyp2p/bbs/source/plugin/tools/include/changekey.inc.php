<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: changekey.inc.php 79 2012-04-16 10:06:12Z wangbin $
 */

(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) && exit('Access Denied');
if(submitcheck('keysubmit')){
    $cpmessage = '';
    $localuc = 0;
    if(file_exists(DISCUZ_ROOT.'./uc_server/data/config.inc.php')){
    	require_once DISCUZ_ROOT.'./uc_server/data/config.inc.php';
    	$localuc = 1;
    }
    @loaducenter();
    //require_once DISCUZ_ROOT.'./uc_client/client.php';
    $key = array('uc_key','config_authkey','setting_authkey'); // UCenter通信KEY   Discuz! 安全KEY  Discuz!加密解密key
    foreach($key as $value){
    	if($value == 'uc_key'){
    		//echo $localuc;exit;
    		if(strexists(UC_API,$_G['siteurl']) && $localuc == 1){ //local ucenter
    			$newuc_mykey = UC_MYKEY;              //更新到UCenter配置文件
    			$newuc_uckey = UC_KEY;            //更新到UCenter配置文件
    			$newapp_authkey = generate_key();           //更新到 Discuz! UC配置文件
    			$newapp_appkey = authcode($newapp_authkey,'ENCODE',$newuc_mykey);   //更新到UCenter数据库
    			$newapp_appkey = daddslashes($newapp_appkey);
    			$uc_dbtablepre = UC_DBTABLEPRE;
    			$ucconfig = array($newapp_authkey,UC_APPID,UC_DBHOST,UC_DBNAME,UC_DBUSER,UC_DBPW,UC_DBCHARSET,$uc_dbtablepre,UC_CHARSET,UC_API,UC_IP);
    			$ucconfig = @implode('|',$ucconfig);
    			save_uc_config($ucconfig,DISCUZ_ROOT.'./config/config_ucenter.php');
				file_put_contents('xujiakun.txt',$uc_dbtablepre."UPDATE ".DB::table('applications')." SET authkey = '$newapp_authkey' WHERE appid = ".UC_APPID);
				$query = DB::query("UPDATE ".DB::table('ucenter_applications')." SET authkey = '$newapp_authkey' WHERE appid = ".UC_APPID);
    		} else {
    			$cpmessage .= $toolslang['nlocaluc'];
    		}
    	} elseif($value == 'config_authkey') {
    		/*$default_config = $_config = $_G['config'];
    		$authkey = substr(md5($_SERVER['SERVER_ADDR'].$_SERVER['HTTP_USER_AGENT'].$dbhost.$dbuser.$dbpw.$dbname.$username.$password.$pconnect.substr($timestamp, 0, 8)), 8, 6).random(10);
    		$_config['security']['authkey'] = $authkey;
    		$cpmessage .= $toolslang['resetauthkey'];
    		save_config_file('./config/config_global.php', $_config, $default_config);
    	} elseif($value == 'setting_authkey') {
    		$authkey = substr(md5($_SERVER['SERVER_ADDR'].$_SERVER['HTTP_USER_AGENT'].$dbhost.$dbuser.$dbpw.$dbname.$username.$password.$pconnect.substr($timestamp, 0, 8)), 8, 6).random(10);
    		DB::update('common_setting',array('svalue' => $authkey),"skey = 'authkey'");*/
    	} 
    }
    updatecache('setting');
    cpmsg($toolslang['changekey_update'].$cpmessage,"action=plugins&cp=changekey&pmod=safe&operation=$operation&do=$do&identifier=$identifier",'succeed');
}

loaducenter();
showformheader("plugins&cp=changekey&pmod=safe&operation=$operation&do=$do&identifier=$identifier");
showtipss($toolslang['changekey_tips']);
showtableheaders($toolslang['changekey']);
$uckey = substr(UC_KEY,0,5).'**********';
$config_authkey = substr($_G['config']['security']['authkey'],0,5).'**********';
showtablerow('','',$toolslang['nowuc_key'].' : '.$uckey);
//showtablerow('','',$toolslang['nowconfig_authkey'].' : '.$config_authkey);
showsubmit('keysubmit',$toolslang['changekey']);
showtablefooter();
?>