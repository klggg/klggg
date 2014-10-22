<?php
/* 
 * 验证码破解 
 * 2009-11-2 11:18
 * 
 *
 *
 * */

include('imagecreatefrombmp.php');
include('imgcode.php');
include('imgcode_array.php');
//模板图片地址
$img_tpl_path	 = './imgcode_tpl/';

//$curr_img_path	= $img_tpl_path."7.bmp";
//$curr_img_path	= "7.bmp";

$biz_imgcode_array_obj	= new biz_imgcode_array();
$biz_imgcode_obj	= new biz_imgcode();


$save_to	= "./temp_img/biz_code_".mt_rand(1, 100).".bmp";

$img_hex	= $_POST['img_hex'];

//允许的用户
$user_array	= array(
	'nie1076'	=> '只杀菜菜:5765051'
//	,'monopoly11'	=> '毛毛雨:AM:3885999'
	,'sky22991001'	=> '汏壞疍:13015995'
//	,'ggg'	=> 'ggg'
/*
	,'ruisheng536'	=> '莫一兮:823053164'
	,'d_jt'	=> '无缘:65253830'
	,'killer5023'	=> '阿宾:80727326'
	,'t_t_t'	=> '@@@@@:781128842'
	,'jiangnan'	=> '喃喃:466299971'
	,'wangyuxin2009'	=> '得意洋洋:61029772'
	,'zeliang'	=> 'H1N2_发烧了:liangze1643@126.com'
	,'qq13106008'	=> '錯 覺:sczhoupan@vip.qq.com'
	,'goodmood'	=> '隨風:1152725875'
	,'lsmir2'	=> 'Yuan来缘去:21307369'
	,'coolsky'	=> '虬髯客:190598994'
	,'zjt007'	=> '涛心依旧:190749332'
	,'6zzz'	=> '天涯海角:395905092'
	,'jx222333678'	=> '文武:513626919'
	,'tyler'	=> '边缘:168155711'
	,'pengke'	=> '天鹏元帅:77944602'
	,'13326592346'	=> '温柔一刀:435359043'
*/
	,'martincyl'	=> 'Nickelback:82895376 论坛中级会员'
//	,'hs449836'	=> 'Key:449836 纯粹灌水管理员hs7220705  2009-12-16 申请'
	,'jimts'	=> '0o紫气东升:812740341 游戏交流管理员komsss  2009-12-17 申请'
	,'zhb2001995'	=> '无处不在:442562323 论坛中级会员 2009-12-17'
	,'ericlql'	=> '雷电:229494993 论坛中级会员 2009-12-17 '
	,'star12'	=> '抱怨不如改变:799019590 新手区版主 xingchun12 2009-12-17'
	,'33050612'	=> '断线:33050612 灌水版主 hcxcyl 2009-12-17'
	,'super18'	=> '290259306 论坛中级会员 290259306 2010-1-2'
	,'zhengyunlu'	=> '343189631 论坛中级会员 zhengyunlu 2010-1-2'
	,'zhujun'	=> '1550977 论坛中级会员 冰火玖重天 2010-1-6'
	,'gmyhhl'	=> '四六不靠:论坛高级会员,老用户,送了金币 2010-1-7 52952575'
	,'zgkzyq'	=> '论坛中级会员 waiguatao,1099316251  2010-1-7'
	,'jiansii'	=> '论坛中级会员 ye888ye,106494898  2010-1-11'
	,'heidaoshenlong'	=> '论坛中级会员 990358408   ,暴龙  2010-1-16'
	,'zhenghb'	=> '论坛中级会员 24620355   ,人在江湖漂  2010-1-18'
	,'kidxiaohai'	=> '论坛中级会员 jdxiaohai  363629668   ,12月雪花落  2010-1-21'
	,'shouhu'	=> '建议交流版主  冰火玖重天 1550977   zj 2010-1-22'
	,'mwjmwjmwj'	=> '论坛中级会员 mwjmwj  138198780   ,玦  2010-1-22'
	,'jason'	=> '论坛高级会员 84307880 laofei  2010-1-24'
	,'jerrywu'	=> ' 使用交流、问题求助 版主 jerrywu2008 39907889 Jerry  2010-1-26'
	,'hewuju'	=> '论坛中级会员 dafuhao  67031899  紫竹林  2010-1-30'
	,'lmpan'	=> '论坛中级会员 platinum  32199877   platinum  2010-2-2'

	//qqpyd
);

//得到post过来的图片数据 
if(empty($img_hex) ||  !array_key_exists($_POST['pwd'],$user_array))
{

//记录使用日志
$file_log	= './log/error.log';
$fp_log = fopen($file_log, "a");
fwrite($fp_log, date("Y-m-d H:i:s")."\t".$_POST['pwd']."\n");
fclose($fp_log);
//	echo '0';
	echo '-1';
	die();
}

//记录使用日志
$file_log	= './log/'.$_POST['pwd']."_".date("Y-m-d");
$fp_log = fopen($file_log, "a");
fwrite($fp_log, get_ip()."\t".date("Y-m-d H:i:s")."\n");
fclose($fp_log);


//写到临时图片文件
file_put_contents($save_to,pack("H*", $img_hex));


