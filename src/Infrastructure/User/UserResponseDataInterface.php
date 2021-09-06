<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\User;

use YNAB\Model\User\UserInterface;

interface UserResponseDataInterface
{
    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface;
}
