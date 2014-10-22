<?php
<<<<<<< HEAD
=======

class CommonHelper {

	static private $_instance=null;
	static public $errorMsg=null;


	/**
	 * »ñµÃÎ¨Ò»ÊµÀı
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
	//×ª»»±àÂë
	static public function gbk2utf8($str)
	{
		// return iconv("gbk", "utf-8//IGNORE", $str);
        return mb_convert_encoding($str,"utf-8","gbk");
	}

	//×ª»»±àÂë
	static public function utf82gbk($str)
	{
		// return iconv("utf-8", "gbk//IGNORE", $str);
        return mb_convert_encoding($str,"gbk","utf-8");
	}

	/*
		È¡ÎÄ¼şÃû Èç  aaa.txt ·µ»Ø  aaa
		×¢ÒâÈç¹ûÊÇ  aaa.bbb.txt £¬·µ»ØÊÇ aaa.bbb
	*/
	public static function subStrHead($fileName,$needle='.')//·µ»ØÎÄ¼şµÄÃû×Ö
	{
		//´ÓºóÍùÇ°ÕÒ
		$currPos=strrpos($fileName, $needle);
		if(!$currPos)
			$currPos=strlen($fileName);
		return(substr($fileName,0,$currPos));//µÃµ½ÉÏ´«ÎÄ¼şÃû×Ö
	}

	/*
		È¡ÎÄ¼şÃûÀ©Õ¹Ãû Èç  aaa.txt ·µ»Ø  txt
		×¢ÒâÈç¹ûÊÇ  aaa.bbb.txt £¬·µ»ØµÄÒ²ÊÇ txt
	*/
	public static function subStrEnd($fileName,$needle ='.')//·µ»ØÎÄ¼şµÄÀ©Õ¹Ãû
	{
		$fileExt='';
		if($currPos=strrpos($fileName, $needle))                //Èç¹ûÎÄ¼şÃ»ÓĞÀ©Õ¹Ãû,ÎÄ¼şÃû¼´ÎªÈ«ÎÄ¼ş,À©Õ¹Ãû¿Õ
		{
			//ÎÄ¼şÃû³¤¶È - ÕÒµ½µÄÎ»ÖÃ - ¼ä¸ô·û³¤¶È
			$fileExt=substr($fileName,-(strlen($fileName) - $currPos - strlen($needle) ));
		}
		return($fileExt);                                 //·µ»ØÀ©Õ¹Ãû
	}

