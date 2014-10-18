
//2009-8-22 22:14 http://www.zggo.com/bizlife
//Firefox浏览器 打开跨域访问权限
//if (navigator.userAgent.indexOf("Firefox") > 0) 
//	netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");


/*
2010-7-11 12:23
封装助手公共代码
@version    $Id: $

*/
Tools.initNameSpace("biz");

biz.ini = {


};


//当前全部员工
var g_staff_array	= {};

//收藏的员工
var g_staff_fav_array	= {};


//总共有加载了几个员工
var g_staff_count	= 0;

//保存公司、部门列表
var g_department_list	= {};


//服务器列表
var g_server_array	= {
	'bizlife.com.cn':
		{
			'title':'大富豪官网'
			,'servers':{'k1':'上海滩' ,'k2':'旧金山' ,'k3':'唐人街' ,'k4':'夏威夷' ,'k5':'华尔街' ,'k6':'芝加哥' ,'k7':'底特律' ,'k8':'洛杉矶' ,'ec':'休斯敦' ,'k10':'华盛顿' ,'k11':'波士顿' ,'k12':'纽约' ,'k13':'伦敦' ,'web251':'巴黎' ,'k15':'慕尼黑','k16':'马德里','k17':'巴塞罗那','k18':'温哥华','k19':'莫斯科','k20':'悉尼','k21':'威尼斯','k22':'维也纳','k23':'摩纳哥','k24':'卢森堡','k25':'开罗','k26':'雅典','k27':'梵蒂冈','k28':'布拉格','k29':'罗马','k30':'北京','k31':'布鲁塞尔','k32':'贝鲁特','k33':'新加坡','k34':'雅加达','k35':'哥本哈根','k36':'里斯本','k37':'开普敦','k38':'圣保罗','k39':'香港','k40':'鹿特丹','k41':'杭州','k42':'利物浦','k43':'米兰','k44':'柏林','k45':' 广州','k46':'爱丁堡','k47':'墨尔本','k48':'马尔代夫','kym1':'移民1区拉斯维加斯','k49':'澳门','k50':'名古屋'}
		}
	,'yaowan.com':
		{
			'title':'要玩网'
			,'servers':{'s2dfh':'多伦多','s5dfh':'曼谷','s6dfh':'首尔','s8dfh':'汉堡','yaowanym1':'六六大顺','sina1':'新浪','qidian1':'起点区','ym2dfh':'风云再起'}
		}
	,'37wan.com':
		{
			'title':'37玩'
			,'servers':{'s1.dfh':'金玉满堂' ,'s2.dfh':'绝代商骄','s3.dfh':'富贵逼人','s4.dfh':'富甲天下','s5.dfh':'世纪商云','s6.dfh':'前程似锦','s7.dfh':'平步青云','s8.dfh':'大展宏图','s9.dfh':'飞黄腾达','s10.dfh':'名满天下','s11.dfh':'宏图霸业','s12.dfh':'马到成功','s13.dfh':'功成名就','s14.dfh':'一骑绝尘','s15.dfh':'纵横驰骋','s16.dfh':'旗开得胜' }
		}
	,'cpgame.com':
		{
			'title':'赛博'
			,'servers':{'s1dfh':'赛博一区'  }
		}
	,'kugou.com':
		{
			'title':'酷狗'
			,'servers':{'s1dfh':'白手起家','s2dfh':'创业先锋'  }
		}
	,'16768.com':
		{
			'title':'16768'
			,'servers':{'s1.dfh':'帝国崛起','s2.dfh':'金璧辉煌 '  }
		}
	,'dfh.huowan.com':
		{ 
			'title':'火玩-三国梦'
			,'servers':{'s1':'路易威登','s2':'码莎拉蒂','s3':'雅诗兰黛','s4':'Chanel香奈儿','s5':'范思哲Versace','s6':'保时捷Porsche','s7':'欧米茄OMEGA','s8':'蒂芙尼'}
		}
	,'360.cn':
		{
			'title':'360大富豪'
			,'servers':{'s7.dfh.wan':'360卫士7区','s8.dfh.wan':'360卫士8区','s9.dfh.wan':'360卫士9区','s10.dfh.wan':'360卫士10区','s11.dfh.wan':'360卫士11区','ym1.dfh.wan':'360合区1','ym2.dfh.wan':'360合区2','ym3.dfh.wan':'360合区3'}
		}
	,'dfh.renren.com':
		{
			'title':'renren.com'
			,'servers':{'x1':'迪拜之钻','x2':'纽约之星','x3':'长岛油轮'}
		}
	,'dfh.implay.com':
		{
			'title':'renren.com'
			,'servers':{'s1':'淘金之路','s2':'赢在富豪','s3':'草根富豪'}
		}
	,'56uu.com':
		{
			'title':'56uu'
			,'servers':{'ym1dfh':'亚运之城','ym1dfh':'天空之城','ym1dfh':'维多利亚', 'ym1dfh':'世博之城'  }
		}
	,'g.pps.tv':
		{
			'title':'pps.tv'
			,'servers':{'s1dfh':'一服虎跃龙腾','s2dfh':'二服如日中天'}
		}
	,'snsfun.com':
		{
			'title':'乐趣网 snsfun.com'
			,'servers':{'ym1dfh':'商道风云[双线1服]','ym1dfh':'商战之秋[双线2服]','ym1dfh':'商界传奇[双线3服]'}
		}
		,'boss.icdist.com.hk':
		{
			'title':'icdist'
			,'servers':{'s1':'香港岛'}
		} 
};

