<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\TransactionDetailInterface;

interface TransactionsResponseDataInterface
{
    /**
     * @return TransactionDetailInterface[]
     */
    public function getTransactions(): array;

    /**
     * @return int
     */
    public function getServerKnowledge(): int;
}
