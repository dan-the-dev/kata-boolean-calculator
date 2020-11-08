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

    public function testParsingAndOperatorWithTrueAndTrueToTrue(): void
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

    public function testParsingOrOperatorWithTrueOrTrueToTrue(): void
    {
        $actual = $this->booleanCalculator->handle('TRUE OR TRUE');

        $this->assertEquals(true, $actual);
    }

    public function testParsingOrOperatorWithTrueOrFalseToTrue(): void
    {
        $actual = $this->booleanCalculator->handle('TRUE OR FALSE');

        $this->assertEquals(true, $actual);
    }

    public function testParsingOrOperatorWithFalseOrTrueToTrue(): void
    {
        $actual = $this->booleanCalculator->handle('FALSE OR TRUE');

        $this->assertEquals(true, $actual);
    }

    public function testParsingComplexStringWithMultipleOperators(): void
    {
        $actual = $this->booleanCalculator->handle('TRUE OR TRUE OR TRUE AND FALSE');

        $this->assertEquals(true, $actual);
    }

    public function testParsingASecondComplexStringWithMultipleOperators(): void
    {
        $actual = $this->booleanCalculator->handle('TRUE OR FALSE AND NOT FALSE');

        $this->assertEquals(true, $actual);
    }

    public function testParsingAnotherComplexStringWithMultipleOperators(): void
    {
        $actual = $this->booleanCalculator->handle('FALSE OR FALSE AND FALSE OR NOT TRUE AND NOT TRUE');

        $this->assertEquals(FALSE, $actual);
    }
}