    /**
     * °Ñcsv¸ñÊ½µÄ×Ö·û´Ü×ªÎª¶şÎ¬Êı×é¡¡¡¡¡¡
     *  aaa1    bbb1    ccc1
     *  aaa2    bbb2    ccc2
     *  ×ªÎª  Array(
     *      Array("aaa1",¡°bbb1"
     *  )
     * Enter description here ...
     * @param string $str  ĞèÒª×ª»»µÄ×Ö·û´Ü¡¡¡¡£¬Ò»
     * @param string $rowKeys  Ò»ĞĞÀïµÄÊı×éÃ¿¸ö×Ö¶ÎÓ³ÉäµÄkeyÖµ Array('gameid'=>123,....) ×¢ÒâÒªºÍÁĞÊı±£³ÖÒ»ÖÂ
     * @param string $rowSplit  Ò»ĞĞÒ»Ìõ¼ÇÂ¼µÄ¸ô·û£¬Ä¬ÈÏÒÔ»Ø³µ½áÎ²
     * @param string $colSplit  Ò»ĞĞÀïµÄ×Ö¶Î·Ö¸ô·û¡¡Ä¬ÈÏÓÃ¶ººÅ·Ö¸ô
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

   
            //ÒÔÓÎÏ·¡¢Çø¡¢ÕÊºÅÎªkey
            //$insert_array[$tmp_array3['gameid'].$tmp_array3['game_area_id'].$tmp_array3['sdid']]	= $tmp_array3;
            $insert_array[]	= $tmp_array3;
    
            //list($k,$v)	= explode("\t",$recode);
            //$a[$k]=$v;
        }
    
        // 		print_r($insert_array);
    
        return $insert_array;
    
    }
}





function _HTML_END($title,$msg,$alert_msg="")                       //³ö´íÍË³ö³ÌĞòº¯Êı,ÓÃÓÚÆÕÍ¨´íÎóµÄÌáÊ¾
{
	printf("<html><head><link rel=stylesheet href=style.css></head><body>");
	printf("<script language=JavaScript>document.title='".$title."'</script>");
	printf("<table align=center height=300><tr align=left><td>");
	printf($msg."<a title=·µ»ØÉÏÒ»Ò³ href=javascript:history.back(-1)> <font color=#ff0000>£¼£¼·µ»Ø</font></a>");
	printf("</td></tr>");
	printf("<tr><td align=center>");
	printf("<a title=·µ»ØÉÏÒ»Ò³ href=javascript:history.back(-1)><img src=".$GLOBALS[_BASE_PATH]."error.gif border=0></a>");
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

function _MYSQL_END($title="Error",$msg)                    //³ö´íÍË³ö³ÌĞòº¯Êı,ÓÃÓÚÊı¾İ¿â´íÎóµÄÌáÊ¾
{
	$errno = mysql_errno();                                  //µÃµ½´íÎóĞÅÏ¢´úÂë
	$error = mysql_error();                                  //µÃµ½´íÎóĞÅÏ¢,Á½ÕßÒ»ÆğÆğÅÅ´í×÷ÓÃ
	printf("<html><head><head><link rel=stylesheet href=style.css></head><title>".$title."</title></head><body><center>");
	printf($msg);
	printf("<br>Error: (".$errno.")".$error."<a title=·µ»ØÉÏÒ»Ò³ href=javascript:history.back(-1)> <font color=#ff0000>£¼£¼·µ»Ø</font></a><br></center>");
	printf("</body></html>");
	exit();
	die();
}

//°Ñä¯ÀÀÆ÷Êı¾İ´«µİµ½ÁíÒ»Ò³ÃæµÄº¯Êı ×¢Òâ±ØĞë´æÔÚ±íµ¥

function submit_to($To_url,$url_test,$pop_test="",$main_form="main_form")                    
{
	printf("<a href=javascript:document.".$main_form.".submit() OnMouseDown='document.".$main_form.".action=\"".$To_url."\"' title='".$pop_test."'>".$url_test."</a>");
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\Í³¼Æ×Ö·ûÖĞÄ³¶ÎascÂëÄÚµÄ¸öÊı,·µ»ØÒ»¸öÕûÊı\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function count_str($find_str,$start_ord,$end_ord="")				//×Ô¶¨ÒåµÄÍ³¼Æ×Ö´ÜÀï×Ö·ûº¯Êı,¿ªÊ¼ascµ½½áÊøµÄasc
{
	$tmp_len=0;
	for($tmp_i=0;$tmp_i<strlen($find_str);$tmp_i++)
	{
		//Èç¹û´«µİµÄµÚ¶ş²ÎÊı²»Îª¿Õ,Í³¼Æ start -> end ascÂëµÄ×Ö·û
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
	return($tmp_len);	//°ÑÕÒµ½×Ö·û¸öÊı·µ»Ø
}//count_str

function _SHOW_DEBUG($debug_msg,$att_msg="")                       //ÏÔÊ¾µ÷ÊÔĞÅÏ¢
{
	if($GLOBALS[_DEBUG_SURE])
	{
		print("<font color=#2B2968><div align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("<i>".$att_msg."</i> ".$debug_msg);
		print("</div></font>");
	}

}

/*
¶ÔÄ³Ğ©Ò»ĞĞÄÚ¹ı³¤µÄ×Ö´Ü½øĞĞ´¦Àí,±£Ö¤Ã¿ĞĞµÄ×Ö·ûÔÚ Len_of_row ÒÔÄÚ
ls_str 
	×Ö·û´Ü,Ò²¼´Òª´¦ÀíµÄ´Ü
Len_of_row 
	µÚĞĞµÄ×Ö·û¸öÊı
$input_str
	µÚĞĞµÄ·Ö¸ô·û
*/

function _MAKE_ROW_STR($tmp_str,$Len_of_row=100,$input_str="\n")                       //
{
	$tmp_str=str_replace("\r", "", $tmp_str);     //È¥linuxÏÂµÄ»»ĞĞ 
	$tmp_str= explode("\n",$tmp_str);//ÒÔ»Ø³µ·ûÇĞ¿ª·û´Ü
	$temp_str="";
	for($tmp_i=0;$tmp_i<count($tmp_str);$tmp_i++)
	{
		$tmp_str[$tmp_i]=trim($tmp_str[$tmp_i]);
		if(strlen($tmp_str[$tmp_i])>$Len_of_row ) //ÕÒµ½³¬¹ıÏŞ¶¨³¤¶È
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
//\\\\\\\\\\È¡µÃ¶¨³¤×Ö´Ü,½â¾ö°ë¸öºº×Ö\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/*
$gb_str
	ÒªÈ¡µÃ¶¨³¤µÄ×Ö´Ü
$str_len
	ÒªÈ¡µÃ×Ö´ÜµÄ³¤¶È
$sub_str
	±»½ØºóµÄ×Ö´Ü
$ngb_len
	Í³¼Æ³öÀ´µÄ·Çºº×Ö×Ö·ûµÄ¸öÊı
$asc_gb_start
	ºº×Ö¿ªÊ¼µÄASCÂë
$asc_gb_end
	ºº×Ö½áÊøµÄASCÂë

ÎªÊ²Ã´³öÏÖ°ë¸öºº×Ö? 
Ô­Òò1:ÎÒÃÇÈç½ØµÄ×Ö´ÜÀïÓĞ1¸ö×Ö·û²»ÊÇºº×Ö(a),Ò²¾ÍÊÇËµ.·Çºº×Ö×Ö·û.ÓĞ»úÆæÊı¸ö 
Ô­Òò2:ÎÒÃÇËù½ØµÄ×Ö´Ü³¤¶ÈÊÇ4,ÊÇÅ¼Êı¸ö×Ö·û 

ÎÒÃÇÏëÒ»ÏÂ,Èç¹ûËù½ØµÄ×Ö´ÜÀï·Çºº×Ö×Ö·û(Ïñ a b 1 2  ÕâÑùµÄ)ÓĞÆæÊı¸ö,¶øÎÒÃÇ½ØÈ¡µÄÊÇÅ¼Êı¸ö×Ö·û, 
ÊÇ²»ÊÇºÜÈİÒ×³öÏÖ°ë¸öºº×Ö,ÕâÊ±ÎÒÃÇÖ»ÒªÔÚÕâÖÖÇé¿öÏÂÔÙ¶à½ØÒ»¸ö×Ö·û¾Í¿É½â¾öÎÊÌâÁË 


ÕâÀïÎÒÖ»¿¼ÂË×Ö´ÜÀïµÄºº×Ö¶¼ÊÇÍêÕûµÄ.Ò²¾ÍÊÇ²»´æÔÚ°ë¸öºº×ÖµÄÇé¿ö.ÎÒÏëÄÜÊäÈë°ë¸öºº×ÖµÄ¿ÉÄÜĞÔºÜÉÙ:)
ÆäÊµÖ»ÒªÂú×ãÕâÑùµÄÌõ¼ş  
Ëù½Ø×Ö·ûµÄ³¤¶È  Óë  ½ØÈ¡µÄ×Ö·ûÄÚ °üº¬·Çºº×Ö×Ö·ûµÄ³¤¶È²»ÎªÍ¬ ÆæÅ¼ 
¾Í±íÊ¾ÓĞ´æÔÚ°ë¸öºº×ÖµÄ¿ÉÄÜ,ÕâÊ±ÎÒÃÇ¾Í°ÑËù½ØµÄ×Ö´Ü³¤¶È¼ÓÉÏ1¸ö×Ö·û,¾Í¿ÉÒÔ±ÜÃâ°ë¸öºº×ÖÁË. 
Áíµ±È»Òª×¢ÒâÒ»ÏÂ ·Çºº×Ö×Ö·ûµÄ³¤¶È Îª 1  ÕâÌØÊâÇé¿ö 
*/
function get_gb_str($gb_str,$str_len,$asc_gb_start=160,$asc_gb_end=255)                 //×Ô¶¨ÒåµÄÍ³¼Æ×Ö´ÜÀï×Ö·ûº¯Êı,¿ªÊ¼ascµ½½áÊøµÄasc
{
	$sub_str=substr($gb_str,0,$str_len);//È¡µÃ$str_len³¤¶ÈµÄ×Ö´Ü
	$ngb_len=strlen($sub_str)-count_str($sub_str,$asc_gb_start,$asc_gb_end);//µÃµ½×Ö´ÜÀïÓĞ¼¸¸ö·Çºº×Ö×Ö·û
//Èç¹ûÎªÍ¬ÆæÅ¼,¼Ó1,ÕâÀï$ngb_len +2ÊÇÎªÁË³ıÈ¥$ngb_len Îª  1  ÕâÌØÊâÇé¿ö 
	if($ngb_len%2!=$str_len%2)
	{
		$str_len++;
	}
//	print($str_len);
//	print("<br>");
	return(substr($gb_str,0,$str_len));//°ÑËù½ØÈ¡µÄ×Ö´Ü·µ»Ø
}

//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\Ìø×ªµ½Ö¸¶¨Ò³Ãæ\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
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
		<p> <font face='ËÎÌå, verdana, arial, helvetica' style='FONT-SIZE: 9pt' > ".$intor." <br><br> </font>
		
		<font face='ËÎÌå, verdana,arial,helvetica' style='FONT-SIZE: 9pt' >Ò³ÃæÌø×ªÖĞ... <a href='".$jump_url."'>Èç¹ûÄã²»ÏëµÈ´ıµãÕâÀï<br>
		(»òÕßÈç¹ûÄãµÄä¯ÀÀÆ÷Ã»ÓĞ×Ô¶¯·µ»Ø)</a> </font> </p></td>
	</tr>
	</table>
	</td>
</tr>
</table>
");

/*
		print("<span align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("Ò³ÃæÔØÈëÖĞ,ÇëÉÔµÈ...");
		print("</span><br>");
		print("Èç¹ûÄã²»Ô¸µÈ´ı,Ò²¿É°´´ËÖ±½Ó½øÈë:<a href=".$jump_url.">".$jump_url.">>></a>");
*/
//		header("Location: {$url}");

	print("<script language=javascript>");
	print("location.replace('".$jump_url."')");
	print("</script>");
}
//$back_page±íÊ¾ºóÍË¼¸Ò³
function alert_js($alert_msg,$back=0,$back_page=1)
{
	print("<a title=·µ»ØÉÏÒ»Ò³ href=javascript:history.back(-1) >ÉÏÒ»Ò³[Back]</a>");
	print("<script language=JavaScript>");
	if($alert_msg!=""){	print("alert('".$alert_msg."');");}
	if($back==1)print("history.back(-".$back_page.")");//·µ»ØÇ°Ò»Ç°
	else if($back==2)
	{
		print("window.close();");//¹Ø±Õ´°¿Ú
	}
	print("</script>");
}

/*
Êä³ö²ÊÉ«×Ö·û
fcolor
	Ç°¾°É«
bcolor
	±³¾°É«


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

/*  µÃµ½Êı×ékeyÓëµÚ index ¸övalueµÄÄÚÈİ,
 *  Exp:                $tf['user']="user|ÓÃ»§Ãû|c"; 
 *  ·µ»ØÊÇÒ»¸öÒ»Î¬Êı×é
 * ½«Ò»Î¬Êı×é±ä³ÉÁ½¸öÊı×é
 * $field_range
 * ×Ö¶Î±êÊ¶,¿ÉÒÔÁé»îÈ¡µÃÖ¸¶¨×Ö¶Î½øĞĞÏÔÊ¾
 * $need_sure
 * 	Îª0±íÊ¾Ö»È¡ºÍ×Ö¶Î±êÊ¶²»Ò»Ñù
 * Èç
 * 	$tf['user']="user|ÓÃ»§Ãû";
 * ±ä³É¡¡Á½¸öÈ«¾Ö±äÁ¿Êı×é
 * 	$Table_Field['user']="user";      //±£´æ×Ö¶Î±äÁ¿
 * 	$Table_Field_c['user']="ÓÃ»§Ãû";    //±£´æ×Ö¶Î¶ÔÓ¦µÄÖĞÎÄĞÅÏ¢
 * ´«ÈëµÄÊÇÒ»¸öÊı×é

 */


function GetArrayKey($tf,$index=0,$field_range="",$need_sure=0)
{
	reset($tf);//Ö¸ÏòÊı×éÍ·
	$Table_Field="";                         //±í¸ñµÄ×Ö¶Î,ÊÇ¸öÒ»Î¬Êı×é,±£´æµÄÊÇÒª²éÑ¯µÄ¾ßÌå×Ö¶Î
	$Table_Field_c="";                       //±í¸ñµÄÖĞÎÄ×Ö¶Î,ÊÇ¸öÒ»Î¬Êı×é,±£´æµÄÊÇÒª²éÑ¯µÄ¾ßÌå×Ö¶Î
	for($tmp_i=0;$tmp_i<count($tf);$tmp_i++)
	{
		$current_key=key($tf);//µÃµ½Êı×éµÄË÷Òı
		$Field_tf=explode("|",$tf[$current_key]);
		if($field_range=="")
		{
			if($Field_tf[2]=="")                   //ÂÔ¹ı²»ÒªÏÔÊ¾µÄ×Ö¶Î
			{
				$Table_Field[$current_key]=$Field_tf[$index];      //±£´æ×Ö¶Î±äÁ¿
			}
		}
		else if($field_range=="all")
		{
				$Table_Field[$current_key]=$Field_tf[$index];      //±£´æ×Ö¶Î±äÁ¿
		}
		else
		{
			if($need_sure==0)
			{
				if(!strstr($Field_tf[2],$field_range))                   //ÂÔ¹ı²»ÒªÏÔÊ¾µÄ×Ö¶Î
				{
					$Table_Field[$current_key]=$Field_tf[$index];      //±£´æ×Ö¶Î±äÁ¿
				}
			}
			else
			{
				if(strstr($Field_tf[2],$field_range))                   //È¡µÃÒªÏÔÊ¾µÄ×Ö¶Î
				{
					$Table_Field[$current_key]=$Field_tf[$index];      //±£´æ×Ö¶Î±äÁ¿
				}
			}
		}
		next($tf);//ÒÆ¶¯Êı×éÖ¸Õë
	}
	unset($Field_tf);
	unset($tf);
	return($Table_Field);//·µ»Ø°üº¬keyµÄÊı×é
}

/*
½«Ò»Î¬Êı×é±ä³ÉÁ½¸öÊı×é
$field_range
	×Ö¶Î±êÊ¶,¿ÉÒÔÁé»îÈ¡µÃÖ¸¶¨×Ö¶Î½øĞĞÏÔÊ¾
$need_sure
	Îª0±íÊ¾Ö»È¡ºÍ×Ö¶Î±êÊ¶²»Ò»Ñù
Èç
	$tf['user']="user|ÓÃ»§Ãû";
±ä³É¡¡Á½¸öÈ«¾Ö±äÁ¿Êı×é
	$Table_Field['user']="user";      //±£´æ×Ö¶Î±äÁ¿
	$Table_Field_c['user']="ÓÃ»§Ãû";    //±£´æ×Ö¶Î¶ÔÓ¦µÄÖĞÎÄĞÅÏ¢
´«ÈëµÄÊÇÒ»¸öÊı×é
*/
function CutArray($tf,$field_range="",$need_sure=0)
{
	global $Table_Field;
	global $Table_Field_c;
	reset($tf);//Ö¸ÏòÊı×éÍ·
	$Table_Field="";                         //±í¸ñµÄ×Ö¶Î,ÊÇ¸öÒ»Î¬Êı×é,±£´æµÄÊÇÒª²éÑ¯µÄ¾ßÌå×Ö¶Î
	$Table_Field_c="";                       //±í¸ñµÄÖĞÎÄ×Ö¶Î,ÊÇ¸öÒ»Î¬Êı×é,±£´æµÄÊÇÒª²éÑ¯µÄ¾ßÌå×Ö¶Î
	for($tmp_i=0;$tmp_i<count($tf);$tmp_i++)
	{
		$current_key=key($tf);//µÃµ½Êı×éµÄË÷Òı
		$Field_tf=explode("|",$tf[$current_key]);
		if($field_range=="")
		{
			if($Field_tf[2]=="")                   //ÂÔ¹ı²»ÒªÏÔÊ¾µÄ×Ö¶Î
			{
				$Table_Field[$current_key]=$Field_tf[0];      //±£´æ×Ö¶Î±äÁ¿
				$Table_Field_c[$current_key]=$Field_tf[1];    //±£´æ×Ö¶Î¶ÔÓ¦µÄÖĞÎÄĞÅÏ¢
			}
		}
		else if($field_range=="all")
		{
				$Table_Field[$current_key]=$Field_tf[0];      //±£´æ×Ö¶Î±äÁ¿
				$Table_Field_c[$current_key]=$Field_tf[1];    //±£´æ×Ö¶Î¶ÔÓ¦µÄÖĞÎÄĞÅÏ¢
		}
		else
		{
			if($need_sure==0)
			{
				if(!strstr($Field_tf[2],$field_range))                   //ÂÔ¹ı²»ÒªÏÔÊ¾µÄ×Ö¶Î
				{
					$Table_Field[$current_key]=$Field_tf[0];      //±£´æ×Ö¶Î±äÁ¿
					$Table_Field_c[$current_key]=$Field_tf[1];    //±£´æ×Ö¶Î¶ÔÓ¦µÄÖĞÎÄĞÅÏ¢
				}
			}
			else
			{
				if(strstr($Field_tf[2],$field_range))                   //È¡µÃÒªÏÔÊ¾µÄ×Ö¶Î
				{
					$Table_Field[$current_key]=$Field_tf[0];      //±£´æ×Ö¶Î±äÁ¿
					$Table_Field_c[$current_key]=$Field_tf[1];    //±£´æ×Ö¶Î¶ÔÓ¦µÄÖĞÎÄĞÅÏ¢
				}
			}

		}
		next($tf);//ÒÆ¶¯Êı×éÖ¸Õë
	}
	unset($Field_tf);
	unset($tf);
}

    


/***********º¯ÊıGETFILE******
×÷ÓÃ:µÃµ½Ô¶³ÌÎÄ¼ş£¬ÒÔĞÎ³É»º³åÎÄ¼ş
Ê±¼ä:2002-5-11
·µ»Ø:²¼¶ûÖµ
$local_file
	±¾µØÎÄ¼ş,ÓÃÓÚ±£´æÔ¶³ÌÍøÒ³µÄÃû×Ö
$remote_file
	Ô¶³ÌµÄÎÄ¼şÃû
$update_time
	//¸üĞÂ»º³åÎÄ¼şµÄ¼ä¸ôÊ±¼äÊı.
$base_path
	Ô­ÎÄ¼şµÄÄ¿Â¼
***********************************************/

function getfile($remote_file,$local_file,$base_path,$upata_time=3600)
{
//	_SHOW_DEBUG(filesize($local_file));
//$upata_time=1;
	print("aaaaaaaaaaa<br>");
	$current_time=time();//µ±Ç°Ê±¼ä
	if(file_exists($local_file))//´æÔÚ»º³åÎÄ¼ş
	{
		$local_filesize=filesize($local_file);
		if($local_filesize<100)
		{
			_SHOW_DEBUG("local_filesize<100");
			unlink($local_file);
			return(false);
		}
		$file_time=filemtime($local_file);//µÃµ½ÎÄ¼şµÄ×îºóĞŞ¸ÄÊ±¼ä
		if(($current_time-$file_time)<$upata_time)//ÎÄ¼şÎ´¹ıÆÚ
		{
			if($local_filesize<10)//ÕâÀïÆäÊµÊÇÎªÁË·ÀÖ¹ËÀÑ­»·.´æÔÚ¶Á±¾ÉíµÄÎÊÌâ,µİ¹é
			{
				_SHOW_DEBUG("local_filesize<10");
				return(false);
			}
			else
			{
				_SHOW_DEBUG("¸ÃÎÄ¼ş²»ĞèÒª¸üĞÂ!".($current_time-filemtime($local_file)));
				return(true);
			}
		}
	}
	$timeout=10;                                     //Éè¶¨³ÌĞòÖ´ĞĞ$timeoutÃëºóÍË³ö,·ÀÖ¹ËÀÑ­»·

	if(!$remote_fp=fopen($remote_file,"r")) //!file_exists($remote_file) ||
	{
		_SHOW_DEBUG("´ò¿ªÔ¶³ÌÎÄ¼ş".$remote_file."Ê§°Ü!");
		return(false);
	}

	if(!$local_fp=fopen($local_file,"w"))
	{
		_SHOW_DEBUG("´ò¿ª±¾µØÎÄ¼ş".$local_file."Ê§°Ü!");
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

	fputs($local_fp,"<base href='".$base_path."'> ");//Ğ´Èë»ùÖ·
/*	print($remote_file);


	if(!feof($remote_fp))
	{
		print("??");
		die();
	}
*/
	while(!feof($remote_fp))
	{
		if((time()-$current_time)>$timeout)                    //Èç¹û³¬Ê±¾ÍÇ¿ĞĞÍË³ö
		{
			_SHOW_DEBUG("³¬¹ı PHP ³ÌÊ½Ö´ĞĞÊ±¼ä:".$timeout."Ãë,³ÌĞòÖĞ¶Ï!");
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
	_SHOW_DEBUG("ÓÃÊ±".(time()-$current_time));
	return(true);
}




/*
 *    lang_translate
 *    ¹¦ÄÜ:
 *           ´ÓÊı¾İ¿âÀï²éÕÒµ½¶ÔÓ¦ÆäËûÓïÑÔµÄ·­Òë. Èç  "ÖĞ¹ú"  ¶ÔÓ¦µÄÊÇ "china"
 *    $lang_former
 *           Òª·­ÒëµÄ×Ö·û´Ü
 *    
 *    $lang_type
 *           ·­Òë³ÉµÄÀàĞÍ                Èç  en ±íÊ¾¶ÔÓ¦Ó¢ÎÄµÄ·­Òë.
 *    
 *    $order
 *           ·­Òë³ÉµÄË³Ğò                Èç°Ñ order=1 :"ÖĞ¹ú"  ·­Òë³É "china"  »ò°Ñ "china"  ·­Òë³É "ÖĞ¹ú"
 *    
 *    ·µ»Ø
 *           ·­ÒëºÃµÄ×Ö·û´Ü,Èç¹ûÕÒ²»µ½·µ»ØÔ­´Ü
 *    ³õÊ¼ÓïÑÔÊÇ ÖĞÎÄ ,°Ñ ÖĞÎÄ·­Òë³ÉÆäËûµÄÓïÑÔ
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

/*  ·µ»Ø·­Òë³ÉµÄ×Ö´Ü
 *   Èç µç×ê,µç´¸,µçÅÙ »á±»·­Òë³É  aaa,bbb,ccc µÄĞÎÊ½,¿âÀïÕÒ²»µ½µÄ²»·­Òë
 *   ·­ÒëºÃµÄÄÚÈİ·ÅÓÚÒÔ lang_former Îª ¹Ø¼ü×Ö(key) µÄÈ«¾ÖÊı×éÀï
 *
 *   lang_array  ÊÇÒ»¸öÊı×éÖ¸Õë,
 *
 *   µ÷ÓÃ·½Ê½ ***¼Ç×¡´«µİÊÇµÄÊı×éÖ¸Õë****
 *      get_lang(&$lang_array,"ÖĞ¹ú","en")
 *
 */

function get_lang($tmp_lang_array,$lang_former,$lang_type,$order=1)
{
	$tmp_array=split("[£¬ ,¡¡]",trim($lang_former));
	$tmp_string="";
	for($tmp_i=0;$tmp_i<count($tmp_array);$tmp_i++)
	{
		$tmp_array[$tmp_i]=trim($tmp_array[$tmp_i]);
		if($tmp_array[$tmp_i]=="")
			continue;


		if($tmp_lang_array[$tmp_array[$tmp_i]]=="")//Ã»·­Òë¹ı
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
//\\\\\\\\\\²úÉúselect ±íµ¥µÄº¯Êı\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/*
ÈÕÆÚ:2002-5-16
×÷ÓÃ:ÊµÏÖÉÏÏÂ¼¶ÏÂÀ­¿òµÄÁª¶¯

$select_data
	¶şÎ¬Êı×é,´æ·Å²úÉúselect±íµ¥ÄÚµÄÊı×é.

·µ»ØÖµ
	Ã»ÓĞ·µ»ØÖµ

µ÷ÓÃÀı×Ó:
MakeSelectHtml($select_data);

javascript²ÎÊı
	V
	V
	V
ParentSelect
	¹Ø¼ü×ÖÖĞµÄÖµÎª¸¸ÀàµÄSelectµÄµÄJavaScript½Å±¾

SubSelect
	¹Ø¼ü×ÖÖĞµÄÖµÎª×ÓÀàµÄSelectµÄ¶¨ÒåµÄJavaScript½Å±¾


htmlÀı×Ó:
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
		SubSelect.options[0]=new Option('ÇëÑ¡Ôñ','');
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
			SubSelect.options[0]=new Option('ÇëÑ¡Ôñ','');
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

/***********º¯Êıcountdate******
×÷ÓÃ:µÃµ½Á½¶ÎÊ±¼äËù¾­¹ıµÄÌìÊı
Ê±¼ä:2003-9-6
ÊµÏÖ $date1Óë$date2Ïà¼õ
$date2 ¸ñÊ½
2003-9-6
***********************************************/

function countdata($date1,$date2)
{
	$date1_elements = explode("-" ,$date1); 
	$udate1=mktime (0, 0,0 ,$date1_elements [1], $date1_elements[ 2],$date1_elements [0]); ;	//µÃµ½ÁËÊ±¼ä´Á1

	$date2_elements = explode("-" ,$date2);
	$udate2=mktime (0, 0,0 ,$date2_elements [1], $date2_elements[ 2],$date2_elements [0]); //µÃµ½ÁËÏÖÔÚµÄÊ±¼ä´Á
	$pass_data=($udate1-$udate2)/(3600*24);		//µÃµ½ÁË´Ó×¢²á¿ªÊ¼µ½ÏÖÔÚ¾­¹ıµÄÌìÊı
	return($pass_data);
}



function DateAdd ($interval, $number, $date)
{ 
/*
	yyyy yearÄê 
	q Quarter¼¾¶È 
	m MonthÔÂ 
	y Day of yearÒ»ÄêµÄÊı 
	d DayÌì 
	w WeekdayÒ»ÖÜµÄÌìÊı 
	ww Week of yearÖÜ 
	h HourĞ¡Ê± 
	n Minute·Ö 
	s SecondÃë 
	w¡¢yºÍdµÄ×÷ÓÃÊÇÍêÈ«Ò»ÑùµÄ£¬¼´ÔÚÄ¿Ç°µÄÈÕÆÚÉÏ¼ÓÒ»Ìì£¬q¼Ó3¸öÔÂ£¬ww¼Ó7Ìì¡£ 

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
// µÃµ½Á½ÈÕÆÚÖ®¼ä¼ä¸ôµÄÃëÊı 
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
/*	µÃµ½µ±Ç°ä¯ÀÀÕßµÄIPµØÖ·
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

//************* µÃµ½µ±Ç°Ê±¼ä Î¢Ãë
function getmicrotime()
{
	list($usec, $sec) = explode(" ",microtime()); 
	return ((float)$usec + (float)$sec); 
}

/**+-----------------------------------------------
	º¯ Êı Ãû: setstatus
	¹¦ÄÜÃèÊö: ÉèÖÃÎÄ¼şÃû msg Óë ~msg ¾ÍÈçÍ¬1ºÍ0  
	º¯ÊıËµÃ÷: ÓÃÎÄ¼şÃûµÄ msg ~msg À´±íÊ¾µ±Ç°ÊÇ true »ò false ×´Ì¬
	µ÷ÓÃº¯Êı: setstatus($statusid,$istrue,$_DATA_STATUS_PATH)
	²ÎÊı:
		statusid
			±êÇ©Ãû
		istrue
			±êÇ©×´Ì¬ true or false
		_DATA_STATUS_PATH
			±êÇ©´æ·ÅµÄÄ¿Â¼ *Òª¿É¶ÁĞ´
	Éè ¼Æ Õß: ggg			    ÈÕÆÚ: 2004-9-27 13:35
	ĞŞ ¸Ä Õß: ggg			    ÈÕÆÚ: 2004-9-27 13:35
	°æ    ±¾: 1.0
**+-----------------------------------------------
*/
function setstatus($statusid,$istrue,$_DATA_STATUS_PATH)
{
	if(!file_exists($_DATA_STATUS_PATH.$statusid))	//²»´æÔÚ×´Ì¬±êÇ©
	{
		if(!file_exists($_DATA_STATUS_PATH."~".$statusid))	//msg Óë ~msg ¾ÍÈçÍ¬1ºÍ0
		{
			if($istrue)//°Ñ×´Ì¬±ê¼ÇÉè³ÉÕæ
			{
				$fp=fopen($_DATA_STATUS_PATH.$statusid,"w");fclose($fp);
			}
			else
			{
				$fp=fopen($_DATA_STATUS_PATH."~".$statusid,"w");fclose($fp);
			}
		}
		else	//´æÔÚ¼ÙÎÄ¼şÔÚ
		{
			if($istrue)//°Ñ×´Ì¬±ê¼ÇÉè³ÉÕæ
			{
				rename($_DATA_STATUS_PATH."~".$statusid,$_DATA_STATUS_PATH.$statusid);
				//move_uploaded_file($_DATA_STATUS_PATH."~".$statusid,$_DATA_STATUS_PATH.$statusid);
			}
		}
	}
	else	//´æÔÚÕæÎÄ¼şÔÚ
	{
		if(!$istrue)//°Ñ×´Ì¬±ê¼ÇÉè³É¼Ù
		{
			rename($_DATA_STATUS_PATH.$statusid,$_DATA_STATUS_PATH."~".$statusid);
			//move_uploaded_file($_DATA_STATUS_PATH.$statusid,$_DATA_STATUS_PATH."~".$statusid);
		}
	}
}

//*** µÃµ½×´Ì¬±ê¼Ç
	function getstatus($statusid,$_DATA_STATUS_PATH)
	{
		$istrue=false;
		if(file_exists($_DATA_STATUS_PATH.$statusid))	//´æÔÚ×´Ì¬±êÇ©
		{
			$istrue=true;
		}
		else
		{
			$istrue=false;
		}
		return ($istrue);
	}
//!!! µÃµ½×´Ì¬±ê¼Ç



/**+-----------------------------------------------
	º¯ Êı Ãû: GggMkjsArray
	¹¦ÄÜÃèÊö: ²úÉújsÊı×é´úÂë
	º¯ÊıËµÃ÷: 
	µ÷ÓÃº¯Êı: GggMkjsArray()
	²ÎÊı:
		$tmpCatagoryArray
			±£´æ¶ş¼¶·ÖÀàµÄÊı×é
			tmpCatagoryArray µÄµÚÒ»¸öÊı×éÄÚÈİÊÇ±£´æ´óÀà,ÆäËûÊÇĞ¡Àà
			$tmpCatagoryArray[0]["computer"]="µçÄÔÍøÂç";
			$tmpCatagoryArray[0]["xxx"]="xxx";
			$tmpCatagoryArray[1]["aaa"]="aaa";
	·µ	»Ø: ÎŞ
	Éè ¼Æ Õß: ggg				ÈÕÆÚ: 2005-3-17 18:27
	ĞŞ ¸Ä Õß: ggg				ÈÕÆÚ: 2005-3-17 18:27
	°æ	±¾: 1.0
**+-----------------------------------------------
*/


	function GggMkjsArray(&$tmpCatagoryArray,$tmpCatagoryName)
	{
		if( empty($tmpCatagoryArray))
			return false;
		$ParentCount=count($tmpCatagoryArray);	//Í³¼Æ³öÓĞ¼¸¸ö¸¸Àà
		if($ParentCount<1)						//¶ş¼¶·ÖÀàÊı×éÀïÃ»ÓĞÊı¾İ£¬Ö±½Ó·µ»Ø
			return false;
		$javaColumnName=$tmpCatagoryName."Array";	//ÓÃÓÚÉú³ÉµÄ javascript ±äÁ¿ ±£´æ·ÖÀàĞÅÏ¢
		$htmlString="\n var ".$javaColumnName."=new Array();";//±£´æ×îºó²úÉúµÄjavascript´úÂë¡£¿ÉÒÔÓÃÓÚÊä³ö»ò±£´æÔÚÎÄ¼ş
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
 * ç”¨äºå¸¸ç”¨åŠ©æ‰‹ç±»
 */
class CommonHelper
{
    static private $_instance=null;
    static public $errorMsg=null;


    /**
     * è·å¾—å”¯ä¸€å®ä¾‹
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

    //è½¬æ¢ç¼–ç 
    static public function gbk2utf8($str)
    {
        // return iconv("gbk", "utf-8//IGNORE", $str);
        return mb_convert_encoding($str,"utf-8","gbk");
    }

    //è½¬æ¢ç¼–ç 
    static public function utf82gbk($str)
    {
        // return iconv("utf-8", "gbk//IGNORE", $str);
        return mb_convert_encoding($str,"gbk","utf-8");
    }


    /*
     * å¾—åˆ°æŒ‡å®šç¯å¢ƒä¸‹çš„é…ç½®dbé…ç½®å†…å®¹
     *
     * @param stirng  $evn G_CODE_ENV
     * @param stirng  $dbStr å¦‚ statdb gameaddbä¹‹ç±»
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
     * å¾—åˆ°æŒ‡å®šç¯å¢ƒä¸‹çš„é…ç½®å†…å®¹
     *
     * @param stirng  $evn G_CODE_ENV
     * @return  Array
     *
     */
    static public function getEvnConfig($evn)
    {
        $tmp_config = Array();
        //ç¯å¢ƒåˆ¤å®š
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
     * è§£é‡Š mysql:host=10.241.12.120;dbname=oa_newchannel è¿”å› æ•°ç»„
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
     * å›¾ç‰‡æ›´æ–°æ˜¯,ä¸è¢«CDN cache 
     */
    public static function getCdnVersion()
    {
        return '2013012401';
    }

        //ä¸‹è½½æ–‡ä»¶
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
     * æŠŠcsvæ ¼å¼çš„å­—ç¬¦çªœè½¬ä¸ºäºŒç»´æ•°ç»„ã€€ã€€ã€€
     *  aaa1    bbb1    ccc1
     *  aaa2    bbb2    ccc2
     *  è½¬ä¸º  Array(
     *      Array("aaa1",â€œbbb1"
     *  )
     * Enter description here ...
     * @param string $str  éœ€è¦è½¬æ¢çš„å­—ç¬¦çªœã€€ã€€ï¼Œä¸€
     * @param string $rowKeys  ä¸€è¡Œé‡Œçš„æ•°ç»„æ¯ä¸ªå­—æ®µæ˜ å°„çš„keyå€¼ Array('gameid'=>123,....) æ³¨æ„è¦å’Œåˆ—æ•°ä¿æŒä¸€è‡´
     * @param string $rowSplit  ä¸€è¡Œä¸€æ¡è®°å½•çš„éš”ç¬¦ï¼Œé»˜è®¤ä»¥å›è½¦ç»“å°¾
     * @param string $colSplit  ä¸€è¡Œé‡Œçš„å­—æ®µåˆ†éš”ç¬¦ã€€é»˜è®¤ç”¨é€—å·åˆ†éš”
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

   
            //ä»¥æ¸¸æˆã€åŒºã€å¸å·ä¸ºkey
            //$insert_array[$tmp_array3['gameid'].$tmp_array3['game_area_id'].$tmp_array3['sdid']]  = $tmp_array3;
            $insert_array[] = $tmp_array3;
    
            //list($k,$v)   = explode("\t",$recode);
            //$a[$k]=$v;
        }
    
        //      print_r($insert_array);
    
        return $insert_array;
    
    }
   
   
        
        /*
         * signature  ç­¾åç®—æ³•
         * $params  ç­¾åæ•°ç»„
         * $secret  ç­¾åsecretKey
         * $secret  ä¸åŒå‚æ•°ä¹‹é—´åˆ†éš”ç¬¦
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
     * è¿”å›å½“å‰é¡µé¢çš„URL
     */
    public static function getCurrRequestUrl()
    {
        $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        return $url;
    }

    
    
    
    //æˆªå–utf8å­—ç¬¦ä¸²
    public static function utf8Substr($str, $from, $len)
    {
        return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                           '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                           '$1',$str);
    }



    /*
         http://txz.sdo.com/plugin/?pn=ma-1.2.0-zs067-0627-3.apk&m=UF1ZQU63vKurkpM=&key=100000005
         è§£å¯† mæ‰‹æœºå·ç åŠ å¯†çªœ
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
         åŠ å¯† æ‰‹æœºå·ç 
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
        å–æ–‡ä»¶å å¦‚  aaa.txt è¿”å›  aaa
        æ³¨æ„å¦‚æœæ˜¯  aaa.bbb.txt ï¼Œè¿”å›æ˜¯ aaa.bbb
    */
    public static function subStrHead($fileName,$needle='.')//è¿”å›æ–‡ä»¶çš„åå­—
    {
        //ä»åå¾€å‰æ‰¾
        $currPos=strrpos($fileName, $needle);
        if(!$currPos)
            $currPos=strlen($fileName);
        return(substr($fileName,0,$currPos));//å¾—åˆ°ä¸Šä¼ æ–‡ä»¶åå­—
    }

    /*
        å–æ–‡ä»¶åæ‰©å±•å å¦‚  aaa.txt è¿”å›  txt
        æ³¨æ„å¦‚æœæ˜¯  aaa.bbb.txt ï¼Œè¿”å›çš„ä¹Ÿæ˜¯ txt
    */
    public static function subStrEnd($fileName,$needle ='.')//è¿”å›æ–‡ä»¶çš„æ‰©å±•å
    {
        $fileExt='';
        if($currPos=strrpos($fileName, $needle))                //å¦‚æœæ–‡ä»¶æ²¡æœ‰æ‰©å±•å,æ–‡ä»¶åå³ä¸ºå…¨æ–‡ä»¶,æ‰©å±•åç©º
        {
            //æ–‡ä»¶åé•¿åº¦ - æ‰¾åˆ°çš„ä½ç½® - é—´éš”ç¬¦é•¿åº¦
            $fileExt=substr($fileName,-(strlen($fileName) - $currPos - strlen($needle) ));
        }
        return($fileExt);                                 //è¿”å›æ‰©å±•å
    }

   

    //è¿”å› hps æ ¼å¼çš„ç»“æœ jsonæ ¼å¼
    public static function getApiResult($resultCode,$resultMsg,$data) {

        $result = array();
        $result['resultCode'] = $resultCode;
        $result['resultMsg'] = $resultMsg;
        $result['data'] = $data;

        return json_encode($result);
    }


    /**
     * å¾—åˆ°è®¿é—®è€…çš„å¹³å°å·
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
            echo "è¿™æ˜¯PC(ç”µè„‘)";  
        }  
        if($is_iphone){  
            echo "è¿™æ˜¯iPhone";  
        }  
        if($is_ipad){  
            echo "è¿™æ˜¯iPad";  
        }  
        if($is_android){  
            echo "è¿™æ˜¯Android";  
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
     * ç”Ÿæˆä¸€ä¸ªéšæœºå­—ç¬¦ä¸²
     * @param  integer $len å­—ç¬¦ä¸²é•¿åº¦
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
     * è·å–æœåŠ¡å™¨ip
     * @return string
     */
    static public function getServerIp(){

        if(!empty($_SERVER["SERVER_ADDR"]))
        {
            return $_SERVER["SERVER_ADDR"];
        }
         // cliæ–¹å¼ä¸‹è·å–æœåŠ¡å™¨ip
        $ss = exec('/sbin/ifconfig eth0 | sed -n \'s/^ *.*addr:\\([0-9.]\\{7,\\}\\) .*$/\\1/p\'',$arr);   
        $ret = $arr[0];
        return $ret;
    }




    /**
     * jsonè½¬array
     * @param  [type] $jsonStr [jsonæ ¼å¼]
     * @return [type]      [arrayæ•°ç»„]
     */
    function json_to_array($jsonStr){
        $arr=array();
        foreach($jsonStr as $k=>$w){
            if(is_object($w)) $arr[$k]=json_to_array($w);  //åˆ¤æ–­ç±»å‹æ˜¯ä¸æ˜¯object
            else $arr[$k]=$w;
        }
        return $arr;
    }


    /**
     * æ£€æŸ¥å˜é‡æ˜¯å¦åŒ…å«ä¸­æ–‡
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
    //è§£æ key æ²¡æœ‰è¢«åŒå¼•å·å¼•èµ·æ¥çš„Json æ•°æ®ã€‚
    public static function exJsonDecode($s, $mode=false) {
      if(preg_match('/\w:/', $s))
        $s = preg_replace('/(\w+):/is', '"$1":', $s);
      return json_decode($s, $mode);
    } 


}
