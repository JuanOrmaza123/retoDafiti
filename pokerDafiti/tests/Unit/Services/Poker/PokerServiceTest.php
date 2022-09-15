<?php

namespace Services\Poker;

use App\Services\Poker\PokerService;
use Monolog\Test\TestCase;

class PokerServiceTest extends TestCase
{
    public function testPoker(): void
    {
        $pokerService = new PokerService();

        $result = $pokerService->handler('2,3,4,5,6');
        $this->assertEquals(
            [
                'state' => true,
                'data' => '2,3,4,5,6',
                'message' => 'Es escalera'
            ], $result);

        $result = $pokerService->handler('14,5,4,2,3');
        $this->assertEquals(
            [
                'state' => true,
                'data' => '14,5,4,2,3',
                'message' => 'Es escalera'
            ], $result);

        $result = $pokerService->handler("7,7,12,11,3,4,14");
        $this->assertEquals(
            [
                'state' => false,
                'data' => '7,7,12,11,3,4,14',
                'message' => 'No es escalera'
            ], $result);

        $result = $pokerService->handler('7,3,2');
        $this->assertEquals(
            [
                'state' => false,
                'data' => '7,3,2',
                'message' => 'No es escalera'
            ], $result);

        $result = $pokerService->handler('7,3,2,1');
        $this->assertEquals(
            [
                'state' => false,
                'data' => '7,3,2,1',
                'message' => 'Solo se permiten cartas entre 2 y 14'
            ], $result);

        $result = $pokerService->handler('7,3,2,1,13,4,8,9');
        $this->assertEquals(
            [
                'state' => false,
                'data' => '7,3,2,1,13,4,8,9',
                'message' => 'La baraja no puede tener mas de 7 cartas'
            ], $result);
    }
}
