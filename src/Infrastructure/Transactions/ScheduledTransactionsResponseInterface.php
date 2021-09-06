<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface ScheduledTransactionsResponseInterface
{
    /**
     * @return ScheduledTransactionsResponseDataInterface
     */
    public function getData(): ScheduledTransactionsResponseDataInterface;
}
