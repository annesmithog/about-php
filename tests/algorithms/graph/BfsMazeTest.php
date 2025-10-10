<?php

require_once __DIR__ . "/../../../src/algorithms/graph/bfs_maze.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\bfs_maze;

class BfsMazeTest extends TestCase {
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
        $result = bfs_maze($maze, $h, $w);
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
        $result = bfs_maze($maze, $h, $w);
    }

    public function testGoalNotExists() {
        $input = <<<EOT
        4 6
        ......
        ......
        ......
        .....S
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $this->expectException(Exception::class);
        $result = bfs_maze($maze, $h, $w);
    }

    public function testToEast() {
        $input = <<<EOT
        5 5
        .....
        .....
        ..S.G
        .....
        .....
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = bfs_maze($maze, $h, $w);
        $this->assertSame($result, 2);
    }

    public function testToWest() {
        $input = <<<EOT
        5 5
        .....
        .....
        .....
        G..S.
        .....
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = bfs_maze($maze, $h, $w);
        $this->assertSame($result, 3);
    }

    public function testToSouth() {
        $input = <<<EOT
        5 5
        ....S
        .....
        .....
        .....
        ....G
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = bfs_maze($maze, $h, $w);
        $this->assertSame($result, 4);
    }

    public function testToNorth() {
        $input = <<<EOT
        5 5
        G....
        S....
        .....
        .....
        .....
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = bfs_maze($maze, $h, $w);
        $this->assertSame($result, 1);
    }

    public function testSimpleMaze() {
        $input = <<<EOT
        5 5
        #####
        #S..#
        #.#.#
        #..G#
        #####
        EOT;
        $lines = explode("\n", trim($input));
        [$h, $w] = array_map("intval", explode(" ", array_shift($lines)));
        $maze = array_map("str_split", $lines);
        $result = bfs_maze($maze, $h, $w);
        $this->assertSame($result, 4);
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
        $result = bfs_maze($maze, $h, $w);
        $this->assertSame($result, 32);
    }
}
