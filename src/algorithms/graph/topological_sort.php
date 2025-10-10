<?php

namespace Src\Algorithms\Graph;

use Exception;

/**
 * 有向非循環グラフにおいて、ノードを線形に並べる
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

$dag = [
    "数学基礎" => ["線形代数", "微積分"],
    "線形代数" => ["機械学習"],
    "微積分"   => ["機械学習"],
    "機械学習" => [],
];

print_r(topological_sort($dag));
