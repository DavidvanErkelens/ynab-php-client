<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

use DateTime;

interface DateTimeConverterInterface
{
    public function parseIso8601(string $dateTime): DateTime;
}