//存放定时执行的时间容器
var g_interval = {};


//批量操作结构
var g_batch_state_array	= {
	"3":{"time":180,"url":"staff_training","title":"温和沟通","desc":"提高董事长的执行和员工的忠诚。","attr_change":{"忠诚":1}}
	,"4":{"time":180,"url":"staff_training","title":"严肃沟通","desc":"提高董事长的领导、策略和员工的忠诚。","attr_change":{"忠诚":1}}
	,"5":{"time":180,"url":"staff_training","title":"严厉沟通","desc":"增加您的策略值，提高员工忠诚度。","attr_change":{"忠诚":1}}
	,"9":{"time":300,"url":"staff_training","title":"员工培训","desc":"提高董事长策略和员工的经验。","attr_change":{"经验":1}}
	,"10":{"time":300,"url":"staff_training","title":"员工深造","desc":"提高员工能力。","attr_change":{"能力":1}}
	,"12":{"time":1800,"url":"volunteer_volume_do","title":"看望孤儿院","desc":"提高员工人品，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚。","attr_change":{"人品":1}}
	,"13":{"time":1800,"url":"volunteer_volume_do","title":"慰问老人院","desc":"提高员工人品，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚","attr_change":{"人品":1}}
	,"14":{"time":1800,"url":"volunteer_volume_do","title":"红十字会活动","desc":"提高员工人品和能力，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚。","attr_change":{"人品":1,"能力":1}}
	,"15":{"time":1800,"url":"volunteer_volume_do","title":"参加环保义工","desc":"提高员工人品和能力，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚。30分钟","attr_change":{"人品":1,"能力":1}}
	,"16":{"time":1800,"url":"volunteer_volume_do","title":"参与交通协助","desc":"提高员工人品和能力，降低员工忠诚；参加当日报纸倡导的义工，员工不减忠诚。30分钟","attr_change":{"人品":1,"能力":1}}
	};

//员工技能
var g_staff_skill	 = {1 : "心算",2 : "投机",3 : "微笑",4 : "推销",5 : "创造",6 : "经营",7 : "管理",8 : "谈判",9 : "人际",10 : "学习",11 : "精算",12 : "核算",13 : "策划",14 : "鼓舞",15 : "营销"};

//当前批量操作索引 用于记录当前执行到哪个批量操作
var g_curr_batch_state_index = 0;

//统计执行了几次批量操作
var g_process_count	= 0;

//下一个执行的第几个员工
var g_last_staff_i	= 0;

//保存当前动作
var g_curr_record	= null;

//当前运行状态
var g_is_start	= false;

//setTimeOut 对象
var g_time_out_obj	= null;

//当前运行的小道任务号
var g_xiaodao_numb	= 0;


//初始化选项卡

// setup ul.tabs to work as tabs for each div directly under div.panes
//$("ul.tabs").tabs("div.panes > div.tabs_description",{effect: 'slide'});
$("ul.tabs").tabs("> .tabs_description");
//$("ul.tabs").tabs("div.panes > div.tabs_description");

var tmp_html	= Array();

//可批量操作的项目
for(var record in g_batch_state_array)
{
	curr_record	= g_batch_state_array[record];	//指向当前记录
	tmp_html.push(' <INPUT TYPE="checkbox" NAME="batch_state[]" ');
//if('温和沟通' == g_batch_state_array[record]['title'])
//	tmp_html.push(' checked ');

	tmp_html.push(' title="'+g_batch_state_array[record]['desc']+'"');
	tmp_html.push(' value="'+record+'">'+g_batch_state_array[record]['title']);
}
$("#batch_state_list").html(tmp_html.join(''));



$("input[name$='switch_button']").click(function () { 
	//如果当前运行状态，先停止
	if(g_is_start)
	{
			biz_stop();
	}
	//启动
	else
	{
		biz_start();
	}

});

//显示服务器列表
biz_show_server(g_server_array);

//从文件里加载已收藏的员工
biz_load_staff_fav();

//升级检查
biz_check_upgrade();
//------------------------  function ------------------







//显示服务器列表
function biz_show_server(serverArray)
{
	var tmp_list_dom = document.getElementById("host_list");

	var tmp_i	= 0;
	for(var record in serverArray)
	{
		curr_record	= serverArray[record];	//指向当前记录
		tmp_list_dom.options[tmp_i]=new Option(curr_record.title+"_"+record,record);
		tmp_i++;
	}
	biz_server_change(document.getElementById("host_list"));
}

//选择一个网站
function biz_server_change(selectDom)
{
	var curr_index	= selectDom.selectedIndex;

	var tmp_html	= Array();

	var curr_servers	= g_server_array[selectDom.options[selectDom.selectedIndex].value]['servers'];
	//服务器列表
	for(var record in curr_servers)
	{
		curr_record	= curr_servers[record];	//指向当前记录
		tmp_html.push('<option value="'+record+'">'+record+"_"+curr_record+'</option>');
	}
	$("#server_list").html(tmp_html.join(''));
}




