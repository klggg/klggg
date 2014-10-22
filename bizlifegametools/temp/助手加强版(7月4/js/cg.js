// JavaScript Document
//var shop_endtime_list={};
var shop_select_array_purchase = Array();
var skill_runing=0;
var user_power_max,user_power_min,user_power_now;
var shopCount_purchase;
var shop_purchase_timer_one_obj;
var shop_list=new Array();
var shop_list2=new Array();
var mrrw_list=new Array();
var mrrw_order_num,mrrw_timer_obj;
var mrrw_id;
var mrrw_endtime;
var intervalId,intervalId2;
var count_time,count_time2;
//员工列表行技能对象
var tmp_obj_staff_skill;
var tmp_staff_id=0;
//天气影响
var shop_Weather=1;
var run_timer,run_timer_obj,jl_timer_obj,r_id,prepare_timer_obj;
//var skill_id=0;
var mrrw_timer=new Array(0,300,840,180,720,525,1200,600,1260,390,720,420,1440);
var mrrw_name=new Array('','新闻阅读','秘书沟通','运营分析','高层会议','业务规划','市场调查','竞争分析','合作规划','客户调查','政府沟通','财务预测','演讲')
var mrrw_oder=new Array(0,1,10,2,7,5,11,6,9,3,8,4,12);
//r_id=1;
var skill_arr={'心算':1,	'投机':2,'微笑':3,'推销':4,'创造':5,'经营':6,'管理':7,'谈判':8,'人际':9,'学习':10,'精算':11,'核算':12,	'策划':13,'鼓舞':14,'营销':15}
var skill_book={'心算':257,'投机':258,'微笑':259,'推销':260,'创造':261,'经营':247,'管理':248,'谈判':249,'人际':250,'学习':251,'精算':252,'核算':253,'策划':254,'鼓舞':255,'营销':256}

function run_Prepare()
{
	if (document.getElementById('run_Prepare_button').value =="酝酿策划")
	{
		//shop_purchase_run();
		//var shop_purchase_timer_obj=setInterval(shop_purchase_run,1860000);
		//var shop_purchase_timer_obj=setTimeout(shop_purchase_run,1000);
		var r=HttpRequest.Get(biz_current_server_url()+"/company/plan.php");
		var myregexp =/var count_time=(\d*)/g;
		var match = myregexp.exec(r);
		//alert(match);
		if(match==null)
		{
			count_time=0;
			DoPrepare();
		}
		else
		{
			//var wait_time;
			//alert(match);
			count_time=parseInt(match[1]);
			prepare_timer_obj=setTimeout(DoPrepare,count_time*1000);
			tmp_html="策划部正在酝酿策划中，等待："+seconds2timestr(count_time)+"后执行。";
			biz_show_process(tmp_html);
			intervalId=setInterval(CountTime,1000);
		}
		document.getElementById('run_Prepare_button').value ="酝酿策划中--点击停止";
	}
	else
	{
		document.getElementById('run_Prepare_button').value ="酝酿策划";
		clearInterval(prepare_timer_obj);
		clearInterval(intervalId);
		return;
	}
	
}
function CountTime(){
	--count_time;
	if(count_time<=0){
		clearInterval(intervalId);
		//UpdateLocation();
	}
	document.getElementById("run_Prepare_button").value="酝酿策划中("+seconds2timestr(count_time)+")--点击停止";
	//document.getElementById("count_time").innerHTML=seconds2timestr(count_time);
}
function CountTime2(){
	--count_time2;
	if(count_time2<=0){
		clearInterval(intervalId2);
		document.getElementById("mrrw_run_button").value="任务执行中--点击停止";
		//UpdateLocation();
	}
	document.getElementById("mrrw_run_button").value="任务执行中("+seconds2timestr(count_time2)+")--点击停止";
	//document.getElementById("count_time").innerHTML=seconds2timestr(count_time);
}

function seconds2timestr(seconds) {
	var d = Math.floor(seconds / 86400);
	var h = Math.floor(seconds % 86400 / 3600);
	var m = Math.floor(seconds % 3600 / 60);
	var s = seconds % 60;
	var str = "";
	if (d > 0) {
		str = d + "天" + h + "时" + m + "分" + s + "秒";
	}
	else if (h > 0) {
		str = h + "时" + m + "分" + s + "秒";
	}
	else if (m > 0) {
		str = m + "分" + s + "秒";
	}
	else if (s >= 0) {
		str = s + "秒";
	}
	return str;
}
function DoPrepare(){
	//alert("1");
	var r=sendPost(biz_current_server_url()+"/company/plan.php","action=prepare");
	if(r){
		var r_arr=r.split("|||");
		//alert(r_arr[0]);
		if(r_arr[0]==0){
			//ralert(r_arr[1],"确定","");
			//alert("酝酿失败，可能正在执行酝酿。请先等待停止。");
			tmp_html="酝酿策划失败。"+r_arr[1].replace(/\n/g);
			biz_show_process(tmp_html);
			clearInterval(intervalId);
			document.getElementById('run_Prepare_button').value ="酝酿策划";
			return;
		}else if(r_arr[0]==1){
			//window.top.update_income();
			//ralert(r_arr[1],"确定","js:UpdateLocation();");
			tmp_html="酝酿策划成功。"+r_arr[1].replace(/\n/g);
			biz_show_process(tmp_html);
			clearInterval(intervalId);
			count_time=605;
			
			prepare_timer_obj=setTimeout(DoPrepare,605*1000);
			intervalId=setInterval("CountTime()","1000");
		}
	}else
	{
		tmp_html="酝酿策划失败。";
		biz_show_process(tmp_html);
		document.getElementById('run_Prepare_button').value ="酝酿策划";
	}
}
function run_command()
{
	//alert($('#command_text1').val());
	var command_1=$('#command_text1').val().replace(/(^\s*)|(\s*$)/g, '');
	var command_2=$('#command_text2').val().replace(/(^\s*)|(\s*$)/g, '');
	run_timer=parseInt($('#command_text3').val());
	//alert(command_1);
	if(command_1=='' ){return;}
	
	run_command_one(command_1,command_2,run_timer);
}
function run_command_one(command_1,command_2,run_timer)
{
	var tmp_html;
	//alert(command_1);
	//alert(command_2);
	//alert(run_timer);
	var r = sendPost(command_1, command_2);
	var msg= r.split("|||");
	alert(r);return;
	if (parseInt(msg[0])>0){
		tmp_html="命令执行成功 ";
		//r = HttpRequest.Get(biz_current_server_url() + "/progress_inner.php?pid="+ msg[0] +"&t="+Math.random());
		//http://k19.bizlife.com.cn/progress_inner.php?pid=49947568&t=0.44187218796476685
		biz_show_process(tmp_html);
		//run_timer_obj=setTimeout(run_command_start,run_timer*1000);
	}
	else
	{
		//alert(r);
		tmp_html="命令执行失败 ";
		biz_show_process(tmp_html);
		//alert("执行完毕");
	}
	
}
function _run_command_one()
{
    return function(command_1,command_2,run_timer)
    {
		run_command_one(command_1,command_2,run_timer);
	}
}
////////////////////////////////////////////////////////////////////////////
function show_skill_win(staff_id,obj_skill)
{
	//return;.replace(/[a-zA-Z<>\/]+/ig,'')
	if(document.getElementById("staff_level_win").style.display!="none"){return;}
	var tmp_bkcolor=obj_skill.parentNode.style.backgroundColor;
	if(tmp_bkcolor=='#ff0000' || tmp_bkcolor=='#ffff00'){return;}
	run_timer=12;
	var tmp_str,skill_name,skill_id,staff_name;
	tmp_str=obj_skill.innerText.split(":");
	if(tmp_str[1]>=5)
	{document.getElementById("up_skill_button").disabled="disabled";}
	else
	{document.getElementById("up_skill_button").disabled="";}
	//将操作对象放入临时变量
	tmp_obj_staff_skill=obj_skill;
	tmp_staff_id=staff_id;
	//alert(tmp_obj_staff_skill);
	tmp_str=obj_skill.innerText.split(":");
	skill_name=tmp_str[0];
	skill_id=skill_arr[skill_name];
	document.getElementById("staff_name_input").value=obj_skill.parentNode.parentNode.cells[1].innerText;
	//员工ID放入隐藏域
	document.getElementById("staff_id_input").value=staff_id;
	document.getElementById("skill_name_input").value=skill_name;
	//技能ID放入隐藏域
	document.getElementById("skill_id_input").value=skill_id;
	//调整操作框位置
	document.getElementById("skill_win").style.left=document.body.clientWidth/2-250;
	document.getElementById("skill_win").style.top=350+document.documentElement.scrollTop;
	//alert(document.body.clientHeight);
	//alert(document.body.scrollHeight);
	document.getElementById("skill_win").style.display="block";
}
function close_skill_win()
{
	document.getElementById("skill_win").style.display="none";
}
///////////////////////////////////深造技能//////////////////////////////////////////////////////////
function up_skill()
{
	//obj_staff_skill
	//var tmp_str,skill_name,skill_id,staff_name,staff_id,obj_skill,uptolevel;
	//从临时变量中取出操作对象
	var obj_skill=tmp_obj_staff_skill;
	//alert(tmp_obj_staff_skill);
	//alert(1);
	var staff_id=tmp_staff_id;
	var staff_name=obj_skill.parentNode.parentNode.cells[1].innerText;
	
	var tmp_str=obj_skill.innerText.split(":");
	var skill_name=tmp_str[0];
	var skill_id=skill_arr[skill_name];
	
	var uptolevel=parseInt(document.getElementById("uptolevel_input").value);
	obj_skill.parentNode.style.backgroundColor='#ffff00';
	obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='disabled';
	obj_skill.parentNode.parentNode.cells[13].childNodes[0].checked='';
	obj_skill.style.color='#ff0000';
	var tmp_str=obj_skill.parentNode.parentNode.cells[9].innerText.split("/");
	//alert(tmp_str[0]);
	var now_power=tmp_str[0];
	//var ss=obj_skill.innerText.split(":");
	//alert(obj_skill.parentNode.parentNode.cells[12].innerText);
	//return;
	up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power);
	close_skill_win();
}
//技能深造转换统计
var skill_update_counts=0,skill_conver_counts=0,skill_update_success_counts=0,skill_conver_success_counts=0;

