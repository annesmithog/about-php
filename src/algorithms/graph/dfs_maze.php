<?php

namespace Src\Algorithms\Graph;

use Exception;

/**
 * DFSを使い、到達可能な経路を見つける
 */
function dfs_maze(array $maze, int $height, int $width): int {
    $start = null;
    $goal = null;

    for ($i = 0; $i < $height; $i++) {
        for ($j = 0; $j < $width; $j++) {
            if ($maze[$i][$j] === "S") $start = [$i, $j];
            if ($maze[$i][$j] === "G") $goal = [$i, $j];
        }
    }

    if (!$start || !$goal) throw new Exception("StartまたはGoalが見つかりません。");

    $visited = array_fill(0, $height, array_fill(0, $width, false));
    $directions = [[1,0], [-1,0], [0,1], [0,-1]];

    $foundDistance = -1;
    $dfs = function($y, $x, $d) use (&$maze, $height, $width, &$visited, $goal, $directions, &$dfs, &$foundDistance) {
        if ($y === $goal[0] && $x === $goal[1]) {
            $foundDistance = $d;
            return true;
        }

        $visited[$y][$x] = true;

        foreach ($directions as [$dy, $dx]) {
            $ny = $y + $dy;
            $nx = $x + $dx;
            if ($ny >= 0 && $ny < $height && $nx >= 0 && $nx < $width) {
                if (!$visited[$ny][$nx] && $maze[$ny][$nx] !== "#") {
                    if ($dfs($ny, $nx, $d + 1)) return true;
                }
            }
        }
        return false;
    };

    $dfs($start[0], $start[1], 0);
    return $foundDistance;
}
