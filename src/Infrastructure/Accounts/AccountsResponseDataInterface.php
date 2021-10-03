<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Model\Accounts\Account;

interface AccountsResponseDataInterface
{
    /**
     * @return Account[]
     */
    public function getAccounts(): array;

    /**
     * @return int
     */
    public function getServerKnowledge(): int;
}
