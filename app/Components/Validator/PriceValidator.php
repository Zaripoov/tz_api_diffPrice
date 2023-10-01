<?php

namespace App\Components\Validator;

class PriceValidator implements Iverage
{
    private float $maxDeviation;
    private float $deviation;

    public function __construct(float $maxDeviation)
    {
        $this->maxDeviation = $maxDeviation;
    }

    public function diffPrice(float $new, float $old): bool
    {
        if ($old == 0) {
            return true; // Если предыдущая цена равна нулю, нет смысла в проверке.
        }

        $this->deviation = (($new - $old) / $old) * 100;

        return abs($this->deviation) <= $this->maxDeviation;
    }

    public function getDeviation(): float
    {
        return $this->deviation;
    }
}
