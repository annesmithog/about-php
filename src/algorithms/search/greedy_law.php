<?php

namespace Src\Algorithms\Search;

/**
 * 貪欲法 (例: コイン問題)
 */
function greedy_coin_change(int $amount, array $coins): array {
    rsort($coins);
    $result = [];

    foreach ($coins as $coin) {
        while ($amount >= $coin) {
            $amount -= $coin;
            $result[] = $coin;
        }
    }

    if ($amount === 0) return $result;

    return [];
}
