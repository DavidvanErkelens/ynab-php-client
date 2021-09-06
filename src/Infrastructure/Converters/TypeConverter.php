<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

class TypeConverter implements TypeConverterInterface
{
    public function boolToString(bool $input): string
    {
        return $input ? 'true' : 'false';
    }
}
