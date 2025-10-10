<?php

require_once __DIR__ . "/../../../src/algorithms/search/linear_search.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Search\linear_search;

class LinearSearchTest extends TestCase {
    public function testFoundElement() {
        $arr = [10, 20, 30, 40, 50];
        $this->assertSame(2, linear_search($arr, 30));
    }

    public function testNotFoundElement() {
        $arr = [10, 20, 30, 40, 50];
        $this->assertSame(-1, linear_search($arr, 31));
    }

    public function testFirstElement() {
        $arr = [10, 20, 30];
        $this->assertSame(0, linear_search($arr, 10));
    }

    public function testLastElement() {
        $arr = [10, 20, 30];
        $this->assertSame(2, linear_search($arr, 30));
    }

    public function testEmptyArray() {
        $arr = [];
        $this->assertSame(-1, linear_search($arr, 10));
    }
}