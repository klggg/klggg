/*
2010-7-11 12:10
封装员工相关
@version    $Id: $

可以对所中的员工分别进行指定的操作项目




*/


Tools.initNameSpace("biz");


biz.staff= {

	//批量执行的分组
	batchGroup : [],



	//点击批量执行
	batchGroupClick: function(){

		//当前一次可执行几个员工
  		var one_process_staff	= parseInt($("#one_process_staff").val());
		if( one_process_staff > 34 ||  one_process_staff <1)
		{
			alert('官方目前限制每次最多能执行34个员工,一般5个左右接任务效果最好，最少1个 ');
			return false;
		}

		var staffIdList	 = this.getSelectStaff();
		if(staffIdList.length < 1)
		{
			alert('请先选择要执行的员工');
			return false;
		}
		var optionList	= this.getBatchState();
		if(optionList.length < 1)
		{
			alert('请先选择批量操作项目');
			return false;
		}


		//得到最多可选几个员工
		var max_process_staff	= this.maxProcessStaffCount();	 //	biz_staff_one_process();
		if(!max_process_staff)
		{
			return false;
		}
		if(one_process_staff > max_process_staff)
		{
			one_process_staff	= max_process_staff;
		}


		var curr_group	 = this.addBatchGroup(
			staffIdList
			,optionList
			,one_process_staff);

		biz.staff.runGroup(curr_group);

		//显示添加的运行组
		this.showBatchGroup(curr_group);


	},

	//显示新加的操作组
	showBatchGroup : function(groupIndex){

		//得到当前组信息
		var curr_group	= this.getBatchGroup(groupIndex);
		if(!curr_group)
			return false;

		//保存当前员工
		var curr_staff	= {};
		var staff_numb	= 0;

		var show_staff_html	= [];

		var staff_url	= biz_current_server_url()+'/company/staff_info-2.php?staff_id=';

		var tmp_i=0;
		for(tmp_i=0; tmp_i < curr_group.staffs.length; tmp_i++)
		{
			staff_numb	= curr_group.staffs[tmp_i];
			curr_staff	= g_staff_array[staff_numb];
			show_staff_html.push('<a target="staff_"'+staff_numb+' href="'+staff_url+staff_numb+'"> '+curr_staff["姓名"]+'</a>');

		}


		//当前运行的项目
		var curr_batch_state	= {};
		var show_option_html	= [];
		for(tmp_i=0; tmp_i < curr_group.options.length; tmp_i++)
		{
			show_option_html.push('<u>'+g_batch_state_array[curr_group.options[tmp_i]].title+'</u>');

		}


//		biz_show_process("staffs: "+curr_staff_list.join(',')+ "    option: "+curr_group.options[curr_group.optionIndex]);

		//var tmp_html	= '<b>[批量运行组 '+(groupIndex+1)+']</b>   <br />操作项目: '+show_option_html.join(',')+'<br />一次执行员工数: '+curr_group.oneProcessMax+'    <br />批量员工: '+show_staff_html.join(' &nbsp; ');

		var tmp_process_html	= '<b>[批量运行组 '+(groupIndex+1)+']</b>   操作项目: '+show_option_html.join(',')+'  &nbsp; 一次执行员工数: '+curr_group.oneProcessMax+'    批量员工: '+show_staff_html.join(' &nbsp; ');



		var today = new Date();
		var seconds	= today.getSeconds();
		if(seconds < 10)	seconds	= '0'+seconds;

		var minutes	= today.getMinutes();
		if(minutes < 10)	minutes	= '0'+minutes;

		var curr_time	= today.getFullYear() +'-'+(today.getMonth()+1) +'-'+ today.getDate() +' '+ today.getHours() +':'+  minutes +':'+  seconds;


		$('#batch_group_result_list').prepend('<p id="BizBatchGroup_'+groupIndex+'">   <input type="button" value="删除该组" onclick="biz.staff.batchGroupCancelClick('+groupIndex+');" /> '+curr_time+' : '+tmp_process_html+' </p>');

		biz_show_process( tmp_process_html);

	},

	//点击取消组
	batchGroupCancelClick: function(groupIndex){

		$("#BizBatchGroup_"+groupIndex).remove();
		//停止运行
		this.batchGroupStop(groupIndex);

		biz_show_process( '<span style="color:red">批量员工执行</span>: 删除组'+(groupIndex + 1));

	},

	//停止当前组运行
	batchGroupStop: function(groupIndex){

		if('undefined' == typeof(this.batchGroup[groupIndex]))
			return false;

		//停止运行
		window.clearTimeout(this.batchGroup[groupIndex].timeObj);
		biz_show_process( '<span style="color:red">批量员工执行</span>: 停止组'+(groupIndex + 1)+'运行');
	},

	//加载公司、部门列表菜单
	loadDepartment: function(){

		var arr_object_type = new Array();	//定义部门列表数组
		var curr_url= biz_current_server_url()+'/company/staff_list.php?object_type=department||2&time_expired=';
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
			Tools.setItemsToSelect('staff_load_department', arr_object_type);
		}
	},


	//得到选中的批量操作项目
	getBatchState: function(){

		var batch_state_index_list = Array();
		$("input:checked[name$='batch_state[]']").each(function() {
			batch_state_index_list.push(parseInt($(this).val()));
		});
		return batch_state_index_list;

	},


	//得到一次最多执行几个员工
	maxProcessStaffCount: function(){

		if(!biz_check())
			return false;

		var server_url	= biz_current_server_url()+'/company/staff_batch_select.php';


		var optionList	= this.getBatchState();

		//请求员工列表页面
		var tmp_data	= HttpRequest.Get(server_url+'?state='+optionList[0]);
		if(!tmp_data || tmp_data == 'false' || tmp_data.length < 300)
		{
			return false;
		}


		//得到最多可选几个员工
		var myregexp = /最多可以选择([0-9]+)名员工/gm;
		var match = myregexp.exec(tmp_data);
		if(!match)
		{
			alert("人事部人手不够?再点次试试。");
			return false;
		}

		if(0 == parseInt(match[1]))
		{
			alert("人事部人手不够");
			return false;
		}
		return parseInt(match[1]);
	},

	/**
	 *  检查能否批量执行
	 *  
	 *  int state 动作类型
	 *  int batch_num 一次几个人
	 *  
	 */
	canExe : function(state,batch_num)
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
		if('undefined' == typeof(tmp_array)  ||  !tmp_array || ''== tmp_array[0])
			return true;

		if(parseInt(tmp_array[0]) < 0)
		{
			biz_show_process(tmp_array[1].replace(/<br>/gi,"  "));
			
			//提示体力不足
			if(tmp_array[1] && tmp_array[1].indexOf('体力值不足') > 0)
			{
				//自动喝葡萄糖
				return biz_auto_strength();
			}

			return false;
		}
		return true;
	},


	/**
	 *  对指定的一批员工进行执行动作
	 *  
	 *  Array staffIdList  批量执行的员工  Array(员工id,...)
	 *  int optionType   批量执行的项目类型   3 ,4? 
	 *  int groupIndex   执行的分组序号
	 *  
	 */
	bathRun : function(staffIdList,optionType,groupIndex)
	{
		var staff_numb_array	= this.filterStaffs(staffIdList,optionType,groupIndex);
		//没有可以执行员工
		if(staff_numb_array.length < 1)
		{
			biz_show_process('<span style="color:red">[批量员工执行]</span> 没有可以执行员工');

			//设定需要自动加载
			if(biz_is_auto_load_staff())
			{
				if(!biz_get_staff(biz_server_id()))
				{
					return false;
				}
				biz_show_process( '<span style="color:blue">[批量员工执行]</span> 自动加载员工');
			}
			else
			{
				this.batchGroupStop();
				return false;
			}
		}

		var curr_group	= this.getBatchGroup(groupIndex);

		//当前运行的项目
		var curr_batch_state	= g_batch_state_array[optionType];

		//检查能否执行任务
		if(!this.canExe(optionType,staff_numb_array.length))
		{
			return false;
		}


//得到需要请求的URL
var batch_url	= biz_current_server_url()+'/company/'+curr_batch_state['url']+'.php?state='+optionType+'&return=%2Foffice%2Froutine_work.php&ids[]=';

		//不需要自动加速
		if(1!= parseInt($("input:checked[id$='biz_staff_auto_speed']").val()) && 1!= parseInt($("input:checked[id$='biz_staff_item410']").val()))
		{

			//批量执行任务的入口,
			var batch_exec_url	 = '';
			var response_html	= '';
			
			//执行批量任务
			batch_exec_url	= batch_url+staff_numb_array.join('&ids[]=')+'&n='+Math.random();
			response_html	= HttpRequest.Get(batch_exec_url);
			tmp_array	= response_html.split("|||");
			if(parseInt(tmp_array[0]) !== 1)
			{
				biz_show_process( '<span style="color:red">[批量员工执行失败]</span>: '+(tmp_array[1]));
				return false;
			}

		}
		else
		{
			for(var tmp_i=0;tmp_i<staff_numb_array.length;tmp_i++)
			{

				var curr5;
				if(document.getElementById('biz_staff_item410').checked)
				{
					curr5=biz_current_server_url()+'/company/staff_execute.php?staff_id='+staff_numb_array[tmp_i]+'&state='+optionType+'&return=&item410=410';

				}else
				{
					curr5=biz_current_server_url()+'/company/staff_execute.php?staff_id='+staff_numb_array[tmp_i]+'&state='+optionType+'&return=&item410=0';
				}

				HttpRequest.Get(curr5,
					function(xmlhttp){

						var batch_pid;
						if (1 != parseInt($("input:checked[id$='biz_staff_auto_speed']").val()))
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

					}

				);
			}
		} //else


	},

	/**
	 *  过滤不符合条件的员工
	 *  
	 *  Array staffIdList  批量执行的员工  Array(员工id,...)
	 *  int optionType   批量执行的项目类型   3 ,4? 
	 *  返回可执行的员工
	 */
	filterStaffs : function(staffIdList,optionType,groupIndex)
	{
		if(staffIdList.lenght <1)
			return false;

		//当前运行的项目
		var curr_batch_state	= g_batch_state_array[optionType];

		//保存当前员工
		var curr_staff	= {};

		var staff_numb	= 0;

		//是否允许执行当前员工
		var is_staff_ok	= false;


		//放当前要运行的名字
		var staff_name_array	= Array();

		//放当前要运行的员工号
		var staff_numb_array	= Array();

		//放当前没体力的员工
		var staff_nostrength_array	= Array();


		for(var tmp_i=0; tmp_i < staffIdList.length; tmp_i++)
		{
			is_staff_ok	= true;

			staff_numb	= staffIdList[tmp_i];
			curr_staff	= g_staff_array[staff_numb];

			//跳过无体力的员工
			if(curr_staff['体力']['当前'] <1 )
			{
				//删除该员工
				this.batchGroup[groupIndex].staffs.splice(tmp_i,1);
				staff_nostrength_array.push(curr_staff["姓名"]);

				continue;
			}

			//对应的经验忠诚等进行累加
			jQuery.each(curr_batch_state["attr_change"], function(attr_key, attr_val) {
				if(biz_is_auto_skip_staff() && g_staff_array[staff_numb][attr_key]['当前'] >= g_staff_array[staff_numb][attr_key]['最大'])
				{
					biz_show_process( '<span style="color:red">[批量员工执行] ['+curr_staff["姓名"]+']的['+attr_key+']('+g_staff_array[staff_numb][attr_key]['当前']+') 已最大了!</span>');

					is_staff_ok	= false;
				}
				else
					g_staff_array[staff_numb][attr_key]['当前']+=parseInt(attr_val);
			});


			//放到要操作员工里
			if(is_staff_ok)
			{
				staff_numb_array.push(staff_numb);
				staff_name_array.push(curr_staff["姓名"]+"["+curr_staff['体力']['当前']+']');
				//体力减1
				g_staff_array[staffIdList[tmp_i]]['体力']['当前']--;
			}

		} //end for


		if(staff_nostrength_array.length >0)
		{
			biz_show_process( '<span style="color:red">[批量员工执行]</span>无体力员工: '+(staff_nostrength_array.join(',')));
		}

		if(staff_numb_array.length < 1)
			return staff_numb_array;

		var curr_group	= this.getBatchGroup(groupIndex);

		var staff_batch_select_url	= biz_current_server_url()+'/company/volume_export.php?state='+optionType;
		staff_batch_select_url+= '&sids='+staff_numb_array.join(',');
		//显示状态
		if(document.getElementById('biz_staff_auto_speed').checked)
		{
			biz_show_process( '['+(curr_group.staffIndex)+'] <b>批量 ['+curr_batch_state.title + ']</b> <a target="_blank" href="'+staff_batch_select_url+'">[点击查看]</a> 员工:'+(staff_name_array.join(',')) + ' 耗时:10秒 <i>'+curr_batch_state.desc + '</i> ');
		}else
		{
			biz_show_process( '['+(curr_group.staffIndex)+'] <b>批量 ['+curr_batch_state.title + ']</b> <a target="_blank" href="'+staff_batch_select_url+'">[点击查看]</a> 员工:'+(staff_name_array.join(',')) + ' 耗时:'+curr_batch_state.time + '秒 <i>'+curr_batch_state.desc + '</i> ');
		}


		return staff_numb_array;


	},


	//批量执行指定组
	runGroup : function(groupIndex)
	{
		//得到当前组信息
		var curr_group	= this.getBatchGroup(groupIndex);
		if(!curr_group)
			return false;

		//得到当前要执行的员工
		var curr_staff_list	= [];

		var start_staff_index	= curr_group.staffIndex * curr_group.oneProcessMax;

		
		for(var tmp_i=start_staff_index; tmp_i < curr_group.staffs.length; tmp_i++)
		{

			//取满一次执行的员工数
			if(curr_staff_list.length >= curr_group.oneProcessMax)
				break;
			curr_staff_list.push(curr_group.staffs[tmp_i]);

		}

		//运行当前组
		this.bathRun(curr_staff_list, curr_group.options[curr_group.optionIndex], groupIndex);


		//挂起下一次任务
		this.runGroupNext(groupIndex);


	},

	//挂起下一次任务
	runGroupNext : function(groupIndex)
	{
		var curr_group	= this.getBatchGroup(groupIndex);

		//执行下一组员工
		this.setGroupStaffIndex(
			groupIndex
			,curr_group.staffIndex+1
		);
		
		//总可拆分几个组
		var staff_group_max	= Math.ceil( curr_group.staffs.length / curr_group.oneProcessMax);

		//员工列表结束 当前组号 > 最大组号
		if(curr_group.staffIndex >= staff_group_max)
		{
			biz_show_process('<span style="color:blue">[项目'+groupIndex+'组]</span> 员工列表轮回...');
			//项目序号+1
			this.setGroupOptionIndex(
				groupIndex
				,curr_group.optionIndex+1
			);

			//员工分组序号 =0 
			this.setGroupStaffIndex(
				groupIndex
				,0
			);
		}

		//项目结束
		if(curr_group.optionIndex >= curr_group.options.length)
		{
			biz_show_process('<span style="color:blue">[项目'+groupIndex+'组轮回...]</span> ');
			//项目序号+1
			this.setGroupOptionIndex(
				groupIndex
				,0
			);
		}


		//挂起下一次任务
		var next_time	= g_batch_state_array[curr_group.options[curr_group.optionIndex]].time + 60;
		if (1 == parseInt($("input:checked[id$='biz_staff_auto_speed']").val()))
		{
			next_time=15;		//自动加速只需10秒
		}


		window.clearTimeout(biz.staff.batchGroup[groupIndex].timeObj);
		biz.staff.batchGroup[groupIndex].timeObj	= window.setTimeout(function(){
				biz.staff.runGroup(groupIndex);
			},1000 * next_time);

	},

	/**
	 *  向批量组里添加执行项目
	 *  
	 *  Array staffIdList  批量执行的员工  Array(员工id,...)
	 *  Array optionList   批量执行的项目 如 沟通、培训 Array(项目编号,...)
	 *  int oneProcessMax 当前一次可执行几个员工
	 *  返回当前组序号
	 */
	addBatchGroup: function(staffIdList,optionList,oneProcessMax)
	{
		//一次执行要确保小于员工数
		if(oneProcessMax >= staffIdList.length)
			oneProcessMax	= staffIdList.length;

		this.batchGroup.push({
			'staffs': staffIdList
			,'options': optionList

			//保存setTimeOut对像
			,'timeObj': null
			
			//一次执行员工数
			,'oneProcessMax': oneProcessMax


			//当前所在员工分组序号，目前可指定一次执行几个员工
			,'staffIndex': 0

			//当前项目序号
			,'optionIndex': 0
		});

		return this.batchGroup.length - 1;
	},


	//到当前批量执行的分组数据
	getBatchGroup: function(groupIndex)
	{
		if(typeof(groupIndex) == 'undefined')
			return this.batchGroup;

		if(typeof(this.batchGroup[groupIndex]) == 'undefined')
			return false;

		return this.batchGroup[groupIndex];

	},

	/**
	 *  改变指定组当前项目序号
	 *  
	 *  int groupIndex  组号
	 *  int numb   要设置的值
	 *  
	 */
	setGroupOptionIndex: function(groupIndex,numb)
	{
		if(typeof(this.batchGroup[groupIndex]) == 'undefined')
			return false;
		this.batchGroup[groupIndex].optionIndex	= numb;
	},


	/**
	 *  改变指定组当前员工分组序号
	 *  
	 *  int groupIndex  组号
	 *  int numb   要设置的值
	 *  
	 */
	setGroupStaffIndex: function(groupIndex,numb)
	{
		if(typeof(this.batchGroup[groupIndex]) == 'undefined')
			return false;
		this.batchGroup[groupIndex].staffIndex	= numb;
	},


	/**
	 *  得到选中员工
	 *  
	 *  String whereForm
	 *  
	 */
	getSelectStaff : function(whereForm)
	{
		if(typeof(whereForm) == 'undefined')
			whereForm	= '#staff_list_form';

		var select_staff_array = Array();
		$(whereForm+"  input:checked[name$='select_staff_array']").each(function() {
			select_staff_array.push(parseInt($(this).val()));
		});
		
		return select_staff_array;

	},


	/**
	 *   2010-10-30 15:26
	 *   选中的员工添加到技能深造
	 *  
	 *  
	 */
	toSkill : function()
	{
		var staffIdList	 = this.getSelectStaff();
		if(staffIdList.length < 1)
		{
			alert('请先选择要添加到技能深造的员工');
			return false;
		}

		//调用技能模块
		biz.staff.skill.addFromStuffs(staffIdList);
	},

	/**
	 *  移除选中的员工 biz_remove_staff
	 *  
	 *  String whereForm
	 *  
	 */
	removeStaff : function(whereForm)
	{
		var select_staff	= this.getSelectStaff('#staff_list_form');

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
	},
	/**
	 *  员工招聘
	 *  by 清风无痕
	 *  
	 */
	jobRecruit : function(whereForm)
	{
		var recruit_type=parseInt(document.getElementById('recruit_type').value);
		var recruit_num=parseInt(document.getElementById('recruit_num').value);
		if(recruit_type<1 || recruit_type>7){return;}
		if(recruit_num<=0){return;}

		var staff_url	= biz_current_server_url()+'/company/staff_info-2.php?staff_id=';

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
					//http://k1.bizlife.com.cn/company/detail_recruit.inner.php?staff_new_id=196&sel_type=2&sid=&nid=
					//http://k1.bizlife.com.cn/company/do_recruit.php?staff_new_id=196&return=.%2Frecruit.php%3Fselect_staff_type%3D2

					url = biz_current_server_url()+"/company/do_recruit.php?staff_new_id="+staff_new_id+"&return=.%2Frecruit.php%3Fselect_staff_type%3D1";
					//alert(url);
					r2=HttpRequest.Get(url);

					if (r2.indexOf("window.location.href") > 0)
					{
						biz_show_process('<span style="color:red">招聘失败</span> <a target="jobRecruit" href="'+url+'">公司当前无法容纳更多员工 ? 或没登录？点击查看</a>');
						//公司当前无法容纳更多员工 ? 或没登录？
						return;
					}
					//alert(r2);
					tmp=r2.split('|||');
					if(!tmp[3]){return;}
					tmp2=tmp[3].split('||');
					if(!tmp2[0]){return;}
					staff_new_id=tmp2[0];
					//2875494|||dept|||1|||364||/images/staff/female/14.jpg||佘民佑(女)||行政人事员&nbsp;1169&nbsp;G

					biz_show_process('<span style="color:blue">招聘成功</span> <a target="staff_"'+tmp[0]+' href="'+staff_url+tmp[0]+'"> '+tmp2[3]+'</a>');

					
				}
			}
		}
		else
		{
		}
	},

	/**
	 *  批量续约
	 *  by 清风无痕
	 *  
	 */
	renewal : function()
	{

//全部续约
//	var r =sendPost("/company/staff_list_renewal_select.php","ajax=update_all");
//批量续约
//	window.location.href="./staff_batch_renewal.php?return=%2Fcompany%2Fstaff_list_renewal_select.php&"+get_query_str();

		var server_url	= biz_current_server_url()+'/company/staff_list_renewal_select.php';

		var post_data	= "ajax=update_all";
		var response_html	= HttpRequest.Post(server_url,post_data);
		biz_show_process('<span style="color:blue">员工续约</span>'+response_html);
		alert(response_html);

		//var tmp_array	= response_html.split("|||");


	}
};






