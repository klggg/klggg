        //图片轮播方法
        function scrollNews(selector, Entry, time, StartIndex) {
            var _self = this;
            this.Selector = selector;
            this.Entry = Entry;
            this.time = time;
            this.i = StartIndex || 0;
            this.Count = $(this.Selector + " ul li").length;
            $(this.Selector + " ul li").css('filter', 'alpha(opacity=100)');
            $(this.Selector + " ul li").hide();
            $(this.Selector + " ul li").eq(this.i).show();//

            /*$(this.Selector).bind("mouseenter",function(){
                if(_self.sI){clearInterval(_self.sI);}
            }).bind("mouseleave",function(){
                _self.showIndex(_self.i++);
            })*/
            /*生成激活OL项目
            for(var j=0;j<this.Count;j++)
                $(this.Selector+" .news_ico .activeOL").append('<li><a onclick="'+this.Entry+'.showIndex('+j+');" href="#"><img src="images/cn/crystal2.gif"></a></li>');*/
            $(this.Selector + " .news_ico ol li a").eq(this.i).addClass("active");
            this.sI = setInterval(this.Entry + ".showIndex(null)", this.time);
            this.GetSelector = function () { return this.Selector; }
            this.showIndex = function (index) {
                this.i++;
                if (this.sI) { clearInterval(this.sI); }
                this.sI = setInterval(this.Entry + ".showIndex()", this.time);
                if (index != null) {
                    this.i = index;
                }
                if (this.i == this.Count)
                    this.i = 0;
                $(this.Selector + " ul li").fadeOut(700);
                $(this.Selector + " ul li").eq(this.i).fadeIn(2000);
                $(this.Selector + " ol li a").removeClass("active");
                $(this.Selector + " ol li a").eq(this.i).addClass("active");
            }
        }

