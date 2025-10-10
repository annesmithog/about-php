<?php

require_once __DIR__ . "/../../../src/algorithms/graph/topological_sort.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\topological_sort;

class TopologicalSortTest extends TestCase {
    public function testSimpleDag() {
        $graph = [
            "A" => ["B", "C"],
            "B" => ["D"],
            "C" => ["D"],
            "D" => [],
        ];
        $order = topological_sort($graph);
        $this->assertCount(4, $order);
        $this->assertLessThan(array_search("D", $order), array_search("B", $order));
        $this->assertLessThan(array_search("D", $order), array_search("C", $order));
        $this->assertLessThan(array_search("B", $order), array_search("A", $order));
        $this->assertLessThan(array_search("C", $order), array_search("A", $order));
    }

    public function testIndependentNodes() {
        $graph = [
            "A" => [],
            "B" => [],
            "C" => [],
        ];
        $order = topological_sort($graph);
        sort($order);
        $this->assertSame(["A", "B", "C"], $order);
    }

    public function testChainGraph() {
        $graph = [
            "A" => ["B"],
            "B" => ["C"],
            "C" => ["D"],
            "D" => [],
        ];
        $order = topological_sort($graph);
        $this->assertSame(["A", "B", "C", "D"], $order);
    }

    public function testGraphWithCycleThrowsException() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("閉路あり");
        $graph = [
            "A" => ["B"],
            "B" => ["C"],
            "C" => ["A"],
        ];
        topological_sort($graph);
    }
}
