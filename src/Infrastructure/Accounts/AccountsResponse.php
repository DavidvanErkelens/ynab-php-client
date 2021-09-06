<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<AccountsResponse>
 */
class AccountsResponse extends DeserializableObject implements AccountsResponseInterface
{
    private AccountsResponseData $data;

    /**
     * @return AccountsResponseData
     */
    public function getData(): AccountsResponseData
    {
        return $this->data;
    }

    /**
     * @param AccountsResponseData $data
     * @return AccountsResponse
     */
    public function setData(AccountsResponseData $data): AccountsResponse
    {
        $this->data = $data;
        return $this;
    }
}
