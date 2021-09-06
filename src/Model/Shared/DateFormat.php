<?php

declare(strict_types=1);

namespace YNAB\Model\Shared;

class DateFormat implements DateFormatInterface
{
    private string $format;

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return DateFormat
     */
    public function setFormat(string $format): DateFormat
    {
        $this->format = $format;
        return $this;
    }
}
