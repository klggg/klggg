// JavaScript Document
function ajaxInit() {
	if(window.XMLHttpRequest) { //Mozilla, Opera, ...
		ajaxHttpRequest = new XMLHttpRequest();
		if(ajaxHttpRequest.overrideMimeType) {
			ajaxHttpRequest.overrideMimeType("text/xml");
		}
	}
	else if(window.ActiveXObject) { //IE
		try{
			ajaxHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e) {
			try{
				ajaxHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e) {
			}
		}
	}
	if(!ajaxHttpRequest) {
		alert("不能创建XMLHttpRequest对象实例");
		return false;
	}
	return ajaxHttpRequest;
}

function ajaxSendPost(url, values, handle_result) {
	var ajaxHttpRequest = ajaxInit();
	if (!ajaxHttpRequest)
		return;
	ajaxHttpRequest.onreadystatechange = function () {
		if(ajaxHttpRequest.readyState == 4) {
			if(ajaxHttpRequest.status == 200) {
				if (handle_result)
					handle_result(ajaxHttpRequest.responseText);
			}
			else {
				//alert("出现处理异常,请重试");
			}
		}
	};
	ajaxHttpRequest.open("POST", url, true);
	ajaxHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajaxHttpRequest.send(values);
}

function ajaxSendGet(url, handle_result) {
	var ajaxHttpRequest = ajaxInit();
	if (!ajaxHttpRequest)
		return;
	ajaxHttpRequest.onreadystatechange = function () {
		if(ajaxHttpRequest.readyState == 4) {
			if(ajaxHttpRequest.status == 200) {
				if (handle_result)
					handle_result(ajaxHttpRequest.responseText);
			}
			else {
				//alert("出现处理异常,请重试");
			}
		}
	};
	ajaxHttpRequest.open("GET", url, true);
	ajaxHttpRequest.send(null);
}

function sendGet(url) {
	var ajaxHttpRequest = ajaxInit();
	if (!ajaxHttpRequest)
		return;
	try {
		ajaxHttpRequest.open("GET", url, false);
		ajaxHttpRequest.setRequestHeader("Cache-Control", "no-cache");
		ajaxHttpRequest.send(null);
		return ajaxHttpRequest.responseText;
	} catch (error) {
		//alert("网络连接超时");
		return;
	}
}

function sendPost(url, values) {
	var ajaxHttpRequest = ajaxInit();
	if (!ajaxHttpRequest)
		return;
	try {
		ajaxHttpRequest.open("POST", url, false);
		ajaxHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajaxHttpRequest.send(values);
		return ajaxHttpRequest.responseText;
	} catch (error) {
		//alert("网络连接超时");
		return;
	}
}

function show_loading() {
	var ajax_loading = document.getElementById("ajax_loading");
	if (ajax_loading == null) {
		var ajax_loading = document.createElement("div");
		ajax_loading.setAttribute("id", "ajax_loading");
		ajax_loading.style.position = "absolute";
		ajax_loading.style.zIndex = 99;
		ajax_loading.style.width = "208px";
		ajax_loading.style.height = "13px";
		ajax_loading.innerHTML = '<img src="../images/loading.gif" align="absmiddle">';
		document.body.appendChild(ajax_loading);
	}
	ajax_loading.style.left = ((document.documentElement.clientWidth - 208) / 2 +  document.documentElement.scrollLeft) + "px";
	ajax_loading.style.top = ((document.documentElement.clientHeight - 13) / 2 +  document.documentElement.scrollTop) + "px";
	ajax_loading.style.display = "";
}

function hide_loading() {
	var ajax_loading = document.getElementById("ajax_loading");
	if (ajax_loading)
		ajax_loading.style.display = "none";
}