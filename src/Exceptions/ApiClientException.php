<?php

declare(strict_types=1);

namespace YNAB\Exceptions;

use Exception;
use Throwable;

class ApiClientException extends Exception
{
    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
