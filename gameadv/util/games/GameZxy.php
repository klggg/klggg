<?php
/*
	2012-11-7 10:53 ggg
	醉西游 800272200
	混特游
*/

class GameZxy extends GameAbsTy implements  GameInterface
{

    public function  __construct($_thirdPartyAreaId)
    {
        $this->gameId = 17;
        $this->areaId = $_thirdPartyAreaId;
    }

}

