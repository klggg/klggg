<?php
<<<<<<< HEAD
=======

class CommonHelper {

	static private $_instance=null;
	static public $errorMsg=null;


	/**
	 * 获得唯一实例
	 *
	 * @param string $key
	 * @return obj
	 */
	static public function getInstance()
	{
		if(self::$_instance === null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	//转换编码
	static public function gbk2utf8($str)
	{
		// return iconv("gbk", "utf-8//IGNORE", $str);
        return mb_convert_encoding($str,"utf-8","gbk");
	}

	//转换编码
	static public function utf82gbk($str)
	{
		// return iconv("utf-8", "gbk//IGNORE", $str);
        return mb_convert_encoding($str,"gbk","utf-8");
	}

	/*
		取文件名 如  aaa.txt 返回  aaa
		注意如果是  aaa.bbb.txt ，返回是 aaa.bbb
	*/
	public static function subStrHead($fileName,$needle='.')//返回文件的名字
	{
		//从后往前找
		$currPos=strrpos($fileName, $needle);
		if(!$currPos)
			$currPos=strlen($fileName);
		return(substr($fileName,0,$currPos));//得到上传文件名字
	}

	/*
		取文件名扩展名 如  aaa.txt 返回  txt
		注意如果是  aaa.bbb.txt ，返回的也是 txt
	*/
	public static function subStrEnd($fileName,$needle ='.')//返回文件的扩展名
	{
		$fileExt='';
		if($currPos=strrpos($fileName, $needle))                //如果文件没有扩展名,文件名即为全文件,扩展名空
		{
			//文件名长度 - 找到的位置 - 间隔符长度
			$fileExt=substr($fileName,-(strlen($fileName) - $currPos - strlen($needle) ));
		}
		return($fileExt);                                 //返回扩展名
	}

    /**
     * 把csv格式的字符窜转为二维数组　　　
     *  aaa1    bbb1    ccc1
     *  aaa2    bbb2    ccc2
     *  转为  Array(
     *      Array("aaa1",“bbb1"
     *  )
     * Enter description here ...
     * @param string $str  需要转换的字符窜　　，一
     * @param string $rowKeys  一行里的数组每个字段映射的key值 Array('gameid'=>123,....) 注意要和列数保持一致
     * @param string $rowSplit  一行一条记录的隔符，默认以回车结尾
     * @param string $colSplit  一行里的字段分隔符　默认用逗号分隔
     */
    public static function csv2Array($str,$rowKeys=null,$rowSplit="\n",$colSplit=","){
    /* 
         $str	= <<<EOF
    gameid	game_area_id	sdid	game_member_name	game_team_name	cleartime
    1	1	8024	ggg	team	time
    1	2	8024	kl	team	time    
    EOF;
    
        
       $rowKeys    = Array('gameid','game_area_id','sdid','game_member_name','game_team_name','cleartime');
        $colSplit    = "\t";
     */
        $insert_array	= array();
        $str = trim($str);
        $tmp_array1	= explode($rowSplit,$str);
    //     var_dump($str);

        if(count($tmp_array1) < 1)
        {
            // $this->_errorMsg ="empty file ";
            return false;
        }


        
        $tmp_count	= 0;
        foreach ($tmp_array1 as $recode){
    
            $tmp_recode	= trim($recode);
    
            $tmp_count++;

    
            if(empty($tmp_recode))
                continue;

            $tmp_array2	= explode($colSplit,$tmp_recode);
    
            $tmp_array3	= Array();

            if( !empty ($rowKeys) && (count($tmp_array2) != count($rowKeys)) ){
                return false;
            }
 
            foreach($tmp_array2 as $tmp_key => $tmp_val)
            {
                if(!empty($rowKeys))
                {
                    $tmp_array3[$rowKeys[$tmp_key]]    = $tmp_val;
                }
                else
                    $tmp_array3[]    = $tmp_val;
            }

//            if(!empty($addRows)){
//                $tmp_array3 = $tmp_array3 + $addRows;
//            }

   
            //以游戏、区、帐号为key
            //$insert_array[$tmp_array3['gameid'].$tmp_array3['game_area_id'].$tmp_array3['sdid']]	= $tmp_array3;
            $insert_array[]	= $tmp_array3;
    
            //list($k,$v)	= explode("\t",$recode);
            //$a[$k]=$v;
        }
    
        // 		print_r($insert_array);
    
        return $insert_array;
    
    }
}





function _HTML_END($title,$msg,$alert_msg="")                       //出错退出程序函数,用于普通错误的提示
{
	printf("<html><head><link rel=stylesheet href=style.css></head><body>");
	printf("<script language=JavaScript>document.title='".$title."'</script>");
	printf("<table align=center height=300><tr align=left><td>");
	printf($msg."<a title=返回上一页 href=javascript:history.back(-1)> <font color=#ff0000>＜＜返回</font></a>");
	printf("</td></tr>");
	printf("<tr><td align=center>");
	printf("<a title=返回上一页 href=javascript:history.back(-1)><img src=".$GLOBALS[_BASE_PATH]."error.gif border=0></a>");
	printf("</td></tr></table>");
	$msg=eregi_replace("<[^\>]+>","",$msg);
	if($alert_msg!="")
	{
		printf("<script language=JavaScript>alert('".$alert_msg."');history.back(-1)</script>");
	}
	printf("</body></html>");
	exit();
	die();
}

function _MYSQL_END($title="Error",$msg)                    //出错退出程序函数,用于数据库错误的提示
{
	$errno = mysql_errno();                                  //得到错误信息代码
	$error = mysql_error();                                  //得到错误信息,两者一起起排错作用
	printf("<html><head><head><link rel=stylesheet href=style.css></head><title>".$title."</title></head><body><center>");
	printf($msg);
	printf("<br>Error: (".$errno.")".$error."<a title=返回上一页 href=javascript:history.back(-1)> <font color=#ff0000>＜＜返回</font></a><br></center>");
	printf("</body></html>");
	exit();
	die();
}

//把浏览器数据传递到另一页面的函数 注意必须存在表单

function submit_to($To_url,$url_test,$pop_test="",$main_form="main_form")                    
{
	printf("<a href=javascript:document.".$main_form.".submit() OnMouseDown='document.".$main_form.".action=\"".$To_url."\"' title='".$pop_test."'>".$url_test."</a>");
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\统计字符中某段asc码内的个数,返回一个整数\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function count_str($find_str,$start_ord,$end_ord="")				//自定义的统计字窜里字符函数,开始asc到结束的asc
{
	$tmp_len=0;
	for($tmp_i=0;$tmp_i<strlen($find_str);$tmp_i++)
	{
		//如果传递的第二参数不为空,统计 start -> end asc码的字符
		if($end_ord!="")
		{
			if(Ord($find_str[$tmp_i])>=$start_ord && Ord($find_str[$tmp_i])<=$end_ord)
			{
				$tmp_len++;
			}
		}
		else
		{
			if(Ord($find_str[$tmp_i])==$start_ord)
			{
				$tmp_len++;
			}
		}
	}
	return($tmp_len);	//把找到字符个数返回
}//count_str

function _SHOW_DEBUG($debug_msg,$att_msg="")                       //显示调试信息
{
	if($GLOBALS[_DEBUG_SURE])
	{
		print("<font color=#2B2968><div align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("<i>".$att_msg."</i> ".$debug_msg);
		print("</div></font>");
	}

}

/*
对某些一行内过长的字窜进行处理,保证每行的字符在 Len_of_row 以内
ls_str 
	字符窜,也即要处理的窜
Len_of_row 
	第行的字符个数
$input_str
	第行的分隔符
*/

function _MAKE_ROW_STR($tmp_str,$Len_of_row=100,$input_str="\n")                       //
{
	$tmp_str=str_replace("\r", "", $tmp_str);     //去linux下的换行 
	$tmp_str= explode("\n",$tmp_str);//以回车符切开符窜
	$temp_str="";
	for($tmp_i=0;$tmp_i<count($tmp_str);$tmp_i++)
	{
		$tmp_str[$tmp_i]=trim($tmp_str[$tmp_i]);
		if(strlen($tmp_str[$tmp_i])>$Len_of_row ) //找到超过限定长度
		{
			if(strpos($tmp_str[$tmp_i],$input_str)<$Len_of_row && strpos($tmp_str[$tmp_i],$input_str)>0)
			{
				$temp_str=substr($tmp_str[$tmp_i],0,strpos($tmp_str[$tmp_i],$input_str));
				if($tmp_str[$tmp_i+1]!="")
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],strpos($tmp_str[$tmp_i],$input_str)).$input_str.$tmp_str[$tmp_i+1];
				}
				else
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],strpos($tmp_str[$tmp_i],$input_str));
				}
				$tmp_str[$tmp_i]=$temp_str;
			}
			else
			{
				$temp_str=substr($tmp_str[$tmp_i],0,$Len_of_row);
				if($tmp_str[$tmp_i+1]!="")
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],$Len_of_row).$input_str.$tmp_str[$tmp_i+1];
				}
				else
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],$Len_of_row);
				}
				$tmp_str[$tmp_i]=$temp_str;
			}
		}
