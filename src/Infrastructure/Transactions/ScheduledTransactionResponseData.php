<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\ScheduledTransactionDetail;

class ScheduledTransactionResponseData implements ScheduledTransactionResponseDataInterface
{
    private ScheduledTransactionDetail $scheduledTransaction;

    /**
     * @return ScheduledTransactionDetail
     */
    public function getScheduledTransaction(): ScheduledTransactionDetail
    {
        return $this->scheduledTransaction;
    }

    /**
     * @param ScheduledTransactionDetail $scheduledTransaction
     * @return ScheduledTransactionResponseData
     */
    public function setScheduledTransaction(
        ScheduledTransactionDetail $scheduledTransaction
    ): ScheduledTransactionResponseData {
        $this->scheduledTransaction = $scheduledTransaction;
        return $this;
    }
}
