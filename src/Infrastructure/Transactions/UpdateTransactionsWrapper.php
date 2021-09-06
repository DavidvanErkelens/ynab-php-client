<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\SerializableObject;
use YNAB\Model\Transactions\UpdateTransaction;

class UpdateTransactionsWrapper extends SerializableObject
{
    /** @var UpdateTransaction[] */
    private array $transactions;

    /**
     * @param UpdateTransaction[] $transactions
     */
    public function __construct(array $transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return UpdateTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param UpdateTransaction[] $transactions
     * @return UpdateTransactionsWrapper
     */
    public function setTransactions(array $transactions): UpdateTransactionsWrapper
    {
        $this->transactions = $transactions;
        return $this;
    }
}
