<?php

require_once __DIR__ . "/../../../src/algorithms/graph/bellman_ford.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\bellman_ford;

class BellmanFordTest extends TestCase {
    public function testSimpleGraph() {
        $vertices = ["Tokyo", "Shinagawa", "Yokohama", "Omiya"];
        $edges = [
            ["u" => "Tokyo",     "v" => "Shinagawa", "w" => 5],
            ["u" => "Tokyo",     "v" => "Omiya",     "w" => 20],
            ["u" => "Shinagawa", "v" => "Yokohama",  "w" => 8],
            ["u" => "Omiya",     "v" => "Yokohama",  "w" => 5],
        ];
        $dist = bellman_ford($edges, $vertices, "Tokyo");
        $this->assertSame($dist["Shinagawa"], 5);
        $this->assertSame($dist["Yokohama"], 13);
        $this->assertSame($dist["Omiya"], 20);
    }

    public function testNegativeEdge() {
        $vertices = ["A", "B", "C"];
        $edges = [
            ["u" => "A", "v" => "B", "w" => 6],
            ["u" => "A", "v" => "C", "w" => 5],
            ["u" => "B", "v" => "C", "w" => -2],
        ];
        $dist = bellman_ford($edges, $vertices, "A");
        $this->assertSame($dist["B"], 6);   // A->B = 6
        $this->assertSame($dist["C"], 4);   // A->C = A->B->C = 6 + (-2) = 4
    }

    public function testNegativeCycle() {
        $vertices = ["X", "Y"];
        $edges = [
            ["u" => "X", "v" => "Y", "w" => 1],
            ["u" => "Y", "v" => "X", "w" => -2],
        ];
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("負閉路が検出されました。");
        $dist = bellman_ford($edges, $vertices, "X");
    }
}
