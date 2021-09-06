<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

interface MonthSummariesResponseInterface
{
    /**
     * @return MonthSummariesResponseDataInterface
     */
    public function getData(): MonthSummariesResponseDataInterface;
}
