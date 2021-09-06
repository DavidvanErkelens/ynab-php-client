<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Model\Budgets\BudgetSummary;

interface BudgetSummaryResponseDataInterface
{
    /**
     * @return BudgetSummary[]
     */
    public function getBudgets(): array;

    /**
     * @return BudgetSummary|null
     */
    public function getDefaultBudget(): ?BudgetSummary;
}
