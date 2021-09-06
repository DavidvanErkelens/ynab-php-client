<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Budgets;

use YNAB\Model\Budgets\BudgetSettings;

class BudgetSettingsResponseData implements BudgetSettingsResponseDataInterface
{
    private BudgetSettings $settings;

    /**
     * @return BudgetSettings
     */
    public function getSettings(): BudgetSettings
    {
        return $this->settings;
    }

    /**
     * @param BudgetSettings $settings
     * @return BudgetSettingsResponseData
     */
    public function setSettings(BudgetSettings $settings): BudgetSettingsResponseData
    {
        $this->settings = $settings;
        return $this;
    }
}
