<?php

require_once __DIR__ . "/../../../src/algorithms/search/greedy_coin_change.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Search\greedy_coin_change;

class GreedyCoinChangeTest extends TestCase {
    public function testExactAmount() {
        $coins = [500, 100, 50, 10, 5, 1];
        $result = greedy_coin_change(888, $coins);
        $this->assertSame([500, 100, 100, 100, 50, 10, 10, 10, 5, 1, 1, 1], $result);
    }

    public function testSingleCoin() {
        $coins = [100, 50, 10];
        $result = greedy_coin_change(50, $coins);
        $this->assertSame([50], $result);
    }

    public function testNoSolution() {
        $coins = [10, 5];
        $result = greedy_coin_change(16, $coins);
        $this->assertSame([], $result);
    }

    public function testZeroAmount() {
        $coins = [500, 100, 50, 10, 5, 1];
        $result = greedy_coin_change(0, $coins);
        $this->assertSame([], $result);
    }
}