//序列化json数据
function Serialize(obj){  
	switch(obj.constructor){  
		case Object:  
			var str = "{";  
			for(var o in obj){  
				str += o + ":" + Serialize(obj[o]) +",";  
			}  
			if(str.substr(str.length-1) == ",")  
				str = str.substr(0,str.length -1);  
			 return str + "}";  
			 break;  
		 case Array:              
			 var str = "[";  
			 for(var o in obj){  
				 str += Serialize(obj[o]) +",";  
			 }  
			 if(str.substr(str.length-1) == ",")  
				 str = str.substr(0,str.length -1);  
			 return str + "]";  
			 break;  
		 case Boolean:  
			 return "\"" + obj.toString() + "\"";  
			 break;  
		 case Date:  
			 return "\"" + obj.toString() + "\"";  
			 break;  
		 case Function:  
			 break;  
		 case Number:  
			 return "\"" + obj.toString() + "\"";  
			 break;   
		 case String:  
			 return "\"" + obj.toString() + "\"";  
			 break;
	}
}

//停止
function biz_stop()
{
	biz_show_process('<span style="color:red">[停止]</span>');
	clearTimeout(g_time_out_obj);
	$("input[name$='switch_button']").val('已停止... 点击开始运行'); 
	//点击按钮时切换运行状态
	g_is_start	= false;

}

//开始
function biz_start()
{
	g_is_start	= true;
	if(biz_run())
	{
		$("input[name$='switch_button']").val('正在运行中...点击停止, 状态请点[操作日志]查看'); 
		biz_show_process('<span style="color:blue">[运行中...]</span>');

		//自动开始巡视
		if($('#auto_inspection').get(0).checked)
			biz_inspection_click();

		//豪宅自动体力恢复
		//biz_auto_recover_strength_by_house();
	}
	else
	{
		g_is_start	= false;
	}

}


//显示工作状态
function biz_show_process(value)
{
	var today = new Date();
	var seconds	= today.getSeconds();
	if(seconds < 10)	seconds	= '0'+seconds;

	var minutes	= today.getMinutes();
	if(minutes < 10)	minutes	= '0'+minutes;

	var curr_time	= today.getFullYear() +'-'+(today.getMonth()+1) +'-'+ today.getDate() +' '+ today.getHours() +':'+  minutes +':'+  seconds;
	$('#process').prepend('<p>'+curr_time+' '+value+' </p>');

}



//检查选项是否正确
function biz_check()
{
	var serverId	 = biz_server_id();
	if(!serverId || typeof(serverId)== 'undefined')
	{
		alert('请先选择服务器');
		return false;
	}
 

	var company_info	= biz.company.getInfo();
	if(!company_info)
	{
		alert("请先正确登录官网后再执行！");
		window.open(biz_current_server_url());
		return false;
	}
	biz.company.showInfo(company_info);

	return true;

}

//开始运行
//如果成功返回 true
function biz_run()
{

	//如果是停止状态，直接返回
	if(!g_is_start)	return false;

	if(!biz_check())
		return false;

	var serverId	 = biz_server_id();


	//第一次运行
	if(0 == g_process_count )
	{
		//加载公司信息
		var company_info	= biz.company.getInfo();
		if(!company_info)
			return false;

		biz.company.showInfo(company_info);
	
		//自动加载员工并运行批量操作
		if($('#auto_load_staff_batch_run').get(0).checked)
		{
			biz_get_staff();
			Tools.setCheckbox(document.form_staff_option,'all');
			Tools.setCheckbox(document.staff_list_form,'all');
			biz.staff.batchGroupClick();
		}

		//自动打卡
		if($('#auto_club_card').get(0).checked)
			biz_auto_club_card();
		
		//提取秘书提示
		biz_get_secretary_msg();

		//每隔5分钟
		g_interval['mall_trade']	 = window.setInterval(
			function(){
				//提取秘书提示
				biz_get_secretary_msg();
			}
		, 1000*60*5);

		biz_get_receive_msg();
	}

	return true;

}






//哪个网站
function biz_server_host()
{
	var tmp_list_dom = document.getElementById("host_list");

	var tmp_val	= tmp_list_dom.options[tmp_list_dom.selectedIndex].value;
	if('' == tmp_val)
		return false;
	return tmp_val;

}


//得到选中的服务器
function biz_server_id()
{
	var tmp_list_dom = document.getElementById("server_list");

	var tmp_val	= tmp_list_dom.options[tmp_list_dom.selectedIndex].value;
	if('' == tmp_val)
		return false;
	return tmp_val;
}

//清空日志信息
function biz_clear_process()
{
	$('#process').html('');
}


//自动打卡
function biz_auto_club_card()
{
	if(!biz_check())
		return false;
/*
http://k11.bizlife.com.cn/club/club_info_ajax.php?action=card&n=0.001569543917950833
1|||董事长：<br/><br/>恭喜您顺利打卡报到，您的勤奋为商会的繁荣作出了巨大贡献，并且您的此次打卡带来了政府给予繁荣商会的300,000G商会基金。
	var r=sendGet("club_info_ajax.php?action=card&n="+Math.random());
	var r_arr=r.split("|||");
	if(r_arr[0]==0){
		ralert(r_arr[1],"确定");
	}else if(r_arr[0]==1){
		ralert(r_arr[1],"确定","js:window.location.href='../club/club_info.php'");
	}

*/


	var tmp_url	= biz_current_server_url()+'/club/club_info_ajax.php?action=card&n=.'+Math.random();

	var result	= HttpRequest.Get(tmp_url);
	
	biz_show_process(result.replace(/<br>/gi,"  "));

	return true;
}



