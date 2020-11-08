<?php

namespace Kata;

class BooleanCalculator
{
    const NOT_OPERATOR = 'NOT';
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR = 'OR';
    const SEPARATOR = ' ';

    public function handle(string $booleanString): bool
    {
        $booleanStringArray = explode(self::SEPARATOR, $booleanString);
        $booleanStringArray = $this->parseNotOperatorInString($booleanStringArray);
        $booleanStringArray = $this->parseAndOperatorInString($booleanStringArray);
        $booleanStringArray = $this->parseOrOperatorInString($booleanStringArray);
        return $this->handleSingleValue($booleanStringArray[0]);
    }

    private function handleSingleValue(string $booleanString): bool
    {
        return filter_var($booleanString, FILTER_VALIDATE_BOOLEAN);
    }

    private function handleNotOperator(string $booleanStringWithNot): bool
    {
        $booleanString = explode(self::SEPARATOR, $booleanStringWithNot)[1];
        return !filter_var($booleanString, FILTER_VALIDATE_BOOLEAN);
    }

    private function handleAndOrOperators(string $booleanString): bool
    {
        $booleanStringArray = explode(self::SEPARATOR, $booleanString);
        $leftBoolean = $booleanStringArray[0];
        $operator = $booleanStringArray[1];
        $rightBoolean = $booleanStringArray[2];
        $result = null;
        switch ($operator){
            case 'AND':
                $result = $this->handleSingleValue($leftBoolean) && $this->handleSingleValue($rightBoolean);
                break;
            case 'OR':
                $result = $this->handleSingleValue($leftBoolean) || $this->handleSingleValue($rightBoolean);
                break;
        }
        return $result;
    }

    private function boolToString(bool $bool): string
    {
        return $bool ? 'TRUE' : 'FALSE';
    }

    public function parseNotOperatorInString(array $booleanStringArray): array
    {
        while (($key = array_search(self::NOT_OPERATOR, $booleanStringArray)) !== FALSE) {
            $stringToReplace = implode(self::SEPARATOR, [$booleanStringArray[$key], $booleanStringArray[$key + 1]]);
            $boolResult = $this->boolToString($this->handleNotOperator($stringToReplace));
            $booleanStringArray[$key] = $boolResult;
            array_splice($booleanStringArray, $key + 1);
        }
        return $booleanStringArray;
    }

    public function parseAndOperatorInString(array $booleanStringArray): array
    {
        while ($key = array_search(self::AND_OPERATOR, $booleanStringArray)) {
            $stringToReplace = implode(self::SEPARATOR, [$booleanStringArray[$key-1], $booleanStringArray[$key], $booleanStringArray[$key + 1]]);
            $boolResult = $this->boolToString($this->handleAndOrOperators($stringToReplace));
            $booleanStringArray[$key-1] = $boolResult;
            array_splice($booleanStringArray, $key);
            array_splice($booleanStringArray, $key + 1);
        }
        return $booleanStringArray;
    }

    public function parseOrOperatorInString(array $booleanStringArray): array
    {
        while ($key = array_search(self::OR_OPERATOR, $booleanStringArray)) {
            $stringToReplace = implode(self::SEPARATOR, [$booleanStringArray[$key-1], $booleanStringArray[$key], $booleanStringArray[$key + 1]]);
            $boolResult = $this->boolToString($this->handleAndOrOperators($stringToReplace));
            $booleanStringArray[$key-1] = $boolResult;
            array_splice($booleanStringArray, $key);
            array_splice($booleanStringArray, $key + 1);
        }
        return $booleanStringArray;
    }
}
