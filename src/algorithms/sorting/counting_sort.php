<?php

namespace Src\Algorithms\Sorting;

/**
 * 値の範囲が限られている時に有効な非比較ソート
 */
function counting_sort(array $arr): array {
    if (empty($arr)) return [];

    $max = max($arr);
    $min = min($arr);
    $range = $max - $min + 1;
    $count = array_fill(0, $range, 0);
    foreach ($arr as $num) {
        $count[$num - $min]++;
    }

    $output = [];
    for ($i = 0; $i < $range; $i++) {
        while ($count[$i] > 0) {
            $output[] = $i + $min;
            $count[$i]--;
        }
    }
    return array_values($output);
}
