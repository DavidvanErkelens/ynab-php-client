<?php

declare(strict_types=1);

namespace YNAB\Model\Budgets;

use DateTime;
use YNAB\Model\Accounts\AccountInterface;
use YNAB\Model\Shared\CurrencyFormatInterface;
use YNAB\Model\Shared\DateFormatInterface;

interface BudgetSummaryInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * The last time any changes were made to the budget from either a web or mobile client
     * @return DateTime
     */
    public function getLastModifiedon(): DateTime;

    /**
     * The earliest budget month
     * @return string
     */
    public function getFirstMonth(): string;

    /**
     * The latest budget month
     * @return string
     */
    public function getLastMonth(): string;

    /**
     * The date format setting for the budget. In some cases the format will not be available and will be
     * specified as null.
     * @return DateFormatInterface
     */
    public function getDateFormat(): DateFormatInterface;

    /**
     * The currency format setting for the budget. In some cases the format will not be available and will be specified
     * as null.
     * @return CurrencyFormatInterface
     */
    public function getCurrencyFormat(): CurrencyFormatInterface;

    /**
     * The budget accounts (only included if include_accounts=true specified as query parameter)
     * @return AccountInterface[]
     */
    public function getAccounts(): array;
}
