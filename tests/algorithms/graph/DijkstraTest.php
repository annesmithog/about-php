<?php

require_once __DIR__ . "/../../../src/algorithms/graph/dijkstra.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\dijkstra;

class DijkstraTest extends TestCase {
    public function testSimpleGraph() {
        $graph = [
            "Tokyo"     => ["Shinagawa" => 5, "Ueno"     => 7],
            "Shinagawa" => ["Tokyo"     => 5, "Yokohama" => 8],
            "Ueno"      => ["Tokyo"     => 7, "Omiya"    => 6],
            "Yokohama"  => ["Shinagawa" => 8, "Omiya"    => 15],
            "Omiya"     => ["Ueno"      => 6, "Yokohama" => 15],
        ];
        $dist = dijkstra($graph, "Tokyo");
        $this->assertSame($dist["Shinagawa"], 5);
        $this->assertSame($dist["Ueno"], 7);
        $this->assertSame($dist["Yokohama"], 13);
        $this->assertSame($dist["Omiya"], 13);
    }

    public function testUnreachableNode() {
        $graph = [
            "A" => ["B" => 1],
            "B" => ["A" => 2],
            "C" => [],
        ];
        $dist = dijkstra($graph, "A");
        $this->assertSame(INF, $dist["C"]);
    }
}