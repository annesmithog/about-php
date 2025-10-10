<?php

require_once __DIR__ . "/../../../src/algorithms/graph/kruskal.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\kruskal;

class KruskalTest extends TestCase {
    public function testSimpleGraph() {
        $edges = [
            [1, "A", "B"],
            [3, "A", "C"],
            [1, "B", "C"],
            [6, "B", "D"],
            [4, "C", "D"],
        ];
        $vertices = ["A","B","C","D"];
        $mst = kruskal($edges, $vertices);
        $this->assertCount(3, $mst);    
        $totalWeight = array_sum(array_column($mst, 2));
        $this->assertSame(6, $totalWeight);     // 1 + 1 + 4 = 6
    }

    public function testGraphWithExtraEdges() {
        $edges = [
            [10, "A", "B"],
            [1,  "B", "C"],
            [2,  "C", "D"],
            [50, "A", "D"],
        ];
        $vertices = ["A","B","C","D"];
        $mst = kruskal($edges, $vertices);
        $this->assertCount(3, $mst);
        $totalWeight = array_sum(array_column($mst, 2));
        $this->assertSame(13, $totalWeight);    // 10+1+2
    }

    public function testGraphWithIsolatedVertex() {
        $edges = [
            [1, "A", "B"],
            [2, "B", "C"],
        ];
        $vertices = ["A","B","C","D"];
        $mst = kruskal($edges, $vertices);
        $this->assertCount(2, $mst);
        $totalWeight = array_sum(array_column($mst, 2));
        $this->assertSame(3, $totalWeight);
    }
}
