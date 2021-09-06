<?php

declare(strict_types=1);

namespace YNAB\Model\Budgets;

use YNAB\Model\Shared\CurrencyFormat;
use YNAB\Model\Shared\DateFormat;

class BudgetSettings implements BudgetSettingsInterface
{
    private ?DateFormat $dateFormat;
    private ?CurrencyFormat $currencyFormat;

    /**
     * @return DateFormat|null
     */
    public function getDateFormat(): ?DateFormat
    {
        return $this->dateFormat;
    }

    /**
     * @param DateFormat|null $dateFormat
     * @return BudgetSettings
     */
    public function setDateFormat(?DateFormat $dateFormat): BudgetSettings
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * @return CurrencyFormat|null
     */
    public function getCurrencyFormat(): ?CurrencyFormat
    {
        return $this->currencyFormat;
    }

    /**
     * @param CurrencyFormat|null $currencyFormat
     * @return BudgetSettings
     */
    public function setCurrencyFormat(?CurrencyFormat $currencyFormat): BudgetSettings
    {
        $this->currencyFormat = $currencyFormat;
        return $this;
    }
}
