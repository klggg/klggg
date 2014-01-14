//@version    $Id: $

//由秒转到成时间 来自savefarmer.cn 代码
var Tools	 = {};

//由秒转换成 00:00:00 格式
Tools.culTime = function(nSeconds){
        var nTotal = nSeconds - 1;
        
        var str = "";
        if (nSeconds <= 0) {
            str = "-";
        } else {
            var days = Math.floor(nSeconds / (24 * 60 * 60));
            nSeconds = nSeconds - days * 24 * 60 * 60;
            var hours = Math.floor(nSeconds / (60 * 60));
            nSeconds = nSeconds - hours * 60 * 60;
            var munites = Math.floor(nSeconds / 60);
            seconds = nSeconds - munites * 60;
            if (days > 0) 
                str = str + days + "天";
            if (hours > 0 || str != "") {
                if (hours < 10) {
                    hours = "0" + hours;
                }
                str = str + hours + ":";
            } else {
                str = str + "00:";
            }
            
            if (munites > 0 || str != "") {
                if (munites < 10) {
                    munites = "0" + munites;
                }
                str = str + munites + ":";
            } else {
                str = str + "00:";
            }
            
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            str = str + seconds;
        }
        return str;
    };


//由秒转换成方便阅读格式
Tools.seconds2timestr = function(seconds){
	var d = Math.floor(seconds / 86400);
	var h = Math.floor(seconds % 86400 / 3600);
	var m = Math.floor(seconds % 3600 / 60);
	var s = Math.ceil(seconds % 60);
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
};

//一个把时间戳转成日期
Tools.getLocTime = function(nS){
	return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
};

//如果客户端电脑时间所在的时间不为东八区且程序没做修改的情况下则还原到原始日期时会相差几个小时
//日期时间转换为时间戳
Tools.stringToTime = function(str){

	var new_str = str.replace(/:/g,'-');
	new_str = new_str.replace(/ /g,'-');
	var arr = new_str.split("-");

	var datum = new Date(Date.UTC(arr[0],arr[1]-1,arr[2],arr[3]-8,arr[4],arr[5]));
	return (datum.getTime()/1000);

};


/*
	时间累加
	strInterval 类型
	NumDay 加多少时间
	dtDate 基数
*/
Tools.DateAdd = function(strInterval,  NumDay,  dtDate){

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

};

//把二进制文件转换成字符串
Tools.ByteToStr = function(p){
	 var xmldom = new ActiveXObject("Microsoft.XMLDOM");
	 xmldom.async = false
	 xmldom.loadXML('<?xml version="1.0"?><root/>');
	 var tPic = xmldom.createElement("pic")
	 tPic.dataType = 'bin.hex'
	 tPic.nodeTypedValue = p
	 xmldom.documentElement.appendChild(tPic);
	 return(String(tPic.text))
}


//取得当前路径
Tools.getURI = function(){
	var url = window.location.toString();
	url = decodeURI(url);
	var uri = url.substring(8, url.lastIndexOf("/") + 1);
	return uri;
};

Tools.test = function(){
	var userPath = this.getURI();
	return userPath;
};

//取得XML记录
Tools.getConfig = function(path, fct){
	var xmlDoc;
	try {
		if (navigator.userAgent.indexOf("MSIE") > 0) {
			// code for IE
			var ActiveX = new Array("MSXML2.DOMDocument.5.0", "MSXML2.DOMDocument.4.0", "MSXML2.DOMDocument.3.0", "MSXML2.DOMDocument", "Microsoft.XMLDOM", "MSXML.DOMDocument");
			for (var i = 0; i < ActiveX.length; i++) {
				try {
					xmlDoc = new ActiveXObject(ActiveX[i]);
				} catch (e) {
				}
			}
			xmlDoc.async = false;
			xmlDoc.load(path);
		} else if (document.implementation.createDocument) {
			// code for Firefox, Mozilla, Opera, etc.
			xmlDoc = document.implementation.createDocument("", "", null);
			xmlDoc.async = false;
			xmlDoc.load(path);
		}
	} catch (error) {
		//alert(error);
	} finally {
		return fct(xmlDoc);
	}
};

