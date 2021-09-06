<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Model\Budgets\BudgetDetail;

class BudgetDetailResponseData implements BudgetDetailResponseDataInterface
{
    /** @var BudgetDetail  */
    private BudgetDetail $budget;
    private int $serverKnowledge;

    /**
     * @return int
     */
    public function getServerKnowledge(): int
    {
        return $this->serverKnowledge;
    }

    /**
     * @param int $serverKnowledge
     * @return BudgetDetailResponseData
     */
    public function setServerKnowledge(int $serverKnowledge): BudgetDetailResponseData
    {
        $this->serverKnowledge = $serverKnowledge;
        return $this;
    }

    /**
     * @return BudgetDetail
     */
    public function getBudget(): BudgetDetail
    {
        return $this->budget;
    }

    /**
     * @param BudgetDetail $budget
     * @return BudgetDetailResponseData
     */
    public function setBudget(BudgetDetail $budget): BudgetDetailResponseData
    {
        $this->budget = $budget;
        return $this;
    }
}
