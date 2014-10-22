//得到选中员工
//whereForm 哪个表示的员工列表 目前有收藏员工列表
function biz_get_select_staff(whereForm)
{
	if(typeof(whereForm) == 'undefined')
		whereForm	= '#staff_list_form1';

	var select_staff_array = Array();
	if(whereForm== '#staff_list_form1')
	{
		$(whereForm+"  input:checked[name$='select_staff_array1']").each(function() {
			select_staff_array.push($(this).val());
		});
	}else if(whereForm== '#staff_list_form2')
	{
		$(whereForm+"  input:checked[name$='select_staff_array2']").each(function() {
			select_staff_array.push($(this).val());
		});
	}
//	alert(select_staff_array.join('|'));
	
	return select_staff_array;

}


//根据员工编号数组得到xxx
//staffType 员工类型    1 要批量执行的员工 2 收藏列表里的员工
function biz_staff_get_selected(staffType)
{
	var all_staff_array	= {};
	var select_staff	= [];

	//从要批量执行的员工取
	if(1 == staffType)
	{
		select_staff	= biz_get_select_staff('#staff_list_form1');
		all_staff_array	= g_staff_array;
	}
	//从收藏列表里取
	else if(2 == staffType)
	{
		select_staff	= biz_get_select_staff('#staff_fav_list_form');
		all_staff_array	= g_staff_fav_array;
	}
	else
		return false;

	if (select_staff.length <1)
	{
		return false;
	}

	var ret_staff_array	= {};
	var staff_numb	= null;
	for(var tmp_i=0; tmp_i < select_staff.length; tmp_i++)
	{
		staff_numb	 = select_staff[tmp_i];
		ret_staff_array[staff_numb]	= all_staff_array[staff_numb];
	}
	return ret_staff_array;
}

//移除选中的员工
function biz_remove_staff(select_form)
{
	var select_staff	= biz_get_select_staff('#'+select_form);

	if (select_staff.length <1 || !window.confirm("大老板,确定要移除选中的员工吗？"))
	{
		return false;
	}

	var staff_numb	= null;
	for(var tmp_i=0; tmp_i < select_staff.length; tmp_i++)
	{
		staff_numb	 = select_staff[tmp_i];
		//删除
		delete g_staff_array[staff_numb];
		$("#staff_"+staff_numb).parent().parent().remove();
		g_staff_count--;
	}
}

//收藏中移除选中的员工
function biz_remove_staff_fav()
{
	var select_staff	= biz_get_select_staff('#staff_fav_list_form');

	if (select_staff.length <1 || !window.confirm("大老板,确定要移除收藏里选中的员工吗？"))
	{
		return false;
	}

	var staff_numb	= null;
	for(var tmp_i=0; tmp_i < select_staff.length; tmp_i++)
	{
		staff_numb	 = select_staff[tmp_i];
		$("#staff_fav_"+staff_numb).parent().parent().remove();
		//删除
		delete g_staff_fav_array[staff_numb];
	}
}

//选中的员工到收藏列表
function biz_fav_from_staff()
{

	var select_staff	= biz_get_select_staff('#staff_list_form1');

	if (select_staff.length <1)
	{
		return false;
	}

	var staff_array	= {};
	var staff_numb	= null;
	for(var tmp_i=0; tmp_i < select_staff.length; tmp_i++)
	{
		staff_numb	 = select_staff[tmp_i];
		staff_array[staff_numb]	= g_staff_array[staff_numb];
	}
	//追加到员工列表
	biz_staff_fav_add(staff_array);

	alert('加了 '+select_staff.length+' 个员工到收藏夹');

	//先得到当前选中的员工，方便重新加载后进行再次选中
	select_staff	= biz_get_select_staff('#staff_fav_list_form');
	//显示员工列表
	biz_show_staff(g_staff_fav_array,'#staff_fav_list','staff_fav_');

	//选中之前的员工
	jQuery.each(select_staff, function(i, val) {
		$("#staff_fav_"+val).attr("checked",true);
	});

	return true;

}

