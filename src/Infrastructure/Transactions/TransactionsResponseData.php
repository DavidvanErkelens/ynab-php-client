<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\TransactionDetail;

class TransactionsResponseData implements TransactionsResponseDataInterface
{
    /** @var TransactionDetail[] */
    private array $transactions;
    private int $serverKnowledge;

    /**
     * @return TransactionDetail[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param TransactionDetail[] $transactions
     * @return TransactionsResponseData
     */
    public function setTransactions(array $transactions): TransactionsResponseData
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * @return int
     */
    public function getServerKnowledge(): int
    {
        return $this->serverKnowledge;
    }

    /**
     * @param int $serverKnowledge
     * @return TransactionsResponseData
     */
    public function setServerKnowledge(int $serverKnowledge): TransactionsResponseData
    {
        $this->serverKnowledge = $serverKnowledge;
        return $this;
    }
}
