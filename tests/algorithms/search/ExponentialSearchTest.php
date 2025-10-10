<?php

require_once __DIR__ . "/../../../src/algorithms/search/exponential_search.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Search\exponential_search;

class ExponentialSearchTest extends TestCase {
    public function testFoundElement() {
        $arr = [10, 20, 30, 40, 50];
        $this->assertSame(1, exponential_search($arr, 20));
    }

    public function testNotFoundElement() {
        $arr = [10, 20, 30, 40, 50];
        $this->assertSame(-1, exponential_search($arr, 31));
    }
    
    public function testFirstElement() {
        $arr = [10, 20, 30, 40];
        $this->assertSame(0, exponential_search($arr, 10));
    }

    public function testLastElement() {
        $arr = [10, 20, 30, 40];
        $this->assertSame(3, exponential_search($arr, 40));
    }

    public function testEmptyArray() {
        $arr = [];
        $this->assertSame(-1, exponential_search($arr, 10));
    }
}