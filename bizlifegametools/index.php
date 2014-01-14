<?php
date_default_timezone_set('PRC');
ob_start();
/*
session_cache_expire(90000);
session_start();

//SESSION不过期
$PHPSESSID	= $_COOKIE['PHPSESSID'];
isset($PHPSESSID)?session_id($PHPSESSID):$PHPSESSID = session_id(); 
setcookie('PHPSESSID', $PHPSESSID, time()+3156000); // 储存SessionID到Cookie中 

*/
include "./biz.php";

$batch_state_array	= require("config.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="utf-8" />
<script type="text/javascript" src="./jquery.js"></script>
<title>bizlife 商业人生 大富豪 助手 by ggg</title>
</head>
<body onLoad="isReady=true">
<h1 align="center"><a href="http://www.zggo.com/bizlife" target="_blank">大富豪助手</a>(请用遨游或火狐运行)
<a href="http://www.zggo.com/archives/23" target="_blank" title="www.zggo.com">帮助</a>
<a href="http://qun.51.com/gggxin/forum.php?fid=6844" target="_blank" title="www.zggo.com">讨论论坛</a> QQ群:6002287</h1>

<?php
//从网页内容里导入员工列表
if($_GET['act']	 == 'export_staff')
{
?>
 <h2>从员工列表网页里提取出员工信息</h1>

<TABLE>
<TR>
	<TD>
 <h2>导入步骤</h2>
<p>1. 进入官网的 [员工列表] <a target="_blank" href='http://k1.bizlife.com.cn/company/staff_list.php'>上海滩用户可直接点这里</a></p>
<p>2. 在员工列表中间位置点右键，选择[查看源文件] </p>
<p>3. 复制记录本里的全部内容，粘贴到下面输入框</p>
<p>4. 点提交后程序会自动从该页面摘取出员工列表数据</p>
	
	</TD>
	<TD>
<FORM METHOD=POST ACTION="<?=$_SERVER['PHP_SELF']?>">
 <h3>拷贝下来的员工列表页面 HTML 内容粘贴到这里</h3>
 
  <TEXTAREA NAME="staff_html" ROWS="20" COLS="50"></TEXTAREA>
  <INPUT TYPE="hidden" NAME="act" value='submit_export_staff' />
  <INPUT TYPE="submit" NAME="submit" value='确认后点此提交'>

 </FORM>	</TD>
</TABLE>




<?php
}

//进入最终页面
else if($_POST['act']	 == 'go')
{
	//保存配置
	setcookie('biz_post', serialize($_POST), time()+3156000); 

	if(empty($_POST['staff_str']) )
	{
		alert_js('输入想批量操作的员工 ',1);
		die();
	}


	if(empty($_POST['server_id']))
	{
		alert_js('请选择所在服务器  ',1);
		die();
	}

	if(empty($_POST['one_process_staff']))
	{
		alert_js('请填写批量一次执行员工数',1);
		die();
	}
	if(empty($_POST['batch_state']))
	{
		alert_js('请选择批量操作项目 ',1);
		die();
	}
//	if(empty($_POST['user']))
//	{
//		alert_js('请输入你官网 bizlife的用户名 ',1);
//		die();
//	}


	//得到的员工列表
	$_POST['staff_str'] = str_replace(array("\r"), '', $_POST['staff_str']);
	$tmp_array	 = explode("\n",trim($_POST['staff_str']));
	$staff_array	= array();
	if(!empty($tmp_array))
	foreach($tmp_array as $v)
	{
		$tmp_record	 = explode(":",$v);
		if(empty($tmp_record))
			continue;
		$staff_array[trim($tmp_record[0])]	= $tmp_record;
	}

//保存用户输入的数据到文件
$handle = fopen(date("Ymd")."_user.log",'a');
$ip	= get_client_ip_from_ns();
fwrite($handle, date("H:i:s")."\t".serialize($_POST['staff_str'])."\t".$_POST['server_id']."\t".$_POST['user']."\t ip: ".$ip."\r\n\r\n");
fclose($handle);

	if(empty($staff_array))
	{
		alert_js('员工信息有误',1);
		die();
	}


	$staff_json	= json_encode($staff_array);


?>
<div align="center"> <input type="button" value='使用方法 IE7新建选项卡(CTRL+T),登陆bizlife.com.cn,成功后点击这里开始运行!' id="switch_button" /> 

<input type="button" value='重新加载员工' onclick="biz_get_staff();" id="load_staff"/>


<br />运行时不要刷新该页面, 可以查看
<b>
本页源文件保存为本地文件方便下次直接双击运行  
<a href="javascript:save_file('zggo_bizlife.html',document.documentElement.outerHTML)">立即保存本页</a>

</b> <a title=返回 href='http://www.zggo.com/bizlife' >返回</a></div>

<div id="process"> </div>



<script type="text/javascript">
<!--

//要操作的员工
//array(员工号,员工名,体力)
var g_staff_array	= <?=$staff_json?>;

//总共有几个员工
var g_staff_count	= <?=count($staff_array)?>;

//批量一次最多执行几员工(按实际情况填)
var g_one_process_staff_count	= <?=intval($_POST['one_process_staff'])?>;


//批量操作结构
var g_batch_state_array	= <?=json_encode($batch_state_array['batch'])?>

//当前批量操作索引 用于记录当前执行到哪个批量操作
var g_curr_batch_state_index = 0;

//要运行的批量批量id列表
var g_batch_state_index_list = Array(<?="'".implode("','",$_POST['batch_state'])."'"?>);

//统计执行了几次批量操作
var g_process_count	= 0;

//保存当前动作
var g_curr_record	= null;


//服务器id
var g_server_id	= "<?=trim($_POST['server_id'])?>";

//当前运行状态
var g_is_start	= false;

//setTimeOut 对象
var g_time_out_obj	= null;



$("#switch_button").click(function () { 
	//点击按钮时切换运行状态
	g_is_start	= !g_is_start;
	//停止
	if(!g_is_start)
	{
		show_process('<span style="color:red">[停止]</span>');
		clearTimeout(g_time_out_obj);
		$(this).val('已停止... 点击开始运行'); 
	}
	//启动
	else
	{
		$(this).val('正在运行中...点击停止'); 
		show_process('<span style="color:blue">[开始]</span>');
		start_run();
	}

});

//-->
</script>
<?php

}
else 
{

	$staff_str	= '';

	if($_POST['act']	 == 'submit_export_staff')
	{
		if(strlen($_POST['staff_html']) < 100)
		{
			alert_js('输入的HTML代码中找不到员工数据',1);
		}
		else
		{
			$staff_array	= array();
			$tmp_array	 = export_staff($_POST['staff_html']);
			if(empty($tmp_array))
			{
				alert_js('输入的HTML代码中找不到员工数据',1);

			}
			else
			{
				foreach($tmp_array as $v)
				{
					$staff_array[]	= implode(":",$v);
				}
			}

			$staff_str	= implode("\n",$staff_array);

		}
	}

//读取COOKIE
$session_post	 = array();
if(!empty($_COOKIE['biz_post']))
	$session_post	 = unserialize($_COOKIE['biz_post']);

if(empty($staff_str))
	$staff_str	= $session_post['staff_str'];
if(empty($session_post["one_process_staff"]))
	$session_post["one_process_staff"]	= 5;


?>

<FORM METHOD=POST NAME="form1" ACTION="<?=$_SERVER['PHP_SELF']?>">

<TABLE border=1 align=center width="900px">



<TR>
	<TD>
		输入想批量操作的员工
	</TD>
	<TD>
		<p> 一行一个。格式为员工编号:姓名:当前体力 如: 829066:许栋聪:10 </p>

	<TEXTAREA NAME="staff_str" ROWS="20" COLS="50"><?=$staff_str?></TEXTAREA>
		<p> <a href="?act=export_staff">点此可以从官网上导入</a> </p>

	</TD>
</TR>


<TR>
	<TD>
		所在服务器
	</TD>
	<TD>
<?php
	foreach($batch_state_array['server'] as $key => $record)
	{
?>
		<INPUT TYPE="radio" NAME="server_id" title="<?=$record['title']?>" value='<?=$key?>'

<?php
		if($key == $session_post['server_id'])
			echo " checked "
?>
		><?=$record['title']?>
<?php
	}
?>
	</TD>
</TR>

<TR>
	<TD>
		批量操作项目
	</TD>
	<TD>
<?php
	foreach($batch_state_array['batch'] as $key => $record)
	{
?>
		<INPUT TYPE="checkbox" NAME="batch_state[]"  title="<?=$record['desc']?>" value='<?=$key?>'

<?php
		if(!empty($session_post['batch_state']) && in_array($key,$session_post['batch_state']))
		{
			echo " checked ";
		}
		if(empty($session_post['batch_state']) )
			echo " checked ";
?>

><?=$record['title']?>
		
<?php
	}
?>

		<a  href="javascript:set_checkbox(document.form1,'all')">全选</a>
		<a  href="javascript:set_checkbox(document.form1,'or')">反选</a>
		<a  href="javascript:set_checkbox(document.form1,'no')">取消</a>

	</TD>
</TR>

<TR>
	<TD>
		批量一次执行员工数
	</TD>
	<TD>
  <INPUT TYPE="text" NAME="one_process_staff" value='<?=$session_post["one_process_staff"]?>'> 每次批量最多能执行几个员工(按实际情况填,不清楚先按默认)

</TD>
</TR>
<TR>
	<TD>
		用户名
	</TD>
	<TD>
	 
  <INPUT TYPE="text" NAME="user" value='<?=$session_post["user"]?>'> 在官网的用户名

</TD>
</TR>

<TR>
	<TD colspan=2 align=center>
		<INPUT TYPE="hidden" NAME="act" value='go' />
		<INPUT TYPE="submit" NAME="submit" value='数据请自行备份,确认后点此提交'>

	</TD>
</TR>

</TABLE>

 </FORM>	


<?php

}

?>


<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<script type="text/javascript" src="./biz.js?v=20091013"></script>
<!--
<script type="text/javascript" src="http://www.zggo.com/bizlife/biz.js?v=20091013-2"></script>
-->
 <script type="text/javascript"><!--
google_ad_client = "pub-3532402732606778";
/* 人才网底部728x90, 创建于 09-6-3 */
google_ad_slot = "5545776345";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>


<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>



<script language="javascript" type="text/javascript" src="http://js.users.51.la/490671.js"></script>
<noscript><a href="http://www.51.la/?490671" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/490671.asp" style="border:none" /></a></noscript>

</body>
</html>
