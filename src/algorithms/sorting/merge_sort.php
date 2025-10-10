<?php

namespace Src\Algorithms\Sorting;

/**
 * 分割統治法を使用した安定ソート
 */
function merge_sort(array $arr): array {
    if (count($arr) <= 1) return $arr;
    $mid = intdiv(count($arr), 2);
    $left = merge_sort(array_slice($arr, 0, $mid));
    $right = merge_sort(array_slice($arr, $mid));
    return merge($left, $right);
}

function merge(array $left, array $right): array {
    $result = [];
    while ($left && $right) {
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }
    return array_merge($result, $left, $right);
}
