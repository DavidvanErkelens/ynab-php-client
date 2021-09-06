<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Model\Accounts\AccountInterface;

interface AccountResponseDataInterface
{
    /**
     * @return AccountInterface
     */
    public function getAccount(): AccountInterface;
}
