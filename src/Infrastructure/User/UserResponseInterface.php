<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\User;

interface UserResponseInterface
{
    /**
     * @return UserResponseDataInterface
     */
    public function getData(): UserResponseDataInterface;
}
