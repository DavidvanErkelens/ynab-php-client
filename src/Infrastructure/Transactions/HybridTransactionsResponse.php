<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<HybridTransactionsResponse>
 */
class HybridTransactionsResponse extends DeserializableObject implements HybridTransactionsResponseInterface
{
    private HybridTransactionsResponseData $data;

    /**
     * @return HybridTransactionsResponseData
     */
    public function getData(): HybridTransactionsResponseData
    {
        return $this->data;
    }

    /**
     * @param HybridTransactionsResponseData $data
     * @return HybridTransactionsResponse
     */
    public function setData(HybridTransactionsResponseData $data): HybridTransactionsResponse
    {
        $this->data = $data;
        return $this;
    }
}
