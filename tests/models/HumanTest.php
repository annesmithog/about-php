<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/models/Human.php';

class HumanTest extends TestCase {
    public function testIntroduce() {
        $human = new Human("Anne", 25, "USA");
        $this->assertSame("Hi, I'm Anne.", $human->introduce());
    }
}
