<?php

require_once __DIR__ . "/../../../src/algorithms/sorting/insertion_sort.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Sorting\insertion_sort;

class InsertionSortTest extends TestCase {
    public function testSortRandomArray() {
        $arr = [21, 20, 15, 19, 37, 0, -1];
        $sortedArr = insertion_sort($arr);
        $this->assertSame($sortedArr, [-1, 0, 15, 19, 20, 21, 37]);
    }

    public function testAlreadySortedArray() {
        $arr = [1, 2, 3, 4, 5];
        $sortedArr = insertion_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5]);
    }

    public function testReverseSortedArray() {
        $arr = [5, 4, 3, 2, 1];
        $sortedArr = insertion_sort($arr);
        $this->assertSame($sortedArr, [1, 2, 3, 4, 5]);
    }

    public function testEmptyArray() {
        $arr = [];
        $sortedArr = insertion_sort($arr);
        $this->assertSame($sortedArr, []);
    }

    public function testSingleElementArray() {
        $arr = [214];
        $sortedArr = insertion_sort($arr);
        $this->assertSame($sortedArr, [214]);
    }

    public function testArrayWithDuplicates() {
        $arr = [5, 3, 2, 3, 4];
        $sortedArr = insertion_sort($arr);
        $this->assertSame($sortedArr, [2, 3, 3, 4, 5]);
    }
}