//下载图片到本地
//$img_url	  = 'http://k1.bizlife.com.cn/service/imgcode.php';
//$biz_imgcode_obj->down($img_url,$curr_img_path);


$biz_imgcode_obj->setUrl($save_to);
$img_obj	= $biz_imgcode_obj->imageCreate();

//得到图片每个像素的颜色值,返回颜色值二组数组
$color_array	= $biz_imgcode_obj->getImgIndexColor($img_obj);

		//$color_array	= array(
		//  array(1,0,2,3,5)
		// ,array(1,7,9,9,5)
		// ,array(3,8,1,3,5)
		//
		//);


//标准图片模板
$imgcode_tpl_array	= array();
$imgcode_tpl_array[0]='00011000 00111100 01100110 11000011 11000011 11000011 11000011 01100110 00111100 00011000';
$imgcode_tpl_array[1]='00110000 01110000 11110000 00110000 00110000 00110000 00110000 00110000 00110000 11111100';
$imgcode_tpl_array[2]='00111100 01100110 11000011 00000011 00000110 00001100 00011000 00110000 01100000 11111111';
$imgcode_tpl_array[3]='01111100 11000110 00000011 00000110 00011100 00000110 00000010 00000011 11000110 01111100';
$imgcode_tpl_array[4]='00000110 00001110 00011110 00110110 01100110 11000110 11111111 00000110 00000110 00000110';
$imgcode_tpl_array[5]='11111110 11000000 11000000 11011100 11100110 00000011 00000011 11000011 01100110 00111100';
$imgcode_tpl_array[6]='00111100 01100110 11000010 11000000 11011100 11100110 11000011 11000011 01100110 00111100';
$imgcode_tpl_array[7]='11111110 00000010 00000010 00000110 00001100 00011000 00110000 01100000 01000000 11000000';
$imgcode_tpl_array[8]='00111100 01100110 11000011 01100110 00111100 01100110 11000011 11000011 01100110 00111100';
$imgcode_tpl_array[9]='00111100 01100110 11000011 11000011 01100111 00111011 00000011 00000011 01100110 00111100';

$start_x	 = 0;
$start_y	 = 0;

//$start_x	 = 22;
//$start_y	 = 0;

//$start_x	 = 5 + $biz_imgcode_array_obj->getNumbWidth();

//$start_x	 = 41;
//$start_y	 = 6;


//echo '<img src="./tmp.bmp" /> <br />';

$ok_numb	= '';
$numb_four_array	= $biz_imgcode_array_obj->find_similar_numb($color_array,$imgcode_tpl_array,$start_x,$start_y);
$ok_numb.=$numb_four_array['numb' ];


$start_x	 = $numb_four_array['start_x'] + $biz_imgcode_array_obj->getNumbWidth()-1;
$numb_four_array	= $biz_imgcode_array_obj->find_similar_numb($color_array,$imgcode_tpl_array,$start_x,$start_y);
 $ok_numb.=$numb_four_array['numb' ];

$start_x	 = $numb_four_array['start_x'] + $biz_imgcode_array_obj->getNumbWidth();
$numb_four_array	= $biz_imgcode_array_obj->find_similar_numb($color_array,$imgcode_tpl_array,$start_x,$start_y);
$ok_numb.=$numb_four_array['numb' ];

$start_x	 = $numb_four_array['start_x'] + $biz_imgcode_array_obj->getNumbWidth();
$numb_four_array	= $biz_imgcode_array_obj->find_similar_numb($color_array,$imgcode_tpl_array,$start_x,$start_y);
$ok_numb.=$numb_four_array['numb' ];

echo($ok_numb);







//----------------------------


function get_ip()
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



//var_dump($numb_four_array);
//


//var_dump($numb_four_array);




//$finally_array[]	= key($numb_four_array['find_array']);

//print_r(implode("",$finally_array));

//$numb_one_array	= biz_get_numb($color_array,$start_x,$start_y,$max_width);
//$similar_array	= biz_find_similar($imgcode_tpl_array,$numb_one_array['color']);
//print_r($similar_array);

//取出来的小方块发现和某个模板数字相似度>95 即算为找到，否则从x->x+5 到 y->y+9 依次取，然后按相似度排序
//在一个区域内找到验证码出现的位置
//$numb_two_array	= biz_get_numb($color_array,$start_x,6,$max_width);
//$numb_three_array	= biz_get_numb($color_array,$start_x,2,$max_width);
//$numb_four_array	= biz_get_numb($color_array,$start_x,2,$max_width);
//

//print_r(biz_find_similar($imgcode_tpl_array,$numb_one_array));


//print_r(key(biz_find_similar($imgcode_tpl_array,$numb_one_array)));
//print_r(key(biz_find_similar($imgcode_tpl_array,$numb_two_array)));
//print_r(key(biz_find_similar($imgcode_tpl_array,$numb_three_array)));
//print_r(key(biz_find_similar($imgcode_tpl_array,$numb_four_array)));
//


// 输出图像
//$img_obj	= $biz_imgcode_obj->creatImgFromArray($numb_one_array);
//header("Content-type: " . image_type_to_mime_type(IMAGETYPE_PNG));
//imagepng($img_obj);
//imagedestroy($img_obj);
//
