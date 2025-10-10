<?php

namespace Src\Algorithms\Tree;

/**
 * キューを使い、根から近い順に探索する
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
