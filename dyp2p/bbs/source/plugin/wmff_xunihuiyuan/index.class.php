<?php

/**
 *      [完美枫枫] (C)2012 wanmeiff.com .
 *      This is NOT a freeware, use is subject to license terms
 *      $Id: index.class.php 16620 2012-02-14 14:03:02Z wxy $
**/
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_wmff_xunihuiyuan {
	var $offset,$minmember,$onlinenum,$membercount,$onlineinfo,$onlinelist;
	
	function plugin_wmff_xunihuiyuan(){
		global $_G;
		$set = $_G['cache']['plugin']['wmff_xunihuiyuan'];
		$this->offset = $set['offset'];
		$this->offset_ml = $set['offset_ml'];
		$this->minmember = intval($set['minmember']);
		$this->onlinenum = intval($set['onlinenum']);
		$this->membercount = intval($set['membercount']);
		$this->onlineinfo = explode("|", $set['onlineinfo']);
		$this->onlinelist = explode("|", $set['onlinelist']);
		if($this->onlinenum < $this->minmember) $this->onlinenum = $this->minmember;
	}
}

class plugin_wmff_xunihuiyuan_forum extends plugin_wmff_xunihuiyuan {

	
	function index_wmff_xunihuiyuan_output() {
		global $onlinenum,$onlineinfo,$membercount,$guestcount;
		$this->realonlinenum = $onlinenum;
		if($this->offset == 1 && $onlinenum < $this->minmember){	//插件开关且当前在线人数 < 虚拟条件数时虚拟
			$onlinenum = empty($this->onlinenum)?$onlinenum:$this->num_operation($onlinenum,$this->onlinenum);	//虚拟当前在线人数
			$onlineinfo = array($this->onlineinfo[0], $this->onlineinfo[1]);	//虚拟历史最高记录
			if($this->offset_ml == 1){
				$guestcount = $onlinenum - $membercount;	//在线游客数
			}else{
				if($membercount < $this->membercount)$membercount = empty($this->membercount)?$membercount:$this->num_operation($membercount,$this->membercount);	//虚拟当前在线会员数
				$guestcount = $onlinenum - $membercount;	//虚拟在线游客数
			}
		}
	}
	
	function index_wmff_xunihuiyuan() {
		global $_G;
		$onlinenum = DB::result_first("SELECT count(*) FROM ".DB::table('common_session'));
		if($this->offset == 1 && $onlinenum < $this->minmember){	//插件开关且当前在线人数 < 虚拟条件数时虚拟
		
			if($this->offset_ml == 1){	//会员列表开关
				$mintime = 100;	// 在线的最小值(秒)
				$maxtime = 1800;// 在线的最大值(秒)
				$cooktime = 1800;// cookies有效期（秒）
				$actionarray = array("0","0","1","1","2","191","1","2","2","2","31","51");	//虚拟用户动作
				$timeout = time() - $cooktime;	//超时时间
			
				DB::delete('common_session',"ip1='000' AND lastactivity <='$timeout'");	//删除超时的虚拟用户
				
				$query = DB::query("SELECT fid FROM ".DB::table('forum_forum')." WHERE type = 'forum'");	//获取fid列表
				while($fidresult = DB::fetch($query)){
					$fidscope[] = $fidresult['fid']; 
				}
				
				foreach($this->onlinelist as $value){	//处理虚拟会员UID列表
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
			}else{
				foreach($this->onlinelist as $value){	//关闭会员列表时数据还原
					if(DB::result_first("SELECT uid FROM ".DB::table('common_session')." WHERE uid = '$value'")){
						DB::delete('common_session',"uid = '$value'");
					}
				}
			}
		}else{	//关闭插件时数据还原
			foreach($this->onlinelist as $value){
				if(DB::result_first("SELECT uid FROM ".DB::table('common_session')." WHERE uid = '$value' and uid !='".$_G['uid']."'")){
					DB::delete('common_session',"uid = '$value'");
				}
			}
		}
	}

	function num_operation($truedata, $virtualdata){
		return $truedata + $virtualdata;
	}
}
?>