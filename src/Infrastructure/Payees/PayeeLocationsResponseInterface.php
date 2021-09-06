<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

interface PayeeLocationsResponseInterface
{
    /**
     * @return PayeeLocationsResponseDataInterface
     */
    public function getData(): PayeeLocationsResponseDataInterface;
}