//		print("<br>".$tmp_i.":".count($tmp_str).":?".$tmp_str[$tmp_i]."|".$tmp_str[$tmp_i+1]."*<br>");
	}
	return(implode($input_str, $tmp_str));
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\取得定长字窜,解决半个汉字\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/*
$gb_str
	要取得定长的字窜
$str_len
	要取得字窜的长度
$sub_str
	被截后的字窜
$ngb_len
	统计出来的非汉字字符的个数
$asc_gb_start
	汉字开始的ASC码
$asc_gb_end
	汉字结束的ASC码

为什么出现半个汉字? 
原因1:我们如截的字窜里有1个字符不是汉字(a),也就是说.非汉字字符.有机奇数个 
原因2:我们所截的字窜长度是4,是偶数个字符 

我们想一下,如果所截的字窜里非汉字字符(像 a b 1 2  这样的)有奇数个,而我们截取的是偶数个字符, 
是不是很容易出现半个汉字,这时我们只要在这种情况下再多截一个字符就可解决问题了 


这里我只考滤字窜里的汉字都是完整的.也就是不存在半个汉字的情况.我想能输入半个汉字的可能性很少:)
其实只要满足这样的条件  
所截字符的长度  与  截取的字符内 包含非汉字字符的长度不为同 奇偶 
就表示有存在半个汉字的可能,这时我们就把所截的字窜长度加上1个字符,就可以避免半个汉字了. 
另当然要注意一下 非汉字字符的长度 为 1  这特殊情况 
*/
function get_gb_str($gb_str,$str_len,$asc_gb_start=160,$asc_gb_end=255)                 //自定义的统计字窜里字符函数,开始asc到结束的asc
{
	$sub_str=substr($gb_str,0,$str_len);//取得$str_len长度的字窜
	$ngb_len=strlen($sub_str)-count_str($sub_str,$asc_gb_start,$asc_gb_end);//得到字窜里有几个非汉字字符
//如果为同奇偶,加1,这里$ngb_len +2是为了除去$ngb_len 为  1  这特殊情况 
	if($ngb_len%2!=$str_len%2)
	{
		$str_len++;
	}
//	print($str_len);
//	print("<br>");
	return(substr($gb_str,0,$str_len));//把所截取的字窜返回
}

