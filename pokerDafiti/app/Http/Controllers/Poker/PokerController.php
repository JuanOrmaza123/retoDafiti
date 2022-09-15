<?php

namespace App\Http\Controllers\Poker;

/*
 * class PokerController
 * author <Juan Sebastian Ormaza>
 */

use App\Services\Contracts\Poker\PokerServiceInterface;
use Illuminate\Http\JsonResponse;

class PokerController
{
    private $pokerService;

    public function __construct(
        PokerServiceInterface $pokerService
    )
    {
        $this->pokerService = $pokerService;
    }

    public function __invoke(string $cards) : JsonResponse
    {
       $poker = $this->pokerService->handler($cards);

        if (!$poker['state']) {
            return response()->json(['state' => false, 'data' => $cards, 'message' => $poker['message']], 500);
        }

        return response()->json(['state' => true, 'data' => $cards, 'message' => "Es escalera"], 200);
    }
}
