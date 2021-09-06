<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface SaveTransactionsResponseInterface
{
    /**
     * @return SaveTransactionsResponseDataInterface
     */
    public function getData(): SaveTransactionsResponseDataInterface;
}
