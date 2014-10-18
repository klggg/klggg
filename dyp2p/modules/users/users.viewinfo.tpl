<ul class="nav3">
<li><a href="{$_A.query_url}/viewinfo&user_id={$magic.request.user_id}" id="c_so">借款个人信息</a></li> 
<li><a href="{$_A.query_url}/viewinfo&type=1&user_id={$magic.request.user_id}">工作单位信息</a></li> 
<li><a href="{$_A.query_url}/viewinfo&type=2&user_id={$magic.request.user_id}">私营业主信息</a></li> 
<li><a href="{$_A.query_url}/viewinfo&type=3&user_id={$magic.request.user_id}">主要联系人</a></li>
<li><a href="{$_A.query_url}/viewinfo&type=4&user_id={$magic.request.user_id}">财务状况</a></li>
</ul> 
<div class="module_add">
{if $magic.request.type==""}
	{articles module="rating" function="GetInfoOne" user_id="$magic.request.user_id" var="var"}
	<div class="module_title"><strong>借款个人信息</strong></div>
	<div class="module_border">
		<div class="l">性别：</div>
		<div class="c">
			{$var.sex|linkages:"rating_sex"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">手机号码：</div>
		<div class="c">
			{$var.phone_num|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">出生日期：</div>
		<div class="c">
			{$var.birthday|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">最高学历：</div>
		<div class="c">
			{$var.edu|linkages:"rating_education"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">入学年份：</div>
		<div class="c">
			{$var.school_year|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">毕业院校：</div>
		<div class="c">
			{$var.school|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">婚姻状况：</div>
		<div class="c">
			{$var.marry|linkages:"rating_marry"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">有无子女：</div>
		<div class="c">
			{$var.children|linkages:"rating_children"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">是否有房：</div>
		<div class="c">
			{$var.house|linkages:"rating_house"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">是否有车：</div>
		<div class="c">
			{$var.is_car|linkages:"rating_car"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">户口所在地：</div>
		<div class="c">
			{$var.city|areas:"p,c"|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">居住地址：</div>
		<div class="c">
			{$var.address|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">居住电话：</div>
		<div class="c">
			{$var.phone|default:"-"}
		</div>
	</div>
	{/articles}
{elseif $magic.request.type==1}
	{articles module="rating" function="GetJobOne" user_id="$magic.request.user_id" var="var"}
	<div class="module_title"><strong>工作单位信息</strong></div>
	<div class="module_border">
		<div class="l">单位名称：</div>
		<div class="c">
			{$var.name|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">性质：</div>
		<div class="c">
			{$var.type|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">行业：</div>
		<div class="c">
			{$var.industry|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">人员规模：</div>
		<div class="c">
			{$var.peoples|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">入职时间：</div>
		<div class="c">
			{$var.worktime1|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">职务：</div>
		<div class="c">
			{$var.office|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">单位地址：</div>
		<div class="c">
			{$var.address|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">单位电话：</div>
		<div class="c">
			{$var.tel|default:"-"}
		</div>
	</div>
	{/articles}
{elseif $magic.request.type==2}
	{articles module="rating" function="GetCompanyOne" user_id="$magic.request.user_id" var="var"}
	<div class="module_title"><strong>私营业主信息</strong></div>
	<div class="module_border">
		<div class="l">名称：</div>
		<div class="c">
			{$var.name|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">执照号：</div>
		<div class="c">
			{$var.license_num|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">税务号(地税)：</div>
		<div class="c">
			{$var.tax_num_di|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">税务号(国税)：</div>
		<div class="c">
			{$var.tax_num_guo|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">地址：</div>
		<div class="c">
			{$var.address|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">租期：</div>
		<div class="c">
			{$var.rent_time|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">租金：</div>
		<div class="c">
			{$var.rent_money|default:"-"}
		</div>
	</div>
	{/articles}
{elseif $magic.request.type==3}
	{articles module="rating" function="GetContactOne" user_id="$magic.request.user_id" var="var"}
	<div class="module_title"><strong>主要联系人</strong></div>
	<div class="module_border">
		<div class="l">配偶姓名：</div>
		<div class="c">
			{$var.linkman2|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">配偶电话：</div>
		<div class="c">
			{$var.phone2|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">直系亲属1姓名：</div>
		<div class="c">
			{$var.linkman3|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">直系亲属1电话：</div>
		<div class="c">
			{$var.phone3|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">直系亲属2姓名：</div>
		<div class="c">
			{$var.linkman6|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">直系亲属2电话：</div>
		<div class="c">
			{$var.phone6|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同事1姓名：</div>
		<div class="c">
			{$var.linkman4|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同事1电话：</div>
		<div class="c">
			{$var.phone4|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同事2姓名：</div>
		<div class="c">
			{$var.linkman7|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同事2电话：</div>
		<div class="c">
			{$var.phone7|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">朋友1姓名：</div>
		<div class="c">
			{$var.linkman8|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">朋友1电话：</div>
		<div class="c">
			{$var.phone8|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">朋友2姓名：</div>
		<div class="c">
			{$var.linkman9|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">朋友2电话：</div>
		<div class="c">
			{$var.phone9|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同学1姓名：</div>
		<div class="c">
			{$var.linkman10|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同学1电话：</div>
		<div class="c">
			{$var.phone10|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同学2姓名：</div>
		<div class="c">
			{$var.linkman11|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">同学2电话：</div>
		<div class="c">
			{$var.phone11|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">紧急联系人姓名：</div>
		<div class="c">
			{$var.linkman5|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">紧急联系人电话：</div>
		<div class="c">
			{$var.phone5|default:"-"}
		</div>
	</div>
	{/articles}
{elseif $magic.request.type==4}
	<div class="module_title"><strong>财务状况</strong></div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr class="ytit1" >
			<td>分类</td>
			<td>类型</td>
			<td>名称</td>
			<td>金额</td>
			<td>其他说明</td>
		</tr>
		{list module="rating" var="loop" function ="GetFinanceList" user_id="$magic.request.user_id"}
		{foreach from=$loop.list item="item"}
		<tr {if $key%2==1} class="tr2"{/if}>
			<td>{if $item.use_type==1}收入{else}支出{/if}</td>
			<td>{if $item.use_type==1}
					{$item.type|linkages:"rating_revenue"}
				{else}
					{$item.type|linkages:"rating_payment"}
				{/if}
			</td>
			<td>{$item.name}</td>
			<td>{$item.account}</td>
			<td>{$item.other}</td>
		</tr>
		{/foreach}
		<tr align="center">
			<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
		</tr>
		{/list}
	</table>
{/if}
</div>