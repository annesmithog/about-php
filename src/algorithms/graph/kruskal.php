<?php

namespace Src\Algorithms\Graph;

function kruskal(array $edges, array $vertices): array {
    sort($edges);
    $parent = [];
    foreach ($vertices as $v) $parent[$v] = $v;

    $find = function($v) use(&$parent, &$find) {
        if ($parent[$v] !== $v) {
            $parent[$v] = $find($parent[$v]);
        }
        return $parent[$v];
    };

    $union = function($a, $b) use (&$parent, $find) {
        $rootA = $find($a);
        $rootB = $find($b);
        $parent[$rootA] = $rootB;
    };

    $mst = [];
    foreach ($edges as [$w, $u, $v]) {
        if ($find($u) !== $find($v)) {
            $union($u, $v);
            $mst[] = [$u, $v, $w];
        }
    }

    return $mst;
}

$edgesMST = [
    [1, "A", "B"],
    [3, "A", "C"],
    [1, "B", "C"],
    [6, "B", "D"],
    [4, "C", "D"],
];
$verticesMST = ["A","B","C","D"];

print_r(kruskal($edgesMST, $verticesMST));