//从收藏夹里追加选中的员工到操作列表
function biz_staff_from_fav()
{

	var select_staff	= biz_get_select_staff('#staff_fav_list_form');

	if (select_staff.length <1)
	{
		return false;
	}

	var staff_array	= {};
	var staff_numb	= null;
	for(var tmp_i=0; tmp_i < select_staff.length; tmp_i++)
	{
		staff_numb	 = select_staff[tmp_i];
		staff_array[staff_numb]	= g_staff_fav_array[staff_numb];
	}
	//追加到员工列表
	biz_staff_add(staff_array);

	alert('从收藏夹里追加了 '+select_staff.length+' 个员工');

	//先得到当前选中的员工，方便重新加载后进行再次选中
	select_staff	= biz_get_select_staff();
	//显示员工列表
	biz_show_staff(g_staff_array,'#staff_list1');

	//选中之前的员工
	jQuery.each(select_staff, function(i, val) {
		$("#staff_"+val).attr("checked",true);
	});

	return true;

}
//从文件里加载已收藏的员工
function biz_load_staff_fav()
{
	var staff_list_obj	 ={};
	var staff_id	 =null;


	var save_to	= $("#biz_staff_save_filename").val();
	save_to	= "save\\"+save_to+".xml";     //sSWans,自动加扩展名.xml

	Tools.getConfig(save_to, function(xmlDoc){
		var staff_array = xmlDoc.getElementsByTagName("staff");
		var tmp_array	= [];
		for(var i=0; i<staff_array.length; i++)
		{
			staff_id	= staff_array[i].getAttribute("id");
			staff_list_obj[staff_id]	= {};
			staff_list_obj[staff_id]["编号"]	= staff_id;
			staff_list_obj[staff_id]["姓名"]	= staff_array[i].getAttribute("name");
			staff_list_obj[staff_id]["爱好"]	= staff_array[i].getAttribute("hobby");
			staff_list_obj[staff_id]["单位"]	= staff_array[i].getAttribute("company");
			staff_list_obj[staff_id]["等级"]	= parseInt(staff_array[i].getAttribute("level"));


			tmp_array	= staff_array[i].getAttribute("experience").split(",");
			staff_list_obj[staff_id]["经验"]	= {};
			staff_list_obj[staff_id]["经验"]["当前"]	= parseInt(tmp_array[0]);
			staff_list_obj[staff_id]["经验"]["最大"]	= parseInt(tmp_array[1]);


			tmp_array	= staff_array[i].getAttribute("ability").split(",");
			staff_list_obj[staff_id]["能力"]	= {};
			staff_list_obj[staff_id]["能力"]["当前"]	= parseInt(tmp_array[0]);
			staff_list_obj[staff_id]["能力"]["最大"]	= parseInt(tmp_array[1]);


			tmp_array	= staff_array[i].getAttribute("allegiance").split(",");
			staff_list_obj[staff_id]["忠诚"]	= {};
			staff_list_obj[staff_id]["忠诚"]["当前"]	= parseInt(tmp_array[0]);
			staff_list_obj[staff_id]["忠诚"]["最大"]	= parseInt(tmp_array[1]);

			tmp_array	= staff_array[i].getAttribute("character").split(",");
			staff_list_obj[staff_id]["人品"]	= {};
			staff_list_obj[staff_id]["人品"]["当前"]	= parseInt(tmp_array[0]);
			staff_list_obj[staff_id]["人品"]["最大"]	= parseInt(tmp_array[1]);


			tmp_array	= staff_array[i].getAttribute("strength").split(",");
			staff_list_obj[staff_id]["体力"]	= {};
			staff_list_obj[staff_id]["体力"]["当前"]	= parseInt(tmp_array[0]);
			staff_list_obj[staff_id]["体力"]["最大"]	= parseInt(tmp_array[1]);


			staff_list_obj[staff_id]["周薪"]	= parseInt(staff_array[i].getAttribute("salary"));
			staff_list_obj[staff_id]["合约"]	= staff_array[i].getAttribute("expire");
			staff_list_obj[staff_id]["技能"]	= staff_array[i].getAttribute("skill");

		}

	});
	g_staff_fav_array	= staff_list_obj;

	biz_show_staff(g_staff_fav_array,'#staff_fav_list','staff_fav_');
	return staff_list_obj;
}

