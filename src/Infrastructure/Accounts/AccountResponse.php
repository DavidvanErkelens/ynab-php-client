<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<AccountResponse>
 */
class AccountResponse extends DeserializableObject implements AccountResponseInterface
{
    private AccountResponseData $data;

    /**
     * @return AccountResponseData
     */
    public function getData(): AccountResponseData
    {
        return $this->data;
    }

    /**
     * @param AccountResponseData $data
     * @return AccountResponse
     */
    public function setData(AccountResponseData $data): AccountResponse
    {
        $this->data = $data;
        return $this;
    }
}
