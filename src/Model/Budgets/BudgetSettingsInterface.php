<?php

declare(strict_types=1);

namespace YNAB\Model\Budgets;

use YNAB\Model\Shared\CurrencyFormatInterface;
use YNAB\Model\Shared\DateFormatInterface;

interface BudgetSettingsInterface
{
    /**
     * The date format setting for the budget. In some cases the format will not be available and will be specified as
     * null.
     * @return DateFormatInterface|null
     */
    public function getDateFormat(): ?DateFormatInterface;

    /**
     * The currency format setting for the budget. In some cases the format will not be available and will be specified
     * as null.
     * @return CurrencyFormatInterface|null
     */
    public function getCurrencyFormat(): ?CurrencyFormatInterface;
}
