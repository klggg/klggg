
//多语言变量定义,以下代码不能改
var index_str1="级";
var index_str2='晴天';
var index_str3='多云';
var index_str4='小雨';
var index_str5='大雨';
var index_str6='暴雨';
var index_str7="您的在线游戏时间已经超过5个小时，由于您未进行防沉迷登记，如果继续在线您的游戏收益将降低为0，为了保障您的游戏利益，现在系统将您的账户强制下线。<br>如果您年满18岁，防沉迷登记认证后将不受影响。在没有登记之前，请在1小时内之前不要登录游戏，否则会严重降低您的游戏收益。";
var index_str8="确定";
var index_str9="您累计在线时间已满3小时，请您下线休息，做适当身体活动。您已经进入不健康游戏时间，您的游戏收益将降为正常值的50%。<br>如果你已满18岁，请进行防沉迷系统登记，登记后游戏时间和游戏收入将不受影响。";
var index_str10="登记";
var index_str11="暂无公告...";

try {
	window.attachEvent("onload", windowOnload);
}
catch (e) {
	window.addEventListener("load", windowOnload, false);
}

var main_iframe;

function add_second() {
	var game_datetime = new Date();
	var h = game_datetime.getHours() < 10 ? '0' + game_datetime.getHours() : game_datetime.getHours();
	var i = game_datetime.getMinutes() < 10 ? '0' + game_datetime.getMinutes() : game_datetime.getMinutes();
	var s = game_datetime.getSeconds() < 10 ? '0' + game_datetime.getSeconds() : game_datetime.getSeconds();
	document.getElementById("datetime").innerHTML = h+':'+i+':'+s;
}

var arr_menu_lt = new Array(); //主菜单的各按钮的left和top

var arr_menu_bottom_lt= new Array();
function add_swap_img(id, img1, img2) {

	var obj = document.getElementById(id);
	arr_menu_lt[id] = getOffset(obj);
	
	obj.onmouseover = function () {
		window.clearTimeout(i_timeout);
		
		//for (var i = 1; i <= 7; i++) {
		for (var i = 1; i <= 8; i++) {

			document.getElementById("menu" + i).src = "images/menu/menu1_0" + i + ".jpg";
/*			if(i==2){
				continue;
			}*/
			document.getElementById("submenu" + i).style.display = "none";
		}
		
		obj.src = img2;

		try{
		var submenu = document.getElementById("sub" + id);
		submenu.style.display = "";
		var lt = arr_menu_lt[id];
		submenu.style.top = (lt[1] + 40) + "px";
		submenu.style.left = (lt[0] + (obj.offsetWidth - submenu.offsetWidth) / 2) + "px";

		}catch(e){}
	};
	obj.onmouseout = function () {
		hide_submenu();
	};
	obj.onclick = function () {
	};
	var div_swap_img = document.getElementById("div_swap_img");
	if (div_swap_img == null) {
			div_swap_img = document.createElement("div");
		div_swap_img.setAttribute("id", "div_swap_img");
		div_swap_img.style.width = "0px";
		div_swap_img.style.height = "0px";
		div_swap_img.style.overflow = "hidden";
		if (document.body)
			document.body.appendChild(div_swap_img);
	}
	div_swap_img.innerHTML += "<img src=\"" + img2 + "\">";
}

