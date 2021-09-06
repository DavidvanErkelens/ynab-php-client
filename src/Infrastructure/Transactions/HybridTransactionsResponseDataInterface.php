<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\HybridTransactionInterface;

interface HybridTransactionsResponseDataInterface
{
    /**
     * @return HybridTransactionInterface[]
     */
    public function getTransactions(): array;
}
