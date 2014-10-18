function $(id) {
	return document.getElementById(id);
}

var type_interval = null;
function type(obj, str, str_func) { //打字函数，字符串以打字的形式输出。
	if (str == "") {
		obj.innerHTML = "";
		return;
	}
	if (type_interval) {
		clearInterval(type_interval);
	}
	var i_typed = 0;
	var matchs = str.match(/(?:&[0-9A-Za-z]+?;)|(?:<.*?>)/g);
	str = str.replace(/(?:&[0-9A-Za-z]+?;)|(?:<.*?>)/g, "~");
	var str_out = "";
	var m = 0;
	type_interval = setInterval(function() {
		i_typed += 1;
		var tmp = str.charAt(i_typed - 1);
		if (tmp == "~") {
			if (matchs != null && matchs[m] != null) {
				str_out += matchs[m];
			}
			else {
				str_out += "~";
			}
			m += 1;
		}
		else {
			str_out += tmp;
		}
		if (i_typed % 2 == 1)
			obj.innerHTML = str_out + '_';
		else
			obj.innerHTML = str_out;
		if (i_typed == str.length) {
			clearInterval(type_interval);
			type_interval = null;
			obj.innerHTML = str_out;
			if (str_func) {
				try {
					eval(str_func);
				}
				catch (e) {}
			}
		}
	}
	, 70);
}
var parentID=null;
var parentStr='';
var progressDay=0;
var progressHour=0;
var progressMinute=0;
var progressSec=0;

function isObj(obj){
	return typeof obj == 'object' ;
}

//12288 智能abc v1空格ascii码
var special_str=new Array("12288"); 

function trim(str) {
	str = str.replace(/(^\s*)|(\s*$)/g, "");

	for(i=0;i<special_str.length;i++){
		re=eval("/"+ String.fromCharCode(special_str[i])+"/g");
		str=str.replace(re,"");
	}

	return str;
}

function getEvent() {
	if (window.event)
		return window.event;
	c = getEvent.caller;
	while (c != null) {
		if (c.arguments[0]) {
			if (c.arguments[0].toString().indexOf("Event") != -1)
				return c.arguments[0];
		}
		c = c.caller;
	}
	return null;
}

