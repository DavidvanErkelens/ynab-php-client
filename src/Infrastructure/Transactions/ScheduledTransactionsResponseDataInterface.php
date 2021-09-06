<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\ScheduledTransactionDetailInterface;

interface ScheduledTransactionsResponseDataInterface
{
    /**
     * @return ScheduledTransactionDetailInterface[]
     */
    public function getScheduledTransactions(): array;
}
