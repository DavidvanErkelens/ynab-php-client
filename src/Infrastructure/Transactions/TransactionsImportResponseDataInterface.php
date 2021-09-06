<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface TransactionsImportResponseDataInterface
{
    /**
     * @return string[]
     */
    public function getTransactionIds(): array;
}
