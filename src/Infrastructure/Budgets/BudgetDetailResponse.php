<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<BudgetDetailResponse>
 */
class BudgetDetailResponse extends DeserializableObject implements BudgetDetailResponseInterface
{
    private BudgetDetailResponseData $data;

    /**
     * @return BudgetDetailResponseData
     */
    public function getData(): BudgetDetailResponseData
    {
        return $this->data;
    }

    /**
     * @param BudgetDetailResponseData $data
     * @return BudgetDetailResponse
     */
    public function setData(BudgetDetailResponseData $data): BudgetDetailResponse
    {
        $this->data = $data;
        return $this;
    }
}
