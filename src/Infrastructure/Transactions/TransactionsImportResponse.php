<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<TransactionsImportResponse>
 */
class TransactionsImportResponse extends DeserializableObject implements TransactionsImportResponseInterface
{
    private TransactionsImportResponseData $data;

    /**
     * @return TransactionsImportResponseData
     */
    public function getData(): TransactionsImportResponseData
    {
        return $this->data;
    }

    /**
     * @param TransactionsImportResponseData $data
     * @return TransactionsImportResponse
     */
    public function setData(TransactionsImportResponseData $data): TransactionsImportResponse
    {
        $this->data = $data;
        return $this;
    }
}
