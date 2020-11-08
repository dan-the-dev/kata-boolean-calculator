<?php

namespace Kata;

class BooleanCalculator
{
    public function handle(string $booleanString): bool
    {
        switch($booleanString){
            case 'TRUE':
            case 'FALSE':
                return $this->handleSingleValue($booleanString);
            case 'NOT TRUE':
            case 'NOT FALSE':
                return $this->handleNotOperator($booleanString);
            case 'TRUE AND TRUE':
            case 'TRUE AND FALSE':
            case 'FALSE AND TRUE':
            case 'FALSE AND FALSE':
                return $this->handleAndOperator($booleanString);
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

    private function handleAndOperator(string $booleanStringWithAnd): bool
    {
        $leftBoolean = explode(' ', $booleanStringWithAnd)[0];
        $rightBoolean = explode(' ', $booleanStringWithAnd)[2];
        return $this->handleSingleValue($leftBoolean) && $this->handleSingleValue($rightBoolean);
    }
}
