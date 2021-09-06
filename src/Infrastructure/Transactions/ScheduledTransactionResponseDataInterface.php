<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\ScheduledTransactionDetailInterface;

interface ScheduledTransactionResponseDataInterface
{
    /**
     * @return ScheduledTransactionDetailInterface
     */
    public function getScheduledTransaction(): ScheduledTransactionDetailInterface;
}
