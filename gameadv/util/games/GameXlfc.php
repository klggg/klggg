<?php
/*
	2012-10-24 15:56  ggg
	仙落凡尘 800269700
*/


class GameXlfc extends GameAbsTy implements  GameInterface
{

    public function  __construct($_thirdPartyAreaId)
    {
        $this->gameId = 14;
        $this->areaId = $_thirdPartyAreaId;
    }

}