//保存收藏的员工
function biz_staff_fav_save()
{
	var staffs	 = g_staff_fav_array;
	var content_array	= [];
	//火狐
	if (navigator.userAgent.indexOf("Firefox") > 0) 
		content_array.push("<?xml version=\"1.0\" encoding=\"utf-8\"?>");
	else
		content_array.push("<?xml version=\"1.0\" encoding=\"gb2312\"?>");
	content_array.push("\n<staffs>");
	var staff_count	= 0;
	for( staff_numb in staffs)
	{
		curr_record	= staffs[staff_numb];
		content_array.push("\n<staff ");
		content_array.push('id="'+staff_numb+'" ');
		content_array.push('name="'+curr_record["姓名"].replace(/<(.+?)>/gi,"&lt;$1&gt;")+'" ');
		content_array.push('hobby="'+curr_record["爱好"]+'" ');
		content_array.push('company="'+curr_record["单位"]+'" ');


//		content_array.push('name="'+encodeURIComponent(curr_record["姓名"])+'" ');
//		content_array.push('hobby="'+encodeURIComponent(curr_record["爱好"])+'" ');
//		content_array.push('company="'+encodeURIComponent(curr_record["单位"])+'" ');

		content_array.push('level="'+curr_record["等级"]+'" ');
		content_array.push('experience="'+curr_record["经验"]['当前']+','+curr_record["经验"]['最大']+'" ');
		content_array.push('ability="'+curr_record["能力"]['当前']+','+curr_record["能力"]['最大']+'" ');
		content_array.push('allegiance="'+curr_record["忠诚"]['当前']+','+curr_record["忠诚"]['最大']+'" ');
		content_array.push('character="'+curr_record["人品"]['当前']+','+curr_record["人品"]['最大']+'" ');
		content_array.push('strength="'+curr_record["体力"]['当前']+','+curr_record["体力"]['最大']+'" ');
		content_array.push('salary="'+curr_record["周薪"]+'" ');
		content_array.push('expire="'+curr_record["合约"]+'" ');
		content_array.push('skill="'+curr_record["技能"]+'" ');

		content_array.push(" />");

		staff_count++;
	}
	content_array.push("\n</staffs>");

	if(staff_count > 0)
	{
		var save_to	= $("#biz_staff_save_filename").val();
		save_to	= "save\\"+save_to+".xml";     //sSWans,自动加扩展名.xml
//alert(save_to);
		Tools.saveConfig(content_array.join(""), save_to);
		return true;
	}
	return false;
}

