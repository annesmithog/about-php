<?php

require_once __DIR__ . "/../../../src/algorithms/sorting/counting_sort.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Sorting\counting_sort;

class CountingSortTest extends TestCase {
    public function testSortRandomArray() {
        $arr = [2, 5, 10, 4, 3, 9, 8, 7, 1, 6];
        $sortedArr = counting_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    }

    public function testAlreadySortedArray() {
        $arr = [1, 2, 3, 4, 5];
        $sortedArr = counting_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5]);
    }

    public function testReverseSortedArray() {
        $arr = [5, 4, 3, 2, 1];
        $sortedArr = counting_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5]);
    }

    public function testEmptyArray() {
        $arr = [];
        $sortedArr = counting_sort($arr);
        $this->assertSame($sortedArr, []);
    }

    public function testSingleElementArray() {
        $arr = [125];
        $sortedArr = counting_sort($arr);
        $this->assertSame($sortedArr, [125]);
    }

    public function testArrayWithDuplicates() {
        $arr = [5, 3, 2, 3, 4];
        $sortedArr = counting_sort($arr);
        $this->assertSame($sortedArr, [2, 3, 3, 4, 5]);
    }
}
