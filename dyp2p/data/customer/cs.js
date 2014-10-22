var controlId = "customerServer"; //控件ID
var cs_top = 115; //悬浮窗离顶部高度
var cs_left = -152; //悬浮窗离左部宽度

nongbaow_CustomerServer = function (id) {
    var me = id.charAt ? document.getElementById(id) : id, d1 = document.body, d2 = document.documentElement;
    d1.style.height = d2.style.height = '100%'; me.style.top = cs_top ? cs_top + 'px' : 0; me.style.left = cs_left + "px"; //[(cs_left>0?'left':'left')]=cs_left?Math.abs(cs_left)+'px':0;
    me.style.position = 'absolute';
    setInterval(function () { me.style.top = parseInt(me.style.top) + (Math.max(d1.scrollTop, d2.scrollTop) + cs_top - parseInt(me.style.top)) * 0.1 + 'px'; }, 10 + parseInt(Math.random() * 20));
    return arguments.callee;
};
window.onload = function () {
    nongbaow_CustomerServer(controlId)
}

lastScrollY = 0;
var InterTime = 1;
var maxWidth = -1;
var minWidth = -152;
var numInter = 8;
var BigInter;
var SmallInter;

var o = document.getElementById(controlId);
var i = parseInt(o.style.left);

function Big() {
    if (parseInt(o.style.left) < maxWidth) {
        i = parseInt(o.style.left);
        i += numInter;
        o.style.left = i + "px";

        if (i == maxWidth)
            clearInterval(BigInter);
    }
}
function toBig() {
    clearInterval(SmallInter);
    clearInterval(BigInter);
    BigInter = setInterval(Big, InterTime);
}
function Small() {
    if (parseInt(o.style.left) > minWidth) {
        i = parseInt(o.style.left);
        i -= numInter;
        o.style.left = i + "px";

        if (i == minWidth)
            clearInterval(SmallInter);
    }
}
function toSmall() {
    clearInterval(SmallInter);
    clearInterval(BigInter);
    SmallInter = setInterval(Small, InterTime);
}