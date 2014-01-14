<?php
/*
//PID 码破解
//http://k1.bizlife.com.cn/service/xiaodao.php?s=Mzk3ZDRhOjU6e3M6MzoidWlkIjtzOjU6IjUxNzk5IjtzOjM6InBpZCI7czo4OiIyMDgwOTE5NSI7czo0OiJ0aW1lIjtpOjEyNTg5ODYzNTA7czo0OiJmaXgxIjtpOjE7czo0OiJmaXgyIjtpOjE7fTNhYzMw

echo get_pid('51799','20809195');
function get_pid($uid,$pid) {
//	$time	 = 1258985780;
	$time	 = time();
	$tmp_str	= serialize(array('uid'=>$uid,'pid'=>$pid,'time'=>$time,'fix1'=>1,'fix2'=>1));
	$md5_str	= md5($time);
	$ret_str	= substr($md5_str,0,5).$tmp_str.substr($md5_str,6,5);
	return base64_encode($ret_str);
}


*/

function get_client_ip_from_ns($proxy_override = false)
{
	// 首先取 HTTP_CLIENT_IP, 虽然这个值可以被伪造, 但被伪造之后 NS 会把客户端真实的 IP 附加在后面
	$ip = empty($_SERVER["HTTP_CLIENT_IP"]) ? NULL : $_SERVER["HTTP_CLIENT_IP"];

	if ($proxy_override || !$ip) {
		// 优先从代理那获取地址或者 HTTP_CLIENT_IP 没有值
		$ip = empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["REMOTE_ADDR"] : $_SERVER["HTTP_X_FORWARDED_FOR"];
	}

	// 真实的IP在以逗号分隔的最后一个, 当然如果没用代理, 没伪造IP, 就没有逗号分离的IP
	if ($p = strrpos($ip, ",")) {
		$ip = substr($ip, $p+1);
	}
	return trim($ip);
}

//根据网页内容导出员工表
//返回 array(员工id,员工名,体力) 的数组
//内容来自员工列表 例: 上海滩 :http://k1.bizlife.com.cn/company/staff_list.php?object_type=&action=&time_expired=&page=1&op=desc&orderby=level
//体力从大到小 http://k1.bizlife.com.cn/company/staff_list.php?object_type=&action=&time_expired=&page=1&op=desc&orderby=leftexec
function export_staff($tmpHtml) 
{
	//得到员工列表
	$tmpHtml	= get_center_str($tmpHtml,'id="div_scroll"','class="page_links"');
	if(!$tmpHtml)
		return;

	//去掉加粗干扰
	$tmpHtml = str_ireplace(array('<strong>','</strong>'), '', $tmpHtml);

	//提取姓名和员工号
	$pattern='/\<span \s*id=\"staff_name([^\>]+)\"\>([^\>]+)\</i';
	preg_match_all($pattern,$tmpHtml,$reg);
	if(empty($reg[1]) )
		return false;

	//提取体力
	$pattern='/当前体力：([0-9]+)\//i';
	preg_match_all($pattern,$tmpHtml,$sinew_reg);


//	print_r($sinew_reg);

	$staff_array	= array();
	$tmp_count	= count($reg[1]);
	for($i=0; $i<$tmp_count; $i++)
	{
//		$staff_array[]	= $reg[1][$i].'":"'.$reg[2][$i];
		$staff_array[$reg[1][$i]]	= array($reg[1][$i], $reg[2][$i],$sinew_reg[1][$i]);
	}
	return $staff_array;
//	return '{"'.implode('","',$staff_array).'"}';
}


//http://k1.bizlife.com.cn/company/volume_export.php?sids=744946,744956,744958,744967,744969,745121,745122,749073,749076,749080,754906,755854,768115,768141,806558,806837,833201,833202,836779,836790&state=5
//从批量执行的页面得到所有进程pid
function get_batch_pid($tmpHtml)
{
	$pattern='/show_doing\(([0-9]+)\,/i';
	preg_match_all($pattern,$tmpHtml,$reg);

	if(empty($reg[1]) )
		return false;
	return $reg[1];
}

//从正在执行的员工中得到小道任务
//pid 执行进程id	javascript:show_doing(14371465,'曹凤钰沟通中')
//$tmpHtml   点正在执行的员工后得到的HTMl内容 http://k1.bizlife.com.cn/progress_inner.php?pid=14368277 的html内容
//return 没小道任务返回false array('title'=>'任务名','url'=>'链接地址');
function get_xiaodaomsg($tmpHtml)
{
	//得到小道任务内容
	$get_html	= get_center_str($tmpHtml,'id="xiaodao"','</tr>');

	if(!$get_html)
		return false;

	//去掉干扰
	$tmpHtml = str_ireplace(array('target="_blank"',"target='_blank'"), '', $get_html);

	//得到内容中的网址
	$tmp_array	= get_content_url($tmpHtml);
	if(empty($tmp_array))
		return false;

	$ret_array	= array('title' => $tmp_array['title'][0],'url' => $tmp_array['url'][0]);

	return $ret_array;
}

//json格式的数据
function staff_to_str($tmpArray) {

	$staff_array	= array();
	foreach($tmpArray as $k=>$v)
	{
		$staff_array[]	= $k.':'.$v;
	}
	return implode("\n",$staff_array);
}

//json格式的数据
function staff_to_json($tmpArray) {

	$staff_array	= array();
	foreach($tmpArray as $k=>$v)
	{
		$staff_array[]	= $k.'":"'.$v;
	}
	return '{"'.implode('","',$staff_array).'"}';
}


	//js方式提示
	function alert_js($alert_msg,$back=0,$back_page=1)
	{
		print("<br><a title=返回上一页 href=javascript:history.back(-1) >上一页[Back]</a>");
		print("<script language=JavaScript>");
		if($alert_msg!=""){	print("alert('".$alert_msg."');");}
		if($back==1)printf("history.back(-".$back_page.")");//返回前一前
		else if($back==2)
		{
			printf("window.close();");//关闭窗口
		}
		print("</script>");
	}

//返回两段字符窜之间的内容
function get_center_str($context,$startStr,$endStr)
{
	$start_pos	= strpos($context,$startStr);
//	var_dump($start_pos);
	if($start_pos === false)
		return false;
	$start_pos	+= strlen($startStr);
	$end_pos	= strpos($context,$endStr,$start_pos);

/*
	echo $start_pos;
	echo " : ";
	echo $end_pos;
	echo " : ";
 */
	if(!$end_pos)
		return false;
	$str_length	= $end_pos - $start_pos;
	return substr($context,$start_pos,$str_length);
}

/*
    用于所有联接的函数 <a href=xxx>标题</a> 这样的内容
 */
function get_content_url($tmp,$aProperty="")
{
	$title_array    = array();
	if(empty($aProperty))
		$aProperty	= 'href';
	$pattern='/<a[\s\n]+'.$aProperty.'\=[\"\']?([^\>\'\"]+)[\"\']?\s*[^\>]*\>([^\>]+)\<\/a\>/i';
	preg_match_all($pattern,$tmp,$reg);
	return array('title'=>$reg[2],'url'=>$reg[1]);
}
