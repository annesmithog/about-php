<?php

namespace Src\Algorithms\Sorting;

/**
 * 未ソート部分から最小または最大の要素を選び、先頭と交換するソート
 */
function selection_sort(array $arr): array {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        [$arr[$i], $arr[$minIndex]] = [$arr[$minIndex], $arr[$i]];
    }
    return $arr;
}