function add_swap_images() {
	//主菜单
	
	if( typeof(_novice)!='undefined' && _novice!=null && _novice ){
		return;	
	}
	
	add_swap_img("menu1", "images/menu/menu1_01.jpg", "images/menu/menu2_01.jpg");
	add_swap_img("menu2", "images/menu/menu1_02.jpg", "images/menu/menu2_02.jpg");
	add_swap_img("menu3", "images/menu/menu1_03.jpg", "images/menu/menu2_03.jpg");
	add_swap_img("menu4", "images/menu/menu1_04.jpg", "images/menu/menu2_04.jpg");
	add_swap_img("menu5", "images/menu/menu1_05.jpg", "images/menu/menu2_05.jpg");
	add_swap_img("menu6", "images/menu/menu1_06.jpg", "images/menu/menu2_06.jpg");
	add_swap_img("menu7", "images/menu/menu1_07.jpg", "images/menu/menu2_07.jpg");
	add_swap_img("menu8", "images/menu/menu1_08.jpg", "images/menu/menu2_08.jpg");
	
	add_swap_bottom_img("menu_bottom1");
	add_swap_bottom_img("menu_bottom2");
	add_swap_bottom_img("menu_bottom3");
	add_swap_bottom_img("menu_bottom4");
	add_swap_bottom_img("menu_bottom5");
	add_swap_bottom_img("menu_bottom6");
	add_swap_bottom_img("menu_bottom7");
	//add_swap_bottom_img("menu_bottom8");
	
}

var i_timeout;
function hide_submenu() {
	i_timeout = window.setTimeout(function () {
											document.getElementById("submenu1").style.display = "none";
											document.getElementById("submenu2").style.display = "none";
											document.getElementById("submenu3").style.display = "none";
											document.getElementById("submenu4").style.display = "none";
											document.getElementById("submenu5").style.display = "none";
											document.getElementById("submenu6").style.display = "none";
											document.getElementById("submenu7").style.display = "none";
											document.getElementById("submenu8").style.display = "none";
											}, 100);
}

var start_time=get_time();

function windowOnload() {
	
	/*加截页面需要  BEGIN*/
	var end_time=get_time();
	
	onloadings((end_time-start_time));//关闭进条页面
	
	var bodys = document.getElementById('index_body');	
	if(bodys){
		bodys.style.display="block";
	}
	
	/*加截页面需要  END*/
	
	get_menu();
	
	main_iframe = document.getElementById("main_iframe");
	
	setInterval(add_second, 1000);
	
	get_bottom_menu();
	
	add_swap_images();
	
	update_bulletin();
	update_secretary();
	update_ranking();
	update_staff_num();
	update_shop_num();
	update_ground_num();
	update_stock_price();
	update_building_num();
	update_home_num();
	update_investment();
	update_weather();
	anti_indulge(); //防沉迷
	get_online_present(); //节日活动相关
	
	setInterval('update_income()', 60000 * 3); //收入
	setInterval('update_secretary()', 60000 * 5); //秘书提示
	setInterval('update_bulletin()', 60000 * 30); //公告
	setInterval("update_last_online()", 60000 * 5); //最后在线
	setInterval("get_online_present()", (60000 * 3) + 5); //节日活动相关
	setInterval('update_ranking()', 60000 * 60); //排名
	setInterval('update_staff_num()', 60000 * 20); //员工数
	setInterval('update_shop_num()', 60000 * 30); //店铺数
	setInterval('update_ground_num()', 60000 * 60); //土地数
	setInterval('update_building_num()', 60000 * 60); //建筑
	setInterval('update_investment()', 60000 * 60); //投资
	setInterval('update_max()', 60000 * 60); //员工数最大值和玩家体力最大值
	setInterval('update_weather()', 60000 * 10); //天气
	setInterval('update_factory_product()',60000*3);//工厂的生产
	
	setTimeout("send_onload('onload1.php')",  1000);
	setTimeout("send_onload('onload2.php')",  3000);
	setTimeout("send_onload('onload3.php')",  5000);
	setTimeout("send_onload('onload4.php')",  7000);
	setTimeout("send_onload('onload5.php')",  9000);
	setTimeout("send_onload('onload6.php')",  11000);
	setTimeout("send_onload('onload7.php')",  6000);
	setTimeout("send_onload('onload8.php')",  2000);
	setTimeout("send_onload('onload9.php')",  15000);
	setTimeout("send_onload('onload10.php')", 4000);
	setTimeout("send_onload('onload12.php')", 6000);
	setTimeout("send_onload('onload14.php')", 12000);
	setTimeout("send_onload('onload15.php')", 10300);
	setTimeout("send_onload('onload16.php')", 11000);
	setTimeout("send_onload('onload17.php')", 11000);
	setTimeout("send_onload('onload18.php')", 11000);
	setTimeout("send_onload('onload19.php')", 1000);
	setTimeout("send_onload('onload20.php')", 5000);
	setTimeout("send_onload('onload21.php')", 5000);
	
	setTimeout(set_menu_lt, 500);
	setTimeout(set_bottom_menu_lt, 500);
	
	feedback();
	
	document.getElementById("div_chat").innerHTML = '<iframe id="chat8" name="chat8" src="./chat8/" width="198" height="350" frameborder="0" scrolling="no"></iframe>';
	
	if(close_loading){//关闭进度条
		close_loading();
	}
}


