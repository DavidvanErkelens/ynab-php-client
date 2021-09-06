<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<PayeeLocationResponse>
 */
class PayeeLocationResponse extends DeserializableObject implements PayeeLocationResponseInterface
{
    private PayeeLocationResponseData $data;

    /**
     * @return PayeeLocationResponseData
     */
    public function getData(): PayeeLocationResponseData
    {
        return $this->data;
    }

    /**
     * @param PayeeLocationResponseData $data
     */
    public function setData(PayeeLocationResponseData $data): void
    {
        $this->data = $data;
    }
}
