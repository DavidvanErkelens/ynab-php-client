<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\SerializableObject;
use YNAB\Model\Transactions\SaveTransaction;

class SaveTransactionWrapper extends SerializableObject
{
    private SaveTransaction $transaction;

    /**
     * @param SaveTransaction $transaction
     */
    public function __construct(SaveTransaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return SaveTransaction
     */
    public function getTransaction(): SaveTransaction
    {
        return $this->transaction;
    }

    /**
     * @param SaveTransaction $transaction
     * @return SaveTransactionWrapper
     */
    public function setTransaction(SaveTransaction $transaction): SaveTransactionWrapper
    {
        $this->transaction = $transaction;
        return $this;
    }
}
