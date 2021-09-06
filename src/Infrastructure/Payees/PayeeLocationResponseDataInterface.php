<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\PayeeLocationInterface;

interface PayeeLocationResponseDataInterface
{
    /**
     * @return PayeeLocationInterface
     */
    public function getPayeeLocation(): PayeeLocationInterface;
}
