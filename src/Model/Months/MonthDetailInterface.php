<?php

declare(strict_types=1);

namespace YNAB\Model\Months;

use YNAB\Model\Categories\CategoryInterface;

interface MonthDetailInterface extends MonthSummaryInterface
{
    /**
     * The budget month categories. Amounts (budgeted, activity, balance, etc.)
     * are specific to the {month} parameter specified.
     * @return CategoryInterface[]
     */
    public function getCategories(): array;
}
