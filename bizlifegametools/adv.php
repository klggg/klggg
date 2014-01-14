<?php
/*

在外面隔5分钟以上弹出广告
保证每次加载运行的广告都不一样

	1.得到当前ip
	2.查询一天内(24小时)指定类型ip的前三位在数据库已出现的次数
	3.出现次数的对应要弹出的广告，如找不到对应即不弹广告

表结构 adv_log
ip			广告类型	次数		时间


cookie 里记录了已弹窗的次数


CREATE TABLE `zggo_adv_log` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `ip` char(20) NOT NULL default '',
  `type` tinyint(2) unsigned NOT NULL default '0',
  `ip_key` char(20) NOT NULL default '',
  `affect_time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `type_ip` (`ip_key`,`affect_time`)
) ENGINE=MEMORY ;
*/


//<script type="text/javascript" src="http://123.sdo.com/tool/checkin/js/invoke.js"></script>

//新版商业大亨
$tmp_url	= get_jump_url('http://cluclick.leshu.com/pre.php?r=213_64_0');
$dafuhen_adv	= <<<EOF
<div style="width:760px; height:90px; overflow:hidden;"> 
	<div style="display:block; width:760px; height:90px; float:left; z-index:1;"> 
   	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="760" height="90"> 
            <param name="movie" value="http://image.leshu.com/lsimages/mat/ma_1065.swf" /> 
            <param name="quality" value="high" /> 
            <param name="wmode" value="transparent"> 
            <param name="wmode" value="opaque"> 
        <embed src="http://image.leshu.com/lsimages/mat/ma_1065.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="760" height="90" wmode="transparent"></embed> 
      </object> 
    </div> 
    <div style="float:left; margin-top:-90px; width:760px; height:90px; z-index:2;"><a href="{$tmp_url}" target="_blank" ><img src="http://image.leshu.com/lsimages/p.gif" width="760" height="90" border="0"  /></a></div> 
</div>

EOF;

//热血球球
$tmp_url	= get_jump_url('http://cluclick.leshu.com/pre.php?r=213_87_0');
$lexueqq_adv	= <<<EOF
<div style="width:760px; height:90px; overflow:hidden;"> 
	<a href="{$tmp_url}" target="_blank" ><img src="http://image.leshu.com/lsimages/mat/ma_1354.gif" width="760" height="90" border="0"  /></a> 
</div>		
EOF;

//航海之王
$tmp_url	= get_jump_url('http://cluclick.leshu.com/pre.php?r=213_80_0');
$hhzw_adv	= <<<EOF
<div style="width:760px; height:90px; overflow:hidden;"> 
	<div style="display:block; width:760px; height:90px; float:left; z-index:1;"> 

                                        
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="738" height="90">
		            <param name="movie" value="http://image.leshu.com/lsimages/mat/ma_1284.swf">
		            <param name="quality" value="high">
		            <param name="wmode" value="transparent">
		            <param name="wmode" value="opaque">
		        <embed src="http://image.leshu.com/lsimages/mat/ma_1284.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="738" wmode="transparent" height="90">
      				</object>

    </div> 
    <div style="float:left; margin-top:-90px; width:760px; height:90px; z-index:2;"><a href="{$tmp_url}" target="_blank" ><img src="http://image.leshu.com/lsimages/p.gif" width="760" height="90" border="0"  /></a></div> 
</div>

EOF;

$qudao_adv	= <<<EOF

<script type="text/javascript">
snda_qudao_sdqdid = 57;
snda_ad_id = 11;
snda_ad_width = 230;
snda_ad_height = 110;
</script>
<script type="text/javascript" src="http://qudao.snda.com/index.php?r=api/getAdDetail&n=1578114450&id=11"></script>
<script type="text/javascript" src="http://qudao.snda.com/js/show_ads.js"></script>

EOF;


//盛大178推广
$adv_snda_array	 = Array(

	'大唐行镖'=>'http://www.darkhutgame.com/index.php?controller=passport&action=register&gameid=1009&unid=924266015'
	,'神仙道'=>'http://tg.sdo.com/sxd/924266015'
	,'斗破苍穹'=>'http://tg.sdo.com/dpcq/924266015'
	,'神魔遮天'=>'http://tg.sdo.com/smzt/924266015'
	,'傲视天地'=>'http://tg.sdo.com/astd201204/924266015'
	,'一骑当先'=>'http://tg.sdo.com/yjdx/924266015'
	,'斗罗大陆'=>'http://tg.sdo.com/dldl/924266015'
	,'彩虹岛'=>'http://tg.sdo.com/chd/924266015'
	,'龙之谷'=>'http://tg.sdo.com/924266015'
	,'新英雄年代'=>'http://tg.sdo.com/924266015'
	,'热血传奇'=>'http://tg.sdo.com/924266015'
	,'传奇世界'=>'http://tg.sdo.com/924266015'
	,'传奇外传'=>'http://tg.sdo.com/924266015'
	,'剑侠世界'=>'http://tg.sdo.com/924266015'

	,'永恒之塔'=>'http://tg.sdo.com/aion201204/924266015'
	,'新热血英豪 '=>'http://tg.sdo.com/924266015'
	,' 浩方 '=>'http://tg.sdo.com/924266015'
	,'龙将'=>'http://www.my7399.net/lj/?gid=314&unid=17734'
	,'凡人修真2'=>'http://tg.sdo.com/frxz2/924266015'
	,'功夫小子'=>'http://tg.sdo.com/924266015'
	,'武装风暴'=>'http://tg.sdo.com/wzfb/924266015'
	,'龙剑'=>'http://www.my7399.net/long/?gid=430&unid=924266015'
	,'纵横天下'=>'http://tg.sdo.com/924266015'
	,'盛世三国'=>'http://www.my7399.net/reg/?gid=157&unid=924266015'
	,'二战'=>'http://www.my7399.net/2z/?gid=313&unid=17734'
	,'鬼吹灯外传'=>'http://tg.sdo.com/924266015'
	,' 超级跑跑'=>'http://tg.sdo.com/924266015'

);