//收藏中移除选中的员工
function biz_remove_staff_fav()
{
	var select_staff	= biz.staff.getSelectStaff('#staff_fav_list_form');

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

	var select_staff	= biz.staff.getSelectStaff('#staff_list_form');

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
	select_staff	= biz.staff.getSelectStaff('#staff_fav_list_form');
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

	var select_staff	= biz.staff.getSelectStaff('#staff_fav_list_form');

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
	select_staff	= biz.staff.getSelectStaff();
	//显示员工列表
	biz_show_staff(g_staff_array,'#staff_list');

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
		content_array.push('skill="'+curr_record["技能"]["show"]+'" ');

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

 
	var staff_url	= biz_current_server_url()+'/company/staff_info-2.php?staff_id=';

	if(typeof(staffPrefix) == 'undefined')
		staffPrefix	= 'staff_';

	//反省等级和三围关系
	var reflection_sw_config	= {4:400,5:800};

	for( staff_numb in staffs)
	{
		curr_record	= staffs[staff_numb];
		tmp_i++;


		staff_list_html.push('<tr   class="row" ');

//		staff_list_html.push(' onclick="document.getElementById(\'staff_'+curr_record["编号"]+'\').checked=document.getElementById(\'staff_'+curr_record["编号"]+'\').checked?false:true;" ');

		staff_list_html.push('>');


		staff_list_html.push('<td align="center">'+tmp_i+'</td>');

		staff_list_html.push('<td >');
//显示员工标记
//		staff_list_html.push('<a href="javascript:void(0);" onmousedown="biz_staff_mark(this,\''+staff_numb+'\');"><img border=0 title="收藏员工" src="./images/staff_mark.gif"/></a>');
		staff_list_html.push('<a target="staff_"'+staff_numb+' href="'+staff_url+staff_numb+'"> '+curr_record["姓名"]+'</a>');

		staff_list_html.push('<td >'+curr_record["爱好"]+'</td>');
		staff_list_html.push('<td >'+curr_record["单位"]+'</td>');
		staff_list_html.push('<td >'+curr_record["等级"]+'</td>');

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

		//显示技能
		staff_list_html.push(' <td ><a target="staff_"'+staff_numb+' title="立即去深造" href="'+biz_current_server_url()+'/company/staff_further_education_skill_confirm-2.php?check_id=skill4&staff_id='+staff_numb+'">'+curr_record["技能"]["show"]+'</a></td >');

		//操作项目
		staff_list_html.push('<td >');

		//反省 空闲 四级员工三围　>　400 and 五级员工三围　>　800
		if(curr_record["姓名"].indexOf('空闲')!=-1 &&  curr_record["等级"] >= 4 )
		{
			
			if(curr_record["经验"]['当前'] >= reflection_sw_config[curr_record["等级"]] 
				&&  curr_record["能力"]['当前'] >= reflection_sw_config[curr_record["等级"]]
				&&  curr_record["忠诚"]['当前'] >= reflection_sw_config[curr_record["等级"]]
				)
			{
				staff_list_html.push(' <span style="cursor:pointer;color:red;" onclick="biz.company.staffReflection.run(this,'+staff_numb+')" >反省 </span>');

			}
		}

		if(curr_record["等级"] < 5 )
		{
			staff_list_html.push(' <a target="staff_"'+staff_numb+' href="'+biz_current_server_url()+'/company/staff_further_education_confirm-2.php?staff_id='+staff_numb+'">进修</a>');

		}
		staff_list_html.push('</td >');



		if(curr_record["体力"]['当前'] < 1)
		{
			staff_list_html.push('<td>无体力</td>');
		}
		else if(curr_record["状态"] !="")
		{
			staff_list_html.push('<td>'+curr_record["状态"]+'</td>');
		}
		else
			staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_staff_array" id="'+staffPrefix+curr_record["编号"]+'"  value="'+curr_record["编号"]+'" onclick="biz_staff_select_count()" /></td>');  //sSWans,在列表每个员工的复选框添加onclick触发事件

		staff_list_html.push("</tr>");

		staff_name.push(curr_record["姓名"]);
	}


	//显示新加载的员工
	$(whereDom).html(staff_list_html.join(''));


}
//sSWans,选中人数处理函数
function biz_staff_select_count()
{
	select_staff = biz.staff.getSelectStaff('#staff_list_form');
	document.getElementById("count_selected").innerHTML = select_staff.length;
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

var myregexp = /<tr id=\Wstaff_tr\d+[\s\S]+?<span id=\Wstaff_name(\d+)[^>]>([\s\S]+?) <\/span>[\s\S]*?<font .*>([\s\S]*?)<\/font[\s\S]*?<tr>[\s\S]*?<td.*?>(.*)<\/td>[\s\S]*?当前等级：([0-9]+)[\s\S]*?当前经验：([0-9]+)\/([0-9]+)[\s\S]*?当前能力：([0-9]+)\/([0-9]+)[\s\S]*?忠诚度达到([0-9]+)[\s\S]*?<div [^>]+>[\s\S]*?>([0-9]+)[\s\S]*?当前人品：([0-9]+)\/([0-9]+)[\s\S]*?当前体力：([0-9]+)\/([0-9]+)[\s\S]*?(\d+)<\/td>[\s\S]*?(\d+)天后[\s\S]*?<td[^>]+>([\s\S]*?)<\/td>[\s]+<td[^>]*>([\w\W]*?)</g;
//根据批量动作导 可以自动跳过正在执行任务的员工
	//var myregexp = /<span \s*id=\"staff_name([^>]+)\">(.*)<\/span>[\s\S]*?<font .*>([\s\S]*?)<\/font[\s\S]*?<tr>[\s\S]*?<td.*?>(.*)<\/td>[\s\S]*?当前等级：([0-9]+)[\s\S]*?当前经验：([0-9]+)\/([0-9]+)[\s\S]*?当前能力：([0-9]+)\/([0-9]+)[\s\S]*?忠诚度达到([0-9]+)[\s\S]*?<div [^>]+>[\s\S]*?>([0-9]+)[\s\S]*?当前人品：([0-9]+)\/([0-9]+)[\s\S]*?当前体力：([0-9]+)\/([0-9]+)[\s\S]*?<td[\s\S]*?<td[^>]+>([0-9]+)G[\s\S]*?<span[\s\S]*?([0-9]+)天[\s\S]*?<td[^>]+>([\s\S]*?)<\/td>/ig;

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
		staff_list_obj[staff_id]["状态"]	= (isNaN(match[19])?"":"培训中");

		match = myregexp.exec(allHtml);
	}

	myregexp	= null;
	match	= null;
	allHtml	= null;
	return staff_list_obj;
}

