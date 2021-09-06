<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface ScheduledTransactionResponseInterface
{
    /**
     * @return ScheduledTransactionResponseDataInterface
     */
    public function getData(): ScheduledTransactionResponseDataInterface;
}