$rand_keys = array_rand($adv_snda_array, 25);
$adv_snda	= '<br> <br>';
foreach($rand_keys as $t_key)
{
	$adv_snda.= ' <a target="_blank"  href="'.($adv_snda_array[$t_key]).'" />'.$t_key.'</a> |  ';

}


$adv_arrays	= Array(
//	,'<a target="_blank" href="http://game.zggo.com" title="zggo"><img src="http://www.zggo.com/bizlife/zggo_banner2.gif" border="0" /></a>'

	'<a target="_blank" href="http://www.klggg.com" title="快乐3G在线影院"><img src="http://www.klggg.com/Public/images/klggg_banner.gif" border="0" /></a>',
	$adv_snda,



);


//广告的列表
/*
$adv_arrays	= Array(
	'<script type="text/javascript" src="http://u.9wee.com/clucode?id=108376" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=108375" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=108374" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=104276" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=104113" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=108378" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=108377" charset="utf-8"></script>'
	,'<script type="text/javascript" src="http://u.9wee.com/clucode?id=108379" charset="utf-8"></script>'
	,'<a target="_blank" href="http://bbtg.sdo.com/924266015"><img border=0  src="http://www.zggo.com/tmp/bambook.gif" title="电子墨阅读器" /></a>'
	);
*/
$adv_html	= $adv_arrays[array_rand($adv_arrays, 1)];



function get_jump_url($url) {
	return 'http://www.zggo.com/jump.php?url='.urlencode($url);
}
/*
if(isset($_COOKIE['biz_adv_open_time'])) {

	$biz_adv_open_time	= intval($_COOKIE['biz_adv_open_time'])+1;
}
else
	$biz_adv_open_time	= 0;


$adv_html	= '';

//打开次数小于广告列表数，进行弹窗
if($biz_adv_open_time < count($adv_arrays))
{
	//过期时间为当天晚上12点后
	$end_time=strtotime(date("Y-m-d 23:59:59"));
	//$exprie_time	= $end_time - time();

	setcookie("biz_adv_open_time",$biz_adv_open_time, $end_time); 



	//ie系列浏览器设置cookie会失败,再记到数据库里
//	$db_link = mysql_connect('localhost', 'root', 'ggg123');
	if (!$db_link) {
		die('Could not connect: ' . mysql_error());
	}
	

	$curr_ip	= get_ip();
	//得到ip的前三段
	$temp_pos	 = strrpos($curr_ip, '.');
	$ip_key	= substr($curr_ip,0,$temp_pos);



	//$db_tb	= 'ggg.zggo_adv_log';
	$db_tb	= 'gggxin2.zggo_adv_log';
	//得到当天当前帐号的弹窗次数
	$result = mysql_query('select count(*) as total_count from '.$db_tb.' where ip_key="'.$ip_key.'" and affect_time >'.strtotime(date("Y-m-d 00:00:01")),$db_link) or die("Invalid query: " . mysql_error());


	$row = mysql_fetch_assoc($result);
	$biz_adv_open_time = intval($row['total_count']);

	//还未满足弹出次数
	if($biz_adv_open_time < count($adv_arrays))
	{
		$insert_sql	 = 'insert into '.$db_tb.' (`ip`,`type`,`ip_key`,`affect_time`) values ("'.$curr_ip.'","'.$biz_adv_open_time.'","'.$ip_key.'",'.time().')';
		echo $insert_sql;
		$result = mysql_query($insert_sql,$db_link) or die("Invalid query: " . mysql_error());

		$adv_html	= $adv_arrays[$biz_adv_open_time];
	}

	mysql_close($db_link);

}
else
	$adv_html	= '';



var_dump(urlencode($adv_html));



//-------------------------
function get_ip($proxy_override = false)
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
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="utf-8" />
<title>广告</title>

</head>
<body >


<!--
<script charset="utf-8" src="http://u.9wee.com/clucode?id=104230" type="text/javascript"></script>
-->
<?php
echo $adv_html;

?>

<iframe frameborder="0" marginheight="0" marginwidth="0" border="0" scrolling="no" style="display:none" id="adv_iframe"   width="0" height="0"  src="http://www.baidu.com/s?wd=%D4%C6%C4%CF%C8%CB%B2%C5%CD%F8+%CE%A2%D5%D0%C6%B8"></iframe>


<div style="display:none;">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F33453265aa56ee1f7d4d82332754176a' type='text/javascript'%3E%3C/script%3E"));
</script>

<script language="javascript" type="text/javascript" src="http://js.users.51.la/490671.js"></script>
<noscript>
<a href="http://www.51.la/?490671" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/490671.asp" style="border:none" /></a>
</noscript>
</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-846079-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</body>
</html>
