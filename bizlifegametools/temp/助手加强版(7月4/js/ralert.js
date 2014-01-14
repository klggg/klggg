function ralert(msg) {
	var arg = ralert.arguments;
	var i;
	var btn_links = new Array();
	var j = 0;
	for (i = 1; i < arg.length; i += 2) {
		if (!arg[i]) {
			break;
		}
		btn_links[j] = new Array(arg[i], arg[i + 1]);
		j++;
	}
	
	var cWidth, cHeight, sWidth, sHeight, sLeft, sTop;
	var win_w = 516, win_h = 194;
	
	ralert_close();
	
	//获取网页客户区的宽高、滚动条宽高度
	if (document.compatMode == "BackCompat") {
		cWidth = document.body.clientWidth;
		cHeight = document.body.clientHeight;
		sWidth = document.body.scrollWidth > document.body.clientWidth ? document.body.scrollWidth : document.body.clientWidth;
		sHeight = document.body.scrollHeight > document.body.clientHeight ? document.body.scrollHeight : document.body.clientHeight;
		sLeft = document.body.scrollLeft;
		sTop = document.body.scrollTop;
	}
	else { //document.compatMode == "CSS1Compat"
		cWidth = document.documentElement.clientWidth;
		cHeight = document.documentElement.clientHeight;
		sWidth = document.documentElement.scrollWidth > document.documentElement.clientWidth ? document.documentElement.scrollWidth : document.documentElement.clientWidth;
		sHeight = document.documentElement.scrollHeight > document.documentElement.clientHeight ? document.documentElement.scrollHeight : document.documentElement.clientHeight;
		sLeft = document.documentElement.scrollLeft == 0 ? document.body.scrollLeft : document.documentElement.scrollLeft;
		sTop = document.documentElement.scrollTop == 0 ? document.body.scrollTop : document.documentElement.scrollTop;
	}
	
	var iframe_bg = null;
	if (navigator.userAgent.indexOf("MSIE 6.0") != -1) {
		iframe_bg = document.createElement("iframe");
		iframe_bg.setAttribute("id", "iframe_bg");
		iframe_bg.setAttribute("name", "iframe_bg");
		iframe_bg.style.position = "absolute";
		iframe_bg.style.zIndex = 998;
		iframe_bg.style.top = "0px";
		iframe_bg.style.left = "0px";
		iframe_bg.style.width = sWidth + "px";
		iframe_bg.style.height = sHeight + "px";
		iframe_bg.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=0)";
		document.body.appendChild(iframe_bg);
	}
	
	//背景层
	var background = document.createElement("div");
	background.setAttribute("id", "background");
	background.style.background = "#FFF";
	background.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=0)"; //IE下有效
	background.style.opacity = 0; //Firefox、Opera下有效
	background.style.position = "absolute";
	background.style.zIndex = 999;
	background.style.top = "0px";
	background.style.left = "0px";
	background.style.width = sWidth + "px";
	background.style.height = sHeight + "px";
	document.body.appendChild(background);
	
	var div_msg = document.createElement("div");
	div_msg.setAttribute("id", "div_msg");
	div_msg.style.position = "absolute";
	div_msg.style.zIndex = 1000;
	div_msg.style.width = win_w + "px";
	div_msg.style.height = win_h + "px";
	div_msg.style.top = (sTop + (cHeight - win_h) / 2) + "px";
	div_msg.style.left = (sLeft + (cWidth - win_w) / 2) + "px";
	
	var assistant_photo = get_cookie("assistant_photo");
	if (assistant_photo == null){
		if(sendPost){
			var r=sendPost("../ajax_update_secretary.php","action=assistant_photo");
			if(r!=''){
				assistant_photo = '../' + r;
			}
		}else{
			assistant_photo = "../images/head_secretary.gif";
		}
	}
	else{
		assistant_photo = '../' + assistant_photo;
	}
	
	var close_image_onclick = "ralert_close();";
	var str_btn_links = "";
	for (i = 0; i < btn_links.length; i++) {
		var tmp = "ralert_close();";
		
		if (btn_links[i][0] == "close_image") {
			if (btn_links[i][1].indexOf("js:") == 0) {
				tmp += btn_links[i][1].substr(3);
			}
			else {
				tmp += "window.location.href='"+btn_links[i][1]+"'";
			}
			close_image_onclick = tmp;
			continue;
		}
		
		if (btn_links[i][1]) {
			if (btn_links[i][1].indexOf("js:") == 0) {
				tmp += btn_links[i][1].substr(3);
			}
			else {
				tmp += "window.location.href='"+btn_links[i][1]+"'";
			}
		}
		str_btn_links += '<input type="button" class="button_f'+btn_links[i][0].length+'" value="'+btn_links[i][0]+'" onclick="'+tmp+'" style="background-color:#B9E5FF" />&nbsp; ';
	}
	
	div_msg.innerHTML = '<table width="517" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="6" height="6"><img src="../images/tips2_top1.gif" width="10" height="32" /></td><td background="../images/tips2_top2.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="20" height="20" valign="bottom"><img src="../images/icon_ts.gif" width="16" height="16" /></td><td valign="bottom" class="font-white4">秘书提示</td><td width="17" align="right" valign="bottom" class="font-white4"><img src="../images/icon_close.gif" width="17" height="17" border="0" style="cursor:pointer;" onclick="' + close_image_onclick + '" /></td></tr></table></td><td width="6"><img src="../images/tips2_top3.gif" width="10" height="32" /></td></tr><tr><td background="../images/tips2_center1.gif"></td><td class="tips2_bgcolor"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td width="110" height="8"></td><td></td></tr><tr><td height="130"><table width="110" height="142" border="0" cellpadding="0" cellspacing="0"><tr><td align="center" valign="middle" background="../images/head_bg1.gif"><img src="'+assistant_photo+'" width="100" height="132" /></td></tr></table></td><td ><table width="92%" border="0" align="right" cellpadding="0" cellspacing="0"><tr><td height="110"><table width="372" border="0" cellpadding="0" cellspacing="0" class="font-center_text"><tr><td class="tips2_text" valign="top">'+msg+'</td></tr></table></td></tr><tr><td height="30" style="padding-left:0px;">'+str_btn_links+'</td></tr></table></td></tr></table></td><td background="../images/tips2_center2.gif">&nbsp;</td></tr><tr><td><img src="../images/tips2_bottom1.gif" width="10" height="10" /></td><td background="../images/tips2_bottom2.gif"></td><td><img src="../images/tips2_bottom3.gif" width="10" height="10" /></td></tr></table>';
	
	document.body.appendChild(div_msg);
}

function ralert_close() {
	if (document.getElementById("background") != null) {
		if (document.getElementById("iframe_bg") != null)
			document.body.removeChild(document.getElementById("iframe_bg"));
		document.body.removeChild(document.getElementById("background"));
		document.body.removeChild(document.getElementById("div_msg"));
	}
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