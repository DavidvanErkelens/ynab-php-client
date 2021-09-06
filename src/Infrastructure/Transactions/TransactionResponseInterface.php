<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface TransactionResponseInterface
{
    /**
     * @return TransactionResponseDataInterface
     */
    public function getData(): TransactionResponseDataInterface;
}
