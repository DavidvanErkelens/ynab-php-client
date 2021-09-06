<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<ScheduledTransactionResponse>
 */
class ScheduledTransactionResponse extends DeserializableObject implements ScheduledTransactionResponseInterface
{
    private ScheduledTransactionResponseData $data;

    /**
     * @return ScheduledTransactionResponseData
     */
    public function getData(): ScheduledTransactionResponseData
    {
        return $this->data;
    }

    /**
     * @param ScheduledTransactionResponseData $data
     * @return ScheduledTransactionResponse
     */
    public function setData(ScheduledTransactionResponseData $data): ScheduledTransactionResponse
    {
        $this->data = $data;
        return $this;
    }
}
