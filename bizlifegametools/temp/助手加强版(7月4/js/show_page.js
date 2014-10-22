function div_page(url, title, win_w, win_h) {
	//alert("asdasd");return;
	var i;
	
	var cWidth, cHeight, sWidth, sHeight, sLeft, sTop;
	
	var auto = false;
	
	if (win_w == null || win_h == null) {
		win_w = 200;
		win_h = 150;
		auto = true;
	}
	if (!title)
		title = "提示";
	
	div_page_close();
	
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
	//background.style.background = "#333333";
	//background.style.background = "url(images/msgbg.jpg)";
	//background.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=50)"; //IE下有效
	//background.style.opacity = 0.5; //Firefox、Opera下有效
	background.style.position = "absolute";
	background.style.zIndex = 999;
	background.style.top = "0px";
	background.style.left = "0px";
	background.style.width = sWidth + "px";
	background.style.height = sHeight + "px";
	document.body.appendChild(background);
	background.onclick = function () {
		div_page_close();
	}
	
	var div_page = document.createElement("div");
	div_page.setAttribute("id", "div_page");
	div_page.style.position = "absolute";
	div_page.style.zIndex = 1000;
	div_page.style.width = win_w + "px";
	div_page.style.height = win_h + "px";
	div_page.style.top = (sTop + (cHeight - win_h) / 2) + "px";
	div_page.style.left = (sLeft + (cWidth - win_w) / 2) + "px";
	
	div_page.innerHTML = '<table width="' + win_w + '" border="0" align="center" cellpadding="0" cellspacing="0" id="div_page_table"><tr><td width="10" height="32"><img src="images/tips2_top1.gif" width="10" height="32" /></td><td background="images/tips2_top2.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="20" valign="bottom"><img src="images/icon_ts.gif" width="16" height="16" /></td><td valign="bottom" class="font-white4" id="div_page_title">' + title + '</td><td width="17" align="right" valign="bottom" class="font-white4"><a href="javascript:div_page_close();"><img src="images/icon_close.gif" width="17" height="17" border="0" /></a></td></tr></table></td><td width="10" height="32"><img src="images/tips2_top3.gif" width="10" height="32" /></td></tr><tr><td background="images/tips2_center1.gif"></td><td class="tips2_bgcolor"><iframe src="' + url + '" width="' + (win_w - 20) + '" height="' + (win_h - 42) +'" frameborder="0" scrolling="no" id="div_page_iframe"></iframe></td><td background="images/tips2_center2.gif"></td></tr><tr><td width="10" height="10"><img src="images/tips2_bottom1.gif" width="10" height="10" /></td><td background="images/tips2_bottom2.gif"></td><td width="10" height="10"><img src="images/tips2_bottom3.gif" width="10" height="10" /></td></tr></table>';
	
	document.body.appendChild(div_page);
	
	if (auto) {
	var div_page_iframe = document.getElementById("div_page_iframe");
		if (div_page_iframe.attachEvent) {
			div_page_iframe.attachEvent("onload", auto_set);
		}
		else {
			div_page_iframe.addEventListener("load", auto_set, false);
		}
	}
}

function set_title(title)
{
	var div_page_title = document.getElementById('div_page_title');	
	div_page_title.innerHTML = title;
}

function auto_set() {
	var iframe_doc = document.getElementById("div_page_iframe").contentWindow.document;
	var w, h;
	if (iframe_doc.compatMode == "BackCompat") {
		w = iframe_doc.body.scrollWidth;
		h = iframe_doc.body.scrollHeight;
	}
	else {
		w = iframe_doc.documentElement.scrollWidth;
		h = iframe_doc.documentElement.scrollHeight;
	}
	var div_page_iframe = document.getElementById("div_page_iframe");
	div_page_iframe.width = w;
	div_page_iframe.height = h;
	
	
	var cWidth, cHeight, sWidth, sHeight, sLeft, sTop;
	
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
	
	var div_page = document.getElementById("div_page");
	div_page.style.width = (w + 20) + "px";
	div_page.style.height = (h + 42) + "px";
	
	div_page.style.left = (sLeft + (cWidth - (w + 20)) / 2) + "px";
	div_page.style.top = (sTop + (cHeight - (h + 42)) / 2) + "px";
}

function div_page_close() {
	if (document.getElementById("background") != null) {
		if (document.getElementById("iframe_bg") != null)
			document.body.removeChild(document.getElementById("iframe_bg"));
		document.body.removeChild(document.getElementById("background"));
		document.body.removeChild(document.getElementById("div_page"));
	}
}

function page_close_and_alert() {
	div_page_close();
	
	var arg = page_close_and_alert.arguments;
	var str_arg = "";
	for (i = 0; i < arg.length; i++) {
		str_arg += ',"' + arg[i] + '"';
	}
	if (str_arg != "")
		str_arg = str_arg.substr(1);
	
	eval("ralert(" + str_arg + ")");
}