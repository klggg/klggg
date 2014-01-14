/*
2010-6-19 16:52
任务处理
@version    $Id: $

	1.得到日常任务列表
	2.显示出来，已完成设成只读
	3.检查是否有正在运行任务
		if(有即显示倒计时) [运行]按钮变灰,隔指定时间后自动运行
	4.用户选择想要运行的任务，点击[运行按钮]开始
		4.1  先得到当前所选任务，按次序分别运行
		4.2  运行结束把当前任务置为不可选
		4.3  如果结束的是最后一个任务，可选择次日凌晨时才再次去运行。


*/



Tools.initNameSpace("biz.mission");


//**       日常任务
biz.mission.daily = {

	//保存任务信息
	missionArray : [
		 {'id': 1 ,'执行时间': 300,'title': '新闻阅读'}
		,{'id': 2 ,'执行时间': 840 ,'title': '秘书沟通'}
		,{'id': 3 ,'执行时间': 180 ,'title': '运营分析'}
		,{'id': 4 ,'执行时间': 720 ,'title': '高层会议'}
		,{'id': 5 ,'执行时间': 525 ,'title': '业务规划'}
		,{'id': 6 ,'执行时间': 1200 ,'title': '市场调查'}
		,{'id': 7 ,'执行时间': 600 ,'title': '竞争分析'}
		,{'id': 8 ,'执行时间': 1260 ,'title': '合作规划'}
		,{'id': 9 ,'执行时间': 390 ,'title': '客户调查'}
		,{'id': 10 ,'执行时间': 720 ,'title': '政府沟通'}
		,{'id': 11 ,'执行时间': 420 ,'title': '财务预测'}
		,{'id': 12 ,'执行时间': 1440 ,'title': '演讲'}
	],

	//保存任务信息
	m_missionArray : {
		'1':{'title':'交际','tasks':{}}
		,'2':{'title':'店铺','tasks':{}}
		,'3':{'title':'商会','tasks':{}}
		,'4':{'title':'员工','tasks':{}}
		,'5':{'title':'道具','tasks':{}}
		,'6':{'title':'其他','tasks':{}}
	},

	//任务列表加载次数
	m_isTaskLoaded : 0,


	//当前运行选中任务中的第几个任务
	m_currIndex : 0,

	//离下次任务的剩余时间, false 即表示可以运行
	m_timeWait : false,

	/*
		提取时间倒计时,返回false即为当前没有正在运行的任务
	*/
	getRemainTime: function(response_html){

		var time_wait	= false;

//var count_time=34;

		var myregexp = /var[\s]+count_time[\s]*=[\s]*(\d*)/;
		var match = myregexp.exec(response_html);

		if(match==null){return false;}
		if(match[1] != '' )
		{
			time_wait=parseInt(match[1]);

		}
		return time_wait;
	},


	/**
	 * 完成指定任务
	 *  要玩-六六(569249697)  17:01:16
	 * 大师先把日常任务的“完成”能一键自动就好了。
     * @param int type 任务类型编号 
     * @param int id 任务编号 
     * @return array  以app id为键名的数组
	 * 
	 */
	finish: function(type,id){

		//检查体力BEGIN
		//2401|||董事长：<br><br>您的体力值不足，无法执行如此繁多的事务。您可以服用“葡萄糖”补充体力，或等待明天体力完全恢复。|||5697031
		var r=HttpRequest.Post(biz_current_server_url()+"/enterprise/glucose_ajax.php","act=check&value_cost=5");
		if($.trim(r) != ""){
			var r=r.split("|||");
			if(r[0]==240){
				biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span>: " +r[1].replace(/<br>/gi,"  "));
			}
			else if(r[0]==2401){
				biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span>: 需要使用 " +r[1].replace(/<br>/gi,"  "));
			}
			return false;
		}
		//检查体力END

		r=HttpRequest.Post(biz_current_server_url()+"/mission/daily_mission_detail.php?type="+type,"action=finish&id="+id);
		//1|||董事长：<br/><br/>您完成了该任务，体力减少5点，声誉增加1点，店铺加成提高2%。
		if(r){
			var r_arr=r.split("|||");
			if(r_arr[0]==1){
				biz_show_process("<span style='color:blue'>日常任务 </span>: "+r_arr[1].replace(/<br\/>/gi,"  "));
				return true
			}else
				biz_show_process("<span style='color:red'>日常任务 </span>: "+r_arr[1].replace(/<br\/>/gi,"  "));
		}
		return false;


	},


	/**
	 * 更新某类任务信息
	 */
	updateTasks: function(taskType){

/*
{
  "btn": {
    "1": "<input type=\"button\" class=\"button_f3b\" value=\"\u5b8c\u6210\">",
    "2": "<input type=\"button\" class=\"button_f3b\" value=\"\u5b8c\u6210\">",
    "3": "<input type=\"button\" class=\"button_f3b\" value=\"\u5df2\u5b8c\u6210\">",
    "4": "<input type=\"button\" class=\"button_f3\" value=\"\u5b8c\u6210\" onclick=\"finish(4)\">",
    "5": "<input type=\"button\" class=\"button_f3\" value=\"\u5b8c\u6210\" onclick=\"finish(5)\">",
    "6": "<input type=\"button\" class=\"button_f3b\" value=\"\u5b8c\u6210\">"
  },
  "continue_time": {
    "1": "\u65e0",
    "2": "\u65e0",
    "3": "<font color=\"#009900\">2010-10-11 10:36:51<\/font>",
    "4": "\u65e0",
    "5": "\u65e0",
    "6": "\u65e0"
  },
  "span_finish": 1,
  "add_div": "<div style=\"width:89px; height:10px; background:url(..\/images\/scale_bg3.gif); padding:3px;\">\r\n  <div id=\"\" style=\"width:89px; height:10px; font-size:10px; color:#FFF; background:url(..\/images\/scale_Purple89.gif) no-repeat -78px; font-family:Arial; line-height:100%; text-align:center;\">2\/15<\/div>\r\n<\/div>"
}
*/
		var r=HttpRequest.Post(biz_current_server_url()+"/mission/daily_mission_detail.php?type="+taskType,"action=check");
		if(!r)
			return false;

		var tmp_str="var  mission_detail ="+r;
		eval(tmp_str); 

		//进行更新
		var curr_record	= null;
		var finish_status	= null;
		var curr_tasks	= this.m_missionArray[taskType]['tasks'];

		for(var record in curr_tasks)
		{
			curr_record	= curr_tasks[record];	//指向当前记录

			//检查任务的完成情况
			if(mission_detail['btn'][record].indexOf('已完成') > 0)
				finish_status = 2;
			else if(mission_detail['btn'][record].indexOf('finish') > 0)
			{
				//完成但没点运行
				if(this.finish(taskType, parseInt(record)))
					finish_status = 1;
				else
					finish_status = 2;
			}
			else
				finish_status = 0;
			
			this.m_missionArray[taskType]['tasks'][record]['是否完成']	 = finish_status;

			//持续时间
			this.m_missionArray[taskType]['tasks'][record]['持续时间']	 = mission_detail['continue_time'][record];

		}
		return true;

	},


	/**
	 * 提取某类任务
	 */
	getTasks: function(taskType){
		
		var curr_url = biz_current_server_url()+'/mission/daily_mission_detail.php?type='+taskType;
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}

		//http://k11.bizlife.com.cn/mission/daily_mission_detail.php?type=6
		//提取任务清单
		var myregexp = /<div[\s]+class[\s]*=[\s]*["']k1["'][\s]*>[\s\S]+?任务名称[\s\S]+?<td[^>]*>([^<]+)<[\s\S]+?任务目标[\s\S]+?<td[^>]*>([^<]+)<[\s\S]+?任务指引[\s\S]+?<td[^>]*>([^<]+)<[\s\S]+?持续时间[\s\S]+?<td[^>]*>(<font [^>]+>)?([^<]+)<[\s\S]+?任务加成[\s\S]+?<td[^>]*>([^<]+)<[\s\S]+?<span[\s]*id="btn_([0-9]+)"[^<]+<input[\s]+type="button"([^>]+)>/g;
		//完成状态 0 未完成 1完成但没点运行 2已完成
		var finish_status = null;
		var task_id = null;
		var match = myregexp.exec(response_html);
		while (match != null) {
			// matched text: match[0]
			// match start: match.index
			// capturing group n: match[n]
			
			task_id	= parseInt(match[7]);
			if(match[8].indexOf('已完成') > 0)
				finish_status = 2;
			else if(match[8].indexOf('finish') > 0)
			{
				//完成但没点运行
				if(this.finish(taskType, task_id))
					finish_status = 1;
				else
					finish_status = 2;
			}
			else
				finish_status = 0;


			this.m_missionArray[taskType]['tasks'][task_id]	= {
				 '任务名称' : match[1]
				,'任务目标' : match[2]
				,'任务指引' : match[3]
				,'持续时间' : match[5]
				,'任务加成' : match[6]
				,'是否完成' : finish_status
			};
/*
<input type="button" onclick="finish(3)" value="完成" class="button_f3">
<input type="button" value="完成" class="button_f3b">
<input type="button" value="已完成" class="button_f3b">

*/
			match = myregexp.exec(response_html);
		}

	},

	/**
	 * 自动完成任务
	 * 
	 */
	autoTask: function(taskType,taskId){

		//var chat_msg = '%E6%88%91%E7%88%B1GGG';
		var chat_msg = '%5B00.gif%5D';
		//秘书沟通
		if(6 == taskType && 3 == taskId && 0 == this.m_missionArray[taskType]['tasks'][taskId]['是否完成'])
		{
			HttpRequest.Get(biz_current_server_url()+"/office/secretary_info.php",function(){return});
		}

		//在世界频道发言1次
		if(1 == taskType && 2 == taskId && 0 == this.m_missionArray[taskType]['tasks'][taskId]['是否完成'])
		{
			HttpRequest.Post(biz_current_server_url()+"/chat8/send.php",'msg='+chat_msg+'&talk_to=world',function(){return});
		}


		//每日商会打卡报到
		if(3 == taskType && 1 == taskId && 0 == this.m_missionArray[taskType]['tasks'][taskId]['是否完成'])
		{
			biz_auto_club_card();
		}

		//向商会捐赠100000或以上的G币
		if(3 == taskType && 2 == taskId && 0 == this.m_missionArray[taskType]['tasks'][taskId]['是否完成'])
		{
			HttpRequest.Post(biz_current_server_url()+"/club/club_endow_cash_post.php",'cash=100000',function(){return});
		}

		//向商会捐赠1张基金卷
		if(3 == taskType && 3 == taskId && 0 == this.m_missionArray[taskType]['tasks'][taskId]['是否完成'])
		{
			HttpRequest.Post(biz_current_server_url()+"/club/club_endow_fund_ticket.php",'action=endow&item_ids=438&item_nums=1',function(){return});
		}
		
		//在商会频道发言1次
		if(3 == taskType && 4 == taskId && 0 == this.m_missionArray[taskType]['tasks'][taskId]['是否完成'])
		{
			//http://k1.bizlife.com.cn/chat8/send.php?
			HttpRequest.Post(biz_current_server_url()+"/chat8/send.php",'msg='+chat_msg+'&talk_to=club',function(){return});
		}


	},

	/**
	 * 加载日常任务列表
	 * 
	 */
	load: function(){

		if(!biz_check())
			return false;
		
		$('#mission_daily_load_click_button').val('日常任务加载中...'); 

//		$('#mission_daily_load_click_button').val('刷新运行并提交已完成任务.'); 

		//进行更新
		var curr_tasks	= null;
		var finish_status	= null;
		for(var task_type in this.m_missionArray)
		{
			curr_tasks	= this.m_missionArray[task_type];	//指向当前记录
		
			//之前已加载过
			if(this.m_isTaskLoaded)
			{
				//更新某类任务信息
				this.updateTasks(task_type);
			}
			else{
				//提取某类任务
				this.getTasks(task_type);
			}

		}
		this.m_isTaskLoaded =true;

		//显示任务列表
		this.show();
		$('#mission_daily_load_click_button').val('加载日常任务'); 

	},


	/**
	 * 显示可执行的任务列表
	 * 供进行选择
	 */
	show: function(){
		
		//得到之前选择过的任务
		var selected_array	= this.getSelected();

		$("#mission_daily_list").html('');

		var mission_index	= null;
		var curr_tasks	= null;
		for(var task_type in this.m_missionArray)
		{
			curr_tasks	= this.m_missionArray[task_type];	//指向当前记录


			//指向当前类别任务列表
			 curr_tasks	= this.m_missionArray[task_type]['tasks'];

			var curr_task	= null;
			var mission_show	= [];
			for(var task_id in curr_tasks)
			{


				curr_task	= curr_tasks[task_id];
				mission_index	 = task_type+'_'+task_id;

				mission_show.push('<tr class="mission_daily_list_item row"> ');
				mission_show.push('<td> '+curr_task['任务目标']+ '</td>');
				mission_show.push('<td> '+curr_task['持续时间']+ '</td>');
				mission_show.push('<td> '+curr_task['任务加成']+ '</td>');
	//			mission_show.push('<td> '+curr_task['任务指引']+ '</td>');
				mission_show.push('<td> [<a target="_blank" href="'+biz_current_server_url()+"/mission/daily_mission_detail.php?type="+task_type+'">'+this.m_missionArray[task_type]['title']+task_id+'</a>] <span title="'+curr_task['任务指引']+'">'+curr_task['任务名称']+ '</span></td>');
				mission_show.push('<td> ');

				mission_show.push('<INPUT TYPE="checkbox"  NAME="select_mission_daily_array" id="mission_daily_'+mission_index+'"  value="'+mission_index+'"');
				
				//完成状态 0 未完成 1完成但没点运行 2已完成
				if(0 != curr_task['是否完成'])
				{
						mission_show.push(' disabled');
					mission_show.push(' />   已完成');
				}
				else
				{
					//上次是否选中
					if(jQuery.inArray(mission_index, selected_array) >=0)
					{

						mission_show.push(' checked');
					}
				//	mission_show.push(' />  <span style="cursor:move">[拖动排序]</span>');
					mission_show.push(' />');
				}

				mission_show.push('</td></tr> ');

			}
			$("#mission_daily_list").append(mission_show.join(''));
		}
		
		//设置每行可以拖动
		//$("#mission_daily_list" ).sortable({ items: '.mission_daily_list_item' });

	},


	/**
	 * 得到当前选择任务
	 * 返回数组, 每个任务编号
	 */
	getSelected: function(){

		var select_array = Array();
		$("#mission_daily_form  input:checked[name$='select_mission_daily_array']").each(function() {
			select_array.push(($(this).val()));
		});

		return select_array;
	},


    /**
     * 根据序号得到运行的任务
	 * 
     * @param int index 第几个选中的任务, 如果不指定取当前要运行的任务
     * @return array  以app id为键名的数组
     */
	getMission: function(index){
		var selected_array	= this.getSelected();
		if (selected_array.length <1 )
		{
			return false;
		}

		if(typeof(index) == 'undefined')
			index	 = this.m_currIndex;
		return this.missionArray[selected_array[index]];
	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['mission_daily'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['mission_daily']);
		window.clearInterval(g_interval['mission_daily_time_remain']);
		g_interval['mission_daily']	 = false;
		g_interval['mission_daily_time_remain']	 = false;
		$("#mission_daily_time_remain").html("");

		//重新从第一个应用开始
		this.m_currIndex	= 0;
		$('#biz_mission_daily_click_button').val('点击开始自动日常任务.'); 
		$("#mission_daily_status").html("任务已停止，请重新选择需要执行的任务");
		biz_show_process("<span style='color:red'>日常任务 </span>: STOP");
		return true;
	},


	/**
	 *  点击开始运行
	 * 
	 *  成功返回 下次任务开始的时间
	 */
	runClick: function(){

		//得到择中的任务
		var selected_array	= this.getSelected();
		var tasks_count	= selected_array.length;
		if(tasks_count <1) 
			return false;


		$('#biz_mission_daily_click_button').val('自动日常任务中...'); 

		var task_types	= {};

		//运行选中的任务
		var tmp_str= null;
		for(var i=0;  i<tasks_count; i++)
		{
			var tmp_str= selected_array[i].split("_");	
			this.autoTask(tmp_str[0],tmp_str[1]);
			
			//保存任务类别
			task_types[tmp_str[0]]	= true;

		}

		//更新某类任务信息
		var curr_record	= null;
		for(var task_type in task_types)
		{
			this.updateTasks(task_type);
		}

		//显示任务列表
		this.show();

		$('#biz_mission_daily_click_button').val('运行日常任务'); 

/*
		//当前已在运行,停止掉
		if(g_interval['mission_daily'])
		{
			this.stop();
			return true;
		}
		
		g_interval['mission_daily']	 = true;

		biz_show_process("<span style='color:red'>日常任务 </span>: START");
		$('#biz_mission_daily_click_button').val('自动日常任务中,点击停止.'); 
		this.autoRun();
*/

	},


	//当天任务执行完毕，明天再继续
	autoreloadClick: function(){

		//document.getElementById("mission_daily_autoreload").checked && 
		if(!g_interval['mission_daily_next_day'])
		{
			biz_show_process("<span style='color:blue'>日常任务 </span>: 已设置明日零点自动继续。");
			var d=new Date();
			var h=d.getHours() +d.getMinutes()/60;
			g_interval['mission_daily_next_day']	= window.setTimeout(function()
			{
				window.clearTimeout(g_interval['mission_daily']);
				biz.mission.daily.load();
				Tools.setCheckbox(document.mission_daily_form,'all');
				biz.mission.daily.autoRun();

				biz_show_process("<span style='color:blue'>日常任务 </span>: 零点自动继续");
			},(24.1-h)*3600*1000);

		}
		else
		{
			window.clearTimeout(g_interval['mission_daily_next_day']);
			g_interval['mission_daily_next_day']	 = false;
			biz_show_process("<span style='color:red'>日常任务 </span>: 已取消明日零点自动继续。");
		}

	},

	//显示倒计时状态
	showRemainTime: function(remainTime){

		window.clearInterval(g_interval['mission_daily_time_remain']);
		g_interval['mission_daily_time_remain']	 = window.setInterval(
			function(){
				$("#mission_daily_time_remain").html("离下次时间： "+Tools.seconds2timestr(remainTime--));

			}
		, 1000);

	},

	//依次自动运行
	autoRun: function(){

		var selected_array	= this.getSelected();

		//已全部执行完，停止掉。
		if(this.m_currIndex >= selected_array.length)
		{
			biz_show_process("<span style='color:blue'>日常任务</span> 全部结束" );
			this.stop();
			return true;
		}

		//加载任务,可得到任务结束的时间
		this.load();

		var next_run_time	= this.m_timeWait;

		//当前没有正在运行的任务
		if(false == next_run_time)
		{
			//运行当前任务
			var run_result	 = this.run(this.m_currIndex);
			//运行失败,意外情况，30秒后再试
			if(!run_result)
			{
				next_run_time = 30;
			}
			else
				next_run_time	= this.m_timeWait;
		}

		next_run_time+=5;
		biz_show_process("<span style='color:blue'>日常任务</span>:  【 "+Tools.seconds2timestr(next_run_time)+'   后再次启动】' );

		//过指定的时间后再运行
		g_interval['mission_daily']	= window.setTimeout(function()
		{
			biz.mission.daily.autoRun();
			
		}, 1000 * next_run_time );

		//显示倒计时状态
		this.showRemainTime(next_run_time);


		//重新刷新任务页面？
		//thos.load();
	},
	/**
	 *  运行指定日常任务
	 *  currIndex 运行选中任务中的第几个任务
	 *  成功返回 下次任务开始的时间
	 */
	run: function(currIndex){

		//得到当前任务信息
		var curr_mission	= this.getMission(currIndex);
		if(!curr_mission)
		{
			biz_show_process( '<span style="color:red">请先选择要运行的任务</span>');
			return false;
		}

		var id	 = curr_mission['id'];
/*
		//检查是否能正常执行
		var response_html	= HttpRequest.Post(biz_current_server_url()+"/mission/index_daily.php?id="+id,"sell=3");
		//0|||董事长:<br><br>您珍惜时间是件好事！可是，这里不能一心二用，您的任务没完成，不能执行新的任务。
		var msg= response_html.split("|||");	
		if('undefined' == typeof(msg[1])){
			//未登录
			return 300;
		}

		//正在运行中
		if(1 != msg[0] || 'undefined' == typeof(msg[1]) || '' == msg[1]){
			biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span>: " +msg[1].replace(/<br>/gi,"  "));

			//重新提取倒计时
			var curr_url = biz_current_server_url()+'/mission/index_daily.php';
			response_html= HttpRequest.Get(curr_url);
			//处理时间倒计时
			var time_wait	= this.getRemainTime(response_html,false) ;
			$("#mission_daily_status").html(msg[1].replace(/<br>/gi,"  "));
			return time_wait;
		}
*/
		//得到日常执行的  所需时间： 90秒  执行次数: [2/20] 
		response_html = HttpRequest.Get(biz_current_server_url()+"/mission/daily_implement.php?id="+id);

		var mission_info	= {};
		var myregexp = /执行事件[\s\S]+?<td[^>]*>([^<]+)<[\s\S]+?所需时间[\s\S]+?<td>[\s]*([0-9]+)[\s]*秒[\s\S]+?执行次数[\s\S]+?<td>\[[\s]*([0-9]+)\/([0-9]+)[\s]*\]/;

		var match = myregexp.exec(response_html);
		if (match != null) {
			mission_info['执行事件']	= match[1];
			mission_info['所需时间']	= parseInt(match[2]);
			mission_info['当前执行次数']	= parseInt(match[3]);
			mission_info['最多执行次数']	= parseInt(match[4]);
		}
		else
		{
			/*
<script>try{ window.parent.page_close_and_alert("董事长:<br/><br/>恭喜你,你已经完成新闻阅读,同时你的所有店铺都获得5%收入的加成。","确定","js:window.location.href=window.location.href");}catch(e){}</script>

			*/
			//已完成，重复运行，跳到下个任务
			if (response_html.indexOf("你已经完成") != 0)
			{
				biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span> 你已经完成" );
				//this.m_currIndex++;
			}
			else
			{
				biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span> 任务没完成，不能执行新的任务 ？？ " );
			}
			return false;
		}

		var remain_count	 = mission_info['最多执行次数'] - mission_info['当前执行次数'];
		if(remain_count < 1)
		{
			biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span> 执行次数为零啦~" );
			//this.m_currIndex++;
			return false;
		}

		//最后一次
		if(remain_count == 1)
		{
			//转到下个类别
			//this.m_currIndex++;
		}


		//检查体力BEGIN
		var r=HttpRequest.Post(biz_current_server_url()+"/enterprise/glucose_ajax.php","act=check&value_cost=8");
		if($.trim(r) != ""){
			var r=r.split("|||");
			if(r[0]==240){
				biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span>: " +r[1].replace(/<br>/gi,"  "));
			}
			else if(r[0]==2401){
				biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span>: 需要使用 " +r[1].replace(/<br>/gi,"  "));
			}
			return false;
		}
		//检查体力END


		/*开始执行任务
			http://k1.bizlife.com.cn/enterprise/glucose_ajax.php?act=check&value_cost=8
			http://k1.bizlife.com.cn/mission/daily_implement.php?id=2&action=do
		 1|||690|||710
		 */
		var tmp_status	 = "";
		var r=HttpRequest.Post(biz_current_server_url()+"/mission/daily_implement.php?id="+id,"action=do");
		if(r){
			var r_arr=r.split("|||");
			if(r_arr[0]==1 || (r.indexOf("error")!=-1)) {
				/*Sql error, please contact us. Thanks.
<p>
INSERT INTO everyday_mission_count (*/
				tmp_status	="<span style='color:blue'>日常任务"+curr_mission.title+"</span>: <a target='_blank' href='"+biz_current_server_url()+"/mission/daily_implement.php?id="+id+"'> 正常运行，点击查看进度 </a> 次数： "+mission_info['当前执行次数'];
				biz_show_process(tmp_status);
				$("#mission_daily_status").html(tmp_status);
				
				//重设下次时间 
				this.m_timeWait	= mission_info['所需时间'];

				return true;
			}else 
			{
				//0|||董事长:<br><br>您珍惜时间是件好事！可是，这里不能一心二用，您的任务没完成，不能执行新的任务。
				//-9|||董事长:<br><br>您珍惜时间是件好事！可是，这里不能一心二用，您的任务没完成，不能执行新的任务。
				if('undefined' != typeof(r_arr[1]))
				{
					tmp_status	="<span style='color:red'>日常任务 "+curr_mission.title+"</span>: " +r_arr[1].replace(/<br>/gi,"  ");
					biz_show_process(tmp_status);
				}

			}
			$("#mission_daily_status").html(tmp_status);
			return false;
		}
return false;

/*
		//开始执行任务
		//返回： 1|||董事长:<br><br>恭喜你,成功执行了合作规划任务!|||
		response_html = HttpRequest.Post(biz_current_server_url()+"/mission/daily_implement.php?id="+id+"&rand_num=", "sell=1");
		msg= response_html.split("|||");


		//出错了
		if (1 != parseInt(msg[0])){
			biz_show_process("<span style='color:red'>日常任务 "+curr_mission.title+"</span>: " +msg[1].replace(/<br>/gi,"  "));
			return false;
		}


		biz_show_process("<span style='color:blue'>日常任务</span>: <a target='_blank' href='"+biz_current_server_url()+"/mission/daily_implement.php?id="+id+"'>" +msg[1].replace(/<br>/gi,"  ")+" </a> "+mission_info['当前执行次数'] );

		//显示倒计时
		return mission_info['所需时间'];
*/
	}


};


