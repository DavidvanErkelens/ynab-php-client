<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

interface TransactionDetailInterface extends TransactionSummaryInterface
{
    /**
     * @return string
     */
    public function getAccountName(): string;

    /**
     * @return string|null
     */
    public function getPayeeName(): ?string;

    /**
     * @return string|null
     */
    public function getCategoryName(): ?string;

    /**
     * @return SubTransactionInterface[]
     */
    public function getSubtransactions(): array;
}
