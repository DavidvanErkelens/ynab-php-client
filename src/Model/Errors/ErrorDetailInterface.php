<?php

declare(strict_types=1);

namespace YNAB\Model\Errors;

interface ErrorDetailInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDetail(): string;
}