var onload_count=0;
var onload_times="";
var wait_time=10;//等10秒,也就是在此加载页面停留多长的时间
/*加载页面的方法*/
function onloadings(run_time){	
	if(run_time>=wait_time){
		onload_count=1;
	}
	if(onload_count<1){
		onload_count++;
		onload_times=setTimeout("onloadings("+wait_time+")", (wait_time-run_time)*1000);
	}
	else{
		if(onload_times){
			clearTimeout(onload_times);
		}
		var onloading_condtents=document.getElementById("onloading_condtents");
		if(onloading_condtents){
			onloading_condtents.style.display = "none";
		}
	}
}

function get_time(){
   var seconds=0;
   d = new Date();
   seconds+= d.getHours()*3600;
   seconds+= d.getMinutes()*60;
   seconds+= d.getSeconds();
   return(seconds);
}


window.onresize = function () {
	set_menu_lt();
	set_bottom_menu_lt();
	if(resize_loading){
		resize_loading();	
	}
};

window.onscroll = function () {
};

function send_onload(url) {
	
	ajaxSendPost("./onload/" + url, null, null);

}

function goto2(url) {
	main_iframe.src = url;
}


function update_factory_product(){
	ajaxSendPost("factory_product.php", null, null);
}


var cash = 0;
var deposit = 0;
var debt = 0;
var shop_price = 0;
var stock_price = 0; //股票价值
var ground_price = 0; //地产价值
var building_price = 0; //建筑价值
var home_price = 0; //房屋价值
var investment = 0; //投资

function update_assets() {
	$("assets").innerHTML = number_format(cash + deposit - debt + shop_price + stock_price + ground_price + building_price + investment + home_price);
}

function update_index() {
	return;
}

var hard_stage = 100 ;
function update_user(user_info) {
	if (user_info == null) {
		return;
	}
	try {
		$('gold_coin').innerHTML = number_format(user_info['gold_coin']);
		$('user_level').innerHTML = user_info['user_level'];
		
		var arr_strategy = user_info['strategy'].split("/");
		$('strategy_bar').innerHTML = percent_bar99(arr_strategy[0], arr_strategy[1]);
		
		var arr_perform = user_info['perform'].split("/");
		$('perform_bar').innerHTML = percent_bar99(arr_perform[0], arr_perform[1], "./images/scale_yellow99.gif");
		
		var arr_lead = user_info['lead'].split("/");
		$('lead_bar').innerHTML = percent_bar99(arr_lead[0], arr_lead[1], "./images/scale_red99.gif");
		
		user_power = user_power_max - user_info['user_times'];
 	
		if( user_info['user_times'] + user_info['increase'] >= hard_stage ){
			ajaxSendPost('hard_ajax.php');
			hard_stage += 100 ;
		}
		$('power_bar').innerHTML = percent_bar99(user_power, user_power_max, "./images/scale_blue99.gif");
		if(user_info['vip_images']){
			$('vip_images').innerHTML = user_info['vip_images'];
		}
	}
	catch (e) {
	}
}

function update_company() {
	ajaxSendPost("ajax_update_company.php", null, update_company_complete);
}
function update_company_complete(company_info) {
	try {
		eval("var d = " + company_info + ";");
		$("cash").innerHTML = number_format(d['cash']);
		$("deposit").innerHTML = number_format(d['deposit']);
		$("debt").innerHTML = number_format(d['debt']);
		$("company_level").innerHTML = level_bar20(d['level']);
		
		cash = parseFloat(d['cash']);
		deposit = parseFloat(d['deposit']);
		debt = parseFloat(d['debt']);
		update_assets();
	}
	catch (e) {
	}
}

