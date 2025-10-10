<?php

namespace Src\Algorithms\Search;

/**
 * 配列を先頭から順に探索する
 */
function linear_search(array $arr, int $target): int {
    foreach ($arr as $index => $value) {
        if ($value === $target) {
            return $index;
        }
    }
    return -1;
}