//员工三围满是否要跳过?
function biz_is_auto_skip_staff()
{
	return $('#auto_skip_staff').get(0).checked;
}

//自动继续加载员工
function biz_is_auto_load_staff()
{
	return $('#auto_load_staff').get(0).checked;
}

//声音提示
function biz_sound_alert()
{
	document.getElementById('biz_sound_play').dynsrc=document.getElementById('biz_sound').value;
	if($('#biz_alert_force').get(0).checked)
	{
		alert("有新任务了");
	}
}

//得到当前服务器
function biz_current_server_url()
{
	return 'http://'+biz_server_id()+'.'+biz_server_host();
}


//检查当前状态 是否体力不足或正在巡视
function biz_inspection_check()
{

	//检查当前状态
	var curr_url	 = biz_current_server_url()+'/company/check_department_shop_state.php?temp_p='+Math.random();
	var rs	= HttpRequest.Get(curr_url);
	if($.trim(rs)==""){
		return true;
	}else{

		//正在巡视中
		if(rs.indexOf("||||")!=-1){
			var arr_msg=rs.split("||||");
			var message=arr_msg[0];
			var progress=arr_msg[1];
			var titles = arr_msg[2];

//			alert(message);
		}else if(rs.indexOf("[[[[")!=-1){
			//体力不足
			var arr_msg=rs.split("[[[[");
			var message=arr_msg[0];
			var btn=arr_msg[1];
			var b_url=arr_msg[2];
			//提示体力不足
			if(message.indexOf('体力') > 0)
			{
				//自动喝葡萄糖
				return biz_auto_strength();
			}

		}else{
//			alert(rs);
			window.clearInterval(g_interval['inspection']);
		}
	}
	return false;

}
//点击巡视按钮
function biz_inspection_click()
{
	//if(!biz_check() )
	//{
	//	return false;
	//}

	//巡视次数
	var inspection_count = 0;

//	检查是否可巡视  但不中断 
//	biz_inspection_check();


	//当前已在运行,停止掉
	if(g_interval['inspection'])
	{
		//清除原来的定时器
		window.clearInterval(g_interval['inspection']);
		g_interval['inspection']	 = false;
		$('#biz_inspection_click_button').val('点击开始自动巡视.'); 
		return false;
	}

	//开始巡视
	var tmp_pid	= biz_inspection_run(inspection_count);

	//得到巡视时间 以便显示进程时间 及下次巡视 开始的时间
	var inspection_time	= biz_inspection_time(tmp_pid);


//alert('biz_inspection_time '+inspection_time['second_total']+':'+inspection_time['second_passed']);

//	if(!inspection_time)
//		return false;

	$('#biz_inspection_click_button').val('自动巡视中,点击停止.'); 

	inspection_count++;


	//开始定时巡视
	g_interval['inspection']	 = window.setInterval(
		function(){

			//检查当前时间是否结束 以开启新巡视
			if(inspection_time['second_passed'] > (inspection_time['second_total']+5))
			{
				//开始新巡视 如果失败 有可能是没体力了
				if(!biz_inspection_run(inspection_count))
				{
					////停止掉
					//biz_inspection_click();
					//return false;
				}

				inspection_time['second_passed']	= 0;
				//巡视次数加一
				inspection_count++;
			}
			//显示剩余时间
			$("#inspection_leave_time").html(Tools.culTime(inspection_time['second_total'] - inspection_time['second_passed']));
//			$("#inspection_leave_time").html(inspection_time['second_passed'] +':'+ inspection_time['second_total']);
			inspection_time['second_passed']++;
		}
	, 1000);

}


//得到巡视要花费的时间
function biz_inspection_time(progress)
{
/*
	//检查当前状态
	var curr_url	 = biz_current_server_url()+'/company/check_department_shop_state.php?temp_p='+Math.random();
	var rs	= HttpRequest.Get(curr_url);
	if($.trim(rs)==""){
		return false;
	}else{
*/
			var curr_url	 = biz_current_server_url()+'/progress_inner.php?pid='+progress+'&t='+Math.random();
			var response_html	= HttpRequest.Get(curr_url);


			//得到巡视时间 以便显示进程时间
			var myregexp = /var[\s]+second_total[^=]*=[\s]*([0-9]+)[\s\S]+?second_passed[^=]*=[\s]*([0-9]+)/;
			var match = myregexp.exec(response_html);
			if (match == null)
				return false;
			return {"second_total":parseInt(match[1]),"second_passed":parseInt(match[2])};

}