//显示员工列表
//staffs 要显示的员工列表 json格式
//whereDom 列表内容显示在哪个容器
//staffPrefix 前缀 员工id命名
function biz_show_staff(staffs,whereDom,staffPrefix)
{
//alert(Serialize(staff_list_obj));
//return;
	var curr_record	= [];
	var tmp_i	= 0;
	var staff_name	= [];
	var staff_list_html	= [];

 
	var staff_url	= 'http://'+biz_server_id()+'.'+biz_server_host()+'/company/staff_info-2.php?staff_id=';

	if(typeof(staffPrefix) == 'undefined')
		staffPrefix	= 'staff_';

	for( staff_numb in staffs)
	{
		curr_record	= staffs[staff_numb];
		tmp_i++;


		staff_list_html.push('<tr  onmouseout="this.className=\'out\';" onmouseover="this.className=\'over\';" ');

//		staff_list_html.push(' onclick="document.getElementById(\'staff_'+curr_record["编号"]+'\').checked=document.getElementById(\'staff_'+curr_record["编号"]+'\').checked?false:true;" ');

		staff_list_html.push('>');


		staff_list_html.push('<td height=20 align="center" >'+tmp_i+'</td>');

		staff_list_html.push('<td >');
//显示员工标记
//		staff_list_html.push('<a href="javascript:void(0);" onmousedown="biz_staff_mark(this,\''+staff_numb+'\');"><img border=0 title="收藏员工" src="./images/staff_mark.gif"/></a>');
		staff_list_html.push('<a target="staff_"'+staff_numb+' href="'+staff_url+staff_numb+'"> '+curr_record["姓名"]+'</td>');

		staff_list_html.push('<td >'+curr_record["爱好"]+'</td>');
		staff_list_html.push('<td >'+curr_record["单位"]+'</td>');
		//alert(parseInt(curr_record["等级"])>=4);
		if(parseInt(curr_record["等级"])>=4 && (curr_record["经验"]['当前']/curr_record["经验"]['最大'])>=0.5 && (curr_record["能力"]['当前']/curr_record["能力"]['最大'])>=0.5 && (curr_record["忠诚"]['当前']/curr_record["忠诚"]['最大'])>=0.5 && whereDom=='#staff_list2')
		{
			staff_list_html.push('<td >'+"<a style='cursor:pointer' onmouseover=\"this.style.backgroundColor='#00cc00';\" onmouseout=\"this.style.backgroundColor='';\" onclick='javascript:staff_level_win_show(" + staff_numb+ ",this);'>&nbsp;"+curr_record["等级"]+"级&nbsp;</a>"+'</td>');
		}else
		{
			staff_list_html.push('<td >&nbsp;'+curr_record["等级"]+'级&nbsp;</td>');
		}

		staff_list_html.push('<td ');
		if(parseInt(curr_record["经验"]['当前']) >= parseInt(curr_record["经验"]['最大']))
			staff_list_html.push(' style="color:red"');
		staff_list_html.push('>'+curr_record["经验"]['当前']);

		staff_list_html.push('/'+curr_record["经验"]['最大']+'</td>');

		staff_list_html.push('<td ');
		if(parseInt(curr_record["能力"]['当前']) >= parseInt(curr_record["能力"]['最大']))
			staff_list_html.push(' style="color:red"');
		staff_list_html.push('>'+curr_record["能力"]['当前']);
		staff_list_html.push('/'+curr_record["能力"]['最大']+'</td>');

		staff_list_html.push('<td ');
		if(parseInt(curr_record["忠诚"]['当前']) >= parseInt(curr_record["忠诚"]['最大']))
			staff_list_html.push(' style="color:red"');
		staff_list_html.push('>'+curr_record["忠诚"]['当前']);
		staff_list_html.push('/'+curr_record["忠诚"]['最大']+'</td>');


		staff_list_html.push('<td ');
		if(parseInt(curr_record["人品"]['当前']) >= parseInt(curr_record["人品"]['最大']))
			staff_list_html.push(' style="color:red"');
		staff_list_html.push('>'+curr_record["人品"]['当前']);
		staff_list_html.push('/'+curr_record["人品"]['最大']+'</td>');

		staff_list_html.push('<td >'+curr_record["体力"]['当前']);
		staff_list_html.push('/'+curr_record["体力"]['最大']+'</td>');

		staff_list_html.push('<td >'+curr_record["周薪"]+'G</td>');
		staff_list_html.push('<td >'+curr_record["合约"]+'天</td>');
/////////////////////////////改动/////////////////////////////////////////////////
//alert(whereDom);
		if(whereDom=='#staff_list2')
		{
			var skill_text_list,skill_name,tmp2;
			var skill_list=curr_record["技能"].split(/\n/);
			//var sss=curr_record["技能"].replace(/:\d/g,'');
			//alert(sss.replace(/\n/g,'|'));
			//alert(sss.replace(/\n/g,'|')=='经营|人际|营销');
			//alert(skill_list.length);
			skill_text_list="";
			for(ii in skill_list)
			{
				tmp2=skill_list[ii].split(":");
				//alert(tmp2.length);
				skill_name=tmp2[0];
				if(parseInt(tmp2[1])<6)
				{
					skill_text_list+="<a style='cursor:pointer' onmouseover=\"this.style.backgroundColor='#ffff00';\" onmouseout=\"this.style.backgroundColor='';\" onclick='javascript:show_skill_win(" + staff_numb+ ",this);'>"+skill_list[ii]+"</a>&nbsp;";
				}
				else
				{
					skill_text_list+=skill_list[ii]+"&nbsp;";
				}
				//skill_text_list+="<a onclick='javascript:alert(this.innerText);'>"+skill_list[ii]+"</a>&nbsp;";
			}
			//alert(skill_list[0]);
			//alert(skill_text_list);
			staff_list_html.push('<td >&nbsp;'+skill_text_list+'</td>');
			staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_staff_array2" id="'+staffPrefix+curr_record["编号"]+'"  value="'+curr_record["编号"]+'" onclick="biz_staff_select_count(2)" /></td>');  //sSWans,在列表每个员工的复选框添加onclick触发事件
	///////////////////////////////////////////////////////////////////////////////////
			//staff_list_html.push('<td >'+curr_record["技能"]+'</td>');
	
		}
		else
		{
			staff_list_html.push('<td >'+curr_record["技能"]+'</td>');
			
			if(curr_record["体力"]['当前'] < 1)
			{
				staff_list_html.push('<td>无体力</td>');
			}
			else
				staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_staff_array1" id="'+staffPrefix+curr_record["编号"]+'"  value="'+curr_record["编号"]+'" onclick="biz_staff_select_count(1)" /></td>');  //sSWans,在列表每个员工的复选框添加onclick触发事件
		}
		staff_list_html.push("</tr>");

		staff_name.push(curr_record["姓名"]);
	}


	//显示新加载的员工
	$(whereDom).html(staff_list_html.join(''));


}
//sSWans,选中人数处理函数
function biz_staff_select_count(select_form_num)
{
	
	select_staff = biz_get_select_staff('#staff_list_form'+select_form_num);
	//alert('#staff_list_form'+select_form_num);
	//alert(select_staff.length);
	document.getElementById("count_selected"+select_form_num).innerHTML = select_staff.length;
	}