function getOffset(obj) { //获取对象的绝对位置，返回数组 left 与 top
	var l = 0, t = 0;
	do {
		l += obj.offsetLeft;
		t += obj.offsetTop;
	} while (obj = obj.offsetParent);
	return new Array(l, t);
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

function strlen(str) {
	var len = 0;
	for (var i = 0; i < str.length; i++) {
		if (str.charCodeAt(i) <= 255)
			len += 1;
		else
			len += 2;
	}
	return len;
}

function number_format(num) {
	if (isNaN(num) || !num) {
		return 0;
	}
	var negative = false;
	if (num < 0) {
		num = Math.abs(num);
		negative = true;
	}
	var str = "";
	var arr_str = (num.toString()).split(".");
	var len = arr_str[0].length;
	for (var i = 0; i < len; i++) {
		if (i != 0 && i % 3 == 0)
			str = "," + str;
		str = arr_str[0].charAt(len - i - 1) + str;
	}
	if (arr_str[1])
		str =  str + "." + arr_str[1];
	
	if (negative)
		return '-' + str;
	else
		return str;
}

function get_browser() {
	var matchs;
	if (matchs = navigator.userAgent.match(/MSIE (\d+(?:\.\d+){0,})/)) {
		this.name = "MSIE";
		this.version = matchs[1];
	}
	else if (matchs = navigator.userAgent.match(/Firefox\/(\d+(?:\.\d+){0,})/)) {
		this.name = "Firefox";
		this.version = matchs[1];
	}
	else if (matchs = navigator.userAgent.match(/Version\/(\d+(?:\.\d+){0,}) Safari/)) {
		this.name = "Safari";
		this.version = matchs[1];
	}
	else if (matchs = navigator.userAgent.match(/Opera\/(\d+(?:\.\d+){0,})/)) {
		this.name = "Opera";
		this.version = matchs[1];
	}
	else if (matchs = navigator.userAgent.match(/Chrome\/(\d+(?:\.\d+){0,})/)) {
		this.name = "Chrome";
		this.version = matchs[1];
	}
	else {
		this.name = "unknown";
		this.version = "unknown";
	}
	return this;
}

function check_number(iMin, iMax, callback) { //用于input text的onkeyup事件，把文本域的内容变成min到max之间的整数
	var e = getEvent();
	if (e.keyCode >= 37 && e.keyCode <= 40) { //如果按的是上下左右
		return;
	}
	if (e.keyCode == 16 || e.keyCode == 17 ||  e.keyCode == 18 ||  e.keyCode == 20 || e.keyCode == 93) { //shift ctrl alt CapsLk 右键菜单 
		return;
	}
	if (e.keyCode == 8 || e.keyCode == 46) { //backspace or delete
		if (callback) {
			eval(callback);
		}
		return;
	}
	var obj = e.srcElement;
	var number = obj.value;
	number = number.replace(/\D.*$/, "");
	number = number.replace(/^0+(\d)/, "$1");
	if (isNaN(number)) {
		number = iMin;
	}
	if (number <= 0) {
		number = iMin;
	}
	if (number > iMax) {
		number = iMax;
	}
	if (obj.value != number) {
		obj.value = number;
	}
	
	if (callback) {
		eval(callback);
	}
}

//打乱数组
function shuffle(a) {
	var l = a.length;
	var b = new Array();
	for (var i = 0; i < l; i++) {
		b[i] = a.splice(Math.floor(a.length * Math.random()), 1);
	}
	return b;
}

//指定唯一的延时运行js代码 (code代码,时间秒,唯一标识) 
function set_delay(func,_delay,_id){
	try{
		window.clearTimeout( eval( '_DELAY'+_id ) );
	}catch(e1){	;}
	
	eval('_DELAY'+_id + ' = window.setTimeout(func,_delay*1000) ;')
}



function findPosX(obj) {
	var curleft = 0;
	if (obj.offsetParent) { 
	   while (obj.offsetParent) {
		curleft += obj.offsetLeft;
		obj = obj.offsetParent;       
	   }
	} else if (obj.x) curleft += obj.x;
	return curleft;
}

function findPosY(obj) {
	var curtop = 0;
	if (obj.offsetParent) {
	   while (obj.offsetParent) {
		curtop += obj.offsetTop;
		obj = obj.offsetParent;
	   }
	} else if (obj.y) curtop += obj.y;
	return curtop;
}
function getPos(id){
	return {x:findPosX(document.getElementById(id)),y:findPosY(document.getElementById(id))};
}


//弹出效果框
function show_flash_msg(msg) {
	var cWidth, cHeight, sWidth, sHeight, sLeft, sTop;
	var win_w = 450, win_h = 190;
	var pos = getPos("main_iframe");//main_iframe坐标
	var div_msg = document.createElement("div");
	div_msg.setAttribute("id", "div_msg");
	div_msg.style.position = "absolute";
	div_msg.style.zIndex = 1000;
	div_msg.style.width = win_w + "px";
	div_msg.style.height = win_h + "px";
	div_msg.style.top = pos.y+140+"px";
	div_msg.style.left = pos.x+180+"px";
	div_msg.style.fontSize = "16px";
	div_msg.style.fontFamily = "微软雅黑";
	div_msg.style.color = "#F30"; //#CF9
	div_msg.style.lineHeight = "30px";
	div_msg.style.background = "url(images/addition_bg.gif)";
	div_msg.style.textAlign = "center";
	//div_msg.style.border = "dashed #66C 2px";
	//div_msg.style.padding = "6px";
	//div_msg.style.overflow = "auto";
	div_msg.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=0)"; //IE下有效
	div_msg.style.opacity = 0; //Firefox、Opera下有效
	
	var assistant_photo = get_cookie("assistant_photo");
	
	var div = document.createElement("div");
	// div.innerHTML='<div style="height:15px;"></div><div style="overflow-y:auto;width:425px;height:150px;margin-left:5px;">'+msg+'</div>';
	// div.innerHTML='<div style="height:15px;"></div><div style="float:left; width:110px; height:157px;margin-left:10px;"><table width="110" height="157"><tr><td width="17"></td></tr><tr><td height="132" align="center" valign="middle"><img src="'+assistant_photo+'" width="100" height="132" /></td></tr><tr><td width="8"></td></tr></table></div><div style="overflow-y:auto; overflow-x:hidden;width:315px;height:157px;margin-left:5px; float:left; vertical-align:middle"><table width="310" height="150"><tr><td height="150">'+msg+'</td></tr></table></div>';
	div.innerHTML='<div style="width:420px;; padding-left:5px; padding-top:8px;"><table width="420" height="157"><tr><td><table><tr><td height="132" align="center" valign="middle"><img src="'+assistant_photo+'" width="100" height="132" /></td></tr></table></td><td><div style="overflow-y:auto; overflow-x:hidden;width:300px;height:157px;float:left; vertical-align:middle"><table width="300" height="157"><tr><td height="150" align="left">'+msg+'</td></tr></table></div></td></tr></table></div>';
	// div.style.textShadow = "0px 0px 10px #000";
	//div.style.filter = "glow(Color=black,Strength=3)";
	
	document.body.appendChild(div_msg);
	div_msg.appendChild(div);
	var op = 0;
	var step = 15;
	var f = true;
	var i_flash_msg = setInterval(
							function() {
								op += step;
								if (op >= 350) {
									step = -step;
								}
								div_msg.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=" + op + ")";
								div_msg.style.opacity = op / 100;
								if (op <= 0) {
									document.body.removeChild(div_msg);
									clearInterval(i_flash_msg);
								}
							}
						    , 50);
}


function get_cookie(sName) {
	// cookies are separated by semicolons
	var aCookie = document.cookie.split("; ");
	for (var i=0; i < aCookie.length; i++) {
	// a name/value pair (a crumb) is separated by an equal sign
		var aCrumb = aCookie[i].split("=");
		if (sName == aCrumb[0])
			return unescape(aCrumb[1]);
	}
	// a cookie with the requested name does not exist
	return null;
}

function strtr(str, arr) {
	for (var k in arr) {
		str = str.replace(k, arr[k]);
	}
	return str;
}