function percent_bar89(now, max_num, img_src) {
	if (img_src == null)
		img_src = "./images/scale_green89.gif";
	
	now = parseInt(now);
	max_num = parseInt(max_num);
	if (isNaN(now))
		now = 0;
	if (isNaN(max_num))
		max_num = 0;
	
	var w_now = 0;
	if (max_num > 0) {
		if (now < max_num) {
			w_now = now / max_num * 89;
			if (w_now > 0) {
				if (w_now > 1)
					w_now = Math.floor(w_now);
				else
					w_now = 1;
			}
			else
				w_now = 0;
		}
		else
			w_now = 89;
	}
	else
		w_now = 0;
	
	return '<div style="width:89px; height:10px; background:url(./images/scale_leftbg.gif); padding:3px;"><div style="width:89px; height:10px; font-size:10px; color:#FFF; background:url(' + img_src + ') no-repeat ' + (w_now - 89) + 'px 0px; font-family:Arial; line-height:100%; text-align:center; overflow:hidden;">' + now + '/' + max_num + '</div></div>'
}

function percent_bar99(now, max_num, img_src) {
	if (img_src == null)
		img_src = "./images/scale_green99.gif";
	
	now = parseInt(now);
	max_num = parseInt(max_num);
	if (isNaN(now))
		now = 0;
	if (isNaN(max_num))
		max_num = 0;
	
	var w_now = 0;
	if (max_num > 0) {
		if (now < max_num) {
			w_now = now / max_num * 99;
			if (w_now > 0) {
				if (w_now > 1)
					w_now = Math.floor(w_now);
				else
					w_now = 1;
			}
			else
				w_now = 0;
		}
		else
			w_now = 99;
	}
	else
		w_now = 0;
	
	return '<div style="width:99px; height:10px; background:url(./images/scale_left_t105.gif); padding:3px;"><div style="width:99px; height:10px; font-size:10px; color:#FFF; background:url(' + img_src + ') no-repeat ' + (w_now - 99) + 'px 0px; font-family:Arial; line-height:100%; text-align:center; overflow:hidden;">' + now + '/' + max_num + '</div></div>'
}

function level_bar10(level, bg, img) {
	if (!bg)
		bg = './images/scale_leftbg10.gif';
	if (!img)
		img = './images/scale_red.gif';
	
	var str = '<div style="width:89px; height:10px; background:url(' + bg + '); padding:3px; overflow:hidden;" title="' + level + '级">';
	for (var i = 1; i <= level; i++) {
		if (i != 10)
			str += '<div style="width:8px; height:10px; float:left; margin-right:1px; background:url(' + img + '); overflow:hidden;"></div>';
		else
			str += '<div style="width:8px; height:10px; float:left; margin-right:0px; background:url(' + img + '); overflow:hidden;"></div>';
	}
	str += '</div>';
	return str;
}
function level_bar20(level, bg, img) {
	if (!bg)
		bg = './images/scale_left_g20.gif';
	if (!img)
		img = './images/scale_red.gif';
	
	var str = '<div style="width:99px; height:10px; background:url(' + bg + '); padding:3px; overflow:hidden;" title="' + level + '级">';
	for (var i = 1; i <= level; i++) {
		if (i != 20)
			str += '<div style="width:4px; height:10px; float:left; margin-right:1px; background:url(' + img + '); overflow:hidden;"></div>';
		else
			str += '<div style="width:4px; height:10px; float:left; margin-right:0px; background:url(' + img + '); overflow:hidden;"></div>';
	}
	str += '</div>';
	return str;
}

function update_shop_num() {
	ajaxSendPost("ajax_update_shop_num.php", null, update_shop_num_complete);
}
function update_shop_num_complete(data) {
	try {
		eval("var d = " + data + ";");
		$('shop_num').innerHTML = d['shop_num'];
		shop_price = parseFloat(d['shop_price']);
		if (isNaN(shop_price))
			shop_price = 0;
		update_assets();
	}
	catch (e) {
	}
}

