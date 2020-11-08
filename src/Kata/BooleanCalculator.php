<?php

namespace Kata;

class BooleanCalculator
{

    public function handle(string $booleanString): bool
    {
        $booleanStringArray = explode(' ', $booleanString);
        switch(count($booleanStringArray)){
            case 1:
                return $this->handleSingleValue($booleanString);
            case 2:
                return $this->handleNotOperator($booleanString);
            case 3:
                return $this->handleAndOrOperators($booleanStringArray);
        }
    }

    private function handleSingleValue(string $booleanString): bool
    {
        return filter_var($booleanString, FILTER_VALIDATE_BOOLEAN);
    }

    private function handleNotOperator(string $booleanStringWithNot): bool
    {
        $booleanString = explode(' ', $booleanStringWithNot)[1];
        return !filter_var($booleanString, FILTER_VALIDATE_BOOLEAN);
    }

    private function handleAndOrOperators(array $booleanStringArray): bool
    {
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

}
