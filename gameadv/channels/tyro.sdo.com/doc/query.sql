//查询点卡和它对应的游戏，区服
$sql = 'select g.gameid,g.gamename, a.areaid,a.areaname, c.cardtypeid,c.cardname 
from tbl_gamecate g,tbl_gamearea a, tbl_gamecard c where g.gameid=a.gameid and a.areaid=c.areaid';