<?php

require_once __DIR__ . "/../../../src/algorithms/graph/prim.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\prim;

class PrimTest extends TestCase {
    public function testSimpleGraph() {
        $graph = [
            "A" => ["B" => 1, "C" => 3],
            "B" => ["A" => 1, "C" => 1, "D" => 6],
            "C" => ["A" => 3, "B" => 1, "D" => 4],
            "D" => ["B" => 6, "C" => 4],
        ];
        $mst = prim($graph, "A");
        $this->assertCount(3, $mst);
        $totalWeight = array_sum(array_column($mst, 2));
        $this->assertSame(6, $totalWeight); // 1 + 1 + 4 = 6
    }

    public function testGraphWithExtraEdges() {
        $graph = [
            "A" => ["B" => 10, "D" => 50],
            "B" => ["A" => 10, "C" => 1],
            "C" => ["B" => 1, "D" => 2],
            "D" => ["A" => 50, "C" => 2],
        ];
        $mst = prim($graph, "A");
        $this->assertCount(3, $mst);
        $totalWeight = array_sum(array_column($mst, 2));
        $this->assertSame(13, $totalWeight);    // 10 + 1 + 2 = 13
    }

    public function testGraphWithIsolatedVertex() {
        $graph = [
            "A" => ["B" => 1],
            "B" => ["A" => 1, "C" => 2],
            "C" => ["B" => 2],
            "D" => [],
        ];
        $mst = prim($graph, "A");
        $this->assertCount(2, $mst);
        $totalWeight = array_sum(array_column($mst, 2));
        $this->assertSame(3, $totalWeight);
    }
}
