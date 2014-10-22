<?php
/*
	2012-10-23 11:00 ggg
	新梦幻之城 800265900
*/
class GameXmhzc extends GameAbsTy implements  GameInterface
{

    public function  __construct($_thirdPartyAreaId)
    {
        $this->gameId = 18;
        $this->areaId = $_thirdPartyAreaId;
    }


}
