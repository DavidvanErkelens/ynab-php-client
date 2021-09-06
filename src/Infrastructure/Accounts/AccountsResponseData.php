<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Model\Accounts\Account;

class AccountsResponseData implements AccountsResponseDataInterface
{
    /** @var Account[] */
    private array $accounts;

    /**
     * @return Account[]
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * @param Account[] $accounts
     * @return AccountsResponseData
     */
    public function setAccounts(array $accounts): AccountsResponseData
    {
        $this->accounts = $accounts;
        return $this;
    }
}
