<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

use YNAB\Model\Months\MonthDetail;

class MonthDetailResponseData implements MonthDetailResponseDataInterface
{
    private MonthDetail $month;

    /**
     * @return MonthDetail
     */
    public function getMonth(): MonthDetail
    {
        return $this->month;
    }

    /**
     * @param MonthDetail $month
     * @return MonthDetailResponseData
     */
    public function setMonth(MonthDetail $month): MonthDetailResponseData
    {
        $this->month = $month;
        return $this;
    }
}
