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

    public function testParsingSingleValueTrueToTrue(): void
    {
        $actual = $this->booleanCalculator->handle("TRUE");

        $this->assertEquals(true, $actual);
    }

    public function testParsingSingleValueFalseToFalse(): void
    {
        $actual = $this->booleanCalculator->handle("FALSE");

        $this->assertEquals(false, $actual);
    }

    public function testParsingSingleValueFalseWithNotOperatorToTrue(): void
    {
        $actual = $this->booleanCalculator->handle("NOT FALSE");

        $this->assertEquals(true, $actual);
    }

    public function testParsingSingleValueTrueWithNotOperatorToFalse(): void
    {
        $actual = $this->booleanCalculator->handle("NOT TRUE");

        $this->assertEquals(false, $actual);
    }

    public function testParsingAndOperatorWithTrueAndTrueeToTrue(): void
    {
        $actual = $this->booleanCalculator->handle('TRUE AND TRUE');

        $this->assertEquals(true, $actual);
    }

    public function testParsingAndOperatorWithTrueAndFalseToFalse(): void
    {
        $actual = $this->booleanCalculator->handle('TRUE AND FALSE');

        $this->assertEquals(false, $actual);
    }

    public function testParsingAndOperatorWithFalseAndTrueToFalse(): void
    {
        $actual = $this->booleanCalculator->handle('FALSE AND TRUE');

        $this->assertEquals(false, $actual);
    }

    public function testParsingAndOperatorWithFalseAndFalseToFalse(): void
    {
        $actual = $this->booleanCalculator->handle('FALSE AND FALSE');

        $this->assertEquals(false, $actual);
    }
}
