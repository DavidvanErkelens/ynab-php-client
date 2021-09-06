<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\PayeeLocation;

class PayeeLocationsResponseData implements PayeeLocationsResponseDataInterface
{
    /** @var PayeeLocation[] */
    private array $payeeLocations;

    /**
     * @return PayeeLocation[]
     */
    public function getPayeeLocations(): array
    {
        return $this->payeeLocations;
    }

    /**
     * @param PayeeLocation[] $payeeLocations
     */
    public function setPayeeLocations(array $payeeLocations): void
    {
        $this->payeeLocations = $payeeLocations;
    }
}