function update_ground_num() {
	ajaxSendPost("ajax_update_ground_num.php", null, update_ground_num_complete);
}
function update_ground_num_complete(data) {
	try {
		eval("var d = " + data + ";");
		$('ground_num').innerHTML = d['ground_num'];
		ground_price = parseFloat(d['ground_price']);
		if (isNaN(ground_price))
			ground_price = 0;
		update_assets();
	}
	catch (e) {
	}
}

function update_building_num() {
	ajaxSendPost("ajax_update_building_num.php", null, update_building_num_complete);
}
function update_building_num_complete(data) {
	try {
		eval("var d = " + data + ";");
		//$('building_num').innerHTML = d['building_num'];
		building_price = parseFloat(d['building_price']);
		if (isNaN(building_price))
			building_price = 0;
		update_assets();
	}
	catch (e) {
	}
}

function update_home_num() {
	ajaxSendPost("ajax_update_home_num.php", null, update_home_num_complete);
}
function update_home_num_complete(data) {
	try {
		eval("var d = " + data + ";");
		//$('building_num').innerHTML = d['building_num'];
		home_price = parseFloat(d['home_price']);
		if (isNaN(home_price))
			home_price = 0;
		update_assets();
	}
	catch (e) {
	}
}


function update_investment() {
	ajaxSendPost("ajax_update_investment.php", null, update_investment_complete);
}
function update_investment_complete(data) {
	try {
		eval("var d = " + data + ";");
		//$('building_num').innerHTML = d['building_num'];
		investment = parseFloat(d['investment']);
		if (isNaN(investment))
			investment = 0;
		update_assets();
	}
	catch (e) {
	}
}

//活动送东西
function get_online_present(){
	ajaxSendPost("./huodong/give_item_one_day.php",null,null);
}

function update_staff_num() {
	ajaxSendPost("ajax_update_staff_num.php", null, update_staff_num_complete);
}
function update_staff_num_complete(data) {
	$('staff_num').innerHTML = data;
}

var user_power = 0;
function update_max() {
	ajaxSendPost("ajax_update_max.php", null, update_max_complete);
}
function update_max_complete(data) {
	try {
		eval("var d = " + data + ";");
		$('staff_max').innerHTML = d['staff_max'];
		user_power_max = d['power_max'];
		
		$('power_bar').innerHTML = percent_bar99(user_power, user_power_max, "./images/scale_blue89.gif");
	}
	catch (e) {
	}
}

function update_income() {
	ajaxSendPost("ajax_update_income.php?x=1", null, update_income_complete);
}

function update_income_complete(data) {
	if (!data) {
		return;
	}
	try {
		eval("var d = " + data + ";");
		if (!d) {
			return;
		}
		$('day2').innerHTML = number_format(d['day2']);
		$('day1').innerHTML = number_format(d['day1']);
		$('trend').innerHTML = d['trend'];
		
		$("cash").innerHTML = number_format(d['cash']);
		$("deposit").innerHTML = number_format(d['deposit']);
		$("debt").innerHTML = number_format(d['debt']);
		$("company_level").innerHTML = level_bar20(d['level']);
		
		cash = parseFloat(d['cash']);
		deposit = parseFloat(d['deposit']);
		debt = parseFloat(d['debt']);
		update_assets();
	}
	catch (e) {
	}
}

function update_last_online() {
	ajaxSendPost("ajax_last_online.php", null, null);
}

function update_ranking() {
	ajaxSendPost("ajax_update_ranking.php", null, update_ranking_complete);
}
function update_ranking_complete(data) {
	try {
		eval("var d = " + data + ";");
		$('day_earn').innerHTML = d['day_earn'];
		$('hundred').innerHTML = d['hundred'];
	}
	catch (e) {
	}
}

