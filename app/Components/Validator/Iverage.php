<?php

namespace App\Components\Validator;

interface Iverage
{
    public function diffPrice(float $new, float $old): bool;

    public function getDeviation(): float;
}
