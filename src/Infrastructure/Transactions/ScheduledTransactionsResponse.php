<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<ScheduledTransactionsResponse>
 */
class ScheduledTransactionsResponse extends DeserializableObject implements ScheduledTransactionsResponseInterface
{
    private ScheduledTransactionsResponseData $data;

    /**
     * @return ScheduledTransactionsResponseData
     */
    public function getData(): ScheduledTransactionsResponseData
    {
        return $this->data;
    }

    /**
     * @param ScheduledTransactionsResponseData $data
     * @return ScheduledTransactionsResponse
     */
    public function setData(ScheduledTransactionsResponseData $data): ScheduledTransactionsResponse
    {
        $this->data = $data;
        return $this;
    }
}
