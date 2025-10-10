<?php

namespace Src\Algorithms\Graph;

/**
 * 辺が小さい順に選び最小全域木を求める
 */
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