//保存配置文件
//string content  内容
//fileName 保存到哪个文件
Tools.saveConfig = function(content, fileName){
	//为每个用户建立一个专有文件夹
	var userPath = this.getURI();
	//IE浏览器
	if (navigator.userAgent.indexOf("MSIE") > 0) {
		var fso, f;
		fso = new ActiveXObject("Scripting.FileSystemObject");
		if (!fso.FolderExists(userPath)) {
			fso.CreateFolder(userPath);
		}

		var userConfig = fso.BuildPath(userPath, fileName);
		f = fso.CreateTextFile(userConfig, true);
		f.Write(content);
		f.Close();
	} else if (navigator.userAgent.indexOf("Firefox") > 0) {
		netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
		
		var file = Components.classes["@mozilla.org/file/local;1"].createInstance(Components.interfaces.nsILocalFile);
//alert(fileName);
//alert(userPath.replace(/\//gi, "\\") + "\\" + fileName);
//return;
		file.initWithPath(userPath.replace(/\//gi, "\\") + "\\" + fileName);

		if (file.exists() == false) {
			//alert( "Creating file... " );
			file.create(Components.interfaces.nsIFile.NORMAL_FILE_TYPE, 420);
		}
		var outputStream = Components.classes["@mozilla.org/network/file-output-stream;1"].createInstance(Components.interfaces.nsIFileOutputStream);
		outputStream.init(file, 0x04 | 0x08 | 0x20, 420, 0);
		
		var converter = Components.classes["@mozilla.org/intl/scriptableunicodeconverter"].createInstance(Components.interfaces.nsIScriptableUnicodeConverter);
		converter.charset = 'UTF-8';
		var xmlDoc = document.implementation.createDocument("", "", null);
		var convSource = converter.ConvertFromUnicode(content);
		var result = outputStream.write(convSource, convSource.length);
		outputStream.close();
	}
	return true;
};


//2010-6-6 得到 checkbox 选中的记录
//返回数组
Tools.getCheckeds = function(checkedObj){

	var tmp_val	= 0;
	var select_staff_array = Array();
//	$("#staff_skill_list_form  input:checked[name$='select_staff_skill_array']").each(function() {
	$(checkedObj).each(function() {

		tmp_val	=  $(this).val();
				select_staff_array.push(tmp_val);
	});

	return userPath;
};

//进行 全选 反选 清空
Tools.setCheckbox = function(main_form,type){
	for(var	i=0;i<main_form.elements.length;i++)
	{
		if(main_form.elements[i].type=="checkbox" && main_form.elements[i].disabled=="")
		{
			if("all" == type)
			{
				if(!main_form.elements[i].checked)
				{
					main_form.elements[i].checked = true;
				}
			}
			else if("no" == type)
			{
				main_form.elements[i].checked = false;
			}
			else
			{
				main_form.elements[i].checked = !main_form.elements[i].checked;

			}

		}
	}
};


//返回指定范围内的随机数 
Tools.randGet = function (begin,end){
	end++;
	return Math.floor(Math.random()*(end-begin))+begin;
};


//向 select 控件设置数据
//by 清风无痕
Tools.setItemsToSelect = function (objSelectid, arr_data){
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
};


//格式化数字
Tools.numberFormat = function (num){

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


};

//设置命名空间
Tools.initNameSpace = function (router){
	
	var space = router.split('.');
	var p = '';
	for(var i in space) {
		
		if(0==p.length)
			p = space[i];
		else
			p = p+'.'+space[i];

		eval("if ((typeof("+p+")) == 'undefined') "+p+" = {};");
	}
}

Tools.strtr = function (str, arr){
	for (var k in arr) {
		str = str.replace(k, arr[k]);
	}
	return str;
}


/**
 * 复制代码，支持IE/Firefox/NS
 * 2010-12-9 14:23
 */
Tools.copyToClipboard = function(txt){

	if (window.clipboardData) {
		window.clipboardData.clearData();
		window.clipboardData.setData("Text", txt);
	} else if (navigator.userAgent.indexOf("Opera") != -1) {
		window.location = txt;
	} else if (window.netscape) {
		try {
			netscape.security.PrivilegeManager
					.enablePrivilege("UniversalXPConnect");
		} catch (e) {
			alert("你使用的FireFox浏览器,复制功能被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车。\n然后将“signed.applets.codebase_principal_support”双击，设置为“true”");
			return;
		}
		var clip = Components.classes['@mozilla.org/widget/clipboard;1']
				.createInstance(Components.interfaces.nsIClipboard);
		if (!clip)
			return;
		var trans = Components.classes['@mozilla.org/widget/transferable;1']
				.createInstance(Components.interfaces.nsITransferable);
		if (!trans)
			return;
		trans.addDataFlavor('text/unicode');
		var str = new Object();
		var len = new Object();
		var str = Components.classes["@mozilla.org/supports-string;1"]
				.createInstance(Components.interfaces.nsISupportsString);
		var copytext = txt;
		str.data = copytext;
		trans.setTransferData("text/unicode", str, copytext.length * 2);
		var clipid = Components.interfaces.nsIClipboard;
		if (!clip)
			return false;
		clip.setData(trans, null, clipid.kGlobalClipboard);
	}
}