function update_stock_price() {
	ajaxSendPost("ajax_update_stock_price.php", null, update_stock_price_complete);
}
function update_stock_price_complete(data) {
	try {
		eval("var d = " + data + ";");
		stock_price = d['stock_assets'];
	}
	catch (e) {
	}
	update_assets();
}

function update_weather() {
	ajaxSendPost("ajax_update_weather.php", null, update_weather_complete);
}
function update_weather_complete(data) {
	try {
		eval("var d = " + data + ";");
		var cfg_weather = new Array(index_str2, index_str3, index_str4, index_str5, index_str6);
		$('weather').innerHTML = cfg_weather[d['weather']];
		$('weather_img').src = "./images/weather/" + d['weather'] + ".gif";


	}
	catch (e) {
	}
}

function sub_gold_coin(n) { //减金币
	var obj_gold_coin = $("gold_coin");
	obj_gold_coin.innerHTML = number_format(parseInt(obj_gold_coin.innerHTML.replace(/,/g, "")) - n);
}
function add_gold_coin(n) { //加金币
	var obj_gold_coin = $("gold_coin");
	obj_gold_coin.innerHTML = number_format(parseInt(obj_gold_coin.innerHTML.replace(/,/g, "")) + n);
}

var bulletin_id = -1;
var arr_bulletin = null;
var bulletin_first = true;
var bulletin_move = true;
var bulletin_delay_t=1000;
var bulletin_delay;
function update_bulletin() {
	ajaxSendPost("ajax_update_bulletin.php", null, update_bulletin_complete);
}
function update_bulletin_complete(bulletin) {
	if (bulletin) {
		eval("arr_bulletin = " + bulletin + ";");
		if (arr_bulletin) {
			bulletin_delay_t = 	Math.round(1000 * 30 / arr_bulletin.length);
			if (bulletin_first) {
				bulletin_first = false;
				move_bulletin();
			}
		}
		else {
			$('bulletin').innerHTML = index_str11;
		}
	}
	else {
		$('bulletin').innerHTML = index_str11;
	}
}
function move_bulletin() {
	if (!arr_bulletin)
		return;
	
	
	if (!bulletin_move) {
		bulletin_delay = setTimeout(move_bulletin, bulletin_delay_t);
		return;
	}
	
	bulletin_next(1);
	
	bulletin_delay = setTimeout(move_bulletin, bulletin_delay_t);
}
var bulletin_id_temp = 0;
function bulletin_next(i) { 
	if (!arr_bulletin)
		return;
	bulletin_id += i;
	if (i == 1 && bulletin_id >= arr_bulletin.length) {
		bulletin_id = 0;
	}
	if (i == -1 && bulletin_id < 0) {
		bulletin_id = arr_bulletin.length - 1;
	}
	
	str_former = "";
	if(arr_bulletin[bulletin_id]["former"]!=null && arr_bulletin[bulletin_id]["former"]!="" ){
		str_former = " title='"+ arr_bulletin[bulletin_id]["former"] +"' ";
	}
	
	//$('bulletin_txt').innerHTML= bulletin_id+1;
	if (arr_bulletin[bulletin_id]["bulletin_type"] == 2) {
		$('bulletin').innerHTML = '<span '+str_former+' >' + arr_bulletin[bulletin_id]["content"] + '</span>' ;
	}
	else {
		
		// $('bulletin').innerHTML = '<a '+ str_former +' href="javascript:div_page(\'show_bulletin.php?id=' + arr_bulletin[bulletin_id]["id"] + '\', \'公告\', 680, 480)" >' + arr_bulletin[bulletin_id]["content"] + '</a>';
		$('bulletin').innerHTML = '<a '+ str_former +' href="'+arr_bulletin[bulletin_id]["url"]+'" target="_blank">' + arr_bulletin[bulletin_id]["content"] + '</a>';
		
	}
}


function bulletin_up(){ 
	window.clearTimeout(bulletin_delay);
	bulletin_next(1);
	bulletin_delay = setTimeout(move_bulletin, bulletin_delay_t);
}

