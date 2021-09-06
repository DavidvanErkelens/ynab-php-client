<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\TransactionDetail;

class SaveTransactionsResponseData implements SaveTransactionsResponseDataInterface
{
    /** @var string[] */
    private array $transactionIds;
    private ?TransactionDetail $transaction;

    /** @var TransactionDetail[]|null */
    private ?array $transactions;

    /** @var string[]|null */
    private ?array $duplicateImportIds;

    private int $serverKnowledge;

    /**
     * @return string[]
     */
    public function getTransactionIds(): array
    {
        return $this->transactionIds;
    }

    /**
     * @param string[] $transactionIds
     * @return SaveTransactionsResponseData
     */
    public function setTransactionIds(array $transactionIds): SaveTransactionsResponseData
    {
        $this->transactionIds = $transactionIds;
        return $this;
    }

    /**
     * @return TransactionDetail|null
     */
    public function getTransaction(): ?TransactionDetail
    {
        return $this->transaction;
    }

    /**
     * @param TransactionDetail|null $transaction
     * @return SaveTransactionsResponseData
     */
    public function setTransaction(?TransactionDetail $transaction): SaveTransactionsResponseData
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * @return TransactionDetail[]|null
     */
    public function getTransactions(): ?array
    {
        return $this->transactions;
    }

    /**
     * @param TransactionDetail[]|null $transactions
     * @return SaveTransactionsResponseData
     */
    public function setTransactions(?array $transactions): SaveTransactionsResponseData
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getDuplicateImportIds(): ?array
    {
        return $this->duplicateImportIds;
    }

    /**
     * @param string[]|null $duplicateImportIds
     * @return SaveTransactionsResponseData
     */
    public function setDuplicateImportIds(?array $duplicateImportIds): SaveTransactionsResponseData
    {
        $this->duplicateImportIds = $duplicateImportIds;
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
     * @return SaveTransactionsResponseData
     */
    public function setServerKnowledge(int $serverKnowledge): SaveTransactionsResponseData
    {
        $this->serverKnowledge = $serverKnowledge;
        return $this;
    }
}
