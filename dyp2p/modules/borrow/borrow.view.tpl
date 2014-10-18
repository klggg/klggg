<div class="module_add" >
	
	<div class="module_title"><strong>基本借款信息</strong></div>
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="r">
		<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/users/view&user_id={$_A.borrow_result.user_id}",500,230,"true","","true","text");'>	{$_A.borrow_result.username}</a>
		</div>
		<div class="s">状态：</div>
		<div class="c">
			{if $_A.borrow_result.borrow_account_yes==$_A.borrow_result.account && $_A.borrow_result.status==1}满标待审<input type="button"  src="{$_A.tpldir}/images/button.gif" align="absmiddle" value="满标审核" class="submit_button" onclick='tipsWindown("满标审核","url:get?{$_A.query_url}/full&fullcheck={$_A.borrow_result.borrow_nid}",500,300,"true","","false","text");'/>{else}{$_A.borrow_result.status|linkages:"borrow_status"}{if $_A.borrow_result.status==0} <input type="button"  src="{$_A.tpldir}/images/button.gif" align="absmiddle" value="借款初核" class="submit_button" onclick='tipsWindown("借款初核","url:get?{$_A.query_url}/first&check={$_A.borrow_result.borrow_nid}",500,300,"true","","false","text");'/>{/if}&nbsp;&nbsp;<input type="button"  src="{$_A.tpldir}/images/button.gif" align="absmiddle" value="发送短信" class="submit_button" onclick="window.location.href='{$_A.query_url}/first&s_nid={$_A.borrow_result.borrow_nid}';" />{/if}
		</div>
	</div>
	<div class="module_border">
		
		<div class="l">标题：</div>
		<div class="r">
			<strong>{$_A.borrow_result.name}</strong>
		</div>
		
		<div class="s">贷款号：</div>
		<div class="c">
			{$_A.borrow_result.borrow_nid}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">借款对象：</div>
		<div class="r" style="color:#FF0000">
			{$_A.borrow_result.borrow_object|linkages:"borrow_object"} (<a href="{$_A.admin_url}&&q=code/users/viewinfo{if $_A.borrow_result.borrow_object==1}&type=2{/if}&user_id={$_A.borrow_result.user_id}">查看用户资料</a>)
		</div>
		<div class="s">借款用途：</div>
		<div class="c">
			{$_A.borrow_result.borrow_use|linkages:"borrow_use"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">借款类型：</div>
		<div class="r">
			{if $_A.borrow_result.vouchstatus==1}担保标{elseif $_A.borrow_result.fast_status==1}快速标{else}信用标{/if}
		</div>
		
		<div class="s">还款方式：</div>
		<div class="c">
			{$_A.borrow_result.borrow_style|linkages:"borrow_style"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">借贷总金额：</div>
		<div class="r">
				￥{$_A.borrow_result.account}<input type="hidden" name="account" value="{$_A.borrow_result.account}" /> 
		</div>
		
		<div class="s">年利率：</div>
		<div class="c">
			{$_A.borrow_result.borrow_apr} %
		</div>

	</div>
	
	
	<div class="module_border">
		<div class="l">借款成功后冻结金额：</div>
		<div class="r">
			￥{$_A.borrow_result.frost_account|default:0}
		</div>	
		<div class="s">借款期限：</div>
		<div class="c">

		
		<FONT COLOR="#ec6c13">{if $_A.borrow_result.borrow_period == 0.03}1</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.06}2</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.10}3</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.13}4</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.16}5</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.20}6</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.23}7</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.26}8</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.30}9</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.33}10</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.36}11</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.40}12</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.43}13</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.46}14</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.50}15</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.53}16</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.56}17</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.60}18</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.63}19</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.66}20</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.70}21</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.73}22</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.76}23</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.80}24</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.83}25</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.86}26</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.90}27</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.93}28</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.96}29</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.10}30</font>天
                            	{elseif $_A.borrow_result.borrow_period >= 1 && $_A.borrow_result.borrow_period<10 }{$_A.borrow_result.borrow_period|truncate:1}</font>个月
                            	{else}{$_A.borrow_result.borrow_period|truncate:2}</font>个月
                            	{/if}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">最低投标金额：</div>
		<div class="r">
			{$_A.borrow_result.tender_account_min|linkages:"borrow_tender_account_min"}
		</div>
		<div class="s">最多投标总额：</div>
		<div class="c">
			{$_A.borrow_result.tender_account_max|linkages:"borrow_tender_account_max"|default:"-"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">&nbsp;</div>
		<div class="r">&nbsp;
		</div>
		<div class="s">有效时间：</div>
		<div class="c">
			{$_A.borrow_result.borrow_valid_time}天
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">是否部分借款：</div>
		<div class="r">
			{$_A.borrow_result.borrow_part_status|linkages:"borrow_part_status"|default:-}
		</div>
		<div class="s">显示类型：</div>
		<div class="c">
			{$_A.borrow_result.view_type|linkages:"borrow_view_type"|default:-}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">点击次数：</div>
		<div class="r">
			{$_A.borrow_result.hits|default:0}次
		</div>
		<div class="s">评论次数：</div>
		<div class="c">
			<a href="{$_A.admin_url}&q=code/comment/list&code=borrow&article_id={$_A.borrow_result.borrow_nid}">{$_A.borrow_result.comment_count}次</a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间：</div>
		<div class="r">
			{$_A.borrow_result.addtime|date_format}
		</div>
		<div class="s">添加IP：</div>
		<div class="c">
			{$_A.borrow_result.addip}
		</div>
	</div>
	
	{if $_A.borrow_result.status>0}
	<div class="module_title"><strong>借款状态</strong> (<a href="{$_A.query_url}/tender&borrow_nid={$_A.borrow_result.borrow_nid}">查看投资信息</a>)</div>
	
	
	<div class="module_border">
		<div class="l">已借到的金额：</div>
		<div class="r">
			<font color="#009900">￥{$_A.borrow_result.borrow_account_yes}</font>
		</div>
		<div class="s">未借到的金额：</div>
		<div class="c">
			<font color="#FF0000">￥{$_A.borrow_result.borrow_account_wait}</font>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">投标的次数：</div>
		<div class="r">
			{$_A.borrow_result.tender_times}次
		</div>
		<div class="s">最后投资时间：</div>
		<div class="c">
			{$_A.borrow_result.tender_last_time|date_format|default:"-"}
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">初审时间：</div>
		<div class="r">
			{$_A.borrow_result.verify_time|date_format}
		</div>
		<div class="s">初审备注：</div>
		<div class="c">
			{$_A.borrow_result.verify_remark}
		</div>
	</div>
	{if $_A.borrow_result.status>=1}
	
	<div class="module_title"><strong>投标列表</strong></div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">投资人</td>
			<td width="*" class="main_td">投资金额</td>
			<td width="" class="main_td">有效金额</td>
			<td width="" class="main_td">投资时间</td>
			<td width="" class="main_td">投资理由</td>
		</tr>
		{ loop module="borrow" function="GetTenderList" limit="all" borrow_nid='$_A.borrow_result.borrow_nid' var="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{ $item.id}<input type="hidden" name="id[]" value="{ $item.id}" /></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/users/view&user_id={$item.user_id}",500,230,"true","","true","text");'>	{$item.username}</a></td>
			<td>{$item.account_tender}元</td>
			<td>{$item.account}元</td>
			<td>{$item.addtime|date_format}</td>
			<td>{$item.contents}</td>
		</tr>
		{ /loop}
</table>
	
	{/if}
	
	{/if}
	
	
	{if $_A.borrow_result.borrow_full_status==1  || $_A.borrow_result.is_flow==1}
	<div class="module_title"><strong>还款信息</strong>(<a href="{$_A.query_url}/borrow_repay&borrow_nid={$_A.borrow_result.borrow_nid}">查看还款信息</a>)</div>
	
	
	<div class="module_border">
		<div class="l">借款总额：</div>
		<div class="r">
			<font color="#009900">￥{$_A.borrow_result.borrow_account_yes}</font>
		</div>
		<div class="s">应还总额：</div>
		<div class="c">
			￥{$_A.borrow_result.repay_account_all}
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">已还总额：</div>
		<div class="r">
			￥{$_A.borrow_result.repay_account_yes}
		</div>
		<div class="s">未还总额：</div>
		<div class="c">
			￥{$_A.borrow_result.repay_account_wait}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">已还本金：</div>
		<div class="r">
			￥{$_A.borrow_result.repay_account_capital_yes}
		</div>
		<div class="s">未还本金：</div>
		<div class="c">
			￥{$_A.borrow_result.repay_account_capital_wait}
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">已还利息：</div>
		<div class="r">
			￥{$_A.borrow_result.repay_account_interest_yes}
		</div>
		<div class="s">未还利息：</div>
		<div class="c">
			￥{$_A.borrow_result.repay_account_interest_wait}
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">复审时间：</div>
		<div class="r">
			{$_A.borrow_result.reverify_time|date_format}
		</div>
		<div class="s">复审备注：</div>
		<div class="c">
			{$_A.borrow_result.reverify_remark}
		</div>
	</div>
	{/if}
	
	
	<div class="module_title"><strong>设置奖励</strong></div>
	<div class="module_border">
		<div class="l">奖励类型：</div>
		<div class="r">
			 {$_A.borrow_result.award_status|linkages:"borrow_award_status"}{if $_A.borrow_result.award_false==1}(审核失败也奖励){/if}
		</div>
		 {if $_A.borrow_result.award_status>0}
		<div class="s">奖励方式：</div>
		<div class="c">
			{if $_A.borrow_result.award_status==1}
			 ￥{$_A.borrow_result.award_account}
			 {else}
			 {$_A.borrow_result.award_scale}%
			 {/if}
		</div>
		{/if}
	</div>
	
	
	{if $_A.borrow_result.vouch_status==1}
	<div class="module_title"><strong>担保奖励</strong></div>
	<div class="module_border">
		<div class="l">是否进行奖励：</div>
		<div class="c">
			{if $_A.borrow_result.vouch_award_status==1}是{else}否{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">是否固定所要担保人：</div>
		<div class="r">
			{ $_A.borrow_result.vouch_user_status|linkages:"borrow_vouch_user_status"}
		</div>
		<div class="s">固定担保人：</div>
		<div class="c">
			{if $_A.borrow_result.vouch_user_status==0}-{else}{ $_A.borrow_result.vouch_users|deault:-}{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">总担保金额：</div>
		<div class="r">
			￥{$_A.borrow_result.vouch_account}
		</div>
		<div class="s">已担保比例：</div>
		<div class="c">
			{$_A.borrow_result.vouch_account_scale }%
		</div>
	</div>
	<div class="module_border">
		
		<div class="l">已担保金额：</div>
		<div class="r">
			￥{$_A.borrow_result.vouch_account_yes }
		</div>
		<div class="s">未担保金额：</div>
		<div class="c">
			￥{$_A.borrow_result.vouch_account_wait }
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">是否担保奖励：</div>
		<div class="r">
			{$_A.borrow_result.vouch_award_status|linkages:"borrow_vouch_award_status" }
		</div>
		<div class="s">担保奖励方式：</div>
		<div class="c">
			{if $_A.borrow_result.vouch_award_status==2}
			 ￥{$_A.borrow_result.vouch_award_account}
			 {else}
			 {$_A.borrow_result.vouch_award_scale}%
			 {/if}
		</div>
	</div>
	
	<div class="module_title"><strong>担保列表</strong></div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">担保人</td>
			<td width="*" class="main_td">担保金额</td>
			<td width="" class="main_td">有效金额</td>
			<td width="" class="main_td">担保时间</td>
			<td width="" class="main_td">担保理由</td>
		</tr>
		{ loop module="borrow" function="GetVouchList" limit="all" borrow_nid='$_A.borrow_result.borrow_nid' var="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{ $item.id}<input type="hidden" name="id[]" value="{ $item.id}" /></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/users/view&user_id={$item.user_id}",500,230,"true","","true","text");'>	{$item.username}</a></td>
			<td>{$item.account_vouch}元</td>
			<td>{$item.account}元</td>
			<td>{$item.addtime|date_format}</td>
			<td>{$item.contents}</td>
		</tr>
		{ /loop}
</table>
	{/if}
	<form action="{$_A.query_url_all}/wind&view={$_A.borrow_result.borrow_nid}" enctype="multipart/form-data"  method="post">
	<div class="module_title"><strong>风控介绍</strong>    <input  type="submit"  src="{$_A.tpldir}/images/button.gif" align="absmiddle" value="保存风控" class="submit_button"  />	</div>
	<div class="module_border" >
		<textarea id="wind_control" name="wind_control" rows="22" cols="680" style="width: 80%">
		{if $_A.borrow_result.wind_control==""}
		{literal}
		<style>
.main_box{ border:#e5e5e5 solid 1px}
.main_box .con{ padding:20px 10px; line-height:20px;}
.title_bor a{ float:left; line-height:38px; background: url(/themes/rongzi/huaxin/images/title_bor_a.gif) no-repeat; width:104px; display:inline-block; text-align:center; color:#6d6d6d; font-size:16px; text-decoration:none;font-family:Microsoft YaHei}
.title_bor a.on{ background:url(/themes/rongzi/huaxin/images/title_bor_a_on.gif) no-repeat}
.title_bor span{ float:right; padding-right:10px}
.title_bor span a{ line-height:38px; font-family:"宋体"; font-size:12px; background:none; padding-right:10px;width:auto}
.title_bor{ background:url(/themes/rongzi/huaxin/images/title_bor_bg.gif) repeat-x; border-bottom:#cacaca solid 1px; height:38px; line-height:38px;}
</style>
{/literal}
		<div class="main_box t20">            
	<div class="title_bor">
		<a class="on">风控介绍</a>
	</div>            
	<div>                
		<div class="con">
			内容
		</div>            
	</div>        
</div>
<div class="main_box t20">
	<div class="title_bor">
		<a class="on">商业概述</a>
	</div>
	<div>
		<div class="con">
			内容
		</div>
	</div>
</div>
<div class="main_box t20">
	<div class="title_bor">
		<a class="on">资产情况</a>
	</div>
	<div>
		<div class="con">
			内容
		</div>
	</div>
</div>
<div class="main_box t20">
	<div class="title_bor">
		<a class="on">资金用途</a>
	</div>
	<div>
		<div class="con">
			内容
		</div>
	</div>
</div>
<div class="main_box t20">
	<div class="title_bor">
		<a class="on">风险控制措施</a>
	</div>
	<div>
		<div class="con">
			内容
		</div>
	</div>
</div>
		{else}
		{$_A.borrow_result.wind_control}
		{/if}</textarea>	
		
	<script>var admin_url = "/{$_A.admin_url}";{literal}$('#wind_control').xheditor({skin:'o2007blue',upImgUrl:admin_url+"&q=plugins&p=xheditor&immediate=1",upImgExt:"jpg,jpeg,gif,png"});</script>{/literal}
	</div>
	</form>
	<div class="module_title"><strong>借款详情</strong></div>
	<div class="module_border" >
		<textarea id="borrow_contents" name="borrow_contents" rows="22" cols="680" style="width: 80%">{$_A.borrow_result.borrow_contents}</textarea>		
	{literal}<script>$('#borrow_contents').xheditor({tools:'Source'});</script>{/literal}
	</div>
	
	
</div>