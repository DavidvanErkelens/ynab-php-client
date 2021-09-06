<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<BudgetSettingsResponse>
 */
class BudgetSettingsResponse extends DeserializableObject implements BudgetSettingsResponseInterface
{
    private BudgetSettingsResponseData $data;

    /**
     * @return BudgetSettingsResponseData
     */
    public function getData(): BudgetSettingsResponseData
    {
        return $this->data;
    }

    /**
     * @param BudgetSettingsResponseData $data
     * @return BudgetSettingsResponse
     */
    public function setData(BudgetSettingsResponseData $data): BudgetSettingsResponse
    {
        $this->data = $data;
        return $this;
    }
}
