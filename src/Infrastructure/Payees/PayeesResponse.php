<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<PayeesResponse>
 */
class PayeesResponse extends DeserializableObject implements PayeesResponseInterface
{
    private PayeesResponseData $data;

    /**
     * @return PayeesResponseData
     */
    public function getData(): PayeesResponseData
    {
        return $this->data;
    }

    /**
     * @param PayeesResponseData $data
     * @return PayeesResponse
     */
    public function setData(PayeesResponseData $data): PayeesResponse
    {
        $this->data = $data;
        return $this;
    }
}
