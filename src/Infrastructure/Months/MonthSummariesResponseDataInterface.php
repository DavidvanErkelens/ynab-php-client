<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

use YNAB\Model\Months\MonthSummaryInterface;

interface MonthSummariesResponseDataInterface
{
    /**
     * @return MonthSummaryInterface[]
     */
    public function getMonths(): array;

    /**
     * @return int
     */
    public function getServerKnowledge(): int;
}
