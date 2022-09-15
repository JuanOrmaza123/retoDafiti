<?php

use Illuminate\Http\Response;

class PokerControllerTest extends TestCase
{
    public function testPokerController(): void
    {
        $this->call('GET', '/poker/14,2,3,4,5');
        $this->seeStatusCode(200);
        $this->seeJsonEquals([
            "data"=>"14,2,3,4,5",
            "message"=>"Es escalera",
            "state"=>true
        ]);

        $this->call('GET', '/poker/7,7,12,11,3,4,14');
        $this->seeStatusCode(500);
        $this->seeJsonEquals([
            "data"=>"7,7,12,11,3,4,14",
            "message"=>"No es escalera",
            "state"=>false
        ]);

        $this->call('GET', '/poker/2,3,10,11,12,13,14');
        $this->seeStatusCode(200);
        $this->seeJsonEquals([
            "data"=>"2,3,10,11,12,13,14",
            "message"=>"Es escalera",
            "state"=>true
        ]);

        $this->call('GET', '/poker/2,3,4,7,5,9,14');
        $this->seeStatusCode(200);
        $this->seeJsonEquals([
            "data"=>"2,3,4,7,5,9,14",
            "message"=>"Es escalera",
            "state"=>true
        ]);

        $this->call('GET', '/poker/2,3,4,7,5,9,14,13');
        $this->seeStatusCode(500);
        $this->seeJsonEquals([
            "data"=>"2,3,4,7,5,9,14,13",
            "message"=>"La baraja no puede tener mas de 7 cartas",
            "state"=>false
        ]);

        $this->call('GET', '/poker/1,2,3,4,5,6,7');
        $this->seeStatusCode(500);
        $this->seeJsonEquals([
            "data"=>"1,2,3,4,5,6,7",
            "message"=>"Solo se permiten cartas entre 2 y 14",
            "state"=>false
        ]);
    }
}
