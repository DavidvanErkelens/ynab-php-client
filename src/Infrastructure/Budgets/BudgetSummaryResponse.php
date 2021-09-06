<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<BudgetSummaryResponse>
 */
class BudgetSummaryResponse extends DeserializableObject implements BudgetSummaryResponseInterface
{
    private BudgetSummaryResponseData $data;

    /**
     * @return BudgetSummaryResponseData
     */
    public function getData(): BudgetSummaryResponseData
    {
        return $this->data;
    }

    /**
     * @param BudgetSummaryResponseData $data
     * @return BudgetSummaryResponse
     */
    public function setData(BudgetSummaryResponseData $data): BudgetSummaryResponse
    {
        $this->data = $data;
        return $this;
    }
}