//从html内容里解析出部门
//返回 json数据的数据
function biz_get_department_from_html(allHtml)
{
//   arr_object_type["department||1"] = "&nbsp;&nbsp;&nbsp;行政人事部";
	var return_json	= {};
	var myregexp = /department\|\|([0-9]+)".*"(.*)"/ig;
	var match = myregexp.exec(allHtml);
	while (match != null) {
		return_json[match[1]]	= match[2];
		match = myregexp.exec(allHtml);
	}
	 return return_json;
}

//从html内容里解析出店铺
//返回 json数据的数据
function biz_get_shop_from_html(allHtml)
{
//arr_object_type["shop||118487"] = "&nbsp;&nbsp;&nbsp;A区&nbsp;大大师便利&nbsp;便利店";
	var return_json	= {};
	var myregexp = /shop\|\|([0-9]+)".*"(.*)"/ig;
	var match = myregexp.exec(allHtml);
	while (match != null) {
		return_json[match[1]]	= match[2];
		match = myregexp.exec(allHtml);
	}
	 return return_json;
}

//从html内容里解析出员工列表
//返回 json数据的员工数据
function biz_get_staff_from_html(allHtml)
{

	//员工等级和三围的最大值关系  csg
	var level_max	= {
		 '0':50
		,'1':100
		,'2':200
		,'3':400
		,'4':800
		,'5':1600
	};


	var staff_list_obj	 ={};
	var staff_id	 =null;

//根据员工列表导
//var myregexp = /<span \s*id=\"staff_name([^>]+)\">(.*)<\/span>[\s\S]*?<td [\s\S]*?>([\s\S]*?)<\/td>[\s\S]*?<tr>[\s\S]*?<td[\s\S]*?>[\s\S]*?<span[^>]+[\s\S]*?>([^<]+)[\s\S]*?<\/td>[\s\S]*?当前等级：([0-9]+)[\s\S]*?当前经验：([0-9]+)\/([0-9]+)[\s\S]*?当前能力：([0-9]+)\/([0-9]+)[\s\S]*?忠诚度[\s\S]*?<div [^>]+>[\s\S]*?>([0-9]+)[\s\S]*?当前人品：([0-9]+)\/([0-9]+)[\s\S]*?当前体力：([0-9]+)\/([0-9]+)[\s\S]*?员工周薪[\s\S]*?<td[\s\S]*?<td[^>]+[\s\S]*?([0-9]+)[\s\S]*?<td[^>]+[\s\S]*?([0-9]+)[\s\S]*?<td[\s\S]*?[\s\S]*?<td[^>]+[\s\S]*?>([\s\S]*?)<\/td>/gm;

var myregexp = /<tr id=\Wstaff_tr\d+[\s\S]+?<span id=\Wstaff_name(\d+)[^>]>([\s\S]+?) <\/span>[\s\S]*?<font .*>([\s\S]*?)<\/font[\s\S]*?<tr>[\s\S]*?<td.*?>(.*)<\/td>[\s\S]*?当前等级：([0-9]+)[\s\S]*?当前经验：([0-9]+)\/([0-9]+)[\s\S]*?当前能力：([0-9]+)\/([0-9]+)[\s\S]*?忠诚度达到([0-9]+)[\s\S]*?<div [^>]+>[\s\S]*?>([0-9]+)[\s\S]*?当前人品：([0-9]+)\/([0-9]+)[\s\S]*?当前体力：([0-9]+)\/([0-9]+)[\s\S]*?(\d+)<\/td>[\s\S]*?(\d+)天后[\s\S]*?<td[^>]+>([\s\S]*?)<\/td>/ig;

//根据批量动作导 可以自动跳过正在执行任务的员工
//	var myregexp = /<span \s*id=\"staff_name([^>]+)\">(.*)<\/span>[\s\S]*?<font .*>([\s\S]*?)<\/font[\s\S]*?<tr>[\s\S]*?<td.*?>(.*)<\/td>[\s\S]*?当前等级：([0-9]+)[\s\S]*?当前经验：([0-9]+)\/([0-9]+)[\s\S]*?当前能力：([0-9]+)\/([0-9]+)[\s\S]*?忠诚度达到([0-9]+)[\s\S]*?<div [^>]+>[\s\S]*?>([0-9]+)[\s\S]*?当前人品：([0-9]+)\/([0-9]+)[\s\S]*?当前体力：([0-9]+)\/([0-9]+)[\s\S]*?<td[\s\S]*?<td[^>]+>([0-9]+)G[\s\S]*?<span[\s\S]*?([0-9]+)天[\s\S]*?<td[^>]+>([\s\S]*?)<\/td>/ig;

	//找到公司
	var company_regexp = /<span [^>]+>(.*)<\/span>/i;
	
	var department_regexp = /<a [^>]+>([^<]+)<\/a>/i;

	var company_other_regexp = /(.*)<span/i;;
	var tmp_match;
 	var tmp_val;
	//员工三围的最大值
	var max_score	 = 0;
	//myregexp = /<span([^<]|<(?!\/span>))*<\/span>/gm;

	var match = myregexp.exec(allHtml);
	while (match != null) {

		//不加载无体力的员工
		if(match[14] < 1)
		{
			match = myregexp.exec(allHtml);
			continue;
		}
		staff_id	= match[1];


		staff_list_obj[staff_id]	= {};
		staff_list_obj[staff_id]["编号"]	= match[1];
		staff_list_obj[staff_id]["姓名"]	= match[2].replace(/\n| /g,'');

		staff_list_obj[staff_id]["爱好"]	= $.trim(match[3]);
//alert(staff_list_obj[staff_id]["爱好"]);
//alert(staff_list_obj[staff_id]["姓名"]);
		//得到单位
//<a href="javascript:div_page('../enterprise/inner-shop_info2.php?shop_id=128834' , '大师大美容美容院' , 680,420 )"><span onmousemove="show_description('大师大美容美容院')" onmouseout="hide_description()" >大师大美容美容院</span></a>
//行政人事员 <span   style="cursor:pointer;color:red;"  onmousemove="show_description('点击为员工安排工作岗位')" onmouseout="hide_description()" onclick="forward_page(0,'adjust_staff_inner.php?adjust=1&staff_id=573051','工作调配',600,330);" >空闲</span>
//<a href="admin_hr.php">行政人事部</a>
		if(match[4].indexOf('span') != -1)
		{
			tmp_match = company_regexp.exec(match[4]);
			if(tmp_match != null)
			{
				tmp_val	= $.trim(tmp_match[1]);
				if(tmp_val == '空闲')
				{
					tmp_match = company_other_regexp.exec(match[4]);
					staff_list_obj[staff_id]["姓名"]	= match[2] +"["+tmp_val+"]";
					staff_list_obj[staff_id]["单位"]	= tmp_match[1];
				}
				else
					staff_list_obj[staff_id]["单位"]	= tmp_val;
			}
		}
		else
		{
			tmp_match = department_regexp.exec(match[4]);
			if(!tmp_match || !tmp_match[1] || typeof(tmp_match[1]) == 'undefined'  )
			{
//				alert(match[4]);
//				alert(tmp_match);
//				alert(tmp_match[1]);
//				return;
				staff_list_obj[staff_id]["单位"]	= "???";
			}
			else
				staff_list_obj[staff_id]["单位"]	= tmp_match[1];
		}

		staff_list_obj[staff_id]["等级"]	= parseInt(match[5]);
		max_score	= parseInt(level_max[staff_list_obj[staff_id]["等级"]]);

		staff_list_obj[staff_id]["经验"]	= {};
		staff_list_obj[staff_id]["经验"]["当前"]	= parseInt(match[6]);
		staff_list_obj[staff_id]["经验"]["最大"]	= max_score;


		staff_list_obj[staff_id]["能力"]	= {};
		staff_list_obj[staff_id]["能力"]["当前"]	= parseInt(match[8]);
		staff_list_obj[staff_id]["能力"]["最大"]	= max_score;


		staff_list_obj[staff_id]["忠诚"]	= {};
		staff_list_obj[staff_id]["忠诚"]["最大"]	=  max_score;
		staff_list_obj[staff_id]["忠诚"]["当前"]	= parseInt(match[11]);


		staff_list_obj[staff_id]["人品"]	= {};
		staff_list_obj[staff_id]["人品"]["当前"]	= parseInt(match[12]);
		staff_list_obj[staff_id]["人品"]["最大"]	=  parseInt(match[13]);

		staff_list_obj[staff_id]["体力"]	= {};
		staff_list_obj[staff_id]["体力"]["当前"]	= parseInt(match[14]);
		staff_list_obj[staff_id]["体力"]["最大"]	= parseInt(match[15]);
//		staff_list_obj[staff_id]["体力"]["最大"]	=  max_score;

		staff_list_obj[staff_id]["周薪"]	= parseInt(match[16]);
		staff_list_obj[staff_id]["合约"]	= $.trim(match[17]);

//得到技能
		staff_list_obj[staff_id]["技能"]	= biz_staff_get_skill(match[18]);

		match = myregexp.exec(allHtml);
	}
	
	myregexp=/"user_times":(\d+)/;
	var tmp_str=allHtml.substr(allHtml.length-200,190);
	//alert(tmp_str);
	match = myregexp.exec(tmp_str);
	//alert(match[1]);
	if(match!=null)
	{
		update_user_power();
		user_power_now=user_power_max-match[1];
		document.getElementById("user_power_now_label").innerText=user_power_now;
	}
	myregexp	= null;
	match	= null;
	allHtml	= null;
	//alert();
	return staff_list_obj;
}

