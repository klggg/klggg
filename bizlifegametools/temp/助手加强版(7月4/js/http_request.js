var HttpRequest = {};
	
	HttpRequest.getXMLHttpRequest = function(){

		var myRequest = null;
		var progIDs = ["Msxml2.XMLHTTP.5.0", "Msxml2.XMLHTTP.4.0", "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"];


		//IE浏览器
		if (navigator.userAgent.indexOf("MSIE") > 0) {
			//IE7/IE8
			if (window.XMLHttpRequest) {
				myRequest = new XMLHttpRequest();
			} else {

				//IE6及以下版本
				for (var i = 0; i < progIDs.length; ++i) {
					try {
						myRequest = new ActiveXObject(progIDs[i]);
					} catch (e) {
						//alert(e);
					}
				}
			}
		} else if (navigator.userAgent.indexOf("Firefox") > 0) {
	//alert('Firefox');
			//Firefox浏览器
			//打开跨域访问权限
			netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
			myRequest = new XMLHttpRequest();
		}
	else if (navigator.userAgent.indexOf("Chrome") > 0) 
	{
			myRequest = new XMLHttpRequest();
	//alert('Chrome');
	}
	else
		{
			alert(navigator.userAgent + "不认识的浏览器");

		}
		
		return myRequest;
	};


    //GET方法
HttpRequest.Get = function(url, fct){
        var xmlhttp = HttpRequest.getXMLHttpRequest();
        // firefox,打开跨域访问权限
        if (window.navigator.userAgent.indexOf("Firefox") >= 1) {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
        }
        try {
            if (fct == null) {
                xmlhttp.open("GET", url, false);
            } else {
                xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
						{
							fct(xmlhttp);
						}

                };
            	xmlhttp.open("GET", url, true);
            }

			xmlhttp.setRequestHeader("If-Modified-Since","0");
			xmlhttp.setRequestHeader("Cache-Control","no-cache"); 

            xmlhttp.send(null);
            return xmlhttp.responseText;
        } catch (error) {
            //alert("网络连接超时");
            return;
        }

    };

    //POST方法
    HttpRequest.Post = function(url,postData,fct){
        
        var xmlhttp = HttpRequest.getXMLHttpRequest();
        // firefox,打开跨域访问权限
        if (window.navigator.userAgent.indexOf("Firefox") >= 1) {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
        }
        try {

				if (fct == null) {
					xmlhttp.open("POST", url, false);
				} else {
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
						{
							fct(xmlhttp);
						}
					};
					xmlhttp.open("POST", url, true);
				}

			
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send(postData);
//			var result = eval('(' + xmlhttp.responseText + ')');
            return xmlhttp.responseText;
        } catch (error) {
            //alert("网络连接超时");
            return;
        }
    };
    