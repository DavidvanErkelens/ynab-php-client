<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

interface BudgetSummaryResponseInterface
{
    /**
     * @return BudgetSummaryResponseDataInterface
     */
    public function getData(): BudgetSummaryResponseDataInterface;
}
