<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\User;

use YNAB\Model\User\User;

class UserResponseData implements UserResponseDataInterface
{
    private User $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return UserResponseData
     */
    public function setUser(User $user): UserResponseData
    {
        $this->user = $user;
        return $this;
    }
}
