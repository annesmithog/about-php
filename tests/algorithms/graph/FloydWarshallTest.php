<?php

require_once __DIR__ . "/../../../src/algorithms/graph/floyd_warshall.php";

use PHPUnit\Framework\TestCase;
use function Src\Algorithms\Graph\floyd_warshall;

class FloydWarshallTest extends TestCase {
    public function testSimpleGraph() {
        $INF = INF;
        $dist = [
            'A' => ['A' => 0,   'B' => 3,   'C' => $INF],
            'B' => ['A' => $INF, 'B' => 0,   'C' => 1],
            'C' => ['A' => 2,   'B' => $INF, 'C' => 0],
        ];
        $expected = [
            'A' => ['A' => 0, 'B' => 3, 'C' => 4],
            'B' => ['A' => 3, 'B' => 0, 'C' => 1],
            'C' => ['A' => 2, 'B' => 5, 'C' => 0],
        ];
        $this->assertSame($expected, floyd_warshall($dist));
    }

    public function testAlreadyOptiomalGraph() {
        $dist = [
            'X' => ['X' => 0, 'Y' => 5],
            'Y' => ['X' => INF, 'Y' => 0],
        ];
        $this->assertSame($dist, floyd_warshall($dist));
    }

    public function testIsolatedNode() {
        $INF = INF;
        $dist = [
            'A' => ['A' => 0,   'B' => 2,   'C' => $INF],
            'B' => ['A' => 2,   'B' => 0,   'C' => $INF],
            'C' => ['A' => $INF,'B' => $INF,'C' => 0],
        ];
        $expected = [
            'A' => ['A' => 0, 'B' => 2, 'C' => $INF],
            'B' => ['A' => 2, 'B' => 0, 'C' => $INF],
            'C' => ['A' => $INF,'B' => $INF,'C' => 0],
        ];
        $this->assertSame($expected, floyd_warshall($dist));
    }
}
