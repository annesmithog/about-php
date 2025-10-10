<?php

namespace Src\Algorithms\Tree;

/**
 * 幅優先探索 (BFS)
 */
function bfs(array $graph, string $start): array {
    $visited = [];
    $queue = [$start];
    $visited[$start] = true;
    $order = [];

    while (!empty($queue)) {
        $node = array_shift($queue);
        $order[] = $node;

        foreach ($graph[$node] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $visited[$neighbor] = true;
                $queue[] = $neighbor;
            }
        }
    }
    return $order;
}
