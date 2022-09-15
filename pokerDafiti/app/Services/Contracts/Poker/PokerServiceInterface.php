<?php

namespace App\Services\Contracts\Poker;

interface PokerServiceInterface
{
    public function handler(string $cards): array;
}
