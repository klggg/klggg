//由秒转到成时间 来自savefarmer.cn 代码
var Tools	 = {};
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
}

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
