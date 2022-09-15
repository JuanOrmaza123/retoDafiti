<?php

namespace App\Services\Poker;

use App\Services\Contracts\Poker\PokerServiceInterface;

class PokerService implements PokerServiceInterface
{

    private $wildcard = "14";

    public function handler(string $cards): array
    {
        $check = explode(",", $cards);

        $validateCheck = $this->validateCheck($check);

        if(!$validateCheck['state']){
            return $validateCheck;
        }

        $orderedCheck = $this->cleanAndOrderCheck($check);
        if(count($orderedCheck) < 5){
            return [
                'state' => false,
                'data' => $cards,
                'message' => 'No es escalera'
            ];
        }

        $poker = $this->validatePoker($orderedCheck);

        if(count($poker) < 5){
            return [
                'state' => false,
                'data' => $cards,
                'message' => 'No es escalera'
            ];
        }

        return [
            'state' => true,
            'data' => $cards,
            'message' => 'Es escalera'
        ];
    }

    private function validateCheck(array $cards): array
    {
        if(empty($cards)){
            return [
                'state' => false,
                'message' => "La baraja de cartas no puede estar vacía"
            ];
        }

        if(count($cards) > 7){
            return [
                'state' => false,
                'message' => "La baraja no puede tener mas de 7 cartas"
            ];
        }

        if(min($cards) < 2 || max($cards) > 14){
            return [
                'state' => false,
                'message' => "Solo se permiten cartas entre 2 y 14"
            ];
        }

        return [
            'state' => true,
            'message' => ''
        ];
    }

    private function cleanAndOrderCheck(array $cards): array
    {
        $cards = array_unique($cards);

        sort($cards);

        return $cards;
    }

    private function validatePoker(array $cards): array
    {
        $poker = [];
        $previousValue = 0;

        foreach ($cards as $card){
            if($card == 2 && $cards[count($cards)-1] == $this->wildcard){
                $poker[] = $this->wildcard;
                $previousValue = 1;
            }
            if($previousValue == 0 || ($card - 1) != $previousValue) {
                $poker = [];
            }
            $previousValue = $card;
            $poker[] = $card;

            if(count($poker) >= 5){
                break;
            }
        }
        return $poker;
    }
}
