<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\TransactionDetail;

interface SaveTransactionsResponseDataInterface
{
    /**
     * @return string[]
     */
    public function getTransactionIds(): array;

    /**
     * @return TransactionDetail|null
     */
    public function getTransaction(): ?TransactionDetail;

    /**
     * @return TransactionDetail[]|null
     */
    public function getTransactions(): ?array;

    /**
     * @return string[]|null
     */
    public function getDuplicateImportIds(): ?array;

    /**
     * @return int
     */
    public function getServerKnowledge(): int;
}
