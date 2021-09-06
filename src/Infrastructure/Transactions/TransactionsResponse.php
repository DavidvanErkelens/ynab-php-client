<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<TransactionsResponse>
 */
class TransactionsResponse extends DeserializableObject implements TransactionsResponseInterface
{
    private TransactionsResponseData $data;

    /**
     * @return TransactionsResponseData
     */
    public function getData(): TransactionsResponseData
    {
        return $this->data;
    }

    /**
     * @param TransactionsResponseData $data
     * @return TransactionsResponse
     */
    public function setData(TransactionsResponseData $data): TransactionsResponse
    {
        $this->data = $data;
        return $this;
    }
}
