<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: motion.inc.php 79 2012-04-16 10:06:12Z wangbin $
 */
if(submitcheck('motion_viewsubmit')) {
		if(!is_num($_GET['tid']) || !is_num($_GET['views'])){
			cpmsg($toolslang['motion_error'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'error');	
		}
		$_GET['tid'] = intval($_GET['tid']);
		$_GET['views'] = intval($_GET['views']);
		$threadtalbe = getallthreadtable();
		$tid = 0;
		foreach($threadtalbe as $value){
			$temptid = DB::result_first("SELECT tid FROM ".DB::table($value)." WHERE tid='".$_GET['tid']."'");
			if($temptid > 0){
				$thread = $value;	
			}
			$tid = ($tid || $temptid);
		}
		if(!$tid){
			cpmsg($toolslang['motion_emptytid'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'error');	
		}
		DB::update($thread,array('views' => $_GET['views']),"tid = $_GET[tid]");
		cpmsg($toolslang['motion_success'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'succeed');	
	} elseif(submitcheck('motion_hispostsubmit')) {
		if(!is_num($_GET['hispost']) || !is_num($_GET['fid'])){
			cpmsg($toolslang['motion_hiserror'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'error');	
		}
		$_GET['hispost'] = intval($_GET['hispost']);
		$_GET['fid'] = intval($_GET['fid']);
		$fidcount = DB::result_first("SELECT count(*) FROM ".DB::table('forum_forum')." WHERE fid = $_GET[fid]");
		if($fidcount == 0){
			cpmsg($toolslang['motion_nofid'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'error');	
		} else {
			DB::update('forum_forum',array('todayposts' => "$_GET[hispost]"),"fid = $_GET[fid]");
			cpmsg($toolslang['motion_success'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'succeed');	
		}
	}elseif(submitcheck('motion_yeshispostsubmit')) {
		if(!is_num($_GET['yesforumpost'])){
			cpmsg($toolslang['motion_hiserror'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'error');	
		}
		$_GET['yesforumpost'] = intval($_GET['yesforumpost']);
		$postdata = $_G['historyposts'] ? explode("\t", $_G['historyposts']) : array(0,0);
		$postdata[1] = intval($postdata[1]);
		$yesforumpost = $_GET['yesforumpost']."\t".$postdata[1];
		DB::query("UPDATE ".DB::table('common_setting')." SET svalue='$yesforumpost' WHERE skey='historyposts'");
		save_syscache('historyposts', $yesforumpost);
		cpmsg($toolslang['motion_success'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'succeed');	
	}elseif(submitcheck('motion_linesubmit')) {
		if(!is_num($_GET['online']) || !is_num($_GET['invisible'])){
			cpmsg($toolslang['motion_hiserror'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'error');	
		}
		$_GET['online'] = intval($_GET['online']);
		$_GET['invisible'] = intval($_GET['invisible']);

		$mintime = 100;	// 在线的最小值(秒)
		$maxtime = 1800;// 在线的最大值(秒)
		$actionarray = array("0","0","1","1","2","191","1","2","2","2","31","51");	//虚拟用户动作
		$timeout = time() - $cooktime;	//超时时间
		DB::delete('common_session',"ip1='000' AND lastactivity <='$timeout'");	//删除超时的虚拟用户
		$query = DB::query("SELECT fid FROM ".DB::table('forum_forum')." WHERE type = 'forum'");	//获取fid列表
		while($fidresult = DB::fetch($query)){
			$fidscope[] = $fidresult['fid']; 
		}
		$countmem = DB::fetch_first("SELECT count(*) FROM ".DB::table('common_member'));
		$query = DB::query("SELECT fid FROM ".DB::table('forum_forum')." WHERE type = 'forum'");	//获取fid列表
		while($fidresult = DB::fetch($query)){
			$onlinelist[] = $fidresult['fid']; 
		}
		foreach($onlinelist as $key => $value){	//处理虚拟会员UID列表
			if($key < $_GET['online']){
				if(DB::result_first("SELECT uid FROM ".DB::table('common_session')." WHERE uid = '$value'")){
					continue;	//已经登录，返回处理下一个会员
				}else{
					$randtime = mt_rand($mintime, $maxtime);
					$onlinetime = time() - $randtime;
					$onlineaction = $action_arr[mt_rand(0, count($actionarray))];
					$onlinefid = 0;
					if($onlineaction == '2') {
						$onlinefid = $fidscope[mt_rand(0, count($fidscope))];
					}
					$onlinesid = random(6); 
					
					$query = DB::fetch_first("SELECT uid,username,groupid FROM ".DB::table('common_member')." WHERE uid = '$value'");
					if(!empty($query)){
						$onlineuserdata = array(
							'sid' => $onlinesid,
							'ip1' => '000',
							'groupid' => $query[groupid],
							'lastactivity' => $onlinetime,
							'action' => $onlineaction,
							'fid' => $onlinefid,
							'uid' => $query[uid],
							'username' => $query[username],
							);
						DB::insert('common_session', $onlineuserdata);
					}
				}
			}
		}
		for($i=0;$i<$_GET['invisible'];$i++){
			$randtime = mt_rand($mintime, $maxtime);
			$onlinetime = time() - $randtime;
			$onlineaction = $action_arr[mt_rand(0, count($actionarray))];
			$onlinefid = 0;
			if($onlineaction == '2') {
				$onlinefid = $fidscope[mt_rand(0, count($fidscope))];
			}
			$onlinesid = random(6); 
			$onlineuserdata = array(
				'sid' => $onlinesid,
				'ip1' => '000',
				'groupid' => '7',
				'lastactivity' => $onlinetime,
				'action' => $onlineaction,
				'fid' => $onlinefid,
				'uid' => '0',
				'username' => '',
				);
			DB::insert('common_session', $onlineuserdata);
		}
		cpmsg($toolslang['motion_success'],"action=plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'succeed');	
	}
	
	showformheader("plugins&pmod=operation&cp=motion&operation=$operation&do=$do&identifier=$identifier",'submit');
	showtableheaders($toolslang['motion_threadclick']);
	showsetting($toolslang['motion_tid'],'tid','','text');
	showsetting($toolslang['motion_views'],'views','','text');
	showsubmit('motion_viewsubmit', $toolslang['submit']);
	showtablefooter();
	//historyposts
	showtableheaders($toolslang['motion_hispost']);
	showsetting($toolslang['motion_forumfid'],'fid','','text');
	showsetting($toolslang['motion_forumpost'],'hispost','','text');
	showsubmit('motion_hispostsubmit', $toolslang['submit']);
	showtablefooter();
	//historyposts
	showtableheaders($toolslang['motion_yeshispost']);
	showsetting($toolslang['motion_yeshispost'],'yesforumpost','','text');
	showsubmit('motion_yeshispostsubmit', $toolslang['submit']);
	showtablefooter();	
	//historyposts
	showtableheaders($toolslang['motion_line']);
	showsetting($toolslang['motion_online'],'online','','text');
	showsetting($toolslang['motion_offline'],'invisible','','text');
	showsubmit('motion_linesubmit', $toolslang['submit']);
	showtablefooter();
	showformfooter();	
?>