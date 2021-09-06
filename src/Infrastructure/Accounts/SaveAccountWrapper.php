<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Infrastructure\Serialization\SerializableObject;
use YNAB\Model\Accounts\SaveAccount;

class SaveAccountWrapper extends SerializableObject
{
    private SaveAccount $account;

    /**
     * @param SaveAccount $account
     */
    private function __construct(SaveAccount $account)
    {
        $this->account = $account;
    }

    /**
     * @param SaveAccount $account
     * @return SaveAccountWrapper
     */
    public static function wrap(SaveAccount $account): SaveAccountWrapper
    {
        return new self($account);
    }

    /**
     * @return SaveAccount
     */
    public function getAccount(): SaveAccount
    {
        return $this->account;
    }

    /**
     * @param SaveAccount $account
     * @return SaveAccountWrapper
     */
    public function setAccount(SaveAccount $account): SaveAccountWrapper
    {
        $this->account = $account;
        return $this;
    }
}