//得到技能
function biz_staff_get_skill(tmp_html)
{
	var data_array= {};
	var show_array= [];
	var myregexp = /show_description\('([^']+)([0-9]+)级/g;
	var match = myregexp.exec(tmp_html);
	while (match != null) {
		if(parseInt(match[2]) > 0)
		{
			data_array[match[1]]	= parseInt(match[2]);
			show_array.push(match[1]+":"+match[2]);
		}
		match = myregexp.exec(tmp_html);
	}
	return {'data':data_array,'show':show_array.join("\n")};
}


//加载员工列表
//员工按体力排序
//http://k1.bizlife.com.cn/company/staff_batch_select.php?page=1&state=3&orderby=leftexec&op=desc
//page 取第几页
function biz_get_staff(serverId)
{
	if(!biz_check())
		return false;


	var page		= $("#staff_load_page").val();
	var state	=3;	//批量温和沟通
	var orderby	= $("#staff_load_order_by").val();
    var object_type	 = $("#staff_load_department").val(); // 部门
	var order	= $("#staff_load_order").val();
	var tmp_time=new Date();

	var server_url	= biz_current_server_url()+'/company/staff_list.php';
	//var server_url	= biz_current_server_url()+'/company/staff_batch_select.php';

	$("input[name$='button_load_staff']").val('加载中..').attr("disabled","disabled"); 

	window.setTimeout(function(){
		$("input[name$='button_load_staff']").val('继续加载员工..').attr("disabled","");
	},1000 * 3);

	//请求员工列表页面
	var tmp_data	= HttpRequest.Get(server_url+'?page='+ page+'&state='+state+'&orderby='+orderby+'&op='+order+'&_t='+tmp_time.getTime()+'&object_type='+object_type);
	if(!tmp_data || tmp_data == 'false' || tmp_data.length < 300)
	{
		return false;
	}



	//解析HTML得到员工列表
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
	var select_staff	= biz.staff.getSelectStaff();
	//显示员工列表
	biz_show_staff(g_staff_array,'#staff_list');

	//选中之前的员工
	jQuery.each(select_staff, function(i, val) {
		$("#staff_"+val).attr("checked",true);
	});



	biz_show_process('<span style="color:#0000ff">加载了'+tmp_staff_count+' 个员工</span>');
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





//选中员工批量进修
function biz_staff_studio(whereDom)
{
	var staff_url	= biz_current_server_url()+'/company/staff_execute_studio_confirm.php?state=43&return=%2Foffice%2Froutine_work.php&ids[]=';
	var select_staff	= biz.staff.getSelectStaff(whereDom);
	window.open(staff_url+select_staff.join('&ids[]='),"_blank");

//http://k1.bizlife.com.cn/company/staff_execute_studio_confirm.php?state=43&ids[]=806835&ids[]=750288&return=%2Foffice%2Froutine_work.php
}

//员工三围过滤 得到三围全满的
//staffs 要显示的员工列表 json格式
//type 1 经验 2能力 3忠诚 0全满 -1全部
function biz_staff_sw_filt(type)
{
	//显示全部
	if(-1 == type)
	{
		biz_show_staff(g_staff_array,'#staff_list');
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
	biz_show_staff(result_array,'#staff_list');

	return result_array;
}
