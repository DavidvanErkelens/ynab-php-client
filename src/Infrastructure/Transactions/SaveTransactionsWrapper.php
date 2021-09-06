<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\SerializableObject;
use YNAB\Model\Transactions\SaveTransaction;

class SaveTransactionsWrapper extends SerializableObject
{
    private ?SaveTransaction $transaction;

    /** @var SaveTransaction[]|null */
    private ?array $transactions;

    /**
     * @param SaveTransaction|null $transaction
     * @param SaveTransaction[]|null $transactions
     */
    private function __construct(?SaveTransaction $transaction, ?array $transactions)
    {
        $this->transaction = $transaction;
        $this->transactions = $transactions;
    }

    public static function wrapSingle(SaveTransaction $transaction): SaveTransactionsWrapper
    {
        return new self($transaction, null);
    }

    /**
     * @param SaveTransaction[] $transactions
     */
    public static function wrapMultiple(array $transactions): SaveTransactionsWrapper
    {
        return new self(null, $transactions);
    }

    /**
     * @return SaveTransaction|null
     */
    public function getTransaction(): ?SaveTransaction
    {
        return $this->transaction;
    }

    /**
     * @return SaveTransaction[]|null
     */
    public function getTransactions(): ?array
    {
        return $this->transactions;
    }
}