function bulletin_down(){
	window.clearTimeout(bulletin_delay);
	bulletin_next(-1);
	bulletin_delay = setTimeout(move_bulletin, bulletin_delay_t);
}


var settimes;
function update_secretary() {
	ajaxSendPost("ajax_update_secretary.php", null, update_secretary_complete);
}
function update_secretary_complete(data) {
	clearTimeout(settimes);
	try {
		eval("var d = " + data + ";");
		$('msg_count').innerHTML = d['msg'];
		msgs();
	}
	catch (e) {
	}
}

var i=0;
function msgs()
{
	var msg=document.getElementById('msg');
	if(msg){
		if(i%2==0){
			msg.style.color="#DEF3FF";
		}
		else{
			msg.style.color="#FF9966";
		}
		doing();
	}
	function doing()
	{
		i++;
		settimes=setTimeout("msgs()",800);
	}
}

function charge() {
	var f = document.getElementById("form1");
	if (f.method == "get") {
		window.open(f.action);
		return;
	}
	f.submit();
}

function show_map(area, row, col, ukey, relation_show) {
	main_iframe.src = "./map/area.php?area=" + area + "&row=" + row + "&col=" + col;
}

function get_menu() {
	var d = sendPost("ajax_get_menu.php", null);
	eval("var arr_submenu = " + d + ";");
	for (var i in arr_submenu) {
/*		if(i==2){
			continue;	
		}*/
		var submenu = document.createElement("div");
		submenu.setAttribute("id", "submenu" + i);
		submenu.className = "submenu";
		submenu.style.display = "none";
		submenu.style.zIndex="10";
		submenu.onmouseover = function () {
			window.clearTimeout(i_timeout);
		}
		submenu.onmouseout = function () {
			hide_submenu();
		}

		document.body.appendChild(submenu);
		
		var top = document.createElement("div");
		top.className = "top";
		submenu.appendChild(top);
				
		var middle = document.createElement("div");
		middle.className = "middle";
		submenu.appendChild(middle);
		
		var bottom = document.createElement("div");
		bottom.className = "bottom";
		submenu.appendChild(bottom);
		
		var f = 0;
		for (var j in arr_submenu[i]) {
			if (f != 0) {
				middle.innerHTML += '<div class="separation"></div>';
			}
			middle.innerHTML += '<div class="item" onmouseover="this.className=\'item_hover\';" onmouseout="this.className=\'item\';"><a href="' + arr_submenu[i][j]['link'] + '" target="main_iframe">' + arr_submenu[i][j]['name'] + '</a></div>';
			f++;
		}
	}
}



function get_again_menu() {//重新调用
	var d = sendPost("ajax_get_menu.php", null);
	eval("var arr_submenu = " + d + ";");
	for(var i in arr_submenu){
		if(document.getElementById('submenu'+i)){//判断就是否存在(以下为存在)
			document.body.removeChild(document.getElementById('submenu'+i));
		}
	}
	get_menu();
}

function set_menu_lt() {
	for (var i = 1; i <= 8; i++) {
		arr_menu_lt["menu" + i] = getOffset(document.getElementById("menu" + i));
	}
}



function open_chat() {
	document.getElementById("div_chat").style.visibility = "visible";
	document.getElementById("div_chat").style.height = "350px";
	document.getElementById('btn_expand1').style.display='';
	document.getElementById('btn_expand2').style.display='none';
}
function hide_chat() { //隐藏聊天窗口
	document.getElementById("div_chat").style.visibility = "hidden";
	document.getElementById("div_chat").style.height = "0px";
	document.getElementById('btn_expand1').style.display='none';
	document.getElementById('btn_expand2').style.display='';
	
}

function set_bottom_menu_lt() {
	for (var i = 1; i <= 7; i++) {
		arr_menu_bottom_lt["menu_bottom" + i] = getOffset(document.getElementById("menu_bottom" + i));
	}
}

var get_again_menu_height=new Array();//得到这些高度

