<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\PayeeInterface;

interface PayeeResponseDataInterface
{
    /**
     * @return PayeeInterface
     */
    public function getPayee(): PayeeInterface;
}
