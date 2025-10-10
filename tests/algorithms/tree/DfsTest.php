<?php

require_once __DIR__ . "/../../../src/algorithms/tree/dfs.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Tree\dfs;

class DfsTest extends TestCase {
    public function testSimpleGraph() {
        $graph = [
            "A" => ["B", "C"],
            "B" => ["D", "E"],
            "C" => ["F"],
            "D" => [],
            "E" => ["F"],
            "F" => [],
        ];
        $result = dfs($graph, "A");
        $expected = ["A", "B", "D", "E", "F", "C", "F"];
        $this->assertSame($expected, $result);
    }
}
