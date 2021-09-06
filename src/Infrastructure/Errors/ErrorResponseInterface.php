<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Errors;

use YNAB\Model\Errors\ErrorDetailInterface;

interface ErrorResponseInterface
{
    /**
     * @return ErrorDetailInterface
     */
    public function getError(): ErrorDetailInterface;
}
