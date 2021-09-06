<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

interface BudgetDetailResponseInterface
{
    /**
     * @return BudgetDetailResponseDataInterface
     */
    public function getData(): BudgetDetailResponseDataInterface;
}
