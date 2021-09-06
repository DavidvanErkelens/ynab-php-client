<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

use YNAB\Model\Months\MonthDetailInterface;

interface MonthDetailResponseDataInterface
{
    /**
     * @return MonthDetailInterface
     */
    public function getMonth(): MonthDetailInterface;
}
