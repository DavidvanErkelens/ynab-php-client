<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<PayeeLocationsResponse>
 */
class PayeeLocationsResponse extends DeserializableObject implements PayeeLocationsResponseInterface
{
    private PayeeLocationsResponseData $data;

    /**
     * @return PayeeLocationsResponseData
     */
    public function getData(): PayeeLocationsResponseData
    {
        return $this->data;
    }

    /**
     * @param PayeeLocationsResponseData $data
     * @return PayeeLocationsResponse
     */
    public function setData(PayeeLocationsResponseData $data): PayeeLocationsResponse
    {
        $this->data = $data;
        return $this;
    }
}
