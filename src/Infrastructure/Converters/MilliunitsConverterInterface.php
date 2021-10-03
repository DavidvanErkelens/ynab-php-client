<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

interface MilliunitsConverterInterface
{
    public function toFloat(int $milliunits): float;
    public function fromFloat(float $amount): int;
}
