<?php
/* 
 * 验证码破解 测试
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

//得到post过来的图片数据 
if(empty($img_hex) || 'ggg' != $_POST['pwd'])
	die();

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