//得到技能
function biz_staff_get_skill(tmp_html)
{
	var ret_array= [];
	var myregexp = /show_description\('([^']+)([0-9]+)级/g;
	var match = myregexp.exec(tmp_html);
	while (match != null) {
		if(parseInt(match[2]) > 0)
		{
			ret_array.push(match[1]+":"+match[2]);
		}
		match = myregexp.exec(tmp_html);
	}
	return ret_array.join("\n");
}


//加载员工列表
//员工按体力排序
//http://k1.bizlife.com.cn/company/staff_batch_select.php?page=1&state=3&orderby=leftexec&op=desc
//page 取第几页
function biz_get_staff(select_Id)
{
	//if(!biz_check())
	//	return false;


	var page= $("#staff_load_page"+select_Id).val();
	var state=9;	//批量温和沟通
	var orderby= $("#staff_load_order_by"+select_Id).val();
    var object_type	 = $("#staff_load_department"+select_Id).val(); // 部门
	var order	= $("#staff_load_order"+select_Id).val();
	var tmp_time=new Date();

	//var server_url	= biz_current_server_url()+'/company/staff_batch_select.php';

	var server_url	= biz_current_server_url()+'/company/staff_list.php';
	$('#button_load_staff'+select_Id).val('加载中..').attr("disabled","disabled"); 
	//请求员工列表页面
	//alert(server_url+'?page='+ page+'&state='+state+'&orderby='+orderby+'&op='+order+'&_t='+tmp_time.getTime()+'&object_type='+object_type);
	//alert(server_url+'?object_type='+object_type+'&time_expired=');
	//http://k19.bizlife.com.cn/company/staff_list.php?object_type=dpt_competent&time_expired=
	//http://k19.bizlife.com.cn/company/staff_list.php?page=2&object_type=all&action=&time_expired=&op=desc&orderby=skill
	//http://k19.bizlife.com.cn/company/staff_batch_select.php?object_type=department&object_level=all&time_expired=&page=2&op=desc&state=9&staff_lists=&return=&orderby=power
	//var tmp_data= HttpRequest.Get(server_url+'?page='+ page+'&state='+state+'&orderby='+orderby+'&op='+order+'&_t='+tmp_time.getTime()+'&object_type='+object_type);
	
	//var tmp_data= HttpRequest.Get(server_url+'?page='+ page+'&object_type='+object_type+'&object_level=all&time_expired=&state='+state+'&return=&orderby='+orderby+'&op='+order);
	//var tmp_data	= HttpRequest.Get(server_url+'?object_type='+object_type+'&time_expired=');
	//var tmp_data	= HttpRequest.Get(server_url+'?page='+ page+'&state='+state+'&orderby='+orderby+'&op='+order+'&_t='+tmp_time.getTime()+'&object_type='+object_type);
	var tmp_data=HttpRequest.Get(server_url+'?page='+ page+'&object_type='+object_type+'&time_expired=&op='+order+'&orderby='+orderby);
	//解析HTML得到员工列表
	//alert(server_url+'?page='+ page+'&object_type='+object_type+'&time_expired=&op='+order+'&orderby='+orderby);
	//alert(tmp_data);
	var tmp_staff_array	 = biz_get_staff_from_html(tmp_data);
	if(!tmp_staff_array || tmp_staff_array == 'false')	
	{
		alert("biz_get_staff_from_html error!");
		return false;
	}



	var staff_numb = 0;
	//去掉负体力
	for(staff_numb in g_staff_array)
	{
		if(g_staff_array[staff_numb]['体力']['当前'] <1)
		{
			//删除
			delete g_staff_array[staff_numb];
			g_staff_count--;
		}

	}
	//添加到员工列表
	var tmp_staff_count	 = biz_staff_add(tmp_staff_array);

	//先得到当前选中的员工，方便重新加载后进行再次选中
	var select_staff	= biz_get_select_staff();
	//显示员工列表
	biz_show_staff(g_staff_array,'#staff_list'+select_Id);

	//选中之前的员工
	jQuery.each(select_staff, function(i, val) {
		$("#staff_"+val).attr("checked",true);
	});


	$("#button_load_staff"+select_Id).val("继续加载员工").attr("disabled","");

	biz_show_process('<span style="color:#0000ff">加载了'+tmp_staff_count+' 个员工</span>');
//alert(0);
	return true;
}


