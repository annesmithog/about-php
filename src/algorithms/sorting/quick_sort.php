<?php

namespace Src\Algorithms\Sorting;

/**
 * 分割統治法による高速な不安定ソート
 */
function quick_sort(array $arr): array {
    if (count($arr) < 2) return $arr;
    $pivot = $arr[0];
    $left = $right = [];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] <= $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    return array_merge(quick_sort($left), [$pivot], quick_sort($right));
}