//运行巡视动作
function biz_inspection_run(inspectionCount)
{

	if(!biz_check() )
	{
		return false;
	}


	//得到选中的记录,巡视从上到下进行
	var inspection_select_array = Array();
	$("input:checked[name$='select_department_array']").each(function() {
		inspection_select_array.push($(this).val());
	});

	if(inspection_select_array.length <1)
	{
		//加载部门 进行全选
		biz_load_department();
		Tools.setCheckbox(document.department_from,'all');
		//重新得到选中列表
		$("input:checked[name$='select_department_array']").each(function() {
			inspection_select_array.push($(this).val());
		});

//		alert("请先选择巡视部门/店铺");
//		return false;
	}


	//检查，但不中断 
	//biz_inspection_check();


	//得到当前巡视序号
	inspectionCount	= inspectionCount % inspection_select_array.length;

	//开始巡视
	var curr_url	 = biz_current_server_url()+'/company/inspection_ajax.php?';

	var inspection_val = g_department_list[inspection_select_array[inspectionCount]]['巡视url'];
	var inspection_val_array	= inspection_val.split(",");
	if(0 == parseInt(inspection_val_array[0]))
		curr_url+='departments=';
	else
	{
		curr_url+='shops=';
	}
	curr_url+=parseInt(inspection_val_array[1]);

	//shops=
//	curr_url+=g_department_list[inspection_select_array[inspectionCount]]['巡视url']+'&t='+Math.random();
	var post_data	= '&t='+Math.random();
	var response_html	= HttpRequest.Post(curr_url,post_data);
	if(!response_html )//|| response_html.length < 300)
	{
		alert('巡视失败');
		return false;
	}

	var department_name	= g_department_list[inspection_select_array[inspectionCount]]['名称'];
	//0|||董事长：<br /><br />您正在行政人事部巡视。|||45152983
	var tmp_html	='';
	var tmp_pid	= 0;
	if (isNaN(response_html)) {
		var a = response_html.split("|||");
		if (a[2]) {
			//0|||董事长：<br /><br />您正在行政人事部巡视。|||66341360
			tmp_html	= '董事长： 您正在'+department_name+'巡视中......';
			tmp_pid	= a[2];
		}
		else {
			tmp_html	= a[1];
		}
	}
	else {
		//div_page2("../progress_inner.php?pid=" + r, "巡视");
		tmp_pid	= response_html;
		tmp_html	= '董事长： 您开始在'+department_name+'巡视......';

	}


	$("#inspection_stauts").html(tmp_html);
	biz_show_process(tmp_html);

	//返回当前巡视的pid 
	return tmp_pid;

}


