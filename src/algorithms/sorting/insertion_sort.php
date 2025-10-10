<?php

namespace Src\Algorithms\Sorting;

/**
 * 挿入位置を見つけ、部分的にソートされた配列に要素を挿入
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
