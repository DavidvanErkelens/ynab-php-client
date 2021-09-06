<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

interface PayeeResponseInterface
{
    /**
     * @return PayeeResponseDataInterface
     */
    public function getData(): PayeeResponseDataInterface;
}
