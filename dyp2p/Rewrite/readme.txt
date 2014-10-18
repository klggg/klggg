解压文件到C盘根目录下

在要启用Rewrite的IIS站点的Isapi上添加这个筛选器

筛选器名称Rewrite

可执行文件选择 c:\Rewrite\Rewrite.dll　即可以了

httpd.ini是配置文件
如果你想对个别站点不防盗链的话或者你的论坛和supesite是分开的两个域名的话。以上方法会导致双方相互防盗链！不能正常调用 请按下面的方法改动

请把上面代码第二行改为：

RewriteCond Referer: (?!http://(?:www\.sanreal\.com|www\.discuz\.net)).+

上面这个代码的意思就是除了http://www.sanreal.com以及www.discuz.net这两个站点，在其它网站上盗链全部拒绝！

防盗链和dz5的静态配置已经调好, 然后在网站根目录下建立block.gif文件 

盗链的网站显示的就是这个图片了

