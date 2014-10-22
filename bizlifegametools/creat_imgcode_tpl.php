<?php
/* 
 * 验证码破解 测试
 * 2009-11-5 20:08
 * 得到模板字窜
 * 
 *
 *
 * */

include('imgcode_array.php');
include('imagecreatefrombmp.php');
include('imgcode.php');
//模板图片地址
$img_tpl_path	 = './imgcode_tpl/';


$biz_imgcode_obj	= new biz_imgcode();
$biz_imgcode_array_obj	= new biz_imgcode_array();

//背景色 白色
$back_color	= '255255255';

$all_tpl_array	= array();
echo '$imgcode_tpl_array	= array();',"\n";
//遍历所有图片
for($i=0; $i<2;$i++)
{

	$curr_img_path	= $img_tpl_path.$i.".bmp";
//	$curr_img_path	= $img_tpl_path."xxx_0.bmp";

	$biz_imgcode_obj->setUrl($curr_img_path);
	$img_obj	= $biz_imgcode_obj->imageCreate();

//取得图片中的一部份


//得到图片每个像素的颜色值,返回颜色值二组数组
	$color_array	= $biz_imgcode_obj->getImgIndexColor($img_obj);
//print_r($color_array);
	$color_array	= $biz_imgcode_array_obj->biz_removeNoise($color_array,$back_color);

	$tmp_array	 = array();
	foreach($color_array as $tmp_i => $rows)
	{
		$tmp_array[$tmp_i]	 = implode('',$rows);
	}

	$all_tpl_array[$i]	 = implode(' ',$tmp_array);

echo '$imgcode_tpl_array[',$i,']=\'',$all_tpl_array[$i],"';\n";
//break;
}


//	echo serialize($all_tpl_array);

//print_r($color_array);
//$img_obj	= $biz_imgcode_obj->creatImgFromArray($color_array);

// 输出图像
//header("Content-type: " . image_type_to_mime_type(IMAGETYPE_PNG));
//imagepng($img_obj);
//imagedestroy($img_obj);



