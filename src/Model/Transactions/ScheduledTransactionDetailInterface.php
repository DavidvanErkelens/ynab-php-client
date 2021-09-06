<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

interface ScheduledTransactionDetailInterface extends ScheduledTransactionSummaryInterface
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
     * @return ScheduledSubTransaction[]
     */
    public function getSubtransactions(): array;
}
