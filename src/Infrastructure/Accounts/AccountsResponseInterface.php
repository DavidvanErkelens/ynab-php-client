<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

interface AccountsResponseInterface
{
    /**
     * @return AccountsResponseDataInterface
     */
    public function getData(): AccountsResponseDataInterface;
}
