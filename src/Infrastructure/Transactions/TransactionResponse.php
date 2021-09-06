<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<TransactionResponse>
 */
class TransactionResponse extends DeserializableObject implements TransactionResponseInterface
{
    private TransactionResponseData $data;

    /**
     * @return TransactionResponseData
     */
    public function getData(): TransactionResponseData
    {
        return $this->data;
    }

    /**
     * @param TransactionResponseData $data
     * @return TransactionResponse
     */
    public function setData(TransactionResponseData $data): TransactionResponse
    {
        $this->data = $data;
        return $this;
    }
}