function up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power)
{
	//alert(obj_skill.parentNode.parentNode.cells[9].innerText);
	if(skill_id==0 || staff_id==0 )
	{
		obj_skill.parentNode.style.backgroundColor='';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		return;
	}
	if(now_power<=0)
	{
		obj_skill.parentNode.style.backgroundColor='#ff0000';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		obj_skill.style.color='';
		return;
	}
	if(uptolevel>5){uptolevel=5;document.getElementById("uptolevel_input").value=5}
	var tmp_str=obj_skill.innerText.split(":");
	if(tmp_str[1]>=5)
	{
		//document.getElementById("up_skill_button").disabled="disabled";
		obj_skill.parentNode.style.backgroundColor='#EEBB55';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		obj_skill.style.color='';
		return;
	}
	//var tmp_html;
	//var curr1,curr2;
	//varg_staff_array[staff_id]["技能"]
	
	var curr1=biz_current_server_url()+"/company/staff_further_education_skill.php?skill_type=skill"+ skill_id +"&staff_id=" + staff_id + "&pay=money";
	var curr2="ajax=struct_skilling&item_books=0&item_238=0&all_item_books=0";
	//alert(curr1);
	var r = sendPost(curr1,curr2 );
	if(!r || r.length<5)
	{
		jl_timer_obj=setTimeout(_up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power),15*1000);	
		return;
	}
	var msg= r.split("|||");
	//alert(r);
	//var tmp_str;
	if (parseInt(msg[0])>0){
		now_power--;
		skill_update_counts++;
		document.getElementById("skill_update_count").innerText=skill_update_counts;
		document.getElementById("skill_update_success_count").innerText=skill_update_success_counts;
		document.getElementById("skill_update_probability").innerText=parseInt(skill_update_success_counts/skill_update_counts*100+0.5);
		var tmp_str=obj_skill.parentNode.parentNode.cells[9].innerText.replace(/\d+\//,now_power+"/");
		obj_skill.parentNode.parentNode.cells[9].innerText=tmp_str;
		g_staff_array[staff_id]['体力']['当前']--;
		var tmp_html=staff_name+" ";
		//alert(msg[0]);
		var cuur3=biz_current_server_url() + "/progress_inner.php?pid="+ msg[0] +"&t="+Math.random();
		//alert(cuur2);
		r = HttpRequest.Get(cuur3);
		//biz_show_process(r);
		//alert(r);
		var myregexp =/<span id="progress_rs">([\s\S]*?执行结果：[\s\S]+?员工[\s\S]+?)<\/span>/g;
		var match = myregexp.exec(r);
		//alert(match);
		if(match!=null)
		{
			//alert(match[1].search(/技能深造成功/i));
			if(match[1].search(/技能深造成功/i)>=0)
			{
				skill_update_success_counts++;
				document.getElementById("skill_update_count").innerText=skill_update_counts;
				document.getElementById("skill_update_success_count").innerText=skill_update_success_counts;
				document.getElementById("skill_update_probability").innerText=parseInt(skill_update_success_counts/skill_update_counts*100+0.5);
				tmp_html="<font color=#00cc00 >"+tmp_html+match[1].replace(/(^\s*)|(\s*$)/g, '') + "</font>";
				var myregexp =/提升到(\d)级/g;
				var match = myregexp.exec(match[1]);
				if(match!=null)
				{
					tmp_str="/" + skill_name + ":\d+/"
					var re=eval(tmp_str);
					g_staff_array[staff_id]["技能"]=g_staff_array[staff_id]["技能"].replace(re,skill_name+":"+match[1]);
					obj_skill.innerText=skill_name+":"+match[1];
					if( parseInt(match[1])>=uptolevel)
					{
						biz_show_process(tmp_html);
						tmp_html=staff_name+" 执行完毕 技能已提升到设定等级："+match[1]+"级。";
						biz_show_process(tmp_html);
						jl_timer_obj=setTimeout(_up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power),15*1000);
						return;
					}
				}
				
			}
			else
			{tmp_html+=match[1].replace(/(^\s*)|(\s*$)/g, "");}
			
			//obj_skill.parentNode.style.backgroundColor='';
			biz_show_process(tmp_html);
		}
		
		jl_timer_obj=setTimeout(_up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power),15*1000);
	}
	else
	{
		tmp_html=staff_name+" 执行完毕 ";
		biz_show_process(tmp_html);
		obj_skill.parentNode.style.backgroundColor='';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		obj_skill.style.color='';
		return;
		//document.getElementById("ygjl_button").value="开始";
		//alert("执行完毕");
	}
}
function _up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power)
{
    return function()
    {
 		up_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,uptolevel,now_power);
    }
}
////////////////////////////////////////转换技能///////////////////////////////////////
function conver_skill()
{
	//从临时变量中取出操作对象
	
	var obj_skill=tmp_obj_staff_skill;
	var staff_id=tmp_staff_id;
	var staff_name=obj_skill.parentNode.parentNode.cells[1].innerText;
	
	var tmp_str=obj_skill.innerText.split(":");
	var skill_name=tmp_str[0];
	var skill_id=skill_arr[skill_name];
	
	var r=HttpRequest.Get(biz_current_server_url()+"/company/staff_bathe_skill_confirm.php?staff_id=" + staff_id + "&skill="+ skill_id);
	var myregexp =/还剩(\d)+次成功转换技能的机会/g;
	var match = myregexp.exec(r);
	if(match!=null)
	{
		if(confirm("你确信要转转换技能吗？有可能丢失技能！\n员工还有["+match[1]+"]次转换机会。"))
		{
			
			var uptolevel=parseInt(document.getElementById("uptolevel_input").value);
			obj_skill.parentNode.style.backgroundColor='#ffff00';
			obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='disabled';
			obj_skill.parentNode.parentNode.cells[13].childNodes[0].checked='';
			obj_skill.style.color='#ff0000';
			var tmp_str=obj_skill.parentNode.parentNode.cells[9].innerText.split("/");
			//alert(tmp_str[0]);
			var now_power=tmp_str[0];
			conver_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,match[1],now_power);
		}
	}else
	{
		alert("员工的所有转换技能次数已用完。");
	}
	close_skill_win();
	
}
function conver_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,zh_num,now_power)
{
	if(skill_id==0 || staff_id==0 )
	{
		obj_skill.parentNode.style.backgroundColor='';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		return;
	}
	if(now_power<=0)
	{
		obj_skill.parentNode.style.backgroundColor='#ff0000';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		obj_skill.style.color='';
		return;
	}
	//alert(zh_num);
	//var tmp_html;
	//var curr1,curr2,r,msg;
	var curr1=biz_current_server_url()+"/company/staff_bathe_skill_confirm.php?skill="+ skill_id +"&staff_id=" + staff_id + "&pay=money";
	var curr2="ajax=update_skill_level&item342=0";
	var r = sendPost(curr1,curr2 );
	if(!r || r.length<5)
	{
		jl_timer_obj=setTimeout(_conver_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,zh_num,now_power),15*1000);	
		return;
	}
	
	var msg= r.split("|||");
	//alert(r);
	//alert(msg[0]);
	if (msg[0]=='yes'){
		now_power--;
		skill_conver_counts++;
		document.getElementById("skill_conver_count").innerText=skill_conver_counts;
		document.getElementById("skill_conver_success_count").innerText=skill_conver_success_counts;
		document.getElementById("skill_conver_probability").innerText=parseInt(skill_conver_success_counts/skill_conver_counts*100+0.5);
		var tmp_str=obj_skill.parentNode.parentNode.cells[9].innerText.replace(/\d+\//,now_power+"/");
		obj_skill.parentNode.parentNode.cells[9].innerText=tmp_str;
		g_staff_array[staff_id]['体力']['当前']--;
		var tmp_html=staff_name+" ";
		//alert(msg[0]);
		var cuur3=biz_current_server_url() + "/progress_inner.php?pid="+ msg[1] +"&t="+Math.random();
		//alert(cuur2);
		r = HttpRequest.Get(cuur3);
		//biz_show_process(r);
		//alert(r);
		var myregexp =/<span id="progress_rs">([\s\S]*?执行结果：[\s\S]+?员工[\s\S]+?)<\/span>/g;
		var match = myregexp.exec(r);
		//alert(match);
		if(match!=null)
		{
			//alert(match[1].search(/技能深造成功/i));
			if(match[1].search(/技能转换成功/i)>=0)
			{
				//tmp_html="<font color=#00cc00 >"+tmp_html+match[1].replace(/(^\s*)|(\s*$)/g, "")+"</font>...<font color=#ff0000 >还剩["+zh_num+"]次转换机会。</font>";
				skill_conver_success_counts++;
				document.getElementById("skill_conver_count").innerText=skill_conver_counts;
				document.getElementById("skill_conver_success_count").innerText=skill_conver_success_counts;
				document.getElementById("skill_conver_probability").innerText=parseInt(skill_conver_success_counts/skill_conver_counts*100+0.5);
				var myregexp =/技能转换成“([^ ]+)”技能/g;
				var match = myregexp.exec(match[1]);
				if(match!=null)
				{
					tmp_str="/" + skill_name + ":\d+/"
					var re=eval(tmp_str);
					g_staff_array[staff_id]["技能"]=g_staff_array[staff_id]["技能"].replace(re,match[1]+":1");
					obj_skill.innerText=match[1]+":1";
				}
				zh_num--;
				tmp_html="<font color=#00cc00 >"+tmp_html+"执行结果：技能转换成功，["+ skill_name +"]技能转换成["+match[1]+"]技能。</font><font color=#ff0000 >剩余["+zh_num+"]次转换机会。</font>";
				biz_show_process(tmp_html);
				jl_timer_obj=setTimeout(_conver_complate(obj_skill),12000);
				return;
			}
			else
			{
				tmp_html+=match[1].replace(/(^\s*)|(\s*$)/g, "");
				biz_show_process(tmp_html);
			}
		}
		else
		{
			tmp_html+="技能转换成功 信息查看失败。";
			biz_show_process(tmp_html);
		}
		
		jl_timer_obj=setTimeout(_conver_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,zh_num,now_power),15000);
	}
	else
	{
		tmp_html=staff_name+" 执行失败 有错误";
		biz_show_process(tmp_html);
		obj_skill.parentNode.style.backgroundColor='#EEBB55';
		obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
		obj_skill.style.color='';
		//document.getElementById("ygjl_button").value="开始";
		//alert("执行完毕");
	}
}

