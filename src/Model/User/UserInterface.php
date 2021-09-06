<?php

declare(strict_types=1);

namespace YNAB\Model\User;

interface UserInterface
{
    /**
     * @return string
     */
    public function getId(): string;
}
