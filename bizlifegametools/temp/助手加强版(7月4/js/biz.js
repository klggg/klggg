	//2009-8-22 22:14 http://www.zggo.com/bizlife
//Firefox浏览器 打开跨域访问权限
if (navigator.userAgent.indexOf("Firefox") > 0) 
	netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");


//当前全部员工
var g_staff_array	= {};

//收藏的员工
var g_staff_fav_array	= {};


//总共有加载了几个员工
var g_staff_count	= 0;

//保存公司、部门列表
var g_department_list	= {};

//保存轮回时间间隔
var batch_timer;

//服务器列表
var g_server_array	= {
	'bizlife.com.cn':
		{
			'title':'大富豪官网'
			,'servers':{'k1':'上海滩' ,'k2':'旧金山' ,'k3':'唐人街' ,'k4':'夏威夷' ,'k5':'华尔街' ,'k6':'芝加哥' ,'k7':'底特律' ,'k8':'洛杉矶' ,'ec':'休斯敦' ,'k10':'华盛顿' ,'k11':'波士顿' ,'k12':'纽约' ,'k13':'伦敦' ,'web251':'巴黎' ,'k15':'慕尼黑','k16':'马德里','k17':'巴塞罗那','k18':'温哥华','k19':'莫斯科','k20':'悉尼','k21':'威尼斯','k22':'维也纳','k23':'摩纳哥','k24':'卢森堡','k25':'开罗','k26':'雅典','k27':'梵蒂冈','k28':'布拉格','k29':'罗马','k30':'北京','k31':'布鲁塞尔','k32':'贝鲁特','k33':'新加坡','k34':'雅加达','k35':'哥本哈根','k36':'里斯本','k37':'开普敦','k38':'圣保罗','k39':'香港'}
		}
	,'yaowan.com':
		{
			'title':'要玩网'
			,'servers':{'dfh1':'柏林' ,'dfh2':'多伦多','dfh3':'迪拜','dfh4':'东京','dfh5':'曼谷' }
		}
	,'37wan.com':
		{
			'title':'37玩'
			,'servers':{'s1.dfh':'金玉满堂' ,'s2.dfh':'绝代商骄','s3.dfh':'富贵逼人','s4.dfh':'富甲天下','s5.dfh':'世纪商云','s6.dfh':'前程似锦','s7.dfh':'平步青云','s8.dfh':'大展宏图','s9.dfh':'飞黄腾达','s10.dfh':'名满天下','s11.dfh':'宏图霸业' }
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
	,'dfh.16768.com':
		{
			'title':'16768'
			,'servers':{'s1':'帝国崛起','s2':'xxx'  }
		}
	,'dfh.3gm.com.cn':
		{
			'title':'三国梦'
			,'servers':{'s1':'路易威登','s2':'码莎拉蒂'}
		}
	,'dfh.wan.360.cn':
		{
			'title':'360大富豪'
			,'servers':{'s1':'360卫士1区','s2':'360卫士2区','s3':'360卫士3区','s4':'360卫士4区'}
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
	,"19":{"time":900,"url":"staff_training","title":"店铺装饰","desc":"提高员工经验和能力，有机率提高店铺认知度。15分钟","attr_change":{"经验":4,"能力":4}}
	};


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
	tmp_html.push(' title="'+g_batch_state_array[record]['desc']+'"');
	tmp_html.push(' value="'+record+'">'+g_batch_state_array[record]['title']);
}
$("#batch_state_list").html(tmp_html.join(''));



$("input[name$='switch_button1']").click(function () { 
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


//进行 全选 反选 清空
function set_checkbox(main_form,type)
{
	for(var	i=0;i<main_form.elements.length;i++)
	{
		if(main_form.elements[i].type=="checkbox" && main_form.elements[i].disabled=="")
		{
			if("all" == type)
			{
				if(!main_form.elements[i].checked)
				{
					main_form.elements[i].checked = true;
				}
			}
			else if("no" == type)
			{
				main_form.elements[i].checked = false;
			}
			else
			{
				main_form.elements[i].checked = !main_form.elements[i].checked;

			}

		}
	}
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
	$("input[name$='switch_button1']").val('已停止... 点击开始运行'); 
	//点击按钮时切换运行状态
	g_is_start	= false;

}

//开始
function biz_start()
{
	g_is_start	= true;
	//g_process_count=0;
	if(biz_run())
	{
		$("input[name$='switch_button1']").val('正在运行中...点击停止'); 
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

//运行批量操作
//batch_state_index_list 可以执行的项目
//one_process_staff 一次执行几个员工
function biz_run_batch(serverId,batch_state_index_list,one_process_staff)
{
	//先得到当前选中的员工，方便重新加载后进行再次选中
	var select_staff	= biz_get_select_staff();
	//刷新员工列表 显示状态
	biz_show_staff(g_staff_array,'#staff_list1');

	//全部员工执行完了，自动重新加载
	if(g_staff_count < 1 )
	{
		biz_show_process( '<span style="color:#ff0000">[已没有可以执行的员工]</span>');
		//设定需要自动加载
		if(biz_is_auto_load_staff())
		{
			if(!biz_get_staff(biz_server_id()))
			{
				return false;
			}
			biz_show_process( '<span style="color:#0000ff">[自动加载员工]</span>');
		}
		else
		{
			biz_stop();
//			g_is_start	= false;
			return false;
		}

	}

	//选中之前的员工
	jQuery.each(select_staff, function(i, val) {
		$("#staff_"+val).attr("checked",true);
	});

	//无选中记录
	if(select_staff.length < 1 )
	{
		biz_show_process( '<span style="color:#ff0000">[当前无选中的员工]</span>');
		//设定需要自动加载,进行自动全选操作
		if(biz_is_auto_load_staff())
		{
			biz_show_process( '<span style="color:#0000ff">[自动全选所有员工]</span>');
			set_checkbox(document.staff_list_form1,'all');
		}
		else
		{
			biz_stop();
			return false;
		}
	}

	//当前执行到最后一个动作时返回
	if(g_curr_batch_state_index >= batch_state_index_list.length)
	{
		biz_show_process('<span style="color:#00ff00">[轮回...]</span> '+g_staff_count);
		g_curr_batch_state_index	= 0;
	}

	//要执行的人数大于实际人数
	if(one_process_staff >  g_staff_count)
	{
		one_process_staff	= g_staff_count;
	}
	//指向到当前类别
	g_curr_record	= g_batch_state_array[batch_state_index_list[g_curr_batch_state_index]];
	//alert(g_curr_batch_state_index);
//alert(batch_state_index_list[1]);
	//得到需要请求的URL//"http://k19.bizlife.com.cn/company/staff_execute.php?staff_id=1551541&state=9&return=&item410="+item410;
	//"shop_work_batch_confirm.php?state=9&" + str_ids + "&return=&n=" + Math.random();
	///"http://k19.bizlife.com.cn/company/?state=19&item410="+item410+"&ids[]=1030332&ids[]=1030333&return=%2Fcompany%2Fadmin_hr.php&n=0.121654
	var batch_url	= biz_current_server_url()+'/company/'+g_curr_record.url+'.php?state='+batch_state_index_list[g_curr_batch_state_index]+'&return=%2Foffice%2Froutine_work.php&ids[]=';

//alert(batch_url);
	var curr_record	= null;
	//放当前要运行的名字
	var staff_name_array	= Array();
	//放当前要运行的员工号
	var staff_numb_array	= Array();

 	//放当前没体力的员工
	var staff_nostrength_array	= Array();

	var staff_numb	= 0;
		//可以执行的员工总计
	var staff_ok_count	= 0;

	//是否允许执行当前员工
	var is_staff_ok	= false;
	var select_staff	= biz_get_select_staff();

	for(var tmp_i=0; tmp_i < select_staff.length; tmp_i++)
	{
		is_staff_ok	= true;
		staff_numb	 = parseInt(select_staff[tmp_i]);
		//指向当前员工
		curr_record	= g_staff_array[staff_numb];

		
		//最后一条
		if(g_last_staff_i >= (select_staff.length - 1))
		{
			g_last_staff_i =0;
		}

		//跳过之前
		if(g_last_staff_i !=0 && tmp_i <= g_last_staff_i)
		{
			continue;
		}


		//满足条数
		if(staff_ok_count >= one_process_staff)
		{

			break;
		}
		g_last_staff_i	= tmp_i;


//////////检测是否使用了双倍卡
//alert(document.getElementById("item13").checked);
//return;g_staff_array[staff_numb]['体力']['当前']==g_staff_array[staff_numb]['体力']['最大'] && 
		if(g_staff_array[staff_numb]['体力']['当前']==g_staff_array[staff_numb]['体力']['最大'] && document.getElementById("item13").value==13)
		{
			var r=sendPost( biz_current_server_url()+'/company/use_staff_item.php','staff_id='+staff_numb+'&item_user_id=13');
			var itemArr = r.split("|");
			//alert(r);
			if(itemArr[1]=='over'){
				document.getElementById("item13").checked=false;
			}
			//if(itemArr[1]=='false'){
			//	ralert(itemArr[0],'确定');
			//}
			//if(itemArr[1]=='true'){
			//	var num=document.getElementById("item_num"+id).innerHTML;
			//	document.getElementById("item_num"+id).innerHTML=parseInt(num)-1;
			//	ralert(itemArr[0],'确定');
			//}					
			
		}
		
		//return;
		
		
//////////////////////////////////////////		
		//体力减1
		g_staff_array[staff_numb]['体力']['当前']--;

		//对应的经验忠诚等进行累加
		jQuery.each(g_curr_record["attr_change"], function(attr_key, attr_val) {
			g_staff_array[staff_numb][attr_key]['当前']+=parseInt(attr_val);
			if(biz_is_auto_skip_staff() && g_staff_array[staff_numb][attr_key]['当前'] >= g_staff_array[staff_numb][attr_key]['最大'])
			{
				biz_show_process( '<span style="color:red">['+curr_record["姓名"]+']的['+attr_key+']('+g_staff_array[staff_numb][attr_key]['当前']+') 已最大了!</span>');

				//删除
				//delete g_staff_array[staff_numb];
				//g_staff_count--;
				is_staff_ok	= false;
			}
		});

		//放到要操作员工里
		if(is_staff_ok)
		{
			staff_numb_array.push(staff_numb);
			staff_name_array.push(curr_record["姓名"]+"["+curr_record['体力']['当前']+']');
			staff_ok_count++;
		}


		//如果没体力跳过 有可能上一步已对该员工进行了删除
		if('undefined' != typeof(g_staff_array[staff_numb]) && curr_record['体力']['当前'] <1)
		{
			//删除
			delete g_staff_array[staff_numb];
			g_staff_count--;
			staff_nostrength_array.push(curr_record["姓名"]);
		}


	}

	//总共执行几次动作
	g_process_count++;

	//有可以执行员工
	if(staff_numb_array.length >0)
	{
		//检查能否执行任务
		if(!biz_can_exe(batch_state_index_list[g_curr_batch_state_index],staff_numb_array.length))
			return false;

		var staff_batch_select_url	= biz_current_server_url()+'/company/volume_export.php?state='+batch_state_index_list[g_curr_batch_state_index];



//!!!
		//自动输入验证码
//		if(biz_is_auto_task())
		//if(1!= parseInt($("input:checked[id$='auto_speed']").val()) && 1!= parseInt($("input:checked[id$='item410']").val()))
		if(false)
		{
/*
			var img_code	= biz_get_imgCode(2);
			if(-1 == parseInt(img_code))
			{
				alert("未开通用户!");
				return false;
			}
			else
			{
*/
				//批量执行任务的入口,
				//是否达到保留体力
				user_power_now=user_power_now-staff_numb_array.length;
				document.getElementById("user_power_now_label").innerText=user_power_now;
				var to_min_power=0;
				if(document.getElementById('to_min_power_text').value!=''){to_min_power=parseInt(document.getElementById('to_min_power_text').value);}
				if(document.getElementById('to_min_power_check').checked && (user_power_now <=to_min_power))
				{
					biz_stop();
					biz_show_process('达到保留体力设定值，停止运行。');
					return false;
				}
				
				var batch_exec_url	 = '';
				var response_html	= '';
				
				//执行批量任务
				batch_timer=g_curr_record.time;
				//电话敌方http://k19.bizlife.com.cn/company/volume_export.php?sids=1030332,1030333&state=20&return=%2Fcompany%2Fadmin_hr.php
				//http://k19.bizlife.com.cn/company/volume_export.php?sids=1030334,1030337&state=19&return=%2Fcompany%2Fadmin_hr.php
				//http://k19.bizlife.com.cn/company/volume_export.php?sids=1865015,1865018&state=12
				//var batch_url=biz_current_server_url()+'/company/'+g_curr_record.url+'.php?state='+batch_state_index_list[g_curr_batch_state_index]+'&return=&ids[]='
				//var batch_url=biz_current_server_url()+'/company/shop_work_batch_confirm.php?state='+batch_state_index_list[g_curr_batch_state_index]+'&return=&ids[]='
				batch_exec_url	= batch_url+staff_numb_array.join('&ids[]=')+'&n='+Math.random();
				//alert(batch_exec_url);
				response_html	= HttpRequest.Get(batch_exec_url);
				tmp_array	= response_html.split("|||");
				if(parseInt(tmp_array[0]) !== 1)
				{
					biz_show_process( '<span style="color:red">[失败]</span>: '+(tmp_array[1]));
					return false;
				}

/*
				//实现批量执行时输入验证码过程
				response_html	= HttpRequest.Get(batch_exec_url+'&img_code='+img_code);
				tmp_array	= response_html.split("|");
				if(parseInt(tmp_array[0]) !== 1)
				{
					//验证码失败再取一次
					response_html	= HttpRequest.Get(batch_exec_url+'&img_code='+biz_get_imgCode(2));
				}
*/
				
				//得到小道任务
				//response_html	= HttpRequest.Get(staff_batch_select_url + '&sids='+staff_numb_array.join(','));
				//biz_batch_pid(response_html,serverId);

/*
				//按 N个一组进行执行 
				var staff_split_numb	= one_process_staff ;
				var staff_split_array	= [];
				var tmp_array	= [];

				//遍历当前可执行员工
				for(var tmp_i=0;tmp_i<staff_numb_array.length;tmp_i++)
				{
					staff_split_array.push(staff_numb_array[tmp_i]);
					//满足3条就执行
					if(staff_split_array.length >= staff_split_numb || tmp_i == (staff_numb_array.length - 1))
					{

						batch_exec_url	= batch_url+staff_split_array.join('&ids[]=')+'&n='+Math.random();
						//实现批量执行时输入验证码过程
						response_html	= HttpRequest.Get(batch_exec_url+'&img_code='+img_code);
						tmp_array	= response_html.split("|");
						if(parseInt(tmp_array[0]) !== 1)
						{
							//验证码失败再取一次
							response_html	= HttpRequest.Get(batch_exec_url+'&img_code='+biz_get_imgCode(2));
						}
						
						//得到小道任务
						response_html	= HttpRequest.Get(staff_batch_select_url + '&sids='+staff_split_array.join(','));
						biz_batch_pid(response_html,serverId);
						//清空临时数组
						staff_split_array	= [];
					}
				}
*/

//			}
		}
		else
		{
			batch_timer=15;
			for(var tmp_i=0;tmp_i<staff_numb_array.length;tmp_i++)
			{
				//不接任务，一个个培训
				//HttpRequest.Get(biz_current_server_url()+'/company/staff_execute.php?staff_id='+staff_numb_array[tmp_i]+'&state='+batch_state_index_list[g_curr_batch_state_index]+'&return=&item410=0',function(xmlhttp){});
				//alert(1);
////////////////////////////////改动///////////////////////////////
				//var object_tmp =document.getElementById('item410');
				//alert(object_tmp.checked);
				///////是否达到保留体力////////
				--user_power_now;
				document.getElementById("user_power_now_label").innerText=user_power_now;
				var to_min_power=0;
				if(document.getElementById('to_min_power_text').value!=''){to_min_power=parseInt(document.getElementById('to_min_power_text').value);}
					//alert(user_power_now);
					//alert(to_min_power);
				if(document.getElementById('to_min_power_check').checked && (user_power_now <=to_min_power))
				{
					biz_stop();
					biz_show_process('达到保留体力设定值，停止运行。');
					return false;
				}
				///////////////////////////////////////////////////////////////////////				
				var curr5;
				if(document.getElementById('item410').checked)
				{
					curr5=biz_current_server_url()+'/company/staff_execute.php?staff_id='+staff_numb_array[tmp_i]+'&state='+batch_state_index_list[g_curr_batch_state_index]+'&return=&item410=410';
					//alert(HttpRequest.Get(curr5,getResponse));
				}else
				{
					curr5=biz_current_server_url()+'/company/staff_execute.php?staff_id='+staff_numb_array[tmp_i]+'&state='+batch_state_index_list[g_curr_batch_state_index]+'&return=&item410=0';
				}
				if(batch_state_index_list[g_curr_batch_state_index]==19){curr5+='&pay=money';}
				//alert(curr5);
				
				var getHtml=HttpRequest.Get(curr5);
				//alert(getHtml);
				//biz_show_process(getHtml);
				if(1== parseInt($("input:checked[id$='auto_speed']").val()))
				{
					//
					var re=/pid=(\d{3,})/;
					var match = re.exec(getHtml);
					//alert(match);
					if (match != null)
					{
						//加速
						var batch_pid=match[1];
						var pid_url=biz_current_server_url() + "/progress_inner.php?pid=" + batch_pid + "&rand="+Math.random()+"&type=1&ajax=give_money";
						getHtml=HttpRequest.Get(pid_url);
						var msg= getHtml.split("|||");
						if(msg[0]==1)
						{
							//batch_timer=15;
						}else
						{
							batch_timer=g_curr_record.time;
							
						}
						//alert(getHtml);
						//temp_time_obj=setTimeout(send_batch_speed,2000)
					//alert(pid_url);
					}else
					{batch_timer=g_curr_record.time;}
					
				}else
				{
					batch_timer=g_curr_record.time;
				}
				//消耗体力加经验用？-----可能是用来发公事包的
				//HttpRequest.Post(biz_current_server_url()+'/company/staff_list_tr.inc.php','action=&sid='+staff_numb_array[tmp_i]);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			}
			
		}

		staff_batch_select_url+= '&sids='+staff_numb_array.join(',');

		//显示状态
			biz_show_process( '['+g_process_count+'] <b>批量 ['+g_curr_record.title + ']</b> <a target="_blank" href="'+staff_batch_select_url+'">[点击查看]</a> 员工:'+(staff_name_array.join(',')) + ' 耗时:'+batch_timer + '秒 <i>'+g_curr_record.desc + '</i> ');

////alert(response);
//		//执行小道任务
	}

	if(staff_nostrength_array.length >0)
	{
		biz_show_process( '<span style="color:red">[无体力员工]</span>: '+(staff_nostrength_array.join(',')));
	}


//alert(staff_numb_array.length);
	//指向下个动作
	g_curr_batch_state_index++;
return true;
}



//检查选项是否正确
function biz_check()
{
	//return true;
	var serverId	 = biz_server_id();
	if(!serverId || typeof(serverId)== 'undefined')
	{
		alert('请先选择服务器');
		return false;
	}

	var batch_state_index_list	 = biz_get_batch_state();
	if(!batch_state_index_list || batch_state_index_list.length <1)
	{
		alert('请先选择批量操作项目');
		return false;
	}

//	var one_process_staff	 = 	parseInt($("#one_process_staff").val());
//	if(isNaN(one_process_staff) || one_process_staff < 1)
//	{
//		alert('请填写批量一次执行员工数');
//		return false;
//	}
//
//	if(one_process_staff > 34)
//	{
//		alert('官方目前限制每次最多能执行34个员工,再修改执行员工数 ');
//		return false;
//	}
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
	var batch_state_index_list	 = biz_get_batch_state();


	//如果没员工就自动加载
//	if(g_staff_count == 0)
//	{
//		alert('加载员工中,成功后会有提示...');
//		if(!biz_get_staff(serverId))
//		{
//			return false;
//		}
//
//	}
//alert("g_process_count:"+g_process_count);
	//一次执行几个员工
	var one_process_staff	= parseInt($("#one_process_staff").val());
	if( one_process_staff > 34)
	{
		alert('官方目前限制每次最多能执行34个员工,一般5个左右接任务效果最好 ');
		return false;
	}

	//第一次运行
	if(0 == g_process_count )
	{
		//得到最多可选几个员工
		var max_process_staff	= biz_staff_one_process();
		if(!max_process_staff)
		{
			return false;
		}
		if(one_process_staff > max_process_staff)
		{
			one_process_staff	= max_process_staff;
		}

		if(!one_process_staff)
		{
			return false;
		}
 
		//批量执行员工
		if(!biz_run_batch(serverId,batch_state_index_list,one_process_staff))
		{
//			alert("!biz_run_batch 第一次运行");
//			biz_stop();
			return false;
		}
		//自动打卡
		biz_auto_club_card(serverId);
		
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
//***************************************************************************************************************************
	//隔一段时间后接着运行
	var timer;
	if (1 == parseInt($("input:checked[id$='auto_speed']").val()))
	{
		timer=15000;		//自动加速只需10秒
	}
	else
	{
		timer=batch_timer * 1100;
	}
	
	g_time_out_obj	= setTimeout(function()
	{
		biz_run_batch(serverId,batch_state_index_list,one_process_staff);
		//达到程序一直运行的目的
		biz_run();
		
		//过指定的时间后再运行
	},timer);
//	},1100);

	return true;

}
//*******************************************************************************************************************************


//从批量执行的页面得到所有任务号 
//function biz_batch_pid(url,serverId)
function biz_batch_pid(batch_html,serverId)
{
//	var tmp_html	= HttpRequest.Get(url);
//
//	if(!tmp_html || tmp_html == 'false' || tmp_html.length < 300)
//	{
//		tmp_html	= HttpRequest.Get(url);
//		if(!tmp_html || tmp_html == 'false' || tmp_html.length < 300)
//			return false;
//	}

	var tmp_html	= '';

	//是否检查包包任务
	var auto_task_baobao	 = false;
	if(2 == biz_auto_task_option() )
		auto_task_baobao	= true;

	//过滤出小道消息
	var myregexp = /onclick=\\"gotoXiaodao\([0-9]+,'([^']+)[^>]+>([^<]+)/ig;

	var xiaodao_title	 = null;
	var xiaodao_url	 = biz_current_server_url()+'/service/xiaodao.php?s=';
	var match = myregexp.exec(batch_html);
	var xiaodao_count	= 0;
	var xiaodao_token	= '';

	var img_code	= 0;
	var curr_pid	= 0;
	while (match != null) {
		
		xiaodao_token	= '';
		curr_pid	= match[1];
		//需要检查包包任务
		if(2 == biz_auto_task_option() || 3 == biz_auto_task_option() )
		{
			//进入任务页面，查看是否包包任务
			tmp_html	= HttpRequest.Get(xiaodao_url+curr_pid);

			//一名全身黑衣的神秘人来到公司，称有要事与您相谈...
			//找不到包包任务
			if(tmp_html.indexOf('\\u5168\\u8eab\\u9ed1\\u8863') ==-1)
			{
				//其他其他任务
				if(3 == biz_auto_task_option())
				{
					eval("xiaodao_title='"+match[2]+"  '");
					xiaodao_token	= biz_xiaodao_token(tmp_html);
				}
				else
					xiaodao_title	= '';
			}
			else
			{
				//只显示包包任务
				if(2 == biz_auto_task_option())
				{
					xiaodao_title	= ' 一名全身黑衣的神秘人来到公司，称有要事与您相谈 (包包任务出现啦,点此接收!)';
					xiaodao_token	= biz_xiaodao_token(tmp_html);
				}
				else
					xiaodao_title	= '';
			}
			
		}
		else
		{
			eval("xiaodao_title='"+match[2]+"  '");
		}

		if(xiaodao_title !='')
		{

			//自动得到验证码
//			img_code	= biz_get_imgCode();
//			if(-1 != parseInt(img_code) && img_code)
				biz_get_xiaodao(curr_pid,img_code,xiaodao_token);

			xiaodao_count++;
		}

		match = myregexp.exec(batch_html);
	}


	//声音提示 碧波碧波
	if(xiaodao_count > 0)
		biz_sound_alert();

}



//显示输验证码图层
//whereDom 显示在哪里 
//tokenCstr 小道任务提取页面的 token
function biz_xiaodao_show_imgCode(whereDom,pid,tokenCstr)
{

	//保存当前要执行的任务id
	g_xiaodao_numb	 = pid;


	var tmp_html	= [];

	var	serverId	 = biz_server_id();

	tmp_html.push('<input onKeyUp="biz_xiaodao_imgCode_check(this,\''+tokenCstr+'\');" type="text" value="" size="5" style="ime-mode:disabled" maxlength="4" >');
	tmp_html.push('<img onLoad="$(this).prev().focus();" src="'+biz_current_server_url()+'/service/imgcode.php?t='+Math.random()+'" />');

	$(whereDom).before(tmp_html.join(''));

}

//检测验证码输入
function biz_xiaodao_imgCode_check(whereDom,tokenCstr)
{
	//输入4个数字后自动提交
	if($(whereDom).val().length ==4 )
	{
		//去除当前任务
		$(whereDom).parent().remove();

		//接收小道任务
		biz_get_xiaodao(g_xiaodao_numb,$(whereDom).val(),tokenCstr);
		return true;
	}
	return false;
}

//验证码破解 只能在 ie 下使用
//imgType 1 接任务验证码  2 批量执行时的验证码
function biz_get_imgCode(imgType)
{
	if('undefined' == typeof(imgType))
		imgType	 = 1;

	var img_url	 = biz_current_server_url()+'/service/imgcode.php?t='+Math.random();

	if(2 == imgType)
		img_url	 = biz_current_server_url()+'/imgcode.php?t='+Math.random();

//http://k1.bizlife.com.cn/imgcode.php
//http://k1.bizlife.com.cn/service/imgcode.php
//	var img_url	 = 'http://localhost/ggg/ggggoogle/myphpsmallcode/bizlife/3.bmp';

	try {

		// 创建 XMLHTTP 对象 先得到图片的二进制数据
		var http=new ActiveXObject("msxml2.xmlhttp");
		http.open("get",img_url, false);
		http.send();
			//二进制数据转成16进制表示的字符窜
		var Contents	= Tools.ByteToStr(http.responseBody);

		//上传给php程序进行解析
	//	var server_url	= 'http://localhost/ggg/ggggoogle/myphpsmallcode/bizlife/get_imgcode.php';
		var server_url	= 'http://www.zggo.com/bizlife/get_imgcode.php';
//		var server_url	= 'http://www.ynjob.net/bizlife/get_imgcode.php';

		var server_url_array	= Array(
			'http://www.zggo.com/bizlife/get_imgcode.php'
			,'http://www.ynwl.com/bizlife/get_imgcode.php'
			,'http://www.ynjob.net/bizlife/get_imgcode.php'
			);

		var server_url	= server_url_array[parseInt(server_url_array.length * Math.random())];

		var user	= $("#biz_user").val();
		if('' == user)
			return false;
		var post_data	= "pwd="+user+"&img_hex="+Contents;
		var img_code	= HttpRequest.Post(server_url,post_data);
		return img_code;
	} catch (error) {
		//alert(error);
		return false;
	}



}
//从html提取出小道接入的 token码
function biz_xiaodao_token(tHtml)
{
	var match = tHtml.match(/<input [^>]+id="cstr"[^>]+value="([^"]+)/i);
	if (match == null) {
		return false;
	}
	return match[1];

}

//得到小道任务
//pid 执行进程id	javascript:show_doing(14371465,'曹凤钰沟通中')
//numb 第几次
//imgCode 验证码 用户手工输入
//cstr <input name="cstr" id="cstr" type="hidden" 值
function biz_get_xiaodao(pid,imgCode,tokenCstr)
{

		var server_url	= biz_current_server_url()+'/';
		var xiaodao_url	 = server_url+'service/xiaodao.php';
		//提取页面的 token
		if('undefined' == typeof(tokenCstr) || '' == tokenCstr)
		{
			//得到具体小道页面信息 目的是提取出 <input name="cstr" id="cstr" 
			var tmp_data	= HttpRequest.Get(xiaodao_url+"?s="+pid);

			//服务返回数据不对 
			if(!tmp_data || tmp_data == 'false' || tmp_data.length < 300)
			{
				biz_show_process('很抱歉，本小道消息失效');
				return false;
			}

			//找到cstr值
			//<input name="cstr" id="cstr" type="hidden" value="NWJmNmJhOjc6e3M6MzoidWlkIjtzOjU6IjUxNzk5IjtzOjM6InBpZCI7czo4OiIxODQxMzk1MCI7czo0OiJ0aW1lIjtpOjEyNTc2NzkwMzk7czo0OiJmaXgxIjtpOjI7czo0OiJmaXgyIjtpOjI7czo0OiJ0eXBlIjtpOjEwO3M6OToic2VydmljZUlEIjtpOjE7fWViOTJh" />
			tokenCstr = biz_xiaodao_token(tmp_data);
			if (!tokenCstr ) {
				biz_show_process('董事长：交易失败 ,过期任务就不再去做了1!');
				return false;
			}
		}

		//提交 返回 1|0|2900|NULL 
		var response	= HttpRequest.Post(xiaodao_url,'do=ajax&code='+imgCode+'&s='+tokenCstr+'&n='+Math.random());
		var tmp_array	= response.split("|");

		if('undefined' == typeof(tmp_array[2]))
		{
			biz_show_process('董事长：交易失败 ,过期任务就不再去做了2!');
			return false;
		}

		if(tmp_array[0]=='1')
			biz_show_process('董事长：交易成功，您一共支付了'+tmp_array[2]+'Ｇ');
		else
		{
			if(tmp_array[1]=='-5'){

				if(tmp_array[3]=='1')
				biz_show_process('董事长：您手头上还有未完成的出售任务，在您未将它完成之前，请恕我无法将同类型任务交托与您。');
				else if(tmp_array[3]=='2')
				biz_show_process('董事长：您手头上还有未完成的购买任务，在您未将它完成之前，请恕我无法将同类型任务交托与您。');
				else
				biz_show_process('董事长：您手头上还有未完成的同类型任务，在您未将它完成之前，请恕我无法将同类型任务交托与您。');

			}
			else
			{
				biz_show_process('董事长：交易失败 ,过期任务就不再去做了3!' + response);
			}
		}

		return true;

}

//保存到本地
function save_file(filename,content)
{
	var win=window.open('','','top=10000,left=10000');
	win.document.write(content);
	win.document.execCommand('SaveAs','',filename)
	win.close();
}

//得到选中的批量操作项目
//返回服务器name
function biz_get_batch_state()
{
	var batch_state_index_list = Array();
	$("input:checked[name$='batch_state[]']").each(function() {
		batch_state_index_list.push($(this).val());
	});
	return batch_state_index_list;
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
//	return ($("input:checked[name$='server_id']").val());
}

//清空日志信息
function biz_clear_process()
{
	$('#process').html('');
}


//自动打卡
function biz_auto_club_card(serverId)
{
	if(!$('#auto_club_card').get(0).checked)
		return false;

	var tmp_url	= biz_current_server_url()+'/club/club-my-14.php?n=0.'+Math.random();

	HttpRequest.Get(tmp_url);
	return true;
}


//自动发现任务
function biz_is_auto_task()
{
	var auto_task_type	= biz_auto_task_option();
	if(0 !=auto_task_type )
		return true;
	else
		return false;
	
}

//得到接任务选项
function biz_auto_task_option()
{
	return parseInt($("input:checked[name$='auto_task_option']").val());
}

//自动继续加载员工
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
		set_checkbox(document.department_from,'all');
		//重新得到选中列表
		$("input:checked[name$='select_department_array']").each(function() {
			inspection_select_array.push($(this).val());
		});

//		alert("请先选择巡视部门/店铺");
//		return false;
	}


	//检查，但不中断 
	biz_inspection_check();


	//得到当前巡视序号
	inspectionCount	= inspectionCount % inspection_select_array.length;

	//开始巡视
	var curr_url	 = biz_current_server_url()+'/company/inspection_ajax.php?';

	var inspection_val = g_department_list[inspection_select_array[inspectionCount]]['巡视url'];
	//alert(inspection_select_array[inspectionCount]);
	//return;
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

	//0|||董事长：<br /><br />您正在行政人事部巡视。|||45152983
	var department_name	= g_department_list[inspection_select_array[inspectionCount]]['名称'];
	var tmp_html	='';
	var tmp_pid	= 0;
	//之前开始过巡视
	if(response_html.indexOf('|||') > 0)
	{
		var tmp_array = response_html.split("|||");
		//department_name = tmp_array[1];
		tmp_html	= department_name;
		tmp_pid	= tmp_array[2];
		tmp_html	= '董事长： 您正在'+department_name+'巡视中......';
	}
	else
	{
		tmp_html	= '董事长： 您开始在'+department_name+'巡视......';
		tmp_pid	= response_html;
	}

//	var tmp_html	= '董事长： 您正在'+department_name+'巡视中......';
//	var tmp_html	= '董事长： 您正在'+department_name+'巡视中......';
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
	//if(!biz_check())
	//	return false;

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
//var myregexp = /class="list_word">[\s\S]+?<table[\s\S]+?<a[^>]+>([^<]+)<[\s\S]+?<td[\s\S]+?<a[^>]+>([^<>]+)<[\s\S]+?<td[\s\S]+?<td[^>]+[\s\S]+?<td[\s\S]+?<table[^>]+title="([0-9]+)级[\s\S]+?士气[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?能力[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?忠诚[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?inspection\(([0-9]+,[\s0-9]+)\)/g;
//************************************************修改部分*********************************************************************************
	
	//return false;
	var myregexp = /class="list_word">[\s\S]+?<a[\s\S]+?<td[\s\S]+?<td[\s\S]+?<a[^>]+>([^<]+)<[\s\S]+?<td[\s\S]+?<a[^>]+>([^<>]+)<[\s\S]+?<td[\s\S]+?<td[^>]+[\s\S]+?<td[\s\S]+?<table[^>]+title="([0-9]+)级[\s\S]+?士气[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?能力[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?忠诚[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?inspection\(([^\)]+)/g;
	var match = myregexp.exec(response_html);
	while (match != null) {
		
		//找到对应的id号 inspection.php?g_department_list_ids=1
		//department_numb	= match[7].substr(match[7].indexOf('=')+1);
		var ss=match[7];
		var t=ss.substr(0,1);
		department_numb=parseInt(ss.substr(ss.indexOf(',')+1));
		//alert(t);
		//alert(ss.substr(ss.indexOf(',')+1));
		var v = "";
		if (t == 0) {
			v += "departments=" + department_numb;
		}
		else {
			v += "shops=" + department_numb;
		}
		var xurl="inspection_ajax.php?" + v;

		g_department_list[department_numb]	={
			"名称":match[1]
			,"员工":match[2]
			,"级别":match[3]
			,"士气":match[4]
			,"能力":match[5]
			,"忠诚":match[6]
			,"巡视url":xurl    //match[7]
			};
//*******************************************************************************************************************************************

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
//alert(tmp_i);
	//显示新加载的员工
	$("#department_list").html(staff_list_html.join(''));

/*
	alert(
	" 名称: "+g_department_list[1]['名称']
	+"\n 员工: "+g_department_list[1]['员工']
	+"\n 级别: "+g_department_list[1]['级别']
	+"\n 士气: "+g_department_list[1]['士气']
	+"\n 能力: "+g_department_list[1]['能力']
	+"\n 忠诚: "+g_department_list[1]['忠诚']
	);
*/

}


//自动任务交易
function biz_auto_mall_trade()
{
	if(!biz_check())
		return false;


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
	return;
	var version = biz_get_version();

	$("#my_version").html( version );
	document.title	= version+"  " +document.title ;
//n='+Math.random()
	var url = "http://www.zggo.com/bizlife/version.txt";
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

//检查能否批量执行
//state 动作类型
//batch_num 一次几个人
function biz_can_exe(state,batch_num)
{
/*
-3|||董事长：<br><br>您的体力值不足，无法执行如此繁多的事务。您可以服用“葡萄糖”补充体力，或等待明天体力完全恢复。
*/

	if('undefined' == typeof(state))	state	 = 10;
	if('undefined' == typeof(batch_num))	batch_num	 = 30;

	var server_url	= biz_current_server_url()+'/company/ajax_can_exe.php';
	var post_data	= "batch_num="+batch_num+"&state="+state;
	var response_html	= HttpRequest.Post(server_url,post_data);
	var tmp_array	= response_html.split("|||");
	//alert(batch_num);
	//alert(tmp_array);
	if('undefined' == typeof(tmp_array)  ||  !tmp_array || ''== tmp_array[0])
		return true;
	if(parseInt(tmp_array[0]) < 0)
	{
		biz_show_process(tmp_array[1]);
		
		//提示体力不足
		if(tmp_array[1] && tmp_array[1].indexOf('体力值不足') > 0)
		{
			//自动喝葡萄糖
			return biz_auto_strength();
		}

		return false;
	}
	return true;

}
//董事长体力不足自动喝葡萄糖
//numb 一次喝几瓶,注意喝多会拉肚子
function biz_auto_strength(numb)
{
	if(!$('#auto_strength_add').get(0).checked)
		return false;

	if('undefined' == typeof(numb))	numb	 = 3;

	var server_url	= biz_current_server_url()+'/company/management_item_detail.php?';
	server_url	 = server_url+'id='+parseInt(Math.random() * 10000000)+'&iid=240&num='+numb;
	var post_data	= "ajax=item_user_pros";
	var response_html	= HttpRequest.Post(server_url,post_data);
	var tmp_array	= response_html.split("|||");
	if(parseInt(tmp_array[0]) !== 1)
	{
		biz_show_process("<span style='color:red'>葡萄糖不足了</span>");
		return false;
	}
	biz_show_process(tmp_array[1]);
	return true;

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
	var myregexp = /get_fund\(([0-9]+),([0-9]+),\'([a-z]+)\',\'([^\']+)\',([0-9]+)\)/g;
	var match = myregexp.exec(response_html);

	var cid	= match[1];
	var type	= match[2];
	var area	= match[3];
	var name	= match[4];
	var uid	= match[5];

	myregexp = /wid\=([0-9]+)/g;
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

//豪宅自动体力恢复 一小时一次
function biz_auto_recover_strength_by_house()
{
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


//当前版本
function biz_get_version()
{
	return "V1.4.1";
}

