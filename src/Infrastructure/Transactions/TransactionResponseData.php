<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\TransactionDetail;

class TransactionResponseData implements TransactionResponseDataInterface
{
    private TransactionDetail $transaction;

    /**
     * @return TransactionDetail
     */
    public function getTransaction(): TransactionDetail
    {
        return $this->transaction;
    }

    /**
     * @param TransactionDetail $transaction
     * @return TransactionResponseData
     */
    public function setTransaction(TransactionDetail $transaction): TransactionResponseData
    {
        $this->transaction = $transaction;
        return $this;
    }
}
