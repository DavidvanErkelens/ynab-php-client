<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\PayeeLocationInterface;

interface PayeeLocationsResponseDataInterface
{
    /**
     * @return PayeeLocationInterface[]
     */
    public function getPayeeLocations(): array;
}
