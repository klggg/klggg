// JS下拉框
var id_dropList = 0;
function DropList(arr, obj_id, width, def, callback, up , op_height) {
	if (!arr || !obj_id)
		return;
	if (!width)
		width = 100;
		
	if(!op_height){
		op_height = 250;
	}
	
	if (callback == null)
		callback = "";
	up = up ? true : false;
	
	this.options_height = 0;
	
	this.obj_id = obj_id;
	
	this.div_show = null;
	
	var self = this;
	
	this.width = width;
	
	this.up = up;
	
	this.div_select = document.createElement("div");
	this.div_select.style.width = width + "px";
	this.div_select.style.height = "22px";
	this.div_select.style.cursor = "pointer";
	this.div_select.style.overflow = "hidden";
	this.div_select.onclick = function() {
		if (self.options.style.display == "none") {
			for (var i = 0; i < id_dropList; i++) {
				document.getElementById("droplist_options" + i).style.display = "none";
			}
			self.options.style.display = "";
		}
		else {
			self.options.style.display = "none";
		}
	}
	
	this.div_select.innerHTML = '<div style="width:5px; height:22px; background:url(../images/select_1.gif); float:left;"></div>';
	this.div_select.innerHTML += '<div style="width:' + (width - 5 - 22) + 'px; height:13px; background:url(../images/select_2.gif); color:#FFF; padding:5px 0px 4px 0px; float:left; text-align:left; font-weight:normal; font-size:13px; overflow:hidden;" id="div_showvalue' + this.obj_id + '">' + (def == null ? "请选择" : arr[def]) + '</div>';
	this.div_select.innerHTML += '<div style="width:22px; height:22px; background:url(../images/select_3.gif); float:right;"></div>';
	
	this.options = document.createElement("div");
	this.options.style.background = "#3cb5fc";
	this.options.style.color = "#FFF";
	this.options.style.width = "auto";
	this.options.style.height = "auto";
	this.options.style.overflow = "auto";
	this.options.style.textAlign = "left";
	this.options.style.position = "absolute";
	this.options.style.zIndex = "8";
	this.options.style.border = "1px solid #017bc2";
	if (this.up) {
		this.options.style.borderBottom = "0px";
	}
	else {
		this.options.style.borderTop = "0px";
	}
	this.options.style.display = "none";
	this.options.setAttribute("id", "droplist_options" + id_dropList);
	id_dropList += 1;
	
	this.hidden = document.createElement("input");
	this.hidden.setAttribute("type", "hidden");
	this.hidden.setAttribute("name", obj_id);
	this.hidden.setAttribute("id", obj_id);
	if (def != null) {
		this.hidden.setAttribute("value", def);
		this.hidden.value = def;
	}
	
	this.init = function(arr_data) {
		this.options.innerHTML = "";
		var l = 0;
		for (var k in arr_data) {
			l += 1;
			var option = document.createElement("div");
			option.style.height = "13px";
			option.style.padding = "3px";
			option.style.cursor = "pointer";
			option.style.fontSize = "13px";
			option.style.color = "#FFF";
			option.style.fontWeight = "normal";
			option.style.overflow = "hidden";
			option.innerHTML = arr_data[k];
			option.setAttribute("title", k);
			option.onclick = function() {
				self.div_show.innerHTML = this.innerHTML;
				self.hidden.value = this.title;
				self.options.style.display = "none";
				if (callback) {
					try {
						eval(callback);
					}
					catch(e) {
					}
				}
			}
			option.onmouseover = function() {
				this.style.background = "#99CC33";
			}
			option.onmouseout = function() {
				this.style.background = "";
			}
			this.options.appendChild(option);
		}
		this.options_height = 19 * l;
		if (this.options_height > op_height)
			this.options_height = op_height;
		this.options.style.height = this.options_height + "px";
	}
	
	this.init(arr);
	
	this.left = 0;
	this.top = 0;
	
	this.display = function(obj) {
		obj.appendChild(this.div_select);
		obj.appendChild(this.hidden);
		this.div_show = document.getElementById('div_showvalue' + this.obj_id);
		document.body.appendChild(this.options);
		var lt = this.getOffset();
		this.left = lt[0];
		this.top = lt[1];
		this.options.style.width = (this.width - 6) + "px";
		this.options.style.left = (this.left + 2) + "px";
		if (this.up) {
			this.options.style.top = (this.top - this.options_height - 1) + "px";
		}
		else {
			this.options.style.top = (this.top + this.div_select.offsetHeight) + "px";
		}
	}
	
	this.getOffset = function() { //获取对象的绝对位置，返回数组 left 与 top
		var obj = this.div_select;
		var l = 0, t = 0;
		do {
			l += obj.offsetLeft;
			t += obj.offsetTop;
		} while (obj = obj.offsetParent);
		return new Array(l, t);
	}
	
	this.reInit = function(arr_data, def) {
		if (def != null) {
			this.hidden.value = def;
			document.getElementById("div_showvalue" + this.obj_id).innerHTML = arr_data[def];
		}
		this.init(arr_data);
		if (this.up) {
			this.options.style.top = (this.top - this.options_height - 1) + "px";
		}
		else {
			this.options.style.top = (this.top + this.div_select.offsetHeight) + "px";
		}
	}
}
/*
例子
var a = new Array();
a["world"] = '世界';
a["club"] = '商会';

var dl = new DropList(a, "chat_target", 110, "world", "", 1);

window.onload = function() {
	dl.display(document.getElementById("cselect"));
}


<div id="cselect"></div>
*/