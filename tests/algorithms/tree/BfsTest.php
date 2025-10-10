<?php

require_once __DIR__ . "/../../../src/algorithms/tree/bfs.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Tree\bfs;

class BfsTest extends TestCase {
    public function testSimpleGraph() {
        $graph = [
            "A" => ["B", "C"],
            "B" => ["D", "E"],
            "C" => ["F"],
            "D" => [],
            "E" => ["F"],
            "F" => [],
        ];
        $result = bfs($graph, "A");
        $expected = ["A", "B", "C", "D", "E", "F"];
        $this->assertSame($expected, $result);
    }

    public function testDisconnectedGraph() {
        $graph = [
            "A" => ["B"],
            "B" => [],
            "C" => ["D"],
            "D" => [],
        ];
        $result = bfs($graph, "A");
        $expected = ["A", "B"];
        $this->assertSame($expected, $result);
    }

    public function testSingleNode() {
        $graph = [
            "X" => []
        ];
        $result = bfs($graph, "X");
        $expected = ["X"];
        $this->assertSame($expected, $result);
    }
}
