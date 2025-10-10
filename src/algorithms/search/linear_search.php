<?php

namespace Src\Algorithms\Search;

/**
 * 配列を先頭から順番に調べて目的の要素を探す
 */
function linear_search(array $arr, int $target): int {
    foreach ($arr as $index => $value) {
        if ($value === $target) {
            return $index;
        }
    }
    return -1;
}
