<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Model\Accounts\Account;

class AccountResponseData implements AccountResponseDataInterface
{
    private Account $account;

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     * @return AccountResponseData
     */
    public function setAccount(Account $account): AccountResponseData
    {
        $this->account = $account;
        return $this;
    }
}
