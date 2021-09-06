<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Model\Budgets\BudgetDetailInterface;

interface BudgetDetailResponseDataInterface
{
    /**
     * @return int
     */
    public function getServerKnowledge(): int;

    /**
     * @return BudgetDetailInterface
     */
    public function getBudget(): BudgetDetailInterface;
}
