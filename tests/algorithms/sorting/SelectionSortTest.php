<?php

require_once __DIR__ . "/../../../src/algorithms/sorting/selection_sort.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Sorting\selection_sort;

class SelectionSortTest extends TestCase {
    public function testSortRandomArray() {
        $arr = [29, 10, 14, 37, 13];
        $sortedArr = selection_sort($arr);
        $this->assertSame([10, 13, 14, 29, 37], $sortedArr);
    }

    public function testAlreadySortedArray() {
        $arr = [1, 2, 3, 4, 5];
        $sortedArr = selection_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5]);
    }

    public function testReverseSortedArray() {
        $arr = [5, 4, 3, 2, 1];
        $sortedArr = selection_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5]);
    }

    public function testEmptyArray() {
        $arr = [];
        $sortedArr = selection_sort($arr);
        $this->assertSame($sortedArr, []);
    }

    public function testSingleElementArray() {
        $arr = [125];
        $sortedArr = selection_sort($arr);
        $this->assertSame($sortedArr, [125]);
    }

    public function testArrayWithDuplicates() {
        $arr = [5, 3, 2, 3, 4];
        $sortedArr = selection_sort($arr);
        $this->assertSame($sortedArr, [2, 3, 3, 4, 5]);
    }
}
