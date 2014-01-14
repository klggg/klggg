<?php
//ajax对外接口
include "./biz.php";

/*
	$tmpHtml	= <<<EOF

<a href="javascript:show_doing(14384895,'徐俊雪沟通中')">徐俊雪（大大师音乐）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384896,'郑静钰沟通中')">郑静钰（大师大药店）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384897,'魏天鹏沟通中')">魏天鹏（大师大药店）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384898,'冯丹丽沟通中')">冯丹丽（大师大药店）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384899,'彭靖忆沟通中')">彭靖忆（大师烹饪）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384900,'吴珍雪沟通中')">吴珍雪（市场部）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384901,'严佳然沟通中')">严佳然（市场部）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384902,'吕熙天沟通中')">吕熙天（大师大高尔）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384903,'孟熙冲沟通中')">孟熙冲（大师烹饪）</a> 正在沟通中...<br/><a href="javascript:show_doing(14384904,'钱音念沟通中')">钱音念（大师烹饪）</a> 正在沟通中

EOF;

	$tmpHtml	= <<<EOF
                  <tr id="xiaodao" style="display:">
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                      	<td width="30">&nbsp;</td>
                      	<td><div class="talk_table_text2" style="max-height:115px; overflow:auto;">
                        <a target="_blank" href="service/new_xiaodaomsg.php?pid=14349978&xid=1921324&id=&msgid=5&msgid2=1&t=bank&f=progress&return=">一名全身黑衣的神秘人来到公司，称有要事与您相谈...</a></div></td>
                      </tr>
                     </table>
                    </td>
                  </tr>

EOF;
*/

$act	= $_POST['act'];
$html	= $_POST['html'];

//小道任务
if('xiaodao' == $act)
{
	echo json_encode(get_xiaodaomsg($html));
}

//得到批量执行后的pid
if('batch_pid' == $act)
{
	echo json_encode(get_batch_pid($html));
}


//得到批量执行后的pid
if('staff_list' == $act)
{
//	print_r(export_staff($html));
//	echo "staff_list";
	echo json_encode(export_staff($html));
}