//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\跳转到指定页面\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function jumpto($jump_url,$intor="")
{
	if(trim($jump_url)=="")
	{
		return(-1);
	}

	print("
<table width='100%' border='0' cellspacing='0' cellpadding='0' height='95%' align='center'>
  <tr align='center' valign='middle'>
	<td>
	<table border='0' cellspacing='1' cellpadding='10' bgcolor='#555576' width='70%'>
	<tr>
		<td bgcolor='#FFFFFF' align='center'>
		<p> <font face='宋体, verdana, arial, helvetica' style='FONT-SIZE: 9pt' > ".$intor." <br><br> </font>
		
		<font face='宋体, verdana,arial,helvetica' style='FONT-SIZE: 9pt' >页面跳转中... <a href='".$jump_url."'>如果你不想等待点这里<br>
		(或者如果你的浏览器没有自动返回)</a> </font> </p></td>
	</tr>
	</table>
	</td>
</tr>
</table>
");

/*
		print("<span align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("页面载入中,请稍等...");
		print("</span><br>");
		print("如果你不愿等待,也可按此直接进入:<a href=".$jump_url.">".$jump_url.">>></a>");
*/
//		header("Location: {$url}");

	print("<script language=javascript>");
	print("location.replace('".$jump_url."')");
	print("</script>");
}
//$back_page表示后退几页
function alert_js($alert_msg,$back=0,$back_page=1)
{
	print("<a title=返回上一页 href=javascript:history.back(-1) >上一页[Back]</a>");
	print("<script language=JavaScript>");
	if($alert_msg!=""){	print("alert('".$alert_msg."');");}
	if($back==1)print("history.back(-".$back_page.")");//返回前一前
	else if($back==2)
	{
		print("window.close();");//关闭窗口
	}
	print("</script>");
}

/*
输出彩色字符
fcolor
	前景色
bcolor
	背景色


		print("<font color=#2B2968><div align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("<i>".$att_msg."</i> ".$debug_msg);
		print("</div></font>");

*/
function cprint($string,$fcolor,$bcolor="")
{
	$string=trim($string);
	if($string=="")
	{
		return(0);
	}
	if($fcolor!="")
	{
		print("<font color=#".$fcolor.">");
	}
	if($bcolor!="")
	{
		print("<span style='background-color: #".$bcolor."'>"); 
	}


	print($string);

	if($bcolor!="")
	{
		print("</span>");; 
	}

	if($fcolor!="")
	{
		print("</font>");
	}

}

/*  得到数组key与第 index 个value的内容,
 *  Exp:                $tf['user']="user|用户名|c"; 
 *  返回是一个一维数组
 * 将一维数组变成两个数组
 * $field_range
 * 字段标识,可以灵活取得指定字段进行显示
 * $need_sure
 * 	为0表示只取和字段标识不一样
 * 如
 * 	$tf['user']="user|用户名";
 * 变成　两个全局变量数组
 * 	$Table_Field['user']="user";      //保存字段变量
 * 	$Table_Field_c['user']="用户名";    //保存字段对应的中文信息
 * 传入的是一个数组

 */


function GetArrayKey($tf,$index=0,$field_range="",$need_sure=0)
{
	reset($tf);//指向数组头
	$Table_Field="";                         //表格的字段,是个一维数组,保存的是要查询的具体字段
	$Table_Field_c="";                       //表格的中文字段,是个一维数组,保存的是要查询的具体字段
	for($tmp_i=0;$tmp_i<count($tf);$tmp_i++)
	{
		$current_key=key($tf);//得到数组的索引
		$Field_tf=explode("|",$tf[$current_key]);
		if($field_range=="")
		{
			if($Field_tf[2]=="")                   //略过不要显示的字段
			{
				$Table_Field[$current_key]=$Field_tf[$index];      //保存字段变量
			}
		}
		else if($field_range=="all")
		{
				$Table_Field[$current_key]=$Field_tf[$index];      //保存字段变量
		}
		else
		{
			if($need_sure==0)
			{
				if(!strstr($Field_tf[2],$field_range))                   //略过不要显示的字段
				{
					$Table_Field[$current_key]=$Field_tf[$index];      //保存字段变量
				}
			}
			else
			{
				if(strstr($Field_tf[2],$field_range))                   //取得要显示的字段
				{
					$Table_Field[$current_key]=$Field_tf[$index];      //保存字段变量
				}
			}
		}
		next($tf);//移动数组指针
	}
	unset($Field_tf);
	unset($tf);
	return($Table_Field);//返回包含key的数组
}

/*
将一维数组变成两个数组
$field_range
	字段标识,可以灵活取得指定字段进行显示
$need_sure
	为0表示只取和字段标识不一样
如
	$tf['user']="user|用户名";
变成　两个全局变量数组
	$Table_Field['user']="user";      //保存字段变量
	$Table_Field_c['user']="用户名";    //保存字段对应的中文信息
传入的是一个数组
*/
function CutArray($tf,$field_range="",$need_sure=0)
{
	global $Table_Field;
	global $Table_Field_c;
	reset($tf);//指向数组头
	$Table_Field="";                         //表格的字段,是个一维数组,保存的是要查询的具体字段
	$Table_Field_c="";                       //表格的中文字段,是个一维数组,保存的是要查询的具体字段
	for($tmp_i=0;$tmp_i<count($tf);$tmp_i++)
	{
		$current_key=key($tf);//得到数组的索引
		$Field_tf=explode("|",$tf[$current_key]);
		if($field_range=="")
		{
			if($Field_tf[2]=="")                   //略过不要显示的字段
			{
				$Table_Field[$current_key]=$Field_tf[0];      //保存字段变量
				$Table_Field_c[$current_key]=$Field_tf[1];    //保存字段对应的中文信息
			}
		}
		else if($field_range=="all")
		{
				$Table_Field[$current_key]=$Field_tf[0];      //保存字段变量
				$Table_Field_c[$current_key]=$Field_tf[1];    //保存字段对应的中文信息
		}
		else
		{
			if($need_sure==0)
			{
				if(!strstr($Field_tf[2],$field_range))                   //略过不要显示的字段
				{
					$Table_Field[$current_key]=$Field_tf[0];      //保存字段变量
					$Table_Field_c[$current_key]=$Field_tf[1];    //保存字段对应的中文信息
				}
			}
			else
			{
				if(strstr($Field_tf[2],$field_range))                   //取得要显示的字段
				{
					$Table_Field[$current_key]=$Field_tf[0];      //保存字段变量
					$Table_Field_c[$current_key]=$Field_tf[1];    //保存字段对应的中文信息
				}
			}

		}
		next($tf);//移动数组指针
	}
	unset($Field_tf);
	unset($tf);
}

    


/***********函数GETFILE******
作用:得到远程文件，以形成缓冲文件
时间:2002-5-11
返回:布尔值
$local_file
	本地文件,用于保存远程网页的名字
$remote_file
	远程的文件名
$update_time
	//更新缓冲文件的间隔时间数.
$base_path
	原文件的目录
***********************************************/

function getfile($remote_file,$local_file,$base_path,$upata_time=3600)
{
//	_SHOW_DEBUG(filesize($local_file));
//$upata_time=1;
	print("aaaaaaaaaaa<br>");
	$current_time=time();//当前时间
	if(file_exists($local_file))//存在缓冲文件
	{
		$local_filesize=filesize($local_file);
		if($local_filesize<100)
		{
			_SHOW_DEBUG("local_filesize<100");
			unlink($local_file);
			return(false);
		}
		$file_time=filemtime($local_file);//得到文件的最后修改时间
		if(($current_time-$file_time)<$upata_time)//文件未过期
		{
			if($local_filesize<10)//这里其实是为了防止死循环.存在读本身的问题,递归
			{
				_SHOW_DEBUG("local_filesize<10");
				return(false);
			}
			else
			{
				_SHOW_DEBUG("该文件不需要更新!".($current_time-filemtime($local_file)));
				return(true);
			}
		}
	}
	$timeout=10;                                     //设定程序执行$timeout秒后退出,防止死循环

	if(!$remote_fp=fopen($remote_file,"r")) //!file_exists($remote_file) ||
	{
		_SHOW_DEBUG("打开远程文件".$remote_file."失败!");
		return(false);
	}

	if(!$local_fp=fopen($local_file,"w"))
	{
		_SHOW_DEBUG("打开本地文件".$local_file."失败!");
		fclose($remote_fp);
		return(false);
	}

//$remote_file="http://www.xh88.com/ggg/user_template/main.php?user=slp11";
//$remote_file="http://192.168.1.253/user_template/main.php?user=ye88";


//	print($remote_file);
//	die();

/*
	while(!feof($remote_fp))
	{
		print(fread($remote_fp,1000));
	}

*/

	fputs($local_fp,"<base href='".$base_path."'> ");//写入基址
/*	print($remote_file);


	if(!feof($remote_fp))
	{
		print("??");
		die();
	}
*/
	while(!feof($remote_fp))
	{
		if((time()-$current_time)>$timeout)                    //如果超时就强行退出
		{
			_SHOW_DEBUG("超过 PHP 程式执行时间:".$timeout."秒,程序中断!");
			if(file_exists($local_file))
			{
				unlink($local_file);
			}
			fclose($local_fp);
			fclose($remote_fp);
			return(false);
		}

		fputs($local_fp,fread($remote_fp,1000));
	}
	fclose($local_fp);
	fclose($remote_fp);
	_SHOW_DEBUG("用时".(time()-$current_time));
	return(true);
}




/*
 *    lang_translate
 *    功能:
 *           从数据库里查找到对应其他语言的翻译. 如  "中国"  对应的是 "china"
 *    $lang_former
 *           要翻译的字符窜
 *    
 *    $lang_type
 *           翻译成的类型                如  en 表示对应英文的翻译.
 *    
 *    $order
 *           翻译成的顺序                如把 order=1 :"中国"  翻译成 "china"  或把 "china"  翻译成 "中国"
 *    
 *    返回
 *           翻译好的字符窜,如果找不到返回原窜
 *    初始语言是 中文 ,把 中文翻译成其他的语言
 *    
*/
function lang_translate($lang_former,$lang_type,$order=1)
{
	if($order==1)
	{
		$Query="select lang_final as return_lan from chinatoolnet.lang_translate where lang_former='".$lang_former."' and lang_type='".$lang_type."'";
	}
	else
	{
		$Query="select lang_former as return_lan from chinatoolnet.lang_translate where and lang_final='".$lang_former."' and lang_type='".$lang_type."'";
	}
	$Query.=" and flag_deleted='N'";
	$result_lang= mysql_query($Query);
	if(!$result_lang)
	{
		_MYSQL_END("?","?");
	}
	$record_lang=mysql_fetch_array($result_lang);
	if($record_lang)
	{
		return(trim($record_lang[return_lan]));
	}
	else
	{
		return(trim($lang_former));
	}
}

/*  返回翻译成的字窜
 *   如 电钻,电锤,电刨 会被翻译成  aaa,bbb,ccc 的形式,库里找不到的不翻译
 *   翻译好的内容放于以 lang_former 为 关键字(key) 的全局数组里
 *
 *   lang_array  是一个数组指针,
 *
 *   调用方式 ***记住传递是的数组指针****
 *      get_lang(&$lang_array,"中国","en")
 *
 */

function get_lang($tmp_lang_array,$lang_former,$lang_type,$order=1)
{
	$tmp_array=split("[， ,　]",trim($lang_former));
	$tmp_string="";
	for($tmp_i=0;$tmp_i<count($tmp_array);$tmp_i++)
	{
		$tmp_array[$tmp_i]=trim($tmp_array[$tmp_i]);
		if($tmp_array[$tmp_i]=="")
			continue;


		if($tmp_lang_array[$tmp_array[$tmp_i]]=="")//没翻译过
		{
			$tmp_lang_array[$tmp_array[$tmp_i]]=lang_translate($tmp_array[$tmp_i],$lang_type,$order);
		}
		$tmp_string.=$tmp_lang_array[$tmp_array[$tmp_i]];

		if($tmp_i!=count($tmp_array)-1)
		{
			$tmp_string.=",";
		}

//		print($tmp_array[$tmp_i]);
//		print("<br>");
	}

	return($tmp_string);
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\产生select 表单的函数\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/*
日期:2002-5-16
作用:实现上下级下拉框的联动

$select_data
	二维数组,存放产生select表单内的数组.

返回值
	没有返回值

调用例子:
MakeSelectHtml($select_data);

javascript参数
	V
	V
	V
ParentSelect
	关键字中的值为父类的Select的的JavaScript脚本

SubSelect
	关键字中的值为子类的Select的定义的JavaScript脚本


html例子:
	<select size="1" name="province"  onChange="javascript:select_option(document.personpro,document.personpro.province,document.personpro.city)"> 


*/


function MakeSelectHtml($select_data)
{
$select_var="<script language=javascript>";
$select_var.="function select_option(form_name,ParentSelect,SubSelect){";

for($tmp_i=0;$tmp_i<(count($select_data));$tmp_i++)
{
	$select_var.="var st".$tmp_i."_id=new Array(".((count($select_data[$tmp_i])-2)/2).");";
	$select_var.="var st".$tmp_i."_name=new Array(".((count($select_data[$tmp_i])-2)/2).");";
	for($tmp_ii=2,$count=0;$tmp_ii<(count($select_data[$tmp_i]));$tmp_ii+=2,$count++)
	{
	$select_var.="st".$tmp_i."_name[".$count."]='".$select_data[$tmp_i][$tmp_ii]."';";
//		print("\n");
	$select_var.="st".$tmp_i."_id[".$count."]='".$select_data[$tmp_i][$tmp_ii+1]."';";
//		print("\n");
		}
	}
$select_var.="
	var selected_id,name_arry,id_array;
	selected_id=ParentSelect.selectedIndex;
	if (selected_id==0)
	{
		SubSelect.length=0;
		SubSelect.options[0]=new Option('请选择','');
		return false;
	}
	else
	{
		selected_id--;
		name_array='st' + selected_id + '_name';
		id_array='st' + selected_id + '_id';
		var array_length=eval(name_array).length;
		SubSelect.length=0;

		if (array_length==0)
		{
			SubSelect.options[0]=new Option('====','');
		}
		else
		{
			SubSelect.options[0]=new Option('请选择','');
			for (var i=0; i < array_length ; i++)
			{
				SubSelect.options[i+1]=new Option(eval(name_array)[i],eval(id_array)[i]);
			} 
		}
		SubSelect.selectedIndex = 0;
	}
";
$select_var.="}</script>";
return($select_var);
}

/***********函数countdate******
作用:得到两段时间所经过的天数
时间:2003-9-6
实现 $date1与$date2相减
$date2 格式
2003-9-6
***********************************************/

function countdata($date1,$date2)
{
	$date1_elements = explode("-" ,$date1); 
	$udate1=mktime (0, 0,0 ,$date1_elements [1], $date1_elements[ 2],$date1_elements [0]); ;	//得到了时间戳1

	$date2_elements = explode("-" ,$date2);
	$udate2=mktime (0, 0,0 ,$date2_elements [1], $date2_elements[ 2],$date2_elements [0]); //得到了现在的时间戳
	$pass_data=($udate1-$udate2)/(3600*24);		//得到了从注册开始到现在经过的天数
	return($pass_data);
}



function DateAdd ($interval, $number, $date)
{ 
/*
	yyyy year年 
	q Quarter季度 
	m Month月 
	y Day of year一年的数 
	d Day天 
	w Weekday一周的天数 
	ww Week of year周 
	h Hour小时 
	n Minute分 
	s Second秒 
	w、y和d的作用是完全一样的，即在目前的日期上加一天，q加3个月，ww加7天。 

	$currenttime = time(); 
	echo "Current time: ". strftime("%Hh%M %A %d %b" ,$currenttime)."br"; 
	echo "<br>"; 
	$newtime = DateAdd ("n",50 ,$currenttime); 
	echo "Time plus 50 minutes: ". strftime("%Hh%M %A %d %b" ,$newtime)."br"; 
	echo "<br>"; 
	$temptime = DateDiff ("n",$currenttime ,$newtime); 
	echo "Interval between two times: ".$temptime; 
	echo "<br>"; 
*/
	$date_time_array = getdate($date); 
	$hours = $date_time_array["hours"]; 
	$minutes = $date_time_array["minutes"]; 
	$seconds = $date_time_array["seconds"]; 
	$month = $date_time_array["mon"]; 
	$day = $date_time_array["mday"]; 
	$year = $date_time_array["year"]; 
	switch ($interval) 
	{ 
		case "yyyy": $year +=$number; break; 
		case "q": $month +=($number*3); break; 
		case "m": $month +=$number; break; 
		case "y": 
		case "d": 
		case "w": $day+=$number; break; 
		case "ww": $day+=($number*7); break; 
		case "h": $hours+=$number; break; 
		case "n": $minutes+=$number; break; 
		case "s": $seconds+=$number; break; 
	} 
	$timestamp = mktime($hours ,$minutes, $seconds,$month ,$day, $year); 
	return $timestamp;
} 

Function DateDiff ($interval, $date1,$date2)
{ 
// 得到两日期之间间隔的秒数 
	$timedifference = $date2 - $date1; 
	switch ($interval) { 
/*
	case "w": $retval = bcdiv($timedifference ,604800); break; 
	case "d": $retval = bcdiv( $timedifference,86400); break; 
	case "h": $retval = bcdiv ($timedifference,3600); break; 
	case "n": $retval = bcdiv( $timedifference,60); break; 
	case "s": $retval = $timedifference; break; 
	*/
	case "w": $retval = $timedifference/604800; break; 
	case "d": $retval = $timedifference/86400; break; 
	case "h": $retval = $timedifference/3600; break; 
	case "n": $retval = $timedifference/60; break; 
	case "s": $retval = $timedifference; break; 
	} 
	return $retval;
} 
/*	得到当前浏览者的IP地址
 *
 *
 */

function get_ip()
{
	$ip="";
	if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR");
	else $ip = "UNKNOWN";
	return $ip;
	//REMOTE_ADDR
}

//************* 得到当前时间 微秒
function getmicrotime()
{
	list($usec, $sec) = explode(" ",microtime()); 
	return ((float)$usec + (float)$sec); 
}

/**+-----------------------------------------------
	函 数 名: setstatus
	功能描述: 设置文件名 msg 与 ~msg 就如同1和0  
	函数说明: 用文件名的 msg ~msg 来表示当前是 true 或 false 状态
	调用函数: setstatus($statusid,$istrue,$_DATA_STATUS_PATH)
	参数:
		statusid
			标签名
		istrue
			标签状态 true or false
		_DATA_STATUS_PATH
			标签存放的目录 *要可读写
	设 计 者: ggg			    日期: 2004-9-27 13:35
	修 改 者: ggg			    日期: 2004-9-27 13:35
	版    本: 1.0
**+-----------------------------------------------
*/
function setstatus($statusid,$istrue,$_DATA_STATUS_PATH)
{
	if(!file_exists($_DATA_STATUS_PATH.$statusid))	//不存在状态标签
	{
		if(!file_exists($_DATA_STATUS_PATH."~".$statusid))	//msg 与 ~msg 就如同1和0
		{
			if($istrue)//把状态标记设成真
			{
				$fp=fopen($_DATA_STATUS_PATH.$statusid,"w");fclose($fp);
			}
			else
			{
				$fp=fopen($_DATA_STATUS_PATH."~".$statusid,"w");fclose($fp);
			}
		}
		else	//存在假文件在
		{
			if($istrue)//把状态标记设成真
			{
				rename($_DATA_STATUS_PATH."~".$statusid,$_DATA_STATUS_PATH.$statusid);
				//move_uploaded_file($_DATA_STATUS_PATH."~".$statusid,$_DATA_STATUS_PATH.$statusid);
			}
		}
	}
	else	//存在真文件在
	{
		if(!$istrue)//把状态标记设成假
		{
			rename($_DATA_STATUS_PATH.$statusid,$_DATA_STATUS_PATH."~".$statusid);
			//move_uploaded_file($_DATA_STATUS_PATH.$statusid,$_DATA_STATUS_PATH."~".$statusid);
		}
	}
}

//*** 得到状态标记
	function getstatus($statusid,$_DATA_STATUS_PATH)
	{
		$istrue=false;
		if(file_exists($_DATA_STATUS_PATH.$statusid))	//存在状态标签
		{
			$istrue=true;
		}
		else
		{
			$istrue=false;
		}
		return ($istrue);
	}
//!!! 得到状态标记



/**+-----------------------------------------------
	函 数 名: GggMkjsArray
	功能描述: 产生js数组代码
	函数说明: 
	调用函数: GggMkjsArray()
	参数:
		$tmpCatagoryArray
			保存二级分类的数组
			tmpCatagoryArray 的第一个数组内容是保存大类,其他是小类
			$tmpCatagoryArray[0]["computer"]="电脑网络";
			$tmpCatagoryArray[0]["xxx"]="xxx";
			$tmpCatagoryArray[1]["aaa"]="aaa";
	返	回: 无
	设 计 者: ggg				日期: 2005-3-17 18:27
	修 改 者: ggg				日期: 2005-3-17 18:27
	版	本: 1.0
**+-----------------------------------------------
*/


	function GggMkjsArray(&$tmpCatagoryArray,$tmpCatagoryName)
	{
		if( empty($tmpCatagoryArray))
			return false;
		$ParentCount=count($tmpCatagoryArray);	//统计出有几个父类
		if($ParentCount<1)						//二级分类数组里没有数据，直接返回
			return false;
		$javaColumnName=$tmpCatagoryName."Array";	//用于生成的 javascript 变量 保存分类信息
		$htmlString="\n var ".$javaColumnName."=new Array();";//保存最后产生的javascript代码。可以用于输出或保存在文件
		for($icnt=0;$icnt<$ParentCount;$icnt++)
		{
			if(count($tmpCatagoryArray[$icnt])<1)
				continue;
			$htmlString.="\n ".$javaColumnName."[".$icnt."]=new Array();";
			$jcnt=0;
			foreach ($tmpCatagoryArray[$icnt] as $key => $value) 
			{
				$htmlString.="\n ".$javaColumnName."[".$icnt."][".$jcnt."]=new Array(\"".$key."\",\"".$value."\");";
				$jcnt++;
			}
		}
		return $htmlString;
	}//END GggMkjsArray


>>>>>>> 4fd51768c245e633e7beb027832badef9cbbe720
/**
 * 2011-7-15 18:05 ggg
 * 鐢ㄤ簬甯哥敤鍔╂墜绫�
 */
class CommonHelper
{
    static private $_instance=null;
    static public $errorMsg=null;


    /**
     * 鑾峰緱鍞竴瀹炰緥
     *
     * @param string $key
     * @return obj
     */
    static public function getInstance()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //杞崲缂栫爜
    static public function gbk2utf8($str)
    {
        // return iconv("gbk", "utf-8//IGNORE", $str);
        return mb_convert_encoding($str,"utf-8","gbk");
    }

    //杞崲缂栫爜
    static public function utf82gbk($str)
    {
        // return iconv("utf-8", "gbk//IGNORE", $str);
        return mb_convert_encoding($str,"gbk","utf-8");
    }


    /*
     * 寰楀埌鎸囧畾鐜涓嬬殑閰嶇疆db閰嶇疆鍐呭
     *
     * @param stirng  $evn G_CODE_ENV
     * @param stirng  $dbStr 濡� statdb gameaddb涔嬬被
     * @return  Array
     *
     */
    static public function getDbConfig($evn,$dbStr)
    {
        $tmp_config = self::getEvnConfig($evn);
        $tmp_db =$tmp_config['components'][$dbStr];
        $tmp_dns    = self::parseDsn($tmp_db['connectionString']);
        $tmp_db['host'] =$tmp_dns['host'];
        $tmp_db['dbname'] =$tmp_dns['dbname'];
        return $tmp_db;
    }
    
    /*
     * 寰楀埌鎸囧畾鐜涓嬬殑閰嶇疆鍐呭
     *
     * @param stirng  $evn G_CODE_ENV
     * @return  Array
     *
     */
    static public function getEvnConfig($evn)
    {
        $tmp_config = Array();
        //鐜鍒ゅ畾
        switch($evn)
        {
            case "LOCAL" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_local.php');
                break;
            case "DEV" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_dev.php');
                break;
            case "TEST" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_test.php');
                break;
            case "PRE" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_pre.php');
                break;                
            case "RELEASE" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_release.php');
                break;

        }

        return $tmp_config; 

    }

    /*
     * 瑙ｉ噴 mysql:host=10.241.12.120;dbname=oa_newchannel 杩斿洖 鏁扮粍
     *
     * @param stirng  $dsnStr
     * @return  Array
     *
     */
    static public function parseDsn($dsnStr)
    {
        //$url='mysql:host=10.241.12.120;dbname=oa_newchannel';
        $url    =  $dsnStr;
        $tmp_dsn    = parse_url($url);

        $tmp_array   = explode(';',$tmp_dsn['path']);
        foreach($tmp_array as $tmp_recode)
        {
            $tmp_exp    = explode('=',$tmp_recode);
            $tmp_dsn[$tmp_exp[0]] = $tmp_exp[1];
        }
        return $tmp_dsn;
    }


    
    /**
     * 鍥剧墖鏇存柊鏄�,涓嶈CDN cache 
     */
    public static function getCdnVersion()
    {
        return '2013012401';
    }

        //涓嬭浇鏂囦欢
    public static function down($content,$filename)
    {
        $len = strlen($content);
        @ob_end_clean();


        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=".$filename." ");
        header("Content-Transfer-Encoding: binary ");
        header('Content-Length: '.$len);
        echo  $content;
    }

  
    
    /**
     * 鎶奵sv鏍煎紡鐨勫瓧绗︾獪杞负浜岀淮鏁扮粍銆�銆�銆�
     *  aaa1    bbb1    ccc1
     *  aaa2    bbb2    ccc2
     *  杞负  Array(
     *      Array("aaa1",鈥渂bb1"
     *  )
     * Enter description here ...
     * @param string $str  闇�瑕佽浆鎹㈢殑瀛楃绐溿��銆�锛屼竴
     * @param string $rowKeys  涓�琛岄噷鐨勬暟缁勬瘡涓瓧娈垫槧灏勭殑key鍊� Array('gameid'=>123,....) 娉ㄦ剰瑕佸拰鍒楁暟淇濇寔涓�鑷�
     * @param string $rowSplit  涓�琛屼竴鏉¤褰曠殑闅旂锛岄粯璁や互鍥炶溅缁撳熬
     * @param string $colSplit  涓�琛岄噷鐨勫瓧娈靛垎闅旂銆�榛樿鐢ㄩ�楀彿鍒嗛殧
     */
    public function csv2Array($str,$rowKeys=null,$rowSplit="\n",$colSplit=","){
    /* 
         $str   = <<<EOF
    gameid  game_area_id    sdid    game_member_name    game_team_name  cleartime
    1   1   8024    ggg team    time
    1   2   8024    kl  team    time    
    EOF;
    
        
       $rowKeys    = Array('gameid','game_area_id','sdid','game_member_name','game_team_name','cleartime');
        $colSplit    = "\t";
     */
        $insert_array   = array();
        $str = trim($str);
        $tmp_array1 = explode($rowSplit,$str);
    //     var_dump($str);

        if(count($tmp_array1) < 1)
        {
            // $this->_errorMsg ="empty file ";
            return false;
        }


        
        $tmp_count  = 0;
        foreach ($tmp_array1 as $recode){
    
            $tmp_recode = trim($recode);
    
            $tmp_count++;

    
            if(empty($tmp_recode))
                continue;

            $tmp_array2 = explode($colSplit,$tmp_recode);
    
            $tmp_array3 = Array();

            if( !empty ($rowKeys) && (count($tmp_array2) != count($rowKeys)) ){
                return false;
            }
 
            foreach($tmp_array2 as $tmp_key => $tmp_val)
            {
                if(!empty($rowKeys))
                {
                    $tmp_array3[$rowKeys[$tmp_key]]    = $tmp_val;
                }
                else
                    $tmp_array3[]    = $tmp_val;
            }

//            if(!empty($addRows)){
//                $tmp_array3 = $tmp_array3 + $addRows;
//            }

   
            //浠ユ父鎴忋�佸尯銆佸笎鍙蜂负key
            //$insert_array[$tmp_array3['gameid'].$tmp_array3['game_area_id'].$tmp_array3['sdid']]  = $tmp_array3;
            $insert_array[] = $tmp_array3;
    
            //list($k,$v)   = explode("\t",$recode);
            //$a[$k]=$v;
        }
    
        //      print_r($insert_array);
    
        return $insert_array;
    
    }
   
   
        
        /*
         * signature  绛惧悕绠楁硶
         * $params  绛惧悕鏁扮粍
         * $secret  绛惧悕secretKey
         * $secret  涓嶅悓鍙傛暟涔嬮棿鍒嗛殧绗�
         */
        static public function generateSign($params, $secret,$separator='')
        {
            $str_array = array();
            ksort($params);
            foreach ($params as $k => $v) {
                    $str_array[] = "{$k}={$v}";
            }

            $str = implode($separator, $str_array) . $secret;
            return md5($str);
        }



    static public function isdate($str,$format="Y-m-d"){  
        
        $strArr = explode("-",$str);  
        if(empty($strArr)){
            return false;
        }  
        
        foreach($strArr as $val){
            
            if(strlen($val)<2){
                $val="0".$val;}$newArr[]=$val;
            }  
        
            $str =implode("-",$newArr);   
            $unixTime=strtotime($str);   
            $checkDate= date($format,$unixTime);   
            
            if($checkDate==$str)   
                return true;   
            else   
                return false;
    }

    /**
     * 杩斿洖褰撳墠椤甸潰鐨刄RL
     */
    public static function getCurrRequestUrl()
    {
        $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        return $url;
    }

    
    
    
    //鎴彇utf8瀛楃涓�
    public static function utf8Substr($str, $from, $len)
    {
        return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                           '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                           '$1',$str);
    }



    /*
         http://txz.sdo.com/plugin/?pn=ma-1.2.0-zs067-0627-3.apk&m=UF1ZQU63vKurkpM=&key=100000005
         瑙ｅ瘑 m鎵嬫満鍙风爜鍔犲瘑绐�
         print_r(decodeMobile('UF1ZQU63vKurkpM'));
         15673379224
    */
    public static function decodeMobile ($strEncode) {

        $strEncode = base64_decode($strEncode);
        $strLen = strlen($strEncode);
        if ( $strLen <= 0 || $strLen >= 256)
            return false;

        $cCRB = 'a';
        $dst    = '';
        for ($i = 0; $i < $strLen; $i++)
        {
            $dst.= $strEncode[$i] ^ $cCRB;
            $cCRB = chr(ord($cCRB) + 7);
        }

        $strEncode = $dst;
        return $strEncode;

    }

    /*
        by ggg
         鍔犲瘑 鎵嬫満鍙风爜
         print_r(encodeMobile('15673379224'));
         UF1ZQU63vKurkpM=
    */
    public static function encodeMobile ($mobile) {

        $strLen = strlen($mobile);
        if ( $strLen <= 0 || $strLen >= 256)
            return false;

        $cCRB = 'a';
        $dst    = '';
        for ($i = 0; $i < $strLen; $i++)
        {
            $dst.= $mobile[$i] ^ $cCRB;
            $cCRB = chr(ord($cCRB) + 7);
        }

        $strEncode = $dst;
        return base64_encode($strEncode);

    }

    /*
        鍙栨枃浠跺悕 濡�  aaa.txt 杩斿洖  aaa
        娉ㄦ剰濡傛灉鏄�  aaa.bbb.txt 锛岃繑鍥炴槸 aaa.bbb
    */
    public static function subStrHead($fileName,$needle='.')//杩斿洖鏂囦欢鐨勫悕瀛�
    {
        //浠庡悗寰�鍓嶆壘
        $currPos=strrpos($fileName, $needle);
        if(!$currPos)
            $currPos=strlen($fileName);
        return(substr($fileName,0,$currPos));//寰楀埌涓婁紶鏂囦欢鍚嶅瓧
    }

    /*
        鍙栨枃浠跺悕鎵╁睍鍚� 濡�  aaa.txt 杩斿洖  txt
        娉ㄦ剰濡傛灉鏄�  aaa.bbb.txt 锛岃繑鍥炵殑涔熸槸 txt
    */
    public static function subStrEnd($fileName,$needle ='.')//杩斿洖鏂囦欢鐨勬墿灞曞悕
    {
        $fileExt='';
        if($currPos=strrpos($fileName, $needle))                //濡傛灉鏂囦欢娌℃湁鎵╁睍鍚�,鏂囦欢鍚嶅嵆涓哄叏鏂囦欢,鎵╁睍鍚嶇┖
        {
            //鏂囦欢鍚嶉暱搴� - 鎵惧埌鐨勪綅缃� - 闂撮殧绗﹂暱搴�
            $fileExt=substr($fileName,-(strlen($fileName) - $currPos - strlen($needle) ));
        }
        return($fileExt);                                 //杩斿洖鎵╁睍鍚�
    }

   

    //杩斿洖 hps 鏍煎紡鐨勭粨鏋� json鏍煎紡
    public static function getApiResult($resultCode,$resultMsg,$data) {

        $result = array();
        $result['resultCode'] = $resultCode;
        $result['resultMsg'] = $resultMsg;
        $result['data'] = $data;

        return json_encode($result);
    }


    /**
     * 寰楀埌璁块棶鑰呯殑骞冲彴鍙�
     * @return string
     */
    public static function getOsType()
    {
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);  
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;  
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;  
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;  
        $is_android = (strpos($agent, 'android')) ? true : false;  
      
        if($is_pc){  
            echo "杩欐槸PC(鐢佃剳)";  
        }  
        if($is_iphone){  
            echo "杩欐槸iPhone";  
        }  
        if($is_ipad){  
            echo "杩欐槸iPad";  
        }  
        if($is_android){  
            echo "杩欐槸Android";  
        }  

    }

    public static function getTcpServer($key = 'memcache_sess') {

        $sessionServer = Yii::app()->params[$key];

        $session = array();
        foreach ($sessionServer as $value) {
            $session[] = 'tcp://' . $value['ip'] . ':' . $value['port'];
        }
        return join(';', $session);
    }
    
    

    /**
     * 鐢熸垚涓�涓殢鏈哄瓧绗︿覆
     * @param  integer $len 瀛楃涓查暱搴�
     * @return string
     */
    public static function getRandomString($len = 10) {
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
            'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
            'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
            'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
            'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2',
            '3', '4', '5', '6', '7', '8', '9',
        );
        $charsLen = count($chars) - 1;
        shuffle($chars);

        $output = "";
        for ($i=0; $i<$len; $i++)
        {
            $output .= $chars[mt_rand(0, $charsLen)];
        }

        return $output;
    }


    /**
     * 鑾峰彇鏈嶅姟鍣╥p
     * @return string
     */
    static public function getServerIp(){

        if(!empty($_SERVER["SERVER_ADDR"]))
        {
            return $_SERVER["SERVER_ADDR"];
        }
         // cli鏂瑰紡涓嬭幏鍙栨湇鍔″櫒ip
        $ss = exec('/sbin/ifconfig eth0 | sed -n \'s/^ *.*addr:\\([0-9.]\\{7,\\}\\) .*$/\\1/p\'',$arr);   
        $ret = $arr[0];
        return $ret;
    }




    /**
     * json杞琣rray
     * @param  [type] $jsonStr [json鏍煎紡]
     * @return [type]      [array鏁扮粍]
     */
    function json_to_array($jsonStr){
        $arr=array();
        foreach($jsonStr as $k=>$w){
            if(is_object($w)) $arr[$k]=json_to_array($w);  //鍒ゆ柇绫诲瀷鏄笉鏄痮bject
            else $arr[$k]=$w;
        }
        return $arr;
    }


    /**
     * 妫�鏌ュ彉閲忔槸鍚﹀寘鍚腑鏂�
     * @param  [type] $str [description]
     * @return [boolean]      [description]
     */
    function checkGB($str){
        if (preg_match("/[\x7f-\xff]/", $str)) { 
            return true ;
        }else{ 
            return false;
        } 
    }
    //瑙ｆ瀽 key 娌℃湁琚弻寮曞彿寮曡捣鏉ョ殑Json 鏁版嵁銆�
    public static function exJsonDecode($s, $mode=false) {
      if(preg_match('/\w:/', $s))
        $s = preg_replace('/(\w+):/is', '"$1":', $s);
      return json_decode($s, $mode);
    } 


}
