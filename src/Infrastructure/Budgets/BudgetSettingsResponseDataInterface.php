<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Model\Budgets\BudgetSettingsInterface;

interface BudgetSettingsResponseDataInterface
{
    /**
     * @return BudgetSettingsInterface
     */
    public function getSettings(): BudgetSettingsInterface;
}
