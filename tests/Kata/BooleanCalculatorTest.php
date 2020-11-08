<?php

namespace Kata;

use PHPUnit\Framework\TestCase;
use Kata\BooleanCalculator;

class BooleanCalculatorTest extends TestCase
{
    /**
     * @var \Kata\BooleanCalculator
     */
    private $booleanCalculator;

    protected function setUp(): void
    {
        $this->booleanCalculator = new BooleanCalculator();
    }

    public function testShallPass(): void
    {
        $this->assertEquals(1, 1);
    }

}
