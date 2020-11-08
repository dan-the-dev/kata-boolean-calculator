<?php

namespace Kata;

class BooleanCalculator
{
    public function handle(string $booleanString): bool
    {
        if ($booleanString === 'TRUE') {
            return true;
        } else {
            return false;
        }
    }
}
