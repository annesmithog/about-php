<?php

namespace Src\Algorithms\Search;

/**
 * ソート済みの配列で小さな範囲を指数的に探索し二分探索する
 */
function exponential_search(array $arr, int $target): int {
    $n = count($arr);
    if ($n === 0) return -1;
    if ($arr[0] === $target) return 0;

    $i = 1;
    while ($i < $n && $arr[$i] <= $target) {
        $i *= 2;
    }
    return binary_search_in_range($arr, $target, intdiv($i, 2), min($i, $n - 1));
}

/**
 * 二分探索する
 */
function binary_search_in_range(array $arr, int $target, int $left, int $right): int {
    while ($left <= $right) {
        $mid = intdiv($left + $right, 2);
        if ($arr[$mid] === $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return -1;
}
