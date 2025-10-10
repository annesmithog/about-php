<?php

namespace Src\Algorithms\Graph;

/**
 * 全てのペアの最短経路を見つける
 */
function floyd_warshall(array $dist): array {
    $vertices = array_keys($dist);
    $n = count($vertices);

    foreach ($vertices as $k) {
        foreach ($vertices as $i) {
            foreach ($vertices as $j) {
                if ($dist[$i][$k] + $dist[$k][$j] < $dist[$i][$j]) {
                    $dist[$i][$j] = $dist[$i][$k] + $dist[$k][$j];
                }
            }
        }
    }

    return $dist;
}

$matrix = [
    [0,   3, INF, 7],
    [8,   0, 2,   INF],
    [5, INF, 0,   1],
    [2, INF, INF, 0],
];

print_r(floyd_warshall($matrix));
