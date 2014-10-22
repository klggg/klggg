/*
2010-10-30 13:59
封装员工技能深造
@version    $Id: $


*/


Tools.initNameSpace("biz.staff");
//2010-10-30 11:26  ggg
//员工技能深造
biz.staff.skill = {

	//当前操作的技能类别
	m_currSkillType : 0,

	/*
		要技能深造的员工
		技能id:{员工信息}
		*/
	m_staffArray : {},

	/*
		技能名称和编号对应表
		*/
	m_skillMap : {'心算' :  1 ,'投机' :  2 ,'微笑' :  3 ,'推销' :  4 ,'创造' :  5 ,'经营' :  6 ,'管理' :  7 ,'谈判' :  8 ,'人际' :  9 ,'学习' :  10,'精算' :  11,'核算' :  12,'策划' :  13,'鼓舞' :  14,'营销' :  15},


	//加入员工某项技能进行深造
	loadClick: function(){

		if(!biz_check())
			return false;

		//技能类别
		this.m_currSkillType	= $("#staff_skill_object_type").val();
		var page		= $("#biz_staff_skill_load_page").val();

		this.getStaff(this.m_currSkillType,page);
		this.show(this.m_currSkillType);

	},


	/*
		2010-5-25
		取得技能培训员工
	*/
	getStaff: function(object_type,page){


		var state	= 46;

		var tmp_time=new Date();
		
		var server_url	= biz_current_server_url()+'/company/staff_list_skill_select.php';

		var tmp_i	= 0;




		//提取技能
		var tmp_skill	= '';
		var tmp_skill_show	= '';
		//var skill_myregexp = /<img[\s]+title="([^"]+)"/g;
		var skill_myregexp = /<img[\s]+title="([^\s]+)[\s]*([0-9]+)/g;

		var skill_match = '';

		//请求员工列表页面
		//http://k11.bizlife.com.cn/company/staff_list_skill_select.php?orderby=level&op=desc&state=46&object_type=&time_expired=&page=1&return=
		//http://k11.bizlife.com.cn/company/staff_list_skill_select.php?orderby=level&op=desc&state=46&object_type=2&_t=1276874429625


		var tmp_data	= HttpRequest.Get(server_url+'?orderby=level&op=desc&page='+ page+'&state='+state+'&object_type='+object_type+'&_t='+tmp_time.getTime());

		var staff_list_obj	 ={};
		var staff_id	 =null;
		

		var myregexp = /class="list_word">[\s\S]+?<td>[\s\S]+?staff_id=([0-9]+)[^>]+>([^(]+)\(([0-9]+)\)([\s\S]+?)<\/tr>[\s\S]+?<td>([\s\S]+?)<\/td>[\s\S]+?等级[\s\S]+?title="([^"]+)"[\s\S]+?经验[\s\S]+?"><div[^>]+>[^>]+>([0-9]+)[\s\S]+?能力[\s\S]+?"><div[^>]+>[^>]+>([0-9]+)[\s\S]+?忠诚[\s\S]+?"><div[^>]+>[^>]+>([0-9]+)</g;
		var match = myregexp.exec(tmp_data);

		
		//赋初值
		if(typeof(this.m_staffArray[object_type]) == 'undefined')
			this.m_staffArray[object_type]	= {};

		while (match != null) {


			staff_id	 = match[1];
			this.m_staffArray[object_type][staff_id]	= {};
			this.m_staffArray[object_type][staff_id]["编号"]	= staff_id;
			this.m_staffArray[object_type][staff_id]["姓名"]	= match[2];
			this.m_staffArray[object_type][staff_id]["剩余执行"]	= match[3];
			this.m_staffArray[object_type][staff_id]["技能"]	= {};

	/*
	<img title="心算 1 级" src="../images/ico_stat.gif" /><img src="../images/space.gif" width="2" height="10" />
	*/
			//技能
			tmp_skill	= match[4];
			tmp_skill_show = '';
			skill_match = skill_myregexp.exec(tmp_skill);
			this.m_staffArray[object_type][staff_id]["技能"]	= {};
			this.m_staffArray[object_type][staff_id]["技能"]['data']	= {};
			while (skill_match != null) {

				//if(typeof(skill_match[1]) == 'undefined')
				//	continue;
				//心算 = 1
				this.m_staffArray[object_type][staff_id]["技能"]['data'][$.trim(skill_match[1])]= parseInt(skill_match[2]) ;
				//this.m_staffArray[object_type][staff_id]["技能"]+= skill_match[1] + '  ';
				tmp_skill_show+= skill_match[1] + skill_match[2] + '级 ';
				skill_match = skill_myregexp.exec(tmp_skill);
			}


			this.m_staffArray[object_type][staff_id]["部门状态"]	= match[5];
			this.m_staffArray[object_type][staff_id]["等级"]	= match[6];
			this.m_staffArray[object_type][staff_id]["经验"]	= match[7];
			this.m_staffArray[object_type][staff_id]["能力"]	= match[8];
			this.m_staffArray[object_type][staff_id]["忠诚"]	= match[9];
			this.m_staffArray[object_type][staff_id]["技能"]["show"]	= tmp_skill_show;



			match = myregexp.exec(tmp_data);
		}
		return this.m_staffArray;
	},


	/*
		2010-10-30
		显示技能员工列表
		object_type 显示的技能编号
	*/
	show: function(object_type){

		var curr_staffs	= this.m_staffArray[object_type];

		var staff_list_html	= [];
		var staff_url	= biz_current_server_url()+'/company/staff_info-2.php?staff_id=';


		//得到选中记录,用于重载员工后重新选中
		var select_staff_array = this.getSelected();

		//默认是否选中
		var is_checked	 = false;

		var tmp_i	= 0;
		var curr_record	= null;
		for(var staff_id in curr_staffs)
		{
			curr_record	= curr_staffs[staff_id];	//指向当前记录

			if(typeof(curr_record) == 'undefined')
				continue;

			is_checked	 = false;


			//当前员工上次是否选中
			if(jQuery.inArray(parseInt(staff_id), select_staff_array) >=0)
			{
				is_checked	 = true;
			}

			//显示
			staff_list_html.push('<tr   class="row" ');
			staff_list_html.push('>');
			staff_list_html.push('<td align="center">'+(++tmp_i)+'</td>');


			staff_list_html.push('<td >');
			staff_list_html.push('<a target="staff_"'+staff_id+' href="'+staff_url+curr_record["编号"]+'"> '+curr_record["姓名"]+'</td>');

			staff_list_html.push('<td >'+curr_record["剩余执行"]+'</td>');
			staff_list_html.push('<td >'+curr_record["部门状态"]+'</td>');
			staff_list_html.push('<td >'+curr_record["技能"]["show"]+'</td>');
			staff_list_html.push('<td >'+curr_record["等级"]+'</td>');
			staff_list_html.push('<td >'+curr_record["经验"]+'</td>');
			staff_list_html.push('<td >'+curr_record["能力"]+'</td>');
			staff_list_html.push('<td >'+curr_record["忠诚"]+'</td>');

			staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_staff_skill_array" id="staff_skill_'+curr_record["编号"]+'"  value="'+curr_record["编号"]+'"  ');
			if(is_checked)
			{
				staff_list_html.push(' checked');
			}
			staff_list_html.push(' /></td>');


			staff_list_html.push("</tr>");

		}


		//显示新加载的员工
		$('#staff_skill_list').html(staff_list_html.join(''));
	},


	/**
	 * 得到当前选择员工
	 * 返回数组, 每个任务编号
	 */
	getSelected: function(){

		var select_array = Array();
		$("#staff_skill_list_form  input:checked[name$='select_staff_skill_array']").each(function() {
			select_array.push(parseInt($(this).val()));
		});

		return select_array;
	},

	/**
	 *  点击开始运行
	 * 
	 *  
	 */
	runClick: function(){

		//当前已在运行,停止掉
		if(g_interval['staff_skill'])
		{
			this.stop();
			return true;
		}
		

		if(this.getSelected().length < 1)
		{
			alert('请先选择要深造的员工。');
			biz_show_process("<span style='color:red'>自动技能深造 </span>: 请先选择要深造的员工。");
			return false;

		}
		g_interval['staff_skill']	 = true;

		biz_show_process("<span style='color:red'>自动技能深造中 </span>: START");
		$('#biz_staff_skill_click_button').val('自动技能深造中,点击停止.'); 
		this.autoRun();

	},

	//进行选定员工的技能深造
	autoRun: function(){


		//重新刷新员工列表
		if(1 == Tools.randGet(1,5))
			this.loadClick();


		var tmp_time=new Date();

		//技能类别
		var object_type	= parseInt($("#staff_skill_object_type").val());
		var state	= 46;

		//当前技能下的员工列表
		var curr_staffs	= this.m_staffArray[object_type];


		var server_url	= biz_current_server_url()+'/company/staff_execute_skill_confirm.php?pay=money&item_books=0&item_238=0&';
		server_url+= 'state='+state+'&object_type='+object_type+'&_t='+tmp_time.getTime()+'&ids[]=';


		var volume_export_url	= biz_current_server_url()+'/company/volume_export.php?state='+state+'&sids=';

		//得到选中记录
		var select_staff_array = this.getSelected();
		var curr_staff_id = 0;

		jQuery.each(select_staff_array, function() {
			
			curr_staff_id	=  this;
			//跳过无剩余执行的员工
			if(curr_staffs[curr_staff_id]['剩余执行'] >0)
			{
				//跳过等级满5级
				if(curr_staffs[curr_staff_id]['技能']['data'][g_staff_skill[object_type]] < 5)
				{
					curr_staffs[curr_staff_id]['剩余执行']--;
					select_staff_array.push(curr_staff_id);
				}
			}
		});

		if (select_staff_array.length <1)
		{
			alert("请先加载并选择技能深造的员工" + select_staff_array.length);
			return false;
		}
		server_url+= select_staff_array.join('&ids[]=');
		volume_export_url+= select_staff_array.join(',');


		//开始执行得到数据
		var tmp_data	= HttpRequest.Get(server_url);

		//window.location.href="volume_export.php?sids=1197951,1197952&state=46"; 
		if(!tmp_data || tmp_data == 'false' || tmp_data.length < 10)
		{
			biz_show_process('[<span style="color:red">技能培训出错</span>] 请检查是否 现金不足?'+tmp_data);
			//alert("请先正确登录官网后再执行！");
			return false;
		}
			
		//得到执行员工清单
		tmp_data	= HttpRequest.Get(volume_export_url);


		//得到正在培训的员工
		var myregexp = /:show_doing\(([0-9]+),\'([^\']+)\'/g;
		var match = myregexp.exec(tmp_data);
		var progress_stuffs	= {};
		var process_msg	= '';
		while (match != null) {
			process_msg+=' <a target="progress_'+match[1]+'" href="'+biz_current_server_url()+'/progress_inner.php?pid='+match[1]+'">'+match[2]+'</a>';
			match = myregexp.exec(tmp_data);
		}
		if('' == process_msg)
			return false;

		biz_show_process('[<span style="color:blue">以下员工正在执行</span>] '+process_msg);

		//http://k19.bizlife.com.cn/company/staff_execute_skill_confirm.php?object_type=1&ids[]=1727531&ids[]=1739602&state=46&pay=money&item_books=0&item_238=0

		//过指定的时间后再运行
		g_interval['staff_skill']	= window.setTimeout(function(){
				biz.staff.skill.autoRun();
			}
		, 1000 * 50 );


		return true;
	},


	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['staff_skill'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['staff_skill']);
		g_interval['staff_skill']	 = false;

		$('#biz_staff_skill_click_button').val('点击开始技能深造选中员工.'); 
		biz_show_process("<span style='color:red'>技能深造 </span>: STOP");
		return true;
	},


	//从批量操作的员工中选中的员工添加到技能深造表
	//staff_ids 为员工数组
	addFromStuffs: function(staff_ids){

		//当前技能
		var object_type	= this.m_currSkillType;

		if('number' == typeof(staff_ids))
		{
			staff_ids	= Array(staff_ids);
		}

		var staff_id	= 0;
		var staff_skills	= [];
		var curr_staff	= null;
		var show_log_array = Array();
		for(var tmp_i=0; tmp_i < staff_ids.length; tmp_i++)
		{
			show_log_array = Array();
			//当前员工的信息
			staff_id	= staff_ids[tmp_i];
			curr_staff	= g_staff_array[staff_id];
			
			show_log_array.push(curr_staff['姓名'] + ':');
			//遍历所有技能
			staff_skills	= curr_staff['技能']['data'];

			var curr_record	= null;
			for(var skill_name in staff_skills)
			{

				object_type	= this.m_skillMap[skill_name];
				if(typeof(object_type) == 'undefined')
					continue;

				show_log_array.push( ' 技能: '+ skill_name);

				//...
				if(typeof(this.m_staffArray[object_type]) == 'undefined')
					this.m_staffArray[object_type]	= {};

				var staff_id	= staff_ids[tmp_i];

				//已存在员工
				if(typeof(this.m_staffArray[object_type][staff_id]) != 'undefined')
				{
					show_log_array.push( ' 已存在');
					continue;
				}

				show_log_array.push( ' 已加入 ');

				//进行添加操作

				this.m_staffArray[object_type][staff_id]	= {};
				this.m_staffArray[object_type][staff_id]["编号"]	= staff_id;
				this.m_staffArray[object_type][staff_id]["姓名"]	= curr_staff['姓名'];
				this.m_staffArray[object_type][staff_id]["剩余执行"]	= 10 + 5*(curr_staff['等级']-1);


				this.m_staffArray[object_type][staff_id]["部门状态"]	= curr_staff['单位'];
				this.m_staffArray[object_type][staff_id]["等级"]	= curr_staff['等级'];
				this.m_staffArray[object_type][staff_id]["经验"]	= curr_staff["经验"]["当前"];
				this.m_staffArray[object_type][staff_id]["能力"]	= curr_staff["能力"]["当前"];
				this.m_staffArray[object_type][staff_id]["忠诚"]	= curr_staff["忠诚"]["当前"];
				this.m_staffArray[object_type][staff_id]["技能"]	= curr_staff['技能'];
			}
			biz_show_process('<span style="color:blue">自动技能深造 </span>: '+show_log_array.join(' '));

		}
		
		biz_show_process('<span style="color:red">转入到技能深造的员工会在 [点此加载要深造的员工] 后出现 </span>: '+show_log_array.join(' '));

	}


};

