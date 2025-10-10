<?php

namespace Src\Algorithms\Sorting;

/**
 * 整数の各桁ごとに処理する安定ソート
 */
function radix_sort(array $arr): array {
    if (empty($arr)) return [];

    $max = max($arr);
    $exp = 1;
    while (intdiv($max, $exp) > 0) {
        $arr = counting_sort_by_digit($arr, $exp);
        $exp *= 10;
    }
    return $arr;
}

function counting_sort_by_digit(array $arr, int $exp): array {
    $n = count($arr);
    $output = array_fill(0, $n, 0);
    $count = array_fill(0, 10, 0);

    for ($i = 0; $i < $n; $i++) {
        $index = intdiv($arr[$i], $exp) % 10;
        $count[$index]++;
    }
    for ($i = 1; $i < 10; $i++) {
        $count[$i] += $count[$i - 1];
    }
    for ($i = $n - 1; $i >= 0; $i--) {
        $index = intdiv($arr[$i], $exp) % 10;
        $output[$count[$index] - 1] = $arr[$i];
        $count[$index]--;
    }
    return $output;
}
