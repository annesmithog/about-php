<?php

namespace Src\Algorithms\Graph;

/**
 * 全ての頂点間の最短経路を求める
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
