<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface HybridTransactionsResponseInterface
{
    /**
     * @return HybridTransactionsResponseData
     */
    public function getData(): HybridTransactionsResponseData;
}
