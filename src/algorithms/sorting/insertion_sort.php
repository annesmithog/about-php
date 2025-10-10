<?php

namespace Src\Algorithms\Sorting;

/**
 * 適切な位置を見つけて要素を挿入し、部分的に整列させるソート
 */
function insertion_sort(array $arr): array {
    $n = count($arr);
    
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}
