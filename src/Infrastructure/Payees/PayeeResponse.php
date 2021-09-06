<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<PayeeResponse>
 */
class PayeeResponse extends DeserializableObject implements PayeeResponseInterface
{
    private PayeeResponseData $data;

    /**
     * @return PayeeResponseData
     */
    public function getData(): PayeeResponseData
    {
        return $this->data;
    }

    /**
     * @param PayeeResponseData $data
     * @return PayeeResponse
     */
    public function setData(PayeeResponseData $data): PayeeResponse
    {
        $this->data = $data;
        return $this;
    }
}