function get_bottom_menu(){
	var values = sendPost("ajax_get_bottom_menu.php", null);
	
	eval("var arr_submenu = " + values + ";");
	
	for (var i in arr_submenu) {
		var submenu = document.createElement("div");
		submenu.setAttribute("id", "submenu_bottom" + i);
		submenu.className = "submenu_bottom";
		submenu.style.display = "none";
		submenu.style.zIndex="10";
		submenu.onmouseover = function () {
			window.clearTimeout(i_timeout);
		}
		submenu.onmouseout = function () {
			hide_bottom_submenu();
		}
		document.body.appendChild(submenu);
		
		var top = document.createElement("div");
		top.className = "top";
		submenu.appendChild(top);
				
		var middle = document.createElement("div");
		middle.className = "middle";
		submenu.appendChild(middle);
		
		var bottom = document.createElement("div");
		bottom.className = "bottom";
		submenu.appendChild(bottom);
		
		var f = 0;
		for (var j in arr_submenu[i]) {
			if (f != 0) {
				middle.innerHTML += '<div class="separation"></div>';
			}
			middle.innerHTML += '<div class="item_bottom" onmouseover="this.className=\'item_bottom_hover\';" onmouseout="this.className=\'item_bottom\';"><a href="' + arr_submenu[i][j]['link'] + '" target="main_iframe">' + arr_submenu[i][j]['name'] + '</a></div>';
			f++;
		}
		 get_again_menu_height["submenu_bottom" + i]=parseInt(f)*25+20;
	}
	
}



function hide_bottom_submenu() {
	i_timeout = window.setTimeout(function () {
											
											for(var i=1;i<=8;i++){
												
												if(document.getElementById("submenu_bottom"+i)){
													
													document.getElementById("submenu_bottom"+i).style.display = "none";
												}
											}
											
											}, 100);
}


function add_swap_bottom_img(id) {
	
	var obj = document.getElementById(id);
	arr_menu_bottom_lt[id] = getOffset(obj);
	
	obj.onmouseover = function() {
		window.clearTimeout(i_timeout);
		
		for (var i = 1; i <= 7; i++) {
			if(document.getElementById("submenu_bottom" + i)){
			
				document.getElementById("submenu_bottom" + i).style.display = "none";
			}
		}
		if(document.getElementById("sub"+id)){
			var submenu = document.getElementById("sub"+id);
		//	alert(submenu.offsetWidth);
			submenu.style.display = "";
			var lt = arr_menu_bottom_lt[id];
			//alert(lt[0]);
			submenu.style.top = (lt[1]-get_again_menu_height["sub"+id]) + "px";
			submenu.style.left = (lt[0] + (obj.offsetWidth - submenu.offsetWidth) / 2) + "px";
		}
	};
	obj.onmouseout = function () {
		hide_bottom_submenu();
	};
	var div_swap_img = document.getElementById("div_swap_img");
	if (div_swap_img == null) {
		div_swap_img = document.createElement("div");
		div_swap_img.setAttribute("id", "div_swap_img");
		div_swap_img.style.width = "0px";
		div_swap_img.style.height = "0px";
		div_swap_img.style.overflow = "hidden";
		if (document.body)
			document.body.appendChild(div_swap_img);
	}
	//div_swap_img.innerHTML += "<img src=\"" + img2 + "\">";
}

var flag_anti_indulge = "";
function anti_indulge() {
	ajaxSendPost("ajax_anti_indulge.php", null, alert_anti_indulge);
}
function alert_anti_indulge(hi) {
	if (hi == "ok") {
		return;
	}
	
	setTimeout('anti_indulge()', 60000 * 5);
	
	var arr = hi.split(" ");
	h = parseInt(arr[0]);
	if (h < 3) {
		return;
	}
	
	if (flag_anti_indulge != hi) {
		if (h >= 3) {
			ralert(index_str7, index_str8, "js:goto_anti_indulge("+h+");");
			setTimeout("goto_anti_indulge("+h+");", 5000);
		}
		/*else if (h >= 3) {
			ralert(index_str9, index_str8, "", index_str10, "js:open_anti_indulge();");
		}
		*/
		flag_anti_indulge = hi;
	}
}
