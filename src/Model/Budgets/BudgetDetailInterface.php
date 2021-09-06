<?php

declare(strict_types=1);

namespace YNAB\Model\Budgets;

use YNAB\Model\Categories\CategoryGroupInterface;
use YNAB\Model\Categories\CategoryInterface;
use YNAB\Model\Months\MonthDetailInterface;
use YNAB\Model\Payees\PayeeInterface;
use YNAB\Model\Payees\PayeeLocationInterface;
use YNAB\Model\Transactions\ScheduledSubTransaction;
use YNAB\Model\Transactions\ScheduledTransactionSummary;
use YNAB\Model\Transactions\SubTransaction;
use YNAB\Model\Transactions\TransactionSummaryInterface;

interface BudgetDetailInterface extends BudgetSummaryInterface
{
    /**
     * @return PayeeInterface[]
     */
    public function getPayees(): array;

    /**
     * @return PayeeLocationInterface[]
     */
    public function getPayeeLocations(): array;

    /**
     * @return CategoryGroupInterface[]
     */
    public function getCategoryGroups(): array;

    /**
     * @return CategoryInterface[]
     */
    public function getCategories(): array;

    /**
     * @return MonthDetailInterface[]
     */
    public function getMonths(): array;

    /**
     * @return TransactionSummaryInterface[]
     */
    public function getTransactions(): array;

    /**
     * @return SubTransaction[]
     */
    public function getSubtransactions(): array;

    /**
     * @return ScheduledTransactionSummary[]
     */
    public function getScheduledTransactions(): array;

    /**
     * @return ScheduledSubTransaction[]
     */
    public function getScheduledSubtransactions(): array;
}
