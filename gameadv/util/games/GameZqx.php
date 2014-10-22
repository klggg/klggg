<?php
/*
	2012-10-23 11:00 ggg
	战千雄   800267900
*/

class GameZqx extends GameAbsTy implements  GameInterface
{

    public function  __construct($_thirdPartyAreaId)
    {
        $this->gameId = 20;
        $this->areaId = $_thirdPartyAreaId;
    }

}
