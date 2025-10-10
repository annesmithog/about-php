<?php

namespace Src\Algorithms\Sorting;

/**
 * 挿入ソートを改良し、間隔を縮めながら整列させるソート
 */
function shell_sort(array $arr): array {
    $n = count($arr);
    for ($gap = intdiv($n, 2); $gap > 0; $gap = intdiv($gap, 2)) {
        for ($i = $gap; $i < $n; $i++) {
            $temp = $arr[$i];
            $j = $i;
            while ($j >= $gap && $arr[$j - $gap] > $temp) {
                $arr[$j] = $arr[$j - $gap];
                $j -= $gap;
            }
            $arr[$j] = $temp;
        }
    }
    return $arr;
}
