<?php

namespace Src\Algorithms\Sorting;

/**
 * 隣り合う要素を比較し、必要に応じて入れ替えを繰り返すソート
 */
function bubble_sort(array $arr): array {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
            }
        }
    }
    return $arr;
}