//得到当前交通工具 以便计算巡视时间
function biz_transport_detail()
{
	//http://k1.bizlife.com.cn/company/management_small_transport_detail.php?id=2518117
	//http://k1.bizlife.com.cn/enterprise/user_info.php
	var curr_url	 = biz_current_server_url()+'/enterprise/user_info.php?t='+Math.random();
	var response_html	= HttpRequest.Get(curr_url);
	if(!response_html || response_html.length < 300)
	{
		alert("请先登录");
		return false;
	}

	//提取出是否有交通工具
	//../company/management_small_transport_detail.php?id=2518117
	var myregexp = /<span id='default_car[^<]+<a [^<]+div_page\('([^']+)'/;
	var match = myregexp.exec(tmp_html);
	var transport_detail_url	= null;
	if (match != null) {
		transport_detail_url = match[1];
	} else {
		return false;
	}

	//得到交通工具详细信息
	transport_detail_url = biz_current_server_url()+'/company/'+transport_detail_url+'?t='+Math.random();
	response_html	= HttpRequest.Get(transport_detail_url);
	if(!response_html || response_html.length < 300)
	{
		alert("请先登录");
		return false;
	}


	myregexp = /称[\s\S]+?<td>([^<]+)[\s\S]+?座[\s\S]+?<td>([^<]+)[\s\S]+?耐[\s\S]+?<td>([^<]+)[\s\S]+?执行时间会减少([0-9]+)%/;
	match = myregexp.exec(tmp_html);
	if (match == null) {
		return false;
	}

	var transport_array= {};
	transport_array['名称']	 = match[1];
	transport_array['座驾']	 = match[2];
	transport_array['耐久度']	 = match[3];
	transport_array['减少时间']	 = match[4];

	return transport_array;
}
//加载公司、部门列表
function biz_load_department()
{

	var curr_url	 = biz_current_server_url()+'/company/inspection_select.php?t='+Math.random();
	var response_html	= HttpRequest.Get(curr_url);
	if(!response_html || response_html.length < 300)
	{
		alert("请先登录");
		return false;
	}

	var staff_list_html	= [];
	var tmp_i	= 0;
	var department_numb	= 0;

	//根据巡视页面得到公司、部门列表
	var myregexp = /class="list_word">[\s\S]+?<a[\s\S]+?<td[\s\S]+?<td[\s\S]+?<a[^>]+>([^<]+)<[\s\S]+?<td[\s\S]+?<a[^>]+>([^<>]+)<[\s\S]+?<td[\s\S]+?<td[^>]+[\s\S]+?<td[\s\S]+?<table[^>]+title="([0-9]+)级[\s\S]+?士气[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?能力[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?忠诚[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?inspection\(([^\)]+)/g;
	var match = myregexp.exec(response_html);
	while (match != null) {
		
		//找到对应的id号 inspection.php?g_department_list_ids=1
		//department_numb	= match[7].substr(match[7].indexOf('=')+1);
		department_numb	= parseInt(match[7].substr(match[7].indexOf(',')+1));

		g_department_list[department_numb]	={
			"名称":match[1]
			,"员工":match[2]
			,"级别":match[3]
			,"士气":match[4]
			,"能力":match[5]
			,"忠诚":match[6]
			,"巡视url":match[7]  //xurl    
			};

		tmp_i++;
		staff_list_html.push('<tr  onmouseout="this.className=\'out\';" onmouseover="this.className=\'over\';" >');
		staff_list_html.push('<td align="center">'+tmp_i+'</td>');
		staff_list_html.push('<td >'+g_department_list[department_numb]['名称']+'</td>');
		staff_list_html.push('<td >'+g_department_list[department_numb]["员工"]+'</td>');
		staff_list_html.push('<td >'+g_department_list[department_numb]["级别"]+'</td>');
		staff_list_html.push('<td >'+g_department_list[department_numb]["士气"]+'</td>');
		staff_list_html.push('<td >'+g_department_list[department_numb]["能力"]+'</td>');
		staff_list_html.push('<td >'+g_department_list[department_numb]["忠诚"]+'</td>');
		staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_department_array" value="'+department_numb+'" /></td>');
		staff_list_html.push("</tr>");

		match = myregexp.exec(response_html);
	}
	//显示新加载的员工
	$("#department_list").html(staff_list_html.join(''));


}


//自动任务交易
function biz_auto_mall_trade()
{


	//当前已在运行,停止掉
	if(g_interval['mall_trade'])
	{
		//清除原来的定时器
		window.clearInterval(g_interval['mall_trade']);
		g_interval['mall_trade']	 = false;
		$('#auto_mall_trade').val('自动任务交易已停止.'); 
		return false;
	}
	$('#auto_mall_trade').val('自动任务交易中,点击停止.'); 

	g_interval['mall_trade']	= true;
	if(!biz_mall_trade())
		return false;

	g_interval['mall_trade']	 = window.setInterval(
		function(){
			biz_mall_trade();
		}
	, 10000);

}

//任务交易自动购买
function biz_mall_trade()
{

	//查看还有几件物品没买
	var curr_url	 = biz_current_server_url()+'/company/transaction_tasks.php?t='+Math.random();
	var response_html	= HttpRequest.Get(curr_url);
	var response_post	= '';

	var myregexp = /class="list_word">[\s\S]+?>([\s\S]+?)</g;
	var match = myregexp.exec(response_html);
	var transaction_tasks	= [];
	while (match != null) {
		transaction_tasks.push(match[1]);
		match = myregexp.exec(response_html);
	}

	transaction_tasks_html	= transaction_tasks.join(",");

	if('' == transaction_tasks_html)
	{
		biz_show_process('<span style="color:blue">已无物品</span>');
		biz_auto_mall_trade();//sSWans修改，无物品时候自动停止交易
		return false;
	}
	biz_show_process('<span style="color:red">[当前物品'+' 还有 '+transaction_tasks.length+' 件] </span> '+transaction_tasks_html);


//	$('#auto_mall_trade').val('自动购买中,结果看操作日志..').attr("disabled","disabled"); 


	//得到卖家物品id
	curr_url	 = biz_current_server_url()+'/mall/trade_gossip.php?t='+Math.random();
	response_html	= HttpRequest.Get(curr_url);

	var tmp_array	= [];
	response_post	= '';
	//得到id
	myregexp = /buy\(([0-9]+)\)/g;
	match = myregexp.exec(response_html);
	var find_trade_gossip	= 0;

	if(match == null)
	{
		biz_show_process('<span style="color:blue">当前无可买商品</span>');
	}

	while (match != null) {

		//提交购买
		HttpRequest.Post(curr_url,'ajax=buy&id='+match[1],function(xmlhttp)	{
			if(!xmlhttp || 'undefined' == typeof(xmlhttp.responseText))
				return;
			var response_post	= xmlhttp.responseText;
			if('undefined' == typeof(response_post))
				return;
			var tmp_array = response_post.split("|||");
			if (tmp_array[0] == 1) {

				find_trade_gossip++;
				biz_show_process("购买第 "+find_trade_gossip+ ' 件<span style="color:blue">'+tmp_array[1]+'</span>');
			}

		});
		match = myregexp.exec(response_html);
	}

//	if(find_trade_gossip >0)
//	{
//		biz_show_process('<span style="color:blue">购买了 '+find_trade_gossip +' 件商品</span>');
//	}
//	$('#auto_mall_trade').val('自动任务交易').attr("disabled",""); 
	return true;
}


//升级检测
function biz_check_upgrade()
{

	var version = biz_get_version();

	$("#my_version").html( version );
	document.title	= version+"  " +document.title ;
//n='+Math.random()
	var url = "http://www.zggo.com/zggo/bizlife/version.txt";
	var response_html	= HttpRequest.Get(url);
	if (response_html.indexOf("V") != 0) {
		return false;
	}

	if ($.trim(response_html) != $.trim(version)) {
		$("#biz_version").html(response_html);
		$("#upgradeDialog").show();
	}
	else
		$("#upgradeDialog").hide();


};


//董事长体力不足自动喝葡萄糖
//numb 一次喝几瓶,注意喝多会拉肚子
function biz_auto_strength(numb)
{
	if(!$('#auto_strength_add').get(0).checked)
		return false;

	if('undefined' == typeof(numb))	numb	 = 3;

	var server_url	= biz_current_server_url()+'/company/item_glucose.php';
	var post_data	= "num="+numb;
	var response_html	= HttpRequest.Post(server_url,post_data);

	//1|||董事长：<br><br>您服用了1罐葡萄糖，恢复了10点体力值。
	var a	= response_html.split("|||");
	if(a[0]==0){
		biz_show_process("<span style='color:red'>喝葡萄糖</span>" +a[1].replace(/<br>/gi,"  "));
	}
	else if (a[0] == 1) {
		biz_show_process("<span style='color:blue'>葡萄糖</span>" +a[1].replace(/<br>/gi,"  "));
		return true;
	}
	else {
		biz_show_process("<span style='color:red'>喝葡萄糖</span>" +response_html);
	}

	return false;

}


//得到聊天消息
function biz_get_receive_msg(msgId)
{

	if('undefined' == typeof(msgId) || ""==msgId)
		msgId	= 1;

	HttpRequest.Post(biz_current_server_url()+'/chat8/receive.php',"club_id=0&id="+msgId,function(xmlhttp){

		if(!xmlhttp || 'undefined' == typeof(xmlhttp.responseText))
			return;
		var response_post	= xmlhttp.responseText;
		if('undefined' == typeof(response_post))
			return;

		//9|||{"id9":{"uid":"984805","nickname":
		var r_arr = response_post.split('|||');
		//parseInt(r_arr[0])

			window.setTimeout(function()
			{

				biz_get_receive_msg(parseInt(r_arr[0]));
				//模拟在线
				biz_online_test();
				
				//过指定的时间后再运行
			}, 1000*120);

	});

}

//模拟在线 
function biz_online_test()
{

	HttpRequest.Get(biz_current_server_url()+'/ajax_update_income.php?x=1',function(xmlhttp){
	});

	HttpRequest.Get(biz_current_server_url()+'/ajax_update_company.php',function(xmlhttp){
	});


}

//提取秘书提示
function biz_get_secretary_msg()
{
	//http://k1.bizlife.com.cn/office/work_daily.php
	HttpRequest.Get(biz_current_server_url()+'/office/work_daily.php?page=1&state=0',function(xmlhttp){

		if(!xmlhttp || 'undefined' == typeof(xmlhttp.responseText))
			return false;
		var response_text	= xmlhttp.responseText;
		if('undefined' == typeof(response_text))
			return false;

		//解释得到消息内容
		var return_json	 = {};
		var myregexp = /work_daily_read\.php\?id=([0-9]+)[^>]+>([^<]+)<\/a>/g;
		var match = myregexp.exec(response_text);
		var tmp_html	= [];
		while (match != null) {


			if('undefined' == typeof(match[2]))
			{
				break;
			}


			//自动接补助金
			if(match[2].indexOf('收到政府扶助金') >= 0)
			{
				biz_get_fund(match[1]);
			}
			else
			{
//for test
			//提取所有消息
//			var response_html	= HttpRequest.Get(biz_current_server_url()+'/office/work_daily_read.php?id='+match[1]);

			}
//			biz_show_process("<span style='color:red'>"+match[2]+"</span>");
			//收到新手物资补助
			tmp_html.push(' <a target="_blank" href="'+biz_current_server_url()+'/office/work_daily_read.php?id='+match[1]+'" >'+match[2]+'</a> ');

			match = myregexp.exec(response_text);

		}
		if(tmp_html.length > 0)
			biz_show_process('<span style="color:blue">[最新秘书消息]</span> '+tmp_html.join(' '));


	});
}

//从秘书消息里领政府补助金
//msgId 消息id
function biz_get_fund(msgId)
{
	//得到消息具体内容
	var response_html	= HttpRequest.Get(biz_current_server_url()+'/office/work_daily_read.php?id='+msgId);
	
	//解析得到其他内容
	var myregexp = /get_fund\(([0-9]+),([0-9]+),\'([a-z]+)\',\'([^\']+)\',([0-9]+)\)/;
	var match = myregexp.exec(response_html);

	if(match == null)
	{
		return null;
	}

	var cid	= match[1];
	var type	= match[2];
	var area	= match[3];
	var name	= match[4];
	var uid	= match[5];

	myregexp = /wid\=([0-9]+)/;
	match = myregexp.exec(response_html);
	var wid	= match[1];


	var server_url	= biz_current_server_url()+'/official/ajax_get_fund.php';
	var post_data	= 'wid='+wid+'&cid='+cid+'&type='+type+'&area='+area+'&name='+name+'&uid='+uid;
	var response_html	= HttpRequest.Post(server_url,post_data);

	var r_arr = response_html.split('|||');
	if(parseInt(r_arr[0]) ==1){
		biz_show_process("<span style='color:blue'>收到政府扶助金</span>");
	}else{
		biz_show_process("<span style='color:red'>"+r_arr[1]+"</span>");
	}

}

//豪宅自动体力恢复 一小时一次 所有豪宅全部退款了
function biz_auto_recover_strength_by_house()
{
	return false;
	if(!$('#auto_recover_strength_by_house').get(0).checked)
		return false;
	//上次已启动过了，先关闭
	if(g_interval['recover_strength_by_house'])
	{
		window.clearInterval(g_interval['recover_strength_by_house']);
		g_interval['recover_strength_by_house']	 = false;
	}

//http://k1.bizlife.com.cn/office/secretary_info.php?ajax=addpower
	g_interval['recover_strength_by_house']	 = window.setInterval(
	function(){

		HttpRequest.Post(biz_current_server_url()+'/office/secretary_info.php',"ajax=addpower",function(xmlhttp){

				if(!xmlhttp || 'undefined' == typeof(xmlhttp.responseText))
					return;
				var response_post	= xmlhttp.responseText;
				if('undefined' == typeof(response_post))
					return;
				var tmp_array = response_post.split("|||");

				//失败
				if(0 == parseInt(tmp_array[0]))
				{
				//0|||董事长:<br/><br/>您没有修建住宅，不能进行恢复体力操作。
				//0|||董事长:<br/><br/>在线时间不足1小时，不能进行恢复体力操作。
				//0|||董事长:<br/><br/>您正在恢复体力中，请您在2010-05-12 00:28之后再恢复体力吧。
					biz_show_process("<span style='color:red'>"+tmp_array[1]+"</span>");
					window.clearInterval(g_interval['recover_strength_by_house']);
					g_interval['recover_strength_by_house']	 = false;

					return;
				}
				//alert(tmp_array[1]);

		});

	}
	, 1000 * 60 * 70);
}



//福利社领取转到下一页
function biz_canteen_receive_next()
{
	var page = parseInt($("#biz_canteen_receive_page").val())+1; 
	$("#biz_canteen_receive_page").val(page); 

	biz_canteen_receive_all(page);

}

//福利社领取
function biz_canteen_receive_all(page)
{
	if('undefined' == typeof(page))
		page = parseInt($("#biz_canteen_receive_page").val()); 

	if(!page)
		page	 = 1;
	var rs=HttpRequest.Get(biz_current_server_url()+"/map/system_present.php?page=" + page);
	if(!rs || rs.length < 300)
	{
		biz_show_process("<span style='color:red'>福利社领取失败 </span>: 请确认是否已登录。");
		return false;
	}

	var tmp_ids	= Array();
	var myregexp = /onclick="div_page\('system_present_read\.php\?id=([0-9]+)/g;
	var match = myregexp.exec(rs);
	while (match != null) {

		tmp_ids.push(match[1]);
		
		//领取指定编号
		biz_canteen_receive(parseInt(match[1]));

		match = myregexp.exec(rs);
	}

	if(0 == tmp_ids.length)
		biz_show_process("<span style='color:red'>福利社领取 </span>: 第 "+page+" 页已无福利可领。");
	else
		biz_show_process("<span style='color:blue'>福利社领取 </span>: 共领取 "+(tmp_ids.length)+" 项福利");
}

//福利社领取指定信息
function biz_canteen_receive(id)
{
	//消耗体力加经验用？
	//alert(HttpRequest.Post(biz_current_server_url()+'/map/system_present_insert.php','id=2047876'));
	//5|||董事长：<br><br>恭喜您,已成功领取了1本“《决不裸奔》”！ 
	var rs=HttpRequest.Post(biz_current_server_url()+"/map/system_present_insert.php?", "id=" + id);
	var arr_item=rs.split("|||");

/*
	if(arr_item[0]=="243"||arr_item[0]=="244"||arr_item[0]=="245"||arr_item[0]=="246"||arr_item[0]=="239"){
		ralert(arr_item[1], "直接使用",'js:use('+arr_item[0]+','+arr_item[2]+');',"放到物品栏",'js:onloads('+id+');js:window.parent.div_page_close();');
		return;
	}else{
		ralert(arr_item[1], "确定",'js:onloads('+id+');js:window.parent.div_page_close();');
		return;
	}	

	if(parseInt(arr_item[2])>0){
		window.top.add_gold_coin(parseInt(arr_item[2]));
	}
*/
	biz_show_process("<span style='color:blue'>福利社领取 </span>: " +arr_item[1].replace(/<br>/gi,"  "));
}



//运行命令
function biz_run_command(){

	var command_1=$('#command_text1').val().replace(/(^\s*)|(\s*$)/g, '');
	var command_2=$('#command_text2').val().replace(/(^\s*)|(\s*$)/g, '');
	if(command_1=='' ){
		biz_show_process("<span style='color:blue'>运行命令 </span>: URL地址不能为空");
		return false;
	}

	var r	= HttpRequest.Post(biz_current_server_url()+"/"+command_1,command_2);
	biz_show_process("<span style='color:blue'>运行命令 </span>: "+command_1+":" +r.replace(/<br>/gi,"  "));
	return true;
}

//运行命令
function biz_run_command_click(){

	if(!biz_check())
		return false;


	//再次点击,停止
	if(g_interval['auto_command'])
	{

		window.clearInterval(g_interval['auto_command']);
		g_interval['auto_command']	 = false;
		biz_show_process("<span style='color:red'>运行命令 </span>: 停止");
		$('#command_button').val('执行'); 

		return false;
	}


	$('#command_button').val('正在执行中,点击停止'); 

	if(!biz_run_command())
	{
		return false;
	}

	var command_spend_time	 = parseInt($('#command_spend_time').val()) ;

	g_interval['auto_command']	 = window.setInterval(
		function(){

			biz_run_command();

		}
	, 1000 * command_spend_time );

}

function biz_test(){
//http://k11.bizlife.com.cn/enterprise/shop_purchase_batch_select.php?days=10000&ids=193044%2C200648&speed=3

var staffId	= '1455523';

		 r	= HttpRequest.Post(biz_current_server_url()+"/mission/daily_mission_detail.php?type=6",'action=check');


//		var server_url	= biz_current_server_url()+"/company/staff_further_education_reflection.php?staff_id="+staffId+"&use_item=0&pay=money&return=";
//		var r	= HttpRequest.Get(server_url);
alert(r);

/*
		var type	 = 2;
		var server_url	= biz_current_server_url()+'/enterprise/shop_purchase.php';
		var post_data	= "days=10000&id=200648&speed=3";
		var response_html	= HttpRequest.Post(server_url,post_data);
alert(response_html);
*/


}

//当前版本
function biz_get_version()
{
	return "V1.6";
}

//打开官网网页
function biz_open_url(url)
{
	var server_url	= biz_current_server_url()+'/'+url;
	window.open(server_url);
}
