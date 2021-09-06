<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

interface TypeConverterInterface
{
    public function boolToString(bool $input): string;
}
