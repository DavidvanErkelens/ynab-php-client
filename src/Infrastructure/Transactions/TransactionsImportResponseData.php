<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

class TransactionsImportResponseData implements TransactionsImportResponseDataInterface
{
    /** @var string[] */
    private array $transactionIds;

    /**
     * @return string[]
     */
    public function getTransactionIds(): array
    {
        return $this->transactionIds;
    }

    /**
     * @param string[] $transactionIds
     * @return TransactionsImportResponseData
     */
    public function setTransactionIds(array $transactionIds): TransactionsImportResponseData
    {
        $this->transactionIds = $transactionIds;
        return $this;
    }
}
