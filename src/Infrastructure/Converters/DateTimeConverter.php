<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

use DateTime;
use RuntimeException;

class DateTimeConverter implements DateTimeConverterInterface
{
    /**
     * @throws RuntimeException
     */
    public function parseIso8601(string $dateTime): DateTime
    {
        $result = DateTime::createFromFormat(DATE_ISO8601, $dateTime);

        if (!$result) {
            throw new RuntimeException("Could not parse '$dateTime', not in ISO-8601 format");
        }

        return $result;
    }
}
