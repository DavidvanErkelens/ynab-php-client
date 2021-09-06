<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\User;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<UserResponse>
 */
class UserResponse extends DeserializableObject implements UserResponseInterface
{
    private UserResponseData $data;

    /**
     * @return UserResponseData
     */
    public function getData(): UserResponseData
    {
        return $this->data;
    }

    /**
     * @param UserResponseData $data
     * @return UserResponse
     */
    public function setData(UserResponseData $data): UserResponse
    {
        $this->data = $data;
        return $this;
    }
}
