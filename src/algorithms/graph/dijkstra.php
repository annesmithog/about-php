<?php

namespace Src\Algorithms\Graph;

use SplPriorityQueue;

/**
 * 単一始点の最短経路を見つける (負の辺がない場合のみ使用可能)
 */
function dijkstra(array $graph, string $start): array {
    $dist = [];
    foreach ($graph as $node => $_) {
        $dist[$node] = INF;
    }
    $dist[$start] = 0;

    $pq = new SplPriorityQueue();
    $pq->insert($start, 0);

    while (!$pq->isEmpty()) {
        $u = $pq->extract();

        foreach ($graph[$u] as $v => $weight) {
            $alt = $dist[$u] + $weight;
            if ($alt < $dist[$v]) {
                $dist[$v] = $alt;
                $pq->insert($v, -$alt);
            }
        }
    }
    return $dist;
}
