<?php
/* 
 * ��֤���ƽ� 
 * 2009-11-2 11:18
 * 
 *
 *
 * */

include('imagecreatefrombmp.php');
include('imgcode.php');
include('imgcode_array.php');
//ģ��ͼƬ��ַ
$img_tpl_path	 = './imgcode_tpl/';

//$curr_img_path	= $img_tpl_path."7.bmp";
//$curr_img_path	= "7.bmp";

$biz_imgcode_array_obj	= new biz_imgcode_array();
$biz_imgcode_obj	= new biz_imgcode();


$save_to	= "./temp_img/biz_code_".mt_rand(1, 100).".bmp";

$img_hex	= $_POST['img_hex'];

//������û�
$user_array	= array(
	'nie1076'	=> 'ֻɱ�˲�:5765051'
//	,'monopoly11'	=> 'ëë��:AM:3885999'
	,'sky22991001'	=> '���įD:13015995'
//	,'ggg'	=> 'ggg'
/*
	,'ruisheng536'	=> 'Īһ��:823053164'
	,'d_jt'	=> '��Ե:65253830'
	,'killer5023'	=> '����:80727326'
	,'t_t_t'	=> '@@@@@:781128842'
	,'jiangnan'	=> '��:466299971'
	,'wangyuxin2009'	=> '��������:61029772'
	,'zeliang'	=> 'H1N2_������:liangze1643@126.com'
	,'qq13106008'	=> '�e �X:sczhoupan@vip.qq.com'
	,'goodmood'	=> '�S�L:1152725875'
	,'lsmir2'	=> 'Yuan��Եȥ:21307369'
	,'coolsky'	=> '��׿�:190598994'
	,'zjt007'	=> '��������:190749332'
	,'6zzz'	=> '���ĺ���:395905092'
	,'jx222333678'	=> '����:513626919'
	,'tyler'	=> '��Ե:168155711'
	,'pengke'	=> '����Ԫ˧:77944602'
	,'13326592346'	=> '����һ��:435359043'
*/
	,'martincyl'	=> 'Nickelback:82895376 ��̳�м���Ա'
//	,'hs449836'	=> 'Key:449836 �����ˮ����Աhs7220705  2009-12-16 ����'
	,'jimts'	=> '0o��������:812740341 ��Ϸ��������Աkomsss  2009-12-17 ����'
	,'zhb2001995'	=> '�޴�����:442562323 ��̳�м���Ա 2009-12-17'
	,'ericlql'	=> '�׵�:229494993 ��̳�м���Ա 2009-12-17 '
	,'star12'	=> '��Թ����ı�:799019590 ���������� xingchun12 2009-12-17'
	,'33050612'	=> '����:33050612 ��ˮ���� hcxcyl 2009-12-17'
	,'super18'	=> '290259306 ��̳�м���Ա 290259306 2010-1-2'
	,'zhengyunlu'	=> '343189631 ��̳�м���Ա zhengyunlu 2010-1-2'
	,'zhujun'	=> '1550977 ��̳�м���Ա ��������� 2010-1-6'
	,'gmyhhl'	=> '��������:��̳�߼���Ա,���û�,���˽�� 2010-1-7 52952575'
	,'zgkzyq'	=> '��̳�м���Ա waiguatao,1099316251  2010-1-7'
	,'jiansii'	=> '��̳�м���Ա ye888ye,106494898  2010-1-11'
	,'heidaoshenlong'	=> '��̳�м���Ա 990358408   ,����  2010-1-16'
	,'zhenghb'	=> '��̳�м���Ա 24620355   ,���ڽ���Ư  2010-1-18'
	,'kidxiaohai'	=> '��̳�м���Ա jdxiaohai  363629668   ,12��ѩ����  2010-1-21'
	,'shouhu'	=> '���齻������  ��������� 1550977   zj 2010-1-22'
	,'mwjmwjmwj'	=> '��̳�м���Ա mwjmwj  138198780   ,�i  2010-1-22'
	,'jason'	=> '��̳�߼���Ա 84307880 laofei  2010-1-24'
	,'jerrywu'	=> ' ʹ�ý������������� ���� jerrywu2008 39907889 Jerry  2010-1-26'
	,'hewuju'	=> '��̳�м���Ա dafuhao  67031899  ������  2010-1-30'
	,'lmpan'	=> '��̳�м���Ա platinum  32199877   platinum  2010-2-2'

	//qqpyd
);

//�õ�post������ͼƬ���� 
if(empty($img_hex) ||  !array_key_exists($_POST['pwd'],$user_array))
{

//��¼ʹ����־
$file_log	= './log/error.log';
$fp_log = fopen($file_log, "a");
fwrite($fp_log, date("Y-m-d H:i:s")."\t".$_POST['pwd']."\n");
fclose($fp_log);
//	echo '0';
	echo '-1';
	die();
}

//��¼ʹ����־
$file_log	= './log/'.$_POST['pwd']."_".date("Y-m-d");
$fp_log = fopen($file_log, "a");
fwrite($fp_log, get_ip()."\t".date("Y-m-d H:i:s")."\n");
fclose($fp_log);


//д����ʱͼƬ�ļ�
file_put_contents($save_to,pack("H*", $img_hex));


//����ͼƬ������
//$img_url	  = 'http://k1.bizlife.com.cn/service/imgcode.php';
//$biz_imgcode_obj->down($img_url,$curr_img_path);


$biz_imgcode_obj->setUrl($save_to);
$img_obj	= $biz_imgcode_obj->imageCreate();

//�õ�ͼƬÿ�����ص���ɫֵ,������ɫֵ��������
$color_array	= $biz_imgcode_obj->getImgIndexColor($img_obj);

		//$color_array	= array(
		//  array(1,0,2,3,5)
		// ,array(1,7,9,9,5)
		// ,array(3,8,1,3,5)
		//
		//);


//��׼ͼƬģ��
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
	// ����ȡ HTTP_CLIENT_IP, ��Ȼ���ֵ���Ա�α��, ����α��֮�� NS ��ѿͻ�����ʵ�� IP �����ں���
	$ip = empty($_SERVER["HTTP_CLIENT_IP"]) ? NULL : $_SERVER["HTTP_CLIENT_IP"];

	if ($proxy_override || !$ip) {
		// ���ȴӴ����ǻ�ȡ��ַ���� HTTP_CLIENT_IP û��ֵ
		$ip = empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["REMOTE_ADDR"] : $_SERVER["HTTP_X_FORWARDED_FOR"];
	}

	// ��ʵ��IP���Զ��ŷָ������һ��, ��Ȼ���û�ô���, ûα��IP, ��û�ж��ŷ����IP
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

//ȡ������С���鷢�ֺ�ĳ��ģ���������ƶ�>95 ����Ϊ�ҵ��������x->x+5 �� y->y+9 ����ȡ��Ȼ�����ƶ�����
//��һ���������ҵ���֤����ֵ�λ��
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


// ���ͼ��
//$img_obj	= $biz_imgcode_obj->creatImgFromArray($numb_one_array);
//header("Content-type: " . image_type_to_mime_type(IMAGETYPE_PNG));
//imagepng($img_obj);
//imagedestroy($img_obj);
//
