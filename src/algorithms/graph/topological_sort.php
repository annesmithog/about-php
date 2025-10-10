<?php

namespace Src\Algorithms\Graph;

use Exception;

/**
 * 有向非巡回グラフのノードを依存関係に従って並べる
 */
function topological_sort(array $graph): array {
    $inDegree = [];
    foreach ($graph as $u => $neighbors) {
        if (!isset($inDegree[$u])) $inDegree[$u] = 0;
        foreach ($neighbors as $v) {
            $inDegree[$v] = ($inDegree[$v] ?? 0) + 1;
        }
    }

    $queue = [];
    foreach ($inDegree as $node => $deg) {
        if ($deg === 0) $queue[] = $node;
    }

    $order = [];
    while (!empty($queue)) {
        $u = array_shift($queue);
        $order[] = $u;

        foreach ($graph[$u] as $v) {
            $inDegree[$v]--;
            if ($inDegree[$v] === 0) $queue[] = $v;
        }
    }

    if (count($order) !== count($inDegree)) throw new Exception("閉路あり");

    return $order;
}
