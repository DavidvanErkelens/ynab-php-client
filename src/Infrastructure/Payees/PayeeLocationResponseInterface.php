<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

interface PayeeLocationResponseInterface
{
    /**
     * @return PayeeLocationResponseDataInterface
     */
    public function getData(): PayeeLocationResponseDataInterface;
}
