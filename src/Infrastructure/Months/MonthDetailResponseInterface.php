<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

interface MonthDetailResponseInterface
{
    /**
     * @return MonthDetailResponseDataInterface
     */
    public function getData(): MonthDetailResponseDataInterface;
}