function _conver_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,zh_num,now_power)
{
    return function()
    {
 		conver_skill_one(obj_skill,staff_name,staff_id,skill_name,skill_id,zh_num,now_power);
    }
}
function conver_complate(obj_skill)
{
	obj_skill.parentNode.style.backgroundColor='#EEBB55';
	obj_skill.parentNode.parentNode.cells[13].childNodes[0].disabled='';
	obj_skill.style.color='';
}
function _conver_complate(obj_skill)
{
    return function()
    {
 		conver_complate(obj_skill);
    }
}


////////////////////////////////日常任务////////////////////////////////
function mrrw_start()
{
//日常任务
//alert(0);
//return;
	if (document.getElementById('mrrw_run_button').value =="开始任务")
	{
		document.getElementById('mrrw_run_button').value ="正在执行任务--点击停止";
		mrrw_load();
		//shop_purchase_run();
		//var shop_purchase_timer_obj=setInterval(shop_purchase_run,1860000);
		//var shop_purchase_timer_obj=setTimeout(shop_purchase_run,1000);
	}
	else
	{
		document.getElementById('mrrw_run_button').value ="开始任务";
		clearInterval(mrrw_timer_obj);
		clearInterval(intervalId2);
		return;
	}
	
}
function mrrw_load()
{
	var curr_url = biz_current_server_url()+'/mission/daily_index.php';
	//alert(curr_url);
	var response_html= HttpRequest.Get(curr_url);
	//alert(response_html);
	if(!response_html || response_html.length < 300)
	{
		//alert("请先登录");
		//return false;
		mrrw_timer_obj=setTimeout(mrrw_load,60*1000);
	}
	var myregexp = /var count_time=(\d+)/g;
	var match = myregexp.exec(response_html);
	//if(match==null){return;}
	//alert(match);
	var time_wait;
	if(match==null)
	{
		time_wait=1;
	}
	else
	{
		time_wait=parseInt(match[1])+5;
		var show_html="任务正在执行中，等待"+time_wait+"秒后自动继续。";
		biz_show_process(show_html);
		clearInterval(intervalId2);
		count_time2=time_wait-5;
		intervalId2=setInterval(CountTime2,1000);
	}
	//if(time_wait==''){time_wait=5}
	//alert(time_wait);
	var d=new Date();
	mrrw_endtime=DateAdd("s",time_wait,d);
	
	var myregexp = /\[\D*(\d+)\/(\d+)[\x00-\xff]*任务加成：\D*(\d+)[\x00-\xff]*加成延续：<\/td>\s*<td>([^<]*)/g;
	var match = myregexp.exec(response_html);
	//alert(match);
	var i=1;
	var tr_num=0;
	//var tr_num2=0;
	var mrrw_list_html='';
	while (match != null) {
		//for (j = 1; j <= 5; j++) {
		//   if(match[j].replace(/(^\s*)|(\s*$)/g, "")==""){match[j]="&nbsp;";}
		//}
		//match[5]=match[5].replace(/时间：剩余/g, "中...");
		//i=match[5];
		if(mrrw_timer[i]!=0)
		{
			mrrw_list_html+='<tr>';
			mrrw_list_html+='<td align="center">'+mrrw_name[i]+'</td>';
			mrrw_list_html+='<td align="center">'+match[1]+"/"+match[2]+'</td>';
			mrrw_list_html+='<td align="center">'+match[3]+"%"+'</td>';
			mrrw_list_html+='<td align="center">'+mrrw_timer[i]+'</td>';
			mrrw_list_html+='<td align="center">'+match[4]+'</td>';
			mrrw_list_html+='</tr>';
			mrrw_list[tr_num]={
				"任务名称":mrrw_name[i],
				"已执行次数":parseInt(match[1]),
				"最大执行次数":parseInt(match[2]),
				"任务加成":parseInt(match[3]),
				"执行时间":mrrw_timer[i],
				"加成延续":match[4],
				"id":i
			}
			tr_num++;
		}
		
		//alert(match[4]);
		//document.getElementById("mrrw_table").rows[i+1].cells[1].innerHTML=match[1]+"/"+match[2];
		//document.getElementById("mrrw_table").rows[i+1].cells[2].innerHTML=match[3]+"%";
		//document.getElementById("mrrw_table").rows[i+1].cells[3].innerHTML=run_time[i]+"秒";
		//document.getElementById("mrrw_table").rows[i+1].cells[4].innerHTML=match[4];
		//document.getElementById("mrrw_table").rows[i+1].cells[5].innerHTML=mrrw_list[i]["状态"];
		match = myregexp.exec(response_html);
		i++;
	}
	
	
	$('#mrrw_list_table').html(mrrw_list_html);
	mrrw_order_num=0;
	//alert(time_wait);
	//if(document.getElementById('mrrw_1').checked)
	//{
	//	mrrw_timer_obj=setTimeout(mrrw_run2,time_wait*1000);
	//}else
	//{
		//return;
		mrrw_timer_obj=setTimeout(mrrw_run,time_wait*1000);
	//}
	//alert(time_wait);
}

function mrrw_run()
{
	//alert(mrrw_order_num);
	//return;
	//alert(mrrw_list.ubound());
	if(mrrw_order_num<mrrw_list.length)
	{
		var mrrw_id=mrrw_list[mrrw_order_num]["id"];
		if(mrrw_list[mrrw_order_num]["执行时间"]==0)
		{
			mrrw_order_num++;
			mrrw_timer_obj=setTimeout(mrrw_run,1000);
			return;
		}
		
		if(mrrw_list[mrrw_order_num]["已执行次数"]>=mrrw_list[mrrw_order_num]["最大执行次数"])
		{
			var d=new Date();
			//var d_str;
			d=DateAdd("h",24,d);
			//alert(date_format(d));
			//d_str=
			if(mrrw_list[mrrw_order_num]["加成延续"]=='暂无'){mrrw_list[mrrw_order_num]["加成延续"]=date_format(d)};
			document.getElementById("mrrw_table").rows[mrrw_order_num+2].cells[4].innerHTML=mrrw_list[mrrw_order_num]["加成延续"];
			//alert(1);
			//mrrw_list[mrrw_id]["状态"]="任务已全部完成";
			//document.getElementById("mrrw_table").rows[mrrw_list[mrrw_order_num+2].cells[5].innerHTML=mrrw_list[mrrw_id]["状态"];
			var show_html="<b>["+mrrw_list[mrrw_order_num]["任务名称"]+"]</b>已执行完毕，转入下一个任务。 ";
			biz_show_process(show_html);
			mrrw_order_num++;
			mrrw_timer_obj=setTimeout(mrrw_run,1000);
			clearInterval(intervalId2);
			return;
			//alert(mrrw_id);
		}
		else
		{
			var curr1,curr2;
			//div_page('./daily_implement.php?id='+id,title,600,350);
			curr1= biz_current_server_url()+"/mission/daily_implement.php?id="+mrrw_id;
			//alert(curr1);
			var r = sendPost(curr1, "action=do");
			//alert(r);
			//return;
			var msg= r.split("|||");
			if(msg[0]==1){
				var show_html="执行<b>["+mrrw_list[mrrw_order_num]["任务名称"]+"]</b>成功 ，剩余体力："+msg[1];
				biz_show_process(show_html);
				
				//mrrw_list[mrrw_id]["状态"]="正在执行..."
				//document.getElementById("mrrw_table").rows[mrrw_id+1].cells[5].innerHTML=mrrw_list[mrrw_id]["状态"];
				mrrw_list[mrrw_order_num]["已执行次数"]++;
				document.getElementById("mrrw_table").rows[mrrw_order_num+2].cells[1].innerHTML=mrrw_list[mrrw_order_num]["已执行次数"]+"/"+mrrw_list[mrrw_order_num]["最大执行次数"];
				
				//检测体力
				user_power_now=msg[1];
				document.getElementById("user_power_now_label").innerText=user_power_now;
				if(document.getElementById('to_min_power_check').checked)
				{
					var to_min_power=0;
					if(document.getElementById('to_min_power_text').value!=''){to_min_power=parseInt(document.getElementById('to_min_power_text').value);}
					if(user_power_now <=to_min_power)
					{
						biz_show_process('达到保留体力设定值。');
						//return ;
					}
				}
				//alert(mrrw_list[mrrw_order_num]["执行时间"]);
				clearInterval(intervalId2);
				count_time2=mrrw_list[mrrw_order_num]["执行时间"]+10;
				intervalId2=setInterval(CountTime2,1000);
				mrrw_timer_obj=setTimeout(mrrw_run,count_time2*1000);
				return;
				//mrrw_load2();
				//document.getElementById("mrrw_table").rows[mrrw_id+1].cells[2].innerHTML=mrrw_list[i]["任务加成"]+"%";
				//document.getElementById("mrrw_table").rows[mrrw_id+1].cells[3].innerHTML=run_time[i]+"秒";
				//document.getElementById("mrrw_table").rows[mrrw_id+1].cells[4].innerHTML=mrrw_list[mrrw_id]["加成延续"];
				//document.getElementById("mrrw_table").rows[mrrw_id+1].cells[5].innerHTML=mrrw_list[mrrw_id]["状态"];
				//if(mrrw_list[mrrw_id]["已执行次数"]>=mrrw_list[mrrw_id]["最大执行次数"])
				//{
				//	mrrw_id++;
					
				//}
			}
			else
			{
				var show_html="执行失败 "+msg[1];
				biz_show_process(show_html);
				mrrw_order_num++;
				mrrw_timer_obj=setTimeout(mrrw_run,1000);
				return;
			}
			
		}
	}
	else
	{
		//当天任务执行完毕，明天再继续
		if(document.getElementById("mrrw_autoreload").checked)
		{
			var show_html="今日任务全部执行完毕，明日零点自动继续。";
			biz_show_process(show_html);
			var d=new Date();
			var h=d.getHours() +d.getMinutes()/60
			mrrw_timer_obj=setTimeout(mrrw_load,(24.1-h)*3600*1000);
			clearInterval(intervalId2);
			count_time2=parseInt((24.1-h)*3600);
			intervalId2=setInterval(CountTime2,1000);
			return;
		}else
		{
			clearInterval(mrrw_timer_obj);
			clearInterval(intervalId2);
			var show_html="今日任务全部执行完毕。";
			biz_show_process(show_html);
			document.getElementById('mrrw_run_button').value ="开始任务";
			return;
		}
	}
	//alert(msg[0]);
}
function mrrw_run2()
{
	var curr1,curr2;
	var mrrw_id=1;
	curr1= biz_current_server_url()+"/mission/daily_implement.php?id=" + mrrw_id + "&rand_num=";
	alert(curr1);
	var r = sendPost(curr1, "sell=1");
	alert(r);
	var msg= r.split("|||");
	if(msg[0]==1){
		var show_html="执行<b>["+mrrw_list[mrrw_id]["任务名称"]+"]</b>成功 "+msg[2];
		biz_show_process(show_html);
		
		mrrw_list[mrrw_id]["状态"]="正在执行..."
		document.getElementById("mrrw_table").rows[2].cells[5].innerHTML=mrrw_list[mrrw_id]["状态"];
		mrrw_list[mrrw_id]["已执行次数"]++;
		document.getElementById("mrrw_table").rows[2].cells[1].innerHTML=mrrw_list[mrrw_id]["已执行次数"]+"/"+mrrw_list[mrrw_id]["最大执行次数"];
		mrrw_timer_obj=setTimeout(mrrw_run2,(mrrw_list[1]["执行时间"]+10)*1000);
		clearInterval(intervalId2);
		count_time2=mrrw_list[mrrw_id]["执行时间"];
		intervalId2=setInterval(CountTime2,1000);
	}
	else
	{
		var show_html="执行失败 "+msg[1];
		biz_show_process(show_html);
	}
		
	//alert(msg[0]);
}


///////////////////////////////////////////店铺采购/////////////////////////////////////////////////////////////////////
var index_str1="级";
var index_str2='晴天';
var index_str3='多云';
var index_str4='小雨';
var index_str5='大雨';
var index_str6='暴雨';

function update_weather() {
	ajaxSendPost(biz_current_server_url() + "/ajax_update_weather.php", null, update_weather_complete);
}
function update_weather_complete(data) {
	try {
		eval("var d = " + data + ";");
		var cfg_weather = new Array(index_str2, index_str3, index_str4, index_str5, index_str6);
		switch (cfg_weather[d['weather']])
		{
			case "晴天":shop_Weather=1.15;break;
			case "多云":shop_Weather=1.05;break;
			case "阴天":shop_Weather=1;break;
			case "小雨":shop_Weather=0.9;break;
			case "中雨":shop_Weather=0.85;break;
			case "大雨":shop_Weather=0.8;break;
			case "暴雨":shop_Weather=0.7;break;
		}
		//$('weather').innerHTML = cfg_weather[d['weather']];
		//$('weather_img').src = "./images/weather/" + d['weather'] + ".gif";
	//alert(shop_Weather);
	//alert(cfg_weather);
	}
	catch (e) {
	}
}

function load_weather()
{
	//http://k19.bizlife.com.cn/office/newspaper_page1.php?show_weather=1  office/newspaper_page1.php?show_weather=1
	
	var curr_url = biz_current_server_url()+'/office/newspaper_page1.php?show_weather=1';
	var response_html= HttpRequest.Get(curr_url);
	//alert(1);
	if(!response_html || response_html.length < 300)
	{
		alert("请先登录");
		return false;
	}
	var myregexp = /div_page\('shownews.php\?id=(\d+)',/;
	var match = myregexp.exec(response_html); 
	//alert(response_html);
	if (match != null) {
		//alert(match[1]);
		curr_url= biz_current_server_url()+'/office/shownews.php?id='+match[1];
		//alert(curr_url);
		response_html= HttpRequest.Get(curr_url);
		myregexp=/今天：([^ <]+)/;
		match = myregexp.exec(response_html); 
		//alert(match[1]);
		if (match != null)
		{
			switch (match[1])
			{
				case "晴天":shop_Weather=1.15;break;
				case "多云":shop_Weather=1.05;break;
				case "阴天":shop_Weather=1;break;
				case "小雨":shop_Weather=0.9;break;
				case "中雨":shop_Weather=0.85;break;
				case "大雨":shop_Weather=0.8;break;
				case "暴雨":shop_Weather=0.7;break;
			}
			return true;
		}
	}
}
function biz_load_shop()
{
	update_weather();
	//return;
	var area_select_array=new Array();
	//if(!load_weather()){return false;}
	//http://k19.bizlife.com.cn/enterprise/shop.php?area=z
	//得到选中的记
	//alert(1);
	$("input:checked[name$='select_area_array']").each(function() {
		area_select_array.push($(this).val());
	});
	if(area_select_array.length <1)
	{
		var show_html="没有区域被选中。";
		biz_show_process(show_html);
		return;
	}
	var areaCount_purchase=0;
	
	for (var record in area_select_array)
	{
		sendget_shop_list(area_select_array[record]);
	}
//var area="";
//	area="c";
//	sendget_shop_list(area);
//	area="f";
//	sendget_shop_list(area);
//	area="z";
//	sendget_shop_list(area);
 	load_shop2();
	//alert(shop_Weather);
}
function sendget_shop_list(area)
{
	var curr_url = biz_current_server_url()+'/enterprise/shop.php?area='+area;
	//alert(curr_url);
	var response_html= HttpRequest.Get(curr_url);
	if(!response_html || response_html.length < 300)
	{
		alert("请先登录");
		return false;
	}

	var staff_list_html	= [];
	var tmp_i	= 0;
	var department_numb	= 0;
	var myregexp = /<div class="shop" id="shop_(\d+)[\s\S]+?\1\,"([^ ]+)[\s\S]+?style="overflow:hidden">[ \n\r]+(\d+)[ \n\r]+[\s\S]+?当前库存(\d+)\/(\d+)，今日已消耗(\d+)[\s\S]+?店铺当前收入加成情况，点击后查看具体的收入加成。[\s\S]+?([\d\.]+)%[\s\S]+?促销[\s\S]+?<\/div>[ \n\r]+<\/div>[ \n\r]+<\/div>/;
	
	var L=response_html.length;
	var st=response_html.indexOf("var shop_list=new Array();", 0);
	var et=response_html.indexOf("/*显视加成页面的方法", st+1);
	//alert(L);
	var show_html;
	show_html=response_html.substring(st+26,et-1)
	//biz_show_process(show_html);
	eval(show_html); 
	//alert(shop_list['164735']['pople']);
	//alert(typeof(shop_list['164735'])!= "undefined");
	//alert(); 
	return;
	//var match = myregexp.exec(response_html); 
}
function load_shop2()
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
	var myregexp = /class="list_word">[\s\S]+?<table[\s\S]+?<a[^>]+>([^<]+)<[\s\S]+?<td[\s\S]+?<a[^>]+>([^<>]+)<[\s\S]+?<td[\s\S]+?<td[^>]+[\s\S]+?<td[\s\S]+?<table[^>]+title="([0-9]+)级[\s\S]+?士气[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?能力[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?忠诚[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?inspection\(([0-9]+),([\s0-9]+)\)/g;
	var match = myregexp.exec(response_html);
	var d=new Date();
	var kc_max=0;
	var shop_pople,shop_add,kc_now,kc_phours;
	while (match != null) {
	//只有店铺才进行采购动作
		department_numb	= parseInt(match[8]);
		//alert(typeof(shop_list[department_numb])!= "undefined");
		//alert(department_numb);
		//alert(department_numb.toString);
		//alert(department_numb.toString(10));
		//alert(14735.toString);
		//alert(14735.toString(10));
		//return;
		if (parseInt(match[7])==1 && (typeof(shop_list[department_numb])!= "undefined")) {
			//找到对应的id号 inspection.php?g_department_list_ids=1
			//alert(tmp_i);
			//shop_list
			switch (shop_list[department_numb]['level'])
			{
				case '1':kc_max=3000;break;
				case '2':kc_max=4500;break;
				case '3':kc_max=9000;break;
				case '4':kc_max=13500;break;
				case '5':kc_max=18000;break;
			}
			if (shop_list[department_numb]['scale']==2){kc_max=kc_max/3;}
			if (shop_list[department_numb]['scale']==1){kc_max=kc_max/6;}
			shop_pople=parseInt(shop_list[department_numb]['pople']);
			shop_add=shop_list[department_numb]['add'];
			kc_now=parseInt(shop_list[department_numb]['inventory']);
			kc_phours=parseInt(shop_pople/100*shop_Weather*(shop_add/100+1)/24);
			
			shop_list2[department_numb]	={
				"名称":match[1]
				,"人流量":shop_pople
				,"当前库存":kc_now
				,"最大库存":kc_max
				,"今日消耗":0
				,"加成":shop_add
				,"采购结束时间":d
				,"每小时消耗量":kc_phours
				};
	
			tmp_i++;
			staff_list_html.push('<tr  onmouseout="this.className=\'out\';" onmouseover="this.className=\'over\';" >');
			staff_list_html.push('<td align="center">'+tmp_i+'</td>');
			staff_list_html.push('<td align="center"> </td>');
			staff_list_html.push('<td >'+shop_list2[department_numb]['名称']+'</td>');
			staff_list_html.push('<td >'+shop_pople+'</td>');
			staff_list_html.push('<td id="td_shop_add_' +department_numb+ '">'+shop_add+'%</td>');
			staff_list_html.push('<td id="td_kc_now_' +department_numb+ '">'+parseInt(kc_now/100)+'</td>');
			//staff_list_html.push('<td id="td_kc_now_' +department_numb+ '">'+0+'</td>');
			staff_list_html.push('<td id="td_kc_max_' +department_numb+ '">'+kc_max+'</td>');
			staff_list_html.push('<td id="td_kc_today_' +department_numb+ '">'+ 0 +'</td>');
			staff_list_html.push('<td id="td_kc_hours_' +department_numb+ '">'+kc_phours+'</td>');
			staff_list_html.push('<td id="td_end_time_' +department_numb+ '">----/----</td>');
			staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_shop_array" value="'+department_numb+'" /></td>');
			staff_list_html.push("</tr>");
		}
		match = myregexp.exec(response_html);
	}
//alert(tmp_i);
	//显示新加载的店铺
	$("#shop_list").html(staff_list_html.join(''));
}
//////////////////////////////////////////////////////////////////////////////////////////////
function  DateAdd(strInterval,  NumDay,  dtDate)
{  
   var  dtTmp  =  new  Date(dtDate);  
   if (isNaN(dtTmp)) { dtTmp  =  new  Date(); } 
   switch  (strInterval)  {  
	   case  "s":return  new  Date(Date.parse(dtTmp)  +  (1000  *  NumDay));  
	   case  "n":return  new  Date(Date.parse(dtTmp)  +  (60000  *  NumDay));  
	   case  "h":return  new  Date(Date.parse(dtTmp)  +  (3600000  *  NumDay));  
	   case  "d":return  new  Date(Date.parse(dtTmp)  +  (86400000  *  NumDay));  
	   case  "w":return  new  Date(Date.parse(dtTmp)  +  ((86400000  *  7)  *  NumDay));  
	   case  "m":return  new  Date(dtTmp.getFullYear(),  (dtTmp.getMonth())  +  NumDay,  dtTmp.getDate(),  dtTmp.getHours(),  dtTmp.getMinutes(),  dtTmp.getSeconds());  
	   case  "y":return  new  Date((dtTmp.getFullYear()  +  NumDay),  dtTmp.getMonth(),  dtTmp.getDate(),  dtTmp.getHours(),  dtTmp.getMinutes(),  dtTmp.getSeconds());  
   }  
}  

function shop_purchase()
{
//alert("122");
//return;
	if (document.getElementById('shop_purchase_click_button').value =="采购")
	{
		document.getElementById('shop_purchase_click_button').value ="正在采购--点击结束";
		shop_purchase_run();
		var shop_purchase_timer_obj=setInterval(shop_purchase_run,1860000);
		//var shop_purchase_timer_obj=setTimeout(shop_purchase_run,1000);
	}
	else
	{
		document.getElementById('shop_purchase_click_button').value ="采购";
		clearInterval(shop_purchase_timer_obj);
		clearInterval(shop_purchase_timer_one_obj);
	}

}

function shop_purchase_run()
{
	var show_html="开始本轮店铺采购操作。";
	biz_show_process(show_html);
	update_weather();

	//得到选中的记
	$("input:checked[name$='select_shop_array']").each(function() {
		shop_select_array_purchase.push($(this).val());
	});
	if(shop_select_array_purchase.length <1)
	{
		var show_html="没有店铺被选中。";
		biz_show_process(show_html);
		return;
	}
	shopCount_purchase=0;
	//先执行一个
	shop_purchase_run_one();
	//shopCount_purchase=1;
	//if(shopCount_purchase <shop_select_array_purchase.length){shop_purchase_timer_one_obj=setTimeout(shop_purchase_run_one,10000);}
	
}
function shop_purchase_run_one()
{
	//得到店铺ID号
		//alert(shopCount_purchase);
	if(shopCount_purchase >=shop_select_array_purchase.length)
	{
		var show_html="本轮店铺采购操作结束。";
		biz_show_process(show_html);
		//clearInterval(shop_purchase_timer_one_obj);
		return false;
	}
	var shop_id	;
	var d=new Date();
	shop_id=shop_select_array_purchase[shopCount_purchase];
	if(shop_list2[shop_id]['采购结束时间']<d)
	{
		//shopCount_purchase += 1;
		//alert("正在采购中");
		//clearInterval(shop_purchase_timer_one_obj);
		//shop_purchase_timer_one_obj=setTimeout(shop_purchase_run_one,10000);
		//return;
	//alert(shop_id);
	//var curr_url2,cg_qty,cg_qty2;
	//var inspection_val = g_department_list[shop_id]['巡视url'];

	//var inspection_val_array= inspection_val.split(",");
	//只有店铺才进行采购动作
	//if(1 == parseInt(inspection_val_array[0]))
	//{http://k19.bizlife.com.cn/enterprise/shop_add.php?
		var curr_url = biz_current_server_url()+'/enterprise/shop_add.php';
		var curr_url3 =curr_url +'?shop_id='+parseInt(shop_id);
		var r1=sendGet(curr_url3);
		//alert(r1.slice(0,100));
		//alert();
		var myregexp = /window\.parent\.update_shop_add\(\d+, ([\d\.]+)/;
		var match = myregexp.exec(r1);
		//alert(match);
		if(match!=null)
		{
			var shop_add=match[1];
			shop_list2[shop_id]['加成']=shop_add
			var shop_pople=shop_list2[shop_id]['人流量'];
			shop_list2[shop_id]['每小时消耗量']=parseInt(shop_pople/100*shop_Weather*(shop_add/100+1)/24);
			document.getElementById('td_shop_add_'+shop_id).innerText=shop_add+'%';
			document.getElementById('td_kc_hours_'+shop_id).innerText=shop_list2[shop_id]['每小时消耗量'];
		}

		var curr_url = biz_current_server_url()+'/enterprise/shop_purchase.php';
		var curr_url3 =curr_url +'?id='+parseInt(shop_id);
		//curr_url2='id='+parseInt(inspection_val_array[1]);
		var r1=sendGet(curr_url3);
		//alert(r1.slice(0,100));
		var myregexp = /当前库存(\d+)\/(\d+)，今日已消耗(\d+)[\s\S]*?采购价格：[\s\S]*?([(正常)|(下跌)|(上涨)]+)(\d*)/;
		var match = myregexp.exec(r1);
		//alert(match);
		if(match!=null)
		{
			//当前库存
			var kc_now=parseInt(match[1]);
			document.getElementById('td_kc_now_'+shop_id).innerText=kc_now;
			//最大库存
			var kc_max=parseInt(match[2]);
			document.getElementById('td_kc_max_'+shop_id).innerText=kc_max;
			//今日已消耗
			var kc_today=parseInt(match[3]);
			document.getElementById('td_kc_today_'+shop_id).innerText=kc_today;
			var h=d.getHours() +d.getMinutes()/60
			//alert("当前时间:" +h);
			var kc_hours=shop_list2[shop_id]['每小时消耗量'];
			//alert("每小时消耗：" +kc_hours);
			//涨跌
			var kc_price=match[4];
			//涨跌幅度
			switch (kc_price)
			{
				case "正常" :
					var kc_price2=0;
					break; 
				case "上涨" :
					var kc_price2=parseInt(match[5]);
					break; 
				case "下跌" :
					var kc_price2=-parseInt(match[5]);
					break; 
			}
			//alert(kc_price2);
			//优先雨天采购
			var cg_cfg=get_cg_cfg(kc_now,kc_max,kc_hours,kc_price2,h);
			//var cg_qty=0;
			var cg_qty=cg_cfg["数量"];
			var cg_time2=cg_cfg["时间"];
			//alert(cg_qty);
			//return;
			if (cg_qty!==0)
			{
				if((kc_max-kc_now)>=cg_qty)
				{
					var cg_qty2=cg_qty;
				}
				else
				{
					var cg_qty2=kc_max-kc_now;
				}
				send_cg(shop_id,cg_qty,cg_qty2,cg_time2);
				//cg_qty2为实际实现的采购数量。
				cg_qty=0;
				shopCount_purchase += 1;
				shop_purchase_timer_one_obj=setTimeout(shop_purchase_run_one,8000);
				return;
			}else
			{
				document.getElementById('td_end_time_'+shop_id).innerText="暂时不采购";
				shopCount_purchase += 1;
				shop_purchase_timer_one_obj=setTimeout(shop_purchase_run_one,2000);
				return;
			}
		}
	}else
	{
		shopCount_purchase += 1;
		shop_purchase_timer_one_obj=setTimeout(shop_purchase_run_one,2000);
	}
}
function send_cg(shop_id,cg_qty,cg_qty2,cg_time2)
{
	var curr_url = biz_current_server_url()+'/enterprise/shop_purchase.php';
	var speed;
	switch (cg_time2)
	{
		case 6:
			speed="2";
			break;
		case 3:
			speed="3";
			break;
	}
	var curr_url2="id=" + shop_id+"&days="+cg_qty*100+"&speed="+speed;
	var shop_name=shop_list2[shop_id]['名称'];
	
	var r = sendPost(curr_url, curr_url2);
	var arr=new Array();
	var show_html;
	var end_time=new Date();
	var d=new Date();
	arr = r.split("|||");
	//alert(r);
	//return;
	if (arr[0] == 1) 
	{
		//采购成功
		end_time=DateAdd("h",cg_time2,d);
		shop_list2[shop_id]["采购结束时间"]=end_time;
		document.getElementById('td_end_time_'+shop_id).innerText=end_time.toLocaleTimeString();
		show_html="<b>["+shop_name + "]</b>　店铺采购操作成功，本次采购"+cg_qty2 +"件，运输时间："+cg_time2+"小时,结束时间：" + end_time.toLocaleTimeString();
		biz_show_process(show_html);
	}else if (arr[0] == -1) 
	{
		//正在采购
		curr_url=biz_current_server_url() + "/progress_inner.php?pid="+arr[2];
		r = sendGet(curr_url);
		var myregexp = /autoExeTime[^\d]*(\d+)/;
		var match = myregexp.exec(r);
		//alert(match);
		if(match!=null)
		{
			var time_to=parseInt(match[1])-5;
			var d2=new Date();
			end_time=DateAdd("s",time_to,d2)
			shop_list2[shop_id]["采购结束时间"]=end_time;
			document.getElementById('td_end_time_'+shop_id).innerText=end_time.toLocaleTimeString();
			//alert(time_to);
			//alert(end_time);
			
		}
		//alert(arr[0]);
		//alert(arr[1]);
		//alert(arr[2]);
		//alert(arr[3]);
		//alert(arr[4]);
		show_html="<b>["+shop_name + "]</b>　店铺正在采购中，结束时间："+ end_time.toLocaleTimeString();
		biz_show_process(show_html);
	}
}
//****************************************************************************************************************************************
function getResponse(xmlhttp)
{
	var batch_pid;
	//alert(xmlhttp);
	if (1 != parseInt($("input:checked[id$='auto_speed']").val()))
	{
		return false;
	}
	var re=/pid=(\d{3,})/;
	var match = re.exec(xmlhttp.responseText);
	//alert(match);
	if (match != null)
	{
		batch_pid=match[1];
		var pid_url=biz_current_server_url() + "/progress_inner.php?pid=" + batch_pid + "&rand="+Math.random()+"&type=1&ajax=give_money";
		HttpRequest.Get(pid_url,function(xmlhttp){});
		//temp_time_obj=setTimeout(send_batch_speed,2000)
	//alert(pid_url);
	}
	//alert(xmlhttp.getResponseHeader("Location"));
	//alert(xmlhttp.responseText);
}

function send_batch_speed()
{
		var pid_url=biz_current_server_url() + "/progress_inner.php?pid=" + batch_pid + "&rand="+Math.random()+"&type=1&ajax=give_money";
		HttpRequest.Get(pid_url,function(xmlhttp){});
	clearTimeout(temp_time_obj);
}
//***********************************************************************************************************************************************
//加载公司、部门列表菜单
function biz_load_department_option(select_id)
{
	//return;
	var arr_object_type = new Array();	//定义部门列表数组
	//http://k19.bizlife.com.cn/company/staff_batch_select.php?object_type=department||2&object_level=all&time_expired=&state=9&return=
	//http://k19.bizlife.com.cn/company/staff_list.php?object_type=department||2&time_expired=
	var curr_url= biz_current_server_url()+'/company/staff_list.php?object_type=department||2&time_expired=';
	//var curr_url= biz_current_server_url()+'/company/staff_list.php?t='+Math.random();
	//var curr_url= biz_current_server_url()+'/company/staff_batch_select.php?object_type=department||2&object_level=all&time_expired=&state=9&return=';
	var response_html	= HttpRequest.Get(curr_url);
	if(!response_html || response_html.length < 300)
	{
		alert("请先登录");
		return false;
	}
	var staff_list_html	= [];
	var tmp_i	= 0;
	var department_numb	= 0;
	var myregexp = /var arr_object_type = new Array\(\);([\s\S]{20,})var dl = new DropList/g;
	var match = myregexp.exec(response_html);
	if (match != null)
	{
		var aa="function load_arr(){" + match[1] +  "}";
		eval(aa); 
		load_arr();
		jsAddItemToSelect(select_id, arr_object_type);
	}
}

function jsAddItemToSelect(objSelectid, arr_data)
{
	var objSelect=document.getElementById(objSelectid);
	objSelect.options.length = 0;  
	var l = 0;
	for (var k in arr_data) {
		l += 1;
		var varItem = new Option();      
		objSelect.options.add(varItem); 
		//var option = document.createElement(objSelect);
		varItem.innerHTML = arr_data[k];
		varItem.setAttribute("value", k);
	}
	//alert("成功加入");   
}

/////////////////////////////////////////按姓名过滤员工列表///////////////////////////////////////
function input_name_show(select_id)
{
	document.getElementById('input_name_text').value="";
	document.getElementById('input_name_select_id').value=select_id;
	//alert(select_id);
	//调整操作框位置
	document.getElementById("input_name").style.left=document.body.clientWidth/2-150;
	document.getElementById("input_name").style.top=350+document.documentElement.scrollTop;
	document.getElementById("input_name").style.display="block";
}

function input_name_close()
{
	document.getElementById("input_name").style.display="none";
}

function biz_staff_sw_name(staff_name,select_id)
{
	//var staff_name=prompt("请输入员工姓名","张");
	//var staff_name=document.getElementById('input_name_text').value;
	//var select_id=1;
	if(staff_name=="" || staff_name==null){return;}
	var curr_record	= [];
	var tmp_i= 0;
	//alert(staff_name);
	var tmp_str="var re = /" + staff_name + "/;";
	//alert(tmp_str);
	eval(tmp_str); 
	//return;
	var result_array= {};
	for( staff_numb in g_staff_array)
	{
		//curr_record	= g_staff_array[staff_numb];
		tmp_i++;
		//alert(g_staff_array[staff_numb]["姓名"].search(re));
		if(g_staff_array[staff_numb]["姓名"].search(re)>=0)
		{
			//alert(g_staff_array[staff_numb]["姓名"].search(re));
			result_array[staff_numb]= g_staff_array[staff_numb];
		}

	}
	//显示员工列表
	//alert(select_id);
	biz_show_staff(result_array,'#staff_list'+select_id);
	input_name_close();
}

/////////////////////////////////////////////技能等级全满过滤///////////////////////////////////
function biz_skill_sw_filt(sw_type,select_id)
{
	//过滤满技能
	var curr_record	= [];
	var tmp_i= 0;
	var skill_list,tmp2;
	var result_array= {};
	for( staff_numb in g_staff_array)
	{
		//curr_record	= g_staff_array[staff_numb];
		tmp_i++;
		skill_list=g_staff_array[staff_numb]["技能"].split(/\n/);
		//alert(skill_list.length);
		//skill_text_list="";
		for(ii in skill_list)
		{
			tmp2=skill_list[ii].split(":");
			//alert(tmp2.length);
			//skill_name=tmp2[0];
			if(parseInt(tmp2[1])<5)
			{
				result_array[staff_numb]= g_staff_array[staff_numb];
				break;
			}
		}
		//alert(g_staff_array[staff_numb]["姓名"].search(re));
	}
	//显示员工列表
	biz_show_staff(result_array,'#staff_list'+select_id);
	//input_name_close();
}
/////////////////////////////////////////////按人才类型过滤///////////////////////////////////
function biz_skill_type_filt(skill_list_str,select_id)
{
	//过滤人才类型
	//var curr_record	= [];
	var tmp_i= 0;
	var skill_list_arr=skill_list_str.split('|');
	var skill_num=skill_list_arr.length;
	var sw_skill_num=document.getElementById('sw_filt_staff_type_num').value;
	//alert(sw_skill_num);
	//var tmp2;
	var result_array= {};
	for( staff_numb in g_staff_array)
	{
		var skill_same_num=0;
		//curr_record	= g_staff_array[staff_numb];
		tmp_i++;
		var tmp_str=g_staff_array[staff_numb]["技能"].replace(/:\d/g,'');
		var staff_skill_list_arr=tmp_str.split(/\n/);
		//staff_skill_list=staff_skill_list.replace(/\n/g,'|');
		for(ii in skill_list_arr)
		{
			if(g_staff_array[staff_numb]["技能"].indexOf(skill_list_arr[ii])>=0){skill_same_num++;}
			
		}
		
		//alert(skill_num);
		//alert(skill_same_num);
		//alert(sw_skill_num);
		//return;
		//if(staff_skill_list==skill_list)
		if((skill_num-skill_same_num)<=sw_skill_num)
		{
			result_array[staff_numb]= g_staff_array[staff_numb];
		}
		//alert(skill_list.length);
		//skill_text_list="";
		//alert(g_staff_array[staff_numb]["姓名"].search(re));
	}
	//显示员工列表
	biz_show_staff(result_array,'#staff_list'+select_id);
	//input_name_close();
}

////////////////////////////////////////////////////反省////////////////////
var tmp_obj_staff_level;
function staff_level_win_show(staff_id,obj_level)
{
	//run_timer=12;
	//return;
	if(document.getElementById("skill_win").style.display!="none"){return;}
	var tmp_bkcolor=obj_level.parentNode.style.backgroundColor;
	if(tmp_bkcolor=='#ff0000' || tmp_bkcolor=='#ffff00'){return;}
	//if(obj_level.parentNode.style.backgroundColor=='#00cc00'){return;}
	var tmp_str,skill_name,skill_id,staff_name,staff_level;
	//将操作对象放入临时变量
	tmp_obj_staff_level=obj_level;
	tmp_staff_id=staff_id;
	//alert(tmp_obj_staff_skill);
	staff_level=parseInt(obj_level.innerText);
	//skill_name=tmp_str[0];
	//skill_id=skill_arr[skill_name];
	document.getElementById("staff_name_input2").value=obj_level.parentNode.parentNode.cells[1].innerText;
	//员工ID放入隐藏域
	document.getElementById("staff_id_input2").value=staff_id;
	//document.getElementById("skill_name_input").value=skill_name;
	//技能ID放入隐藏域
	document.getElementById("staff_level_input").value=staff_level;
	//调整操作框位置
	document.getElementById("staff_level_win").style.left=document.body.clientWidth/2-250;
	document.getElementById("staff_level_win").style.top=350+document.documentElement.scrollTop;
	//alert(document.body.clientHeight);
	//alert(document.body.scrollHeight);
	document.getElementById("staff_level_win").style.display="block";
	
}
function staff_further()
{
	//从临时变量中取出操作对象
	//alert("反省功能暂未开通。");
	//return;
	var tmp_str;
	var obj_level=tmp_obj_staff_level;
	var staff_id=tmp_staff_id;
	var staff_name=obj_level.parentNode.parentNode.cells[1].innerText;
	
	var staff_level=parseInt(obj_level.innerText);
	if(staff_level<4){alert(staff_name+" 等级小于4级，不能进行反省。");return;}
	
	tmp_str=obj_level.parentNode.parentNode.cells[5].innerText.split("/");
	if(tmp_str[0]/tmp_str[1]<0.5){alert(staff_name+" 经验小于50%，不能进行反省。");return;}
	
	tmp_str=obj_level.parentNode.parentNode.cells[6].innerText.split("/");
	if(tmp_str[0]/tmp_str[1]<0.5){alert(staff_name+" 能力小于50%，不能进行反省。");return;}
	
	tmp_str=obj_level.parentNode.parentNode.cells[7].innerText.split("/");
	if(tmp_str[0]/tmp_str[1]<0.5){alert(staff_name+" 忠诚小于50%，不能进行反省。");return;}
	
	//var skill_name=tmp_str[0];
	//var skill_id=skill_arr[skill_name];
	//http://k19.bizlife.com.cn/company/staff_further_education_reflection_confirm-2.php?staff_id=804933
	var r=HttpRequest.Get(biz_current_server_url()+"/company/staff_further_education_reflection_confirm-2.php?staff_id="+staff_id);
	var myregexp =/还能反省[ ]*(\d+)[ ]*次/g;
	var match = myregexp.exec(r);
	if(match!=null)
	{
		if(confirm("你确信要将 "+staff_name+" 进行反省吗？\n"+staff_name+" 还有["+match[1]+"]次反省机会。"))
		{
			
			//var uptolevel=parseInt(document.getElementById("uptolevel_input").value);
			obj_level.parentNode.style.backgroundColor='#ffff00';
			obj_level.style.color='#ff0000';
			tmp_str=obj_level.parentNode.parentNode.cells[9].innerText.split("/");
			//alert(tmp_str[0]);
			var now_power=tmp_str[0];
			staff_further_one(obj_level,staff_name,staff_id,staff_level,match[1],now_power);
		}
	}else
	{
		alert("员工的反省次数已用完。");
	}
	document.getElementById('staff_level_win').style.display='none';
	
	
}
function staff_further_one(obj_level,staff_name,staff_id,staff_level,further_num,now_power)
{
	
	if(staff_id==0 )
	{
		obj_level.parentNode.style.backgroundColor='';
		return;
	}
	if(now_power<=0 || further_num<=0)
	{
		//obj_level.parentNode.style.backgroundColor='';
		obj_level.parentNode.style.backgroundColor='#ff0000';
		obj_level.style.color='';
		return;
	}
	//alert(zh_num);
	//var tmp_html;
	//var curr1,curr2,r,msg;
	var curr1=biz_current_server_url()+"/company/staff_further_education_reflection.php?staff_id="+staff_id+"&use_item=0pay=money&return=";
	//var curr2="ajax=update_skill_level&item342=0";
	var r = HttpRequest.Get(curr1);
	//alert(curr1);
	//alert(r);
	if(!r || r.length<10)
	{
		var further_timer_obj=setTimeout(_staff_further_one(obj_level,staff_name,staff_id,staff_level,further_num,now_power),15*1000);	
		return;
	}
	var re=/pid=(\d{3,})/;
	var match = re.exec(r);
	//alert(match);
	if (match != null)
	{
		now_power--;
		var tmp_str=obj_level.parentNode.parentNode.cells[9].innerText.replace(/\d+\//,now_power+"/");
		obj_level.parentNode.parentNode.cells[9].innerText=tmp_str;
		g_staff_array[staff_id]['体力']['当前']--;

		var progress_pid=match[1];
		var pid_url=biz_current_server_url() + "/progress_inner.php?pid=" + progress_pid + "&t="+Math.random();
		r=HttpRequest.Get(pid_url);
		//alert(r);
		var myregexp =/<span id="progress_rs">([\s\S]*?执行结果如下：[\s\S]+?员工[\s\S]+?)<\/span>/g;
		var match = myregexp.exec(r);
		if(match!=null)
		{
			//alert(match[1].search(/技能深造成功/i));
			//alert(match[1].replace(/(^\s*)|(\s*$)/g, ''));
			biz_show_process(match[1].replace(/(^\s*)|(\s*$)/g, ''));
			further_num--;
			if(match[1].search(/反省成功/i)>=0)
			{
				g_staff_array[staff_id]["等级"]--;
				obj_level.innerText='&nbsp;'+g_staff_array[staff_id]["等级"]+'级&nbsp;';
				return;
			}
		}
		else
		{
			//tmp_html+=" 反省操作成功，信息查看失败。";
			biz_show_process(" 反省操作成功，信息查看失败。");
			return;
		}
		
		further_timer_obj=setTimeout(_staff_further_one(obj_level,staff_name,staff_id,staff_level,further_num,now_power),15*1000);
	}else
	{
		biz_show_process(" 反省操作失败，员工必须处于空闲状态。");
	}
	
}
function _staff_further_one(obj_level,staff_name,staff_id,staff_level,further_num,now_power)
{
    return function()
    {
 		staff_further_one(obj_level,staff_name,staff_id,staff_level,further_num,now_power);
    }
}

///////////////采购策略////////////////////
function get_cg_cfg2(kc_now,kc_max,kc_hours,kc_price2)
{
	var cg_speed_arr={};
	///采购速率按3小时计
	cg_speed_arr[250]={"数量":500,"时间":6};
	cg_speed_arr[500]={"数量":500,"时间":3};
	cg_speed_arr[1500]={"数量":3000,"时间":6};
	cg_speed_arr[3000]={"数量":3000,"时间":3};
	cg_speed_arr[5000]={"数量":10000,"时间":6};
	cg_speed_arr[10000]={"数量":10000,"时间":3};
	cg_speed_arr[20000]={"数量":40000,"时间":6};
	cg_speed_arr[40000]={"数量":40000,"时间":3};
	cg_speed_arr[50000]={"数量":100000,"时间":6};
	cg_speed_arr[100000]={"数量":100000,"时间":3};
	
	var cg_cfg=[];
	cg_cfg["数量"]=0;
	cg_cfg["时间"]=0;
	
	var cg_qty=0;
	var cg_time=0;
	var cg_speed=0;
	if(kc_now<6*kc_hours)
	{
		//速度补充至安全库存
		cg_speed=((24+3)*kc_hours-kc_now)/3;
		///////受天气影响区域////////////////////////
		if(cg_speed<=250){cg_speed=250;}
		if(cg_speed>250 && cg_speed<=500){cg_speed=500;}
		if(cg_speed>500 && cg_speed<=1500){cg_speed=1500;}
		if(cg_speed>1500 && cg_speed<=3000){cg_speed=3000;}
		if(kc_price2>0){cg_speed=5000;}
		//////////不受天气影响区域//////////////////////
		if(cg_speed>3000 && cg_speed<=5000){cg_speed=5000;}
		if(cg_speed>5000 && cg_speed<=10000){cg_speed=10000;}
		if(cg_speed>10000 && cg_speed<=20000){cg_speed=20000;}
		if(cg_speed>20000 && cg_speed<=40000){cg_speed=40000;}
		if(cg_speed>40000 && cg_speed<=50000){cg_speed=50000;}
		if(cg_speed>50000){cg_speed=100000;}
		/////////////////////////////////////////////////
		cg_qty=cg_speed_arr[cg_speed]["数量"];
		cg_time=cg_speed_arr[cg_speed]["时间"];
		return cg_cfg;
	}
	
	
	
	//cg_cfg[0]=cg_qty;
	//cg_cfg[1]=cg_time;
	return cg_cfg;
}
function get_cg_cfg(kc_now,kc_max,kc_hours,kc_price2,h)
{
	var cg_qty=0;
	var cg_time2=0;
	//alert(0);
	var cg_cfg={"数量":0,"时间":0};
	if (kc_now==0)
	{
		cg_qty=3000;
		cg_time2=3;
	}else if(kc_price2<=-30)
	{
		//采购数量
		//cg_qty=3000;
		
		//需要采购次数
		//var cg_count=(kc_max-kc_now+(24-h)*kc_hours)/3000;
		//采购间隔时间
		//var cg_time=(24-h)/cg_count.floor;
		//var cg_time2;
		if((kc_now/kc_max)<0.85)
		{
			cg_qty=3000;
			cg_time2=3;
		}
		else
		{
			//cg_qty=3000;
			//cg_time2=6;
		}
	}else if(kc_price2<=-20)
	{
		//小于24小时消耗量才操作
		if(kc_now<kc_hours*48)
		{
			if(kc_now>kc_hours*9)
			{
			//大于6小时消耗时，可以使用6小时采购或3小时采购
				if(kc_hours*6<3000)
				{
				cg_qty=3000;
				cg_time2=6;
				}else if(kc_hours*3<3000)
				{
				cg_qty=3000;
				cg_time2=3;
				}else
				{
				cg_qty=10000;
				cg_time2=6;
				}
			}else
			{
			//小于6小时消耗时，必须使用或3小时采购
				 if(kc_hours*3<3000)
				 {
					cg_qty=3000;
					cg_time2=3;
				 }else
				 {
					cg_qty=10000;
					cg_time2=3;
				 }
			}
		}
	}else if(kc_price2<=-4)
	{
		//小于24小时消耗量才操作
		if(kc_now<kc_hours*24)
		{
			if(kc_now>kc_hours*9)
			{
			//大于6小时消耗时，可以使用6小时采购或3小时采购
				if(3000>kc_hours*6)
				{
				cg_qty=3000;
				cg_time2=6;
				}else if(3000>kc_hours*3)
				{
				cg_qty=3000;
				cg_time2=3;
				}else
				{
				cg_qty=10000;
				cg_time2=6;
				}
			}else
			{
			//小于6小时消耗时，必须使用或3小时采购
				 if(kc_hours*3<3000)
				 {
					cg_qty=3000;
					cg_time2=3;
				 }else
				 {
					cg_qty=10000;
					cg_time2=3;
				 }
			}
		}
	}else if(kc_price2==0)
	{
		//小于24小时消耗量才操作
		if(kc_now<kc_hours*24)
		{
			if(kc_now>kc_hours*9)
			{
			//大于6小时消耗时，可以使用6小时采购或3小时采购
				if(kc_hours*6<3000)
				{
				cg_qty=3000;
				cg_time2=6;
				}else if(kc_hours*3<3000)
				{
				cg_qty=3000;
				cg_time2=3;
				}else
				{
				cg_qty=10000;
				cg_time2=6;
				}
			}else
			{
			//小于6小时消耗时，必须使用或3小时采购
				 if(kc_hours*3<3000)
				 {
					cg_qty=3000;
					cg_time2=3;
				 }else
				 {
					cg_qty=10000;
					cg_time2=3;
				 }
			}
			//if(cg_qty2>=1000 && cg_qty<6000 ){cg_qty=3000;}
			//if(cg_qty2>=200 && cg_qty<1000){cg_qty=500;}
		}else if(kc_now<kc_hours*24 && kc_hours*6>=3000)
		{
			cg_qty=3000;
			cg_time2=3;
		}
	}else
	{
		//保持12小时消耗量
		if(kc_now<kc_hours*12)
		{
			//cg_qty2=kc_hours*30-kc_now;
			if(kc_hours*12>=3000)
			{
			cg_qty=10000;
			cg_time2=6;
			}
			else if(kc_hours*6>=500)
			{
			cg_qty=3000;
			cg_time2=6;
			}
			else if(kc_hours*6>=100)
			{
			cg_qty=500;
			cg_time2=6;
			}
			//if(cg_qty2>=1000 && cg_qty<6000 ){cg_qty=3000;}
			//if(cg_qty2>=200 && cg_qty<1000){cg_qty=500;}
		}
	}

	cg_cfg["数量"]=cg_qty;
	cg_cfg["时间"]=cg_time2;
	return cg_cfg;
}
function update_user_power()
{
	var update_max;
	var curr=biz_current_server_url()+"/ajax_update_max.php";
	//alert(curr);
	update_max=HttpRequest.Get(curr);
	//ajaxSendPost(curr, null, update_max_complete);
	//alert(update_max_complete);
	try {
		eval("var d = " + update_max + ";");
		//$('staff_max').innerHTML = d['staff_max'];
		user_power_max = d['power_max'];
		//return user_power_max;
		//$('power_bar').innerHTML = percent_bar99(user_power, user_power_max, "./images/scale_blue89.gif");
	}
	catch (e) {
	}
	//alert(user_power_max);
}
function date_format(today)
{
	//var today = new Date();
	var seconds	= today.getSeconds();
	if(seconds < 10)	seconds	= '0'+seconds;

	var minutes	= today.getMinutes();
	if(minutes < 10)	minutes	= '0'+minutes;

	var curr_time	= today.getFullYear() +'-'+(today.getMonth()+1) +'-'+ today.getDate() +' '+ today.getHours() +':'+  minutes +':'+  seconds;
	return curr_time;
}
///////////////////////换书///////////////////////////////
var book_swap_timer_obj;
function skill_book_swap_click()
{
	if(document.getElementById('skill_book_swap_bottn').value=='自动换书')
	{
		document.getElementById('skill_book_swap_bottn').value='自动换书--执行中';
		skill_book_swap();
	}else
	{
		document.getElementById('skill_book_swap_bottn').value='自动换书';
		clearInterval(book_swap_timer_obj);
		return;
	}
	
	
}
function skill_book_swap()
{
	//document.getElementById('biz_sound_play').dynsrc="sound/xiaodao1.wav";
	var curr=biz_current_server_url()+"/map/key_exchange.php";
	var r = HttpRequest.Get(curr);
	if(!r)
	{
		book_swap_timer_obj=setTimeout(skill_book_swap,10000);
	}
	var re=/var count_time=(\d+)[\s\S]*?《([\u4e00-\u9fa5]{2})技能书》《([\u4e00-\u9fa5]{2})技能书》[\s\S]*?value="(\d+)"[\s\S]*?value="(\d+)"/g;
	var match = re.exec(r);
	if(match!=null)
	{
	//alert(match[2]);
		if(skill_book[match[2]]>=257 && skill_book[match[3]]>=257 && match[4]>0 && match[5]>0)
		{
			document.getElementById('biz_sound_play').dynsrc="sound/xiaodao1.wav";
			//alert('可以换了');
			//return;
			var item_ids=skill_book[match[2]]+','+skill_book[match[3]];
			var item_num=match[4]+','+match[5];
			//alert(match[4]);
			//http://k19.bizlife.com.cn/map/key_exchange.php   action=exchange&item_ids=257,258&item_num=100,100
			r=sendPost(biz_current_server_url()+"/map/key_exchange.php","action=exchange&item_ids="+item_ids+"&item_num="+item_num);
			//alert(biz_current_server_url()+"/map/key_exchange.php?"+"action=exchange&item_ids="+item_ids+"&item_num="+item_num);
			if(r){
				var r_arr=r.split("|||");
				if(r_arr[0]==0){
					biz_show_process(r_arr[1]);
					//return;
				}else if (r_arr[0]==1){
					biz_show_process(r_arr[1]);
					//return;
				}
			}
		 
		}else
		{
			biz_show_process(" 本次需要的技能书是《"+match[2]+"》《"+match[3]+"》，不换，等待"+match[1]+"秒。");
		}
		book_swap_timer_obj=setTimeout(skill_book_swap,(parseInt(match[1])+5)*1000);
	}
	
}
//员工招聘
function do_recruit()
{
	var recruit_type=parseInt(document.getElementById('recruit_type').value);
	var recruit_num=parseInt(document.getElementById('recruit_num').value);
	if(recruit_type<1 || recruit_type>7){return;}
	if(recruit_num<=0){return;}
	var r=HttpRequest.Get(biz_current_server_url()+'/company/recruit.php?select_staff_type='+recruit_type);
	if(r)
	{
		var re=/javascript:goto_recruit\('(\d+)'\)/;
		var match=re.exec(r);
		if(match[1])
		{
			var staff_new_id=match[1];
			var r2;
			var url;
			//r2=HttpRequest.Get(url);
			var tmp,tmp2;
			for(i=1 ;i<=recruit_num;i++)
			{
				url = biz_current_server_url()+"/company/do_recruit.php?staff_new_id="+staff_new_id+"&return=.%2Frecruit.php%3Fselect_staff_type%3D1";
				//alert(url);
				r2=HttpRequest.Get(url);
				//alert(r2);
				tmp=r2.split('|||');
				if(!tmp[3]){return;}
				tmp2=tmp[3].split('||');
				if(!tmp2[0]){return;}
				staff_new_id=tmp2[0];
				
			}
		}
	}
}