<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

interface TransactionsImportResponseInterface
{
    /**
     * @return TransactionsImportResponseDataInterface
     */
    public function getData(): TransactionsImportResponseDataInterface;
}
