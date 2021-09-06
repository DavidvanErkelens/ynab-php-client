<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<SaveTransactionsResponse>
 */
class SaveTransactionsResponse extends DeserializableObject implements SaveTransactionsResponseInterface
{
    private SaveTransactionsResponseData $data;

    /**
     * @return SaveTransactionsResponseData
     */
    public function getData(): SaveTransactionsResponseData
    {
        return $this->data;
    }

    /**
     * @param SaveTransactionsResponseData $data
     * @return SaveTransactionsResponse
     */
    public function setData(SaveTransactionsResponseData $data): SaveTransactionsResponse
    {
        $this->data = $data;
        return $this;
    }
}
