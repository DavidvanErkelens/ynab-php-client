<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Model\Budgets\BudgetSummary;

class BudgetSummaryResponseData implements BudgetSummaryResponseDataInterface
{
    /**
     * @var BudgetSummary[]
     */
    private array $budgets;

    /**
     * @var BudgetSummary|null
     */
    private ?BudgetSummary $defaultBudget;

    /**
     * @return BudgetSummary[]
     */
    public function getBudgets(): array
    {
        return $this->budgets;
    }

    /**
     * @return BudgetSummary|null
     */
    public function getDefaultBudget(): ?BudgetSummary
    {
        return $this->defaultBudget;
    }

    /**
     * @param BudgetSummary[] $budgets
     * @return BudgetSummaryResponseData
     */
    public function setBudgets(array $budgets): BudgetSummaryResponseData
    {
        $this->budgets = $budgets;
        return $this;
    }

    /**
     * @param BudgetSummary|null $defaultBudget
     * @return BudgetSummaryResponseData
     */
    public function setDefaultBudget(?BudgetSummary $defaultBudget): BudgetSummaryResponseData
    {
        $this->defaultBudget = $defaultBudget;
        return $this;
    }
}
