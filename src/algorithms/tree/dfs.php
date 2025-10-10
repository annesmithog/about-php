<?php

namespace Src\Algorithms\Tree;

/**
 * 深さ優先探索 (DFS)
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
