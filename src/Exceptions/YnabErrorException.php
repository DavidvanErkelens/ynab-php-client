<?php

declare(strict_types=1);

namespace YNAB\Exceptions;

use Exception;
use Throwable;
use YNAB\Model\Errors\ErrorDetailInterface;

class YnabErrorException extends Exception
{
    private ErrorDetailInterface $errorDetail;

    public function __construct(ErrorDetailInterface $errorDetail, $code = 0, Throwable $previous = null)
    {
        parent::__construct($errorDetail->getDetail(), $code, $previous);
        $this->errorDetail = $errorDetail;
    }

    /**
     * @return ErrorDetailInterface
     */
    public function getErrorDetail(): ErrorDetailInterface
    {
        return $this->errorDetail;
    }
}
