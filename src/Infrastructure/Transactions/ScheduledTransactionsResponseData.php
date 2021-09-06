<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\ScheduledTransactionDetail;

class ScheduledTransactionsResponseData implements ScheduledTransactionsResponseDataInterface
{
    /** @var ScheduledTransactionDetail[] */
    private array $scheduledTransactions;

    /**
     * @return ScheduledTransactionDetail[]
     */
    public function getScheduledTransactions(): array
    {
        return $this->scheduledTransactions;
    }

    /**
     * @param ScheduledTransactionDetail[] $scheduledTransactions
     * @return ScheduledTransactionsResponseData
     */
    public function setScheduledTransactions(array $scheduledTransactions): ScheduledTransactionsResponseData
    {
        $this->scheduledTransactions = $scheduledTransactions;
        return $this;
    }
}
