<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\HybridTransaction;

class HybridTransactionsResponseData implements HybridTransactionsResponseDataInterface
{
    /** @var HybridTransaction[] */
    private array $transactions;

    /**
     * @return HybridTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param HybridTransaction[] $transactions
     * @return HybridTransactionsResponseData
     */
    public function setTransactions(array $transactions): HybridTransactionsResponseData
    {
        $this->transactions = $transactions;
        return $this;
    }
}
