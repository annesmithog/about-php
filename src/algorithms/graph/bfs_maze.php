<?php

namespace Src\Algorithms\Graph;

use Exception;
use SplQueue;

/**
 * BFSを使用した迷路探索
 */
function bfs_maze(array $maze, int $height, int $width): int {
    $start = null;
    $goal = null;

    for ($i = 0; $i < $height; $i++) {
        for ($j = 0; $j < $width; $j++) {
            if ($maze[$i][$j] === "S") $start = [$i, $j];
            if ($maze[$i][$j] === "G") $goal = [$i, $j];
        }
    }

    if (!$start || !$goal) throw new Exception("StartまたはGoalが見つかりません。");

    $queue = new SplQueue();
    $queue->enqueue([$start[0], $start[1], 0]);
    $visited = array_fill(0, $height, array_fill(0, $width, false));
    $visited[$start[0]][$start[1]] = true;
    $directions = [[1,0], [-1,0], [0,1], [0,-1]];

    while (!$queue->isEmpty()) {
        [$y, $x, $d] = $queue->dequeue();

        if ($y === $goal[0] && $x === $goal[1]) return $d;

        foreach ($directions as [$dy, $dx]) {
            $ny = $y + $dy;
            $nx = $x + $dx;
            if ($ny >= 0 && $ny < $height && $nx >= 0 && $nx < $width) {
                if (!$visited[$ny][$nx] && $maze[$ny][$nx] !== "#") {
                    $visited[$ny][$nx] = true;
                    $queue->enqueue([$ny, $nx, $d + 1]);
                }
            }
        }
    }
    return -1;
}
