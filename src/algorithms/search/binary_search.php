<?php

namespace Src\Algorithms\Search;

/**
 * ソート済みの配列で中央を基準に分割しながら探索する
 */
function binary_search(array $arr, int $target): int {
    $left = 0;
    $right = count($arr) - 1;

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
