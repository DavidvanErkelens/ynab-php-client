<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Converters;

use DateTime;
use DateTimeInterface;
use RuntimeException;

class DateTimeConverter implements DateTimeConverterInterface
{
    /**
     * @throws RuntimeException
     */
    public function parseIso8601(string $dateTime): DateTime
    {
        $result = DateTime::createFromFormat(DateTimeInterface::ISO8601, $dateTime);

        if (!$result) {
            throw new RuntimeException("Could not parse '$dateTime', not in ISO-8601 format");
        }

        return $result;
    }

    public function toIso8601(DateTime $dateTime): string
    {
        return $dateTime->format(DateTimeInterface::ISO8601);
    }
}
