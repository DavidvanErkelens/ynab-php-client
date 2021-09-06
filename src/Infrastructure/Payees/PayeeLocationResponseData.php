<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\PayeeLocation;

class PayeeLocationResponseData implements PayeeLocationResponseDataInterface
{
    private PayeeLocation $payeeLocation;

    /**
     * @return PayeeLocation
     */
    public function getPayeeLocation(): PayeeLocation
    {
        return $this->payeeLocation;
    }

    /**
     * @param PayeeLocation $payeeLocation
     */
    public function setPayeeLocation(PayeeLocation $payeeLocation): void
    {
        $this->payeeLocation = $payeeLocation;
    }
}
