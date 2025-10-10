<?php

namespace Src\Algorithms\Graph;

use Exception;

/**
 * 単一始点の最短経路を見つける (重み付きグラフ使用のため負の辺がある場合も問題なし)
 */
function bellman_ford(array $edges, array $vertices, string $start): array {
    $dist = [];
    foreach ($vertices as $v) {
        $dist[$v] = INF;
    }
    $dist[$start] = 0;

    $n = count($vertices);

    for ($i = 0; $i < $n - 1; $i++) {
        foreach ($edges as $edge) {
            $u = $edge["u"];
            $v = $edge["v"];
            $w = $edge["w"];
            if ($dist[$u] + $w < $dist[$v]) $dist[$v] = $dist[$u] + $w;
        }
    }

    foreach ($edges as $edge) {
            $u = $edge["u"];
            $v = $edge["v"];
            $w = $edge["w"];
        if ($dist[$u] + $w < $dist[$v]) throw new Exception("負閉路が検出されました。");
    }

    return $dist;
}
