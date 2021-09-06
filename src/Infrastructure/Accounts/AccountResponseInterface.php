<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Accounts;

interface AccountResponseInterface
{
    /**
     * @return AccountResponseDataInterface
     */
    public function getData(): AccountResponseDataInterface;
}
