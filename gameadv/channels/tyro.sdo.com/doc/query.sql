//��ѯ�㿨������Ӧ����Ϸ������
$sql = 'select g.gameid,g.gamename, a.areaid,a.areaname, c.cardtypeid,c.cardname 
from tbl_gamecate g,tbl_gamearea a, tbl_gamecard c where g.gameid=a.gameid and a.areaid=c.areaid';