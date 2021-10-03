<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

class MilliunitsConverter implements MilliunitsConverterInterface
{
    private const RATE = 1000.0;

    public function toFloat(int $milliunits): float
    {
        return $milliunits / self::RATE;
    }

    public function fromFloat(float $amount): int
    {
        return (int) ($amount * self::RATE);
    }
}
