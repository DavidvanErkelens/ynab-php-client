<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

interface PayeesResponseInterface
{
    /**
     * @return PayeesResponseDataInterface
     */
    public function getData(): PayeesResponseDataInterface;
}
