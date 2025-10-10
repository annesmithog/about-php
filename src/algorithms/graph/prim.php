<?php

namespace Src\Algorithms\Graph;

/**
 * 貪欲方で最小全域木を求める
 */
function prim(array $graph, string $start): array {
    $mst = [];
    $visited = [$start => true];
    $edges = [];

    foreach ($graph[$start] as $v => $w) {
        $edges[] = [$w, $start, $v];
    }
    usort($edges, fn($a, $b) => $a[0] <=> $b[0]);

    while (!empty($edges)) {
        [$w, $u, $v] = array_shift($edges);
        if (isset($visited[$v])) continue;

        $visited[$v] = true;
        $mst[] = [$u, $v, $w];

        foreach ($graph[$v] as $to => $weight) {
            if (!isset($visited[$to])) $edges[] = [$weight, $v, $to];
        }
        usort($edges, fn($a, $b) => $a[0] <=> $b[0]);
    }

    return $mst;
}
