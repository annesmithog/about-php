<?php

require_once __DIR__ . "/../../../src/algorithms/graph/dfs_maze.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\dfs_maze;

class DfsMazeTest extends TestCase {
    public function testNoPath() {
        $input = <<<EOT
        3 3
        S#G
        ###
        ...
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = dfs_maze($maze, $h, $w);
        $this->assertSame(-1, $result);
    }

    public function testStartNotExists() {
        $input = <<<EOT
        3 3
        ...
        ..G
        ...
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $this->expectException(Exception::class);
        $result = dfs_maze($maze, $h, $w);
    }

    public function testComplicatedMaze() {
        $input = <<<EOT
        8 10
        ...#####..
        .#.#...#.#
        .#.#G#.#..
        .#.###.##.
        .#.....#..
        .####.##..
        .....#..S.
        ..........
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = dfs_maze($maze, $h, $w);
        $this->assertGreaterThanOrEqual(32, $result);
    }
}