//向员工列表里新添增
function biz_staff_add(staffArray)
{
	var staff_numb = 0;

	//合并员工列表
	var tmp_staff_i	= 0;
	for(staff_numb in staffArray)
	{
		tmp_staff_i++;
		g_staff_array[staff_numb]	= staffArray[staff_numb];
	}
	//重写员工人数
	g_staff_count+= tmp_staff_i;
	return tmp_staff_i;
}

//向收藏员工列表里新添增
function biz_staff_fav_add(staffArray)
{
	var staff_numb = 0;

	//合并员工列表
	var tmp_staff_i	= 0;
	for(staff_numb in staffArray)
	{
		tmp_staff_i++;
		g_staff_fav_array[staff_numb]	= staffArray[staff_numb];
	}
	return tmp_staff_i;
}

//得到一次最多执行几个员工
function biz_staff_one_process()
{
	var server_url	= biz_current_server_url()+'/company/staff_batch_select.php';

	//请求员工列表页面
	var tmp_data	= HttpRequest.Get(server_url+'?state=9');
	if(!tmp_data || tmp_data == 'false' || tmp_data.length < 300)
	{
		alert("请先正确登录官网后再执行！");
		if(biz_server_host() == 'yaowan.com')
		{
			window.open('http://dfh.'+biz_server_host()+'/login_server.php',"_blank");
		}
		else
		{
//			window.open('http://www.'+biz_server_host()+'/login_server.php',"_blank");
			window.open(server_url);
		}
		$("#button_load_staff").val("继续加载员工").attr("disabled","");
		return false;
	}


	//得到最多可选几个员工
	var myregexp = /最多可以选择([0-9]+)名员工/gm;
	var match = myregexp.exec(tmp_data);
	if(!match)
		return false;

	if(0 == parseInt(match[1]))
	{
		alert("人事部人手不够");
		return false;
	}
	return parseInt(match[1]);

}

