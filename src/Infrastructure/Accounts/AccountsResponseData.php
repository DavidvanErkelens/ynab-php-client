<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Model\Accounts\Account;

class AccountsResponseData implements AccountsResponseDataInterface
{
    /** @var Account[] */
    private array $accounts;
    private int $serverKnowledge;

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

    /**
     * @return int
     */
    public function getServerKnowledge(): int
    {
        return $this->serverKnowledge;
    }

    /**
     * @param int $serverKnowledge
     * @return AccountsResponseData
     */
    public function setServerKnowledge(int $serverKnowledge): AccountsResponseData
    {
        $this->serverKnowledge = $serverKnowledge;
        return $this;
    }
}
