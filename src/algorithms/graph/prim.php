<?php

namespace Src\Algorithms\Graph;

/**
 * 最小全域木を求める貪欲法アルゴリズム
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

$graphMST = [
    "A" => ["B" => 1, "C" => 3],
    "B" => ["A" => 1, "C" => 1, "D" => 6],
    "C" => ["A" => 3, "B" => 1, "D" => 4],
    "D" => ["B" => 6, "C" => 4],
];

print_r(prim($graphMST, "A"));