//选中员工批量进修
function biz_staff_studio(whereDom)
{
	var staff_url	= 'http://'+biz_server_id()+'.'+biz_server_host()+'/company/staff_execute_studio_confirm.php?state=43&return=%2Foffice%2Froutine_work.php&ids[]=';
	var select_staff	= biz_get_select_staff(whereDom);
	window.open(staff_url+select_staff.join('&ids[]='),"_blank");

//http://k1.bizlife.com.cn/company/staff_execute_studio_confirm.php?state=43&ids[]=806835&ids[]=750288&return=%2Foffice%2Froutine_work.php
}

//员工三围过滤 得到三围全满的
//staffs 要显示的员工列表 json格式
//type 1 经验 2能力 3忠诚 0全满 -1全部
function biz_staff_sw_filt(type,select_id)
{
	//显示全部
	if(-1 == type)
	{
		biz_show_staff(g_staff_array,'#staff_list'+select_id);
		return ;
	}

	var curr_record	= [];
	var tmp_i	= 0;

	var result_array	= {};

	var type_array	 = {"0":"全满","1":"经验","2":"能力","3":"忠诚"};

	var curr_type	= type_array[type];

	for( staff_numb in g_staff_array)
	{
		curr_record	= g_staff_array[staff_numb];
		tmp_i++;

		if("全满" == curr_type)
		{
			if(curr_record[type_array[1]]['当前'] >= curr_record[type_array[1]]['最大']
				&& curr_record[type_array[2]]['当前'] >= curr_record[type_array[2]]['最大']
				&& curr_record[type_array[3]]['当前'] >= curr_record[type_array[3]]['最大']
			)
			{
						result_array[staff_numb]	= curr_record;

			}
		}
		else
		{
			if(curr_record[curr_type]['当前'] >= curr_record[curr_type]['最大'])
			{
				result_array[staff_numb]	= curr_record;
			}
		}
	}
	//显示员工列表
	biz_show_staff(result_array,'#staff_list'+select_id);

	return result_array;
}