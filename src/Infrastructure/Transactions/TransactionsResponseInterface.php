<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface TransactionsResponseInterface
{
    /**
     * @return TransactionsResponseDataInterface
     */
    public function getData(): TransactionsResponseDataInterface;
}
