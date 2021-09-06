<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\PayeeInterface;

interface PayeesResponseDataInterface
{
    /**
     * @return PayeeInterface[]
     */
    public function getPayees(): array;

    /**
     * @return int
     */
    public function getServerKnowledge(): int;
}
