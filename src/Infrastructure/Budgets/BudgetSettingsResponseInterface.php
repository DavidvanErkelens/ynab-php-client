<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

interface BudgetSettingsResponseInterface
{
    /**
     * @return BudgetSettingsResponseDataInterface
     */
    public function getData(): BudgetSettingsResponseDataInterface;
}
