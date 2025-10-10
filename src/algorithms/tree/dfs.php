<?php

namespace Src\Algorithms\Tree;

/**
 * スタックや再帰を使い、できる限り深く探索する
 */
function dfs(array $graph, string $start, array $visited = [], array &$order = []): array {
    $visited[$start] = true;
    $order[] = $start;

    foreach ($graph[$start] as $neighbor) {
        if (!isset($visited[$neighbor])) {
            dfs($graph, $neighbor, $visited, $order);
        }
    }
    return $order;